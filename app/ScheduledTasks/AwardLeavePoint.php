<?php

namespace App\ScheduledTasks;

use App\Attendance;
use App\company;
use App\Employee;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AwardLeavePoint{

    public $date_attendance = [];
    public $date_range = [];

	public $work_days = 0;
    public function __invoke()
    {
        $start  = new Carbon('first day of last month');
        $end    = new Carbon('last day of last month');
        $start  = $start->format('Y-m-d');
        $end    = $end->format('Y-m-d');
        $companies = company::all('id', 'company_name');
        $begin = new DateTime($start);

		$last = new DateTime($end);
		$last->modify('+1 day');
		$interval = DateInterval::createFromDateString('1 day');

		$period = new DatePeriod($begin, $interval, $last);

		foreach ($period as $dt) {

			$this->date_range[] = $dt->format("d D");

			$this->date_attendance[] = $dt->format(env('Date_Format'));
		}

        $employees = Employee::with([

            'officeShift', 'employeeAttendance' => function ($query) use ($start, $end) {

                $query->whereBetween('attendance_date', [$start, $end]);

            },

            'department:id,department_name',

            'designation:id,designation_name',

            'employeeLeave',

            'company:id,company_name',

            'company.companyHolidays'

        ])
        ->select('id', 'company_id', 'first_name', 'last_name', 'office_shift_id', 'department_id', 'designation_id')
        ->where('is_active', 1)
        ->where('exit_date', NULL)->get();

        $eligible   = [];
        $totalDays  = new Carbon('first day of last month');
        $totalDays = $totalDays->daysInMonth;

        foreach($employees as $employee) {
            for($i = 0; $i < $totalDays; $i++) {
                if(empty($eligible[$employee->id])) {
                    $eligible[$employee->id] = ($this->checkAttendanceStatus($employee, $i) == 'P' || $this->checkAttendanceStatus($employee, $i) == 'H' || $this->checkAttendanceStatus($employee, $i) == 'O');
                } else {
                    $eligible[$employee->id] =  $eligible[$employee->id] && ($this->checkAttendanceStatus($employee, $i) == 'P' || $this->checkAttendanceStatus($employee, $i) == 'H' || $this->checkAttendanceStatus($employee, $i) == 'O');
                }
            }
        }
        Log::debug(var_export($eligible, true));

        $eligible = array_keys(array_filter($eligible));

        Employee::whereIn('id', $eligible)->update(['remaining_leave' => DB::raw('remaining_leave + 1')]);
    }

    public function checkAttendanceStatus($emp, $index)

	{



		if (count($this->date_attendance) <= $index) {

			return '';

		} else {

			$present = $emp->employeeAttendance->where('attendance_date', $this->date_attendance[$index]);



			$leave = $emp->employeeLeave->where('start_date', '<=', $this->date_attendance[$index])

				->where('end_date', '>=', $this->date_attendance[$index]);



			$holiday = $emp->company->companyHolidays->where('start_date', '<=', $this->date_attendance[$index])

				->where('end_date', '>=', $this->date_attendance[$index]);



			$day = strtolower(Carbon::parse($this->date_attendance[$index])->format('l')) . '_in';



			if ($present->isNotEmpty()) {

				$this->work_days++;



				return 'P';

			} elseif (!$emp->officeShift->$day) {

				return 'O';

			} elseif ($leave->isNotEmpty()) {

				return 'L';

			} elseif ($holiday->isNotEmpty()) {

				return 'H';

			} else {

				return 'A';

			}

		}

	}

    
}