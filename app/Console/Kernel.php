<?php

namespace App\Console;

use App\Console\Commands\DocumentExpiryReminder;
use App\EmployeeDocument;
use App\ScheduledTasks\AwardLeavePoint;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
		Commands\DocumentExpiryReminder::class,
        Commands\OfficialDocumentExpiryReminder::class,
        Commands\EmployeeImmigrationExpiryReminder::class,

	];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
		$schedule->command('document:expiry')->everyMinute();
        $schedule->command('officialDocument:expiry')->daily();
        $schedule->command('employeeImmigration:expiry')->daily();
        $schedule->call(new AwardLeavePoint)->monthlyOn(1, '0:0');
	}

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
