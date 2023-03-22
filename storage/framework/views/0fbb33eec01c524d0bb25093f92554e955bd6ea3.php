<?php $__env->startSection('content'); ?>

    <section>
        <div class="container-fluid">

            

            <div class="card">
                <div class="card-body">

                    <div class="card-title text-center"><h3><?php echo e(__('Daily Attendance Info')); ?><span id="details_month_year"></span></h3></div>

                    <form method="post" id="filter_form" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 offset-md-3 mb-2">
                                <label for="day_month_year"><?php echo e(__('Select Date')); ?></label>
                                <div class="input-group">
                                    <input class="form-control month_year date" placeholder="<?php echo e(__('Select Date')); ?>" readonly="" id="day_month_year" name="day_month_year" type="text" value="<?php echo e(now()->format(env('date_format'))); ?>">
                                    <button type="submit" class="filtering btn btn-primary"><i class="fa fa-search"></i> <?php echo e(trans('file.Search')); ?>

                                        </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="daily_attendance-table" class="table ">
                <thead>
                <tr>
                    <th><?php echo e(trans('file.Employee')); ?></th>
                    <th><?php echo e(trans('file.Company')); ?></th>
                    <th><?php echo e(trans('file.Date')); ?></th>
                    <th><?php echo e(trans('file.status')); ?></th>
                    <th><?php echo e(__('Clock In')); ?></th>
                    <th><?php echo e(__('Clock Out')); ?></th>
                    <th><?php echo e(trans('file.Late')); ?></th>
                    <th><?php echo e(__('Early Leaving')); ?></th>
                    <th><?php echo e(trans('file.Overtime')); ?></th>
                    <th><?php echo e(__('Total Work')); ?></th>
                    <th><?php echo e(__('Total Rest')); ?></th>
                </tr>
                </thead>
            </table>
        </div>
    </section>

    <script type="text/javascript">
        (function($) {
            "use strict";

            $(document).ready(function () {

                let date = $('.date');
                date.datepicker({
                    format: '<?php echo e(env('Date_Format_JS')); ?>',
                    autoclose: true,
                    todayHighlight: true,
                    endDate: new Date()
                });


                fill_datatable();

                function fill_datatable(filter_month_year = '') {

                    let table_table = $('#daily_attendance-table').DataTable({
                    initComplete: function () {
                        this.api().columns([2, 4]).every(function () {
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                                $('select').selectpicker('refresh');
                            });
                        });
                    },
                    responsive: true,
                        fixedHeader: {
                            header: true,
                            footer: true
                        },
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "<?php echo e(route('attendances.index')); ?>",
                            data: {
                                filter_month_year: filter_month_year,
                                "_token": "<?php echo e(csrf_token()); ?>"
                            }
                        },

                        columns: [
                            {
                                data: 'employee_name',
                                name: 'employee_name'
                            },
                            {
                                data: 'company',
                                name: 'company'
                            },
                            {
                                data: 'attendance_date',
                                name: 'attendance_date',
                            },
                            {
                                data: 'attendance_status',
                                name: 'attendance_status'
                            },
                            {
                                data: 'clock_in',
                                name: 'clock_in',
                            },
                            {
                                data: 'clock_out',
                                name: 'clock_out',
                            },
                            {
                                data: 'time_late',
                                name: 'time_late',
                            },
                            {
                                data: 'early_leaving',
                                name: 'early_leaving',
                            },
                            {
                                data: 'overtime',
                                name: 'overtime',
                            },
                            {
                                data: 'total_work',
                                name: 'total_work'
                            },
                            {
                                data: 'total_rest',
                                name: 'total_rest'
                            },
                        ],


                        "order": [],
                        'language': {
                            'lengthMenu': '_MENU_ <?php echo e(__("records per page")); ?>',
                            "info": '<?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)',
                            "search": '<?php echo e(trans("file.Search")); ?>',
                            'paginate': {
                                'previous': '<?php echo e(trans("file.Previous")); ?>',
                                'next': '<?php echo e(trans("file.Next")); ?>'
                            }
                        },
                        'columnDefs': [
                            {
                                "orderable": false,
                                'targets': [0, 10],
                            },
                        ],

                        'select': {style: 'multi', selector: 'td:first-child'},
                        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    });
                }

                new $.fn.dataTable.FixedHeader($('#daily_attendance-table').DataTable());

                $('#filter_form').on('submit',function (e) {
                    e.preventDefault();
                    var filter_month_year = $('#day_month_year').val();
                    if (filter_month_year !== '') {
                        $('#daily_attendance-table').DataTable().destroy();
                        fill_datatable(filter_month_year);
                    } else {
                        alert('<?php echo e(__('Select Both filter option')); ?>');
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/timesheet/attendance/attendance.blade.php ENDPATH**/ ?>