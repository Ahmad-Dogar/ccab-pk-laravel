
<?php $__env->startSection('content'); ?>

    <section>
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header with-border">
                    <h3 class="card-title text-center"><?php echo e(__('Monthly Attendance Info')); ?> <hr><span
                                        id="details_month_year" class="thin-text"></span></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" id="filter_form" class="form-horizontal">
                                <?php echo csrf_field(); ?>
                                <div class="row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input class="form-control date"  name="month_year" type="text" id="month_year">
                                        </div>
                                    </div>

                                    
                                    <?php if((Auth::user()->can('view-attendance'))): ?>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="company_id" id="company_id" class="form-control selectpicker dynamic"
                                                        data-live-search="true" data-live-search-style="begins"  data-first_name="first_name" data-last_name="last_name"
                                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Company')])); ?>...'>
                                                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="employee_id" id="employee_id"   class="selectpicker form-control"
                                                        data-live-search="true" data-live-search-style="begins"
                                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Employee')])); ?>...'>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button name="submit_form" id="submit_form" type="submit" class="btn btn-primary"><i class="fa fa fa-check-square-o"></i> <?php echo e(trans('file.Get')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <span class="attendace_mark_info mb-3">
                <small><?php echo e(trans('file.present')); ?> = P, Late present = LP , <?php echo e(trans('file.Absent')); ?> = A  ,<?php echo e(trans('file.Leave')); ?> = L  , <?php echo e(trans('file.Holiday')); ?> = H  ,<?php echo e(__('Off Day')); ?> = H</small>
            </span>
        </div>
        <div class="table-responsive">
            <table id="month_wise_attendance-table" class="table ">
                <thead>
                <tr>
                    <th></th>
                    <th><?php echo e(trans('file.Employee')); ?> </th>
                    <th>Department Name</th>
                    <th>Designation Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?php echo e(__('Worked Days')); ?></th>
                    <th><?php echo e(__('Total Worked Hours')); ?></th>
                </tr>

                </thead>
            </table>
        </div>
    </section>

    <script type="text/javascript">

        (function($) {
            "use strict";

            $(document).ready(function() {

                let date = $('.date');
                date.datepicker({
                    format: "MM yyyy",
                    startView: "months",
                    minViewMode: 1,
                    autoclose: true,
                }).datepicker("setDate", new Date());

                fill_datatable();

                function fill_datatable(filter_company = '', filter_employee = '', filter_month_year = $('#month_year').val()) {
                    $('#details_month_year').html($('#month_year').val());
                    let table_table = $('#month_wise_attendance-table').DataTable({
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
                        responsive: false,
                        scrollX: true,
                        fixedHeader: {
                            header: true,
                            footer: true
                        },
                        processing: true,
                        serverSide: true,
                        ajax: {
                            method:'POST',
                            url: "<?php echo e(route('monthly_attendances.index')); ?>",
                            data: {
                                filter_company: filter_company,
                                filter_employee: filter_employee,
                                filter_month_year: filter_month_year,
                                "_token": "<?php echo e(csrf_token()); ?>"
                            },
                            // success: function (data) {
                            //     console.log(data);
                            // },
                            dataSrc: function ( json ) {
                                $.each( json.date_range, function( key, value ) {
                                    $( table_table.column( key+4 ).header() ).text(value);
                                });
                                for (var i = json.date_range.length; i < 31; i++) {
                                    table_table.column( i+4 ).visible( false );
                                }
                                return json.data;
                            }
                        },

                        columns: [
                            {
                                data: null,
                                orderable: false,
                                searchable: false
                            },
                            {
                                data: 'employee_name',
                                name: 'employee_name',
                            },
                            {
                                data: 'department',
                                name: 'department',
                            },
                            {
                                data: 'designation',
                                name: 'designation',
                            },
                            {
                                data: 'day1',
                                name: 'day1',
                            },
                            {
                                data: 'day2',
                                name: 'day2',
                            },
                            {
                                data: 'day3',
                                name: 'day3',
                            },
                            {
                                data: 'day4',
                                name: 'day4',
                            },
                            {
                                data: 'day5',
                                name: 'day5',
                            },
                            {
                                data: 'day6',
                                name: 'day6',
                            },
                            {
                                data: 'day7',
                                name: 'day7',
                            },
                            {
                                data: 'day8',
                                name: 'day8',
                            },
                            {
                                data: 'day9',
                                name: 'day9',
                            },
                            {
                                data: 'day10',
                                name: 'day10',
                            },
                            {
                                data: 'day11',
                                name: 'day11',
                            },
                            {
                                data: 'day12',
                                name: 'day12',
                            },
                            {
                                data: 'day13',
                                name: 'day13',
                            },
                            {
                                data: 'day14',
                                name: 'day14',
                            },
                            {
                                data: 'day15',
                                name: 'day15',
                            },
                            {
                                data: 'day16',
                                name: 'day16',
                            },
                            {
                                data: 'day17',
                                name: 'day17',
                            },
                            {
                                data: 'day18',
                                name: 'day18',
                            },
                            {
                                data: 'day19',
                                name: 'day19',
                            },
                            {
                                data: 'day20',
                                name: 'day20',
                            },
                            {
                                data: 'day21',
                                name: 'day21',
                            },
                            {
                                data: 'day22',
                                name: 'day22',
                            },
                            {
                                data: 'day23',
                                name: 'day23',
                            },
                            {
                                data: 'day24',
                                name: 'day24',
                            },
                            {
                                data: 'day25',
                                name: 'day25',
                            },
                            {
                                data: 'day26',
                                name: 'day26',
                            },
                            {
                                data: 'day27',
                                name: 'day27',
                            },
                            {
                                data: 'day28',
                                name: 'day28',
                            },
                            {
                                data: 'day29',
                                name: 'day29',
                            },
                            {
                                data: 'day30',
                                name: 'day30',
                            },
                            {
                                data: 'day31',
                                name: 'day31',
                            },
                            {
                                data: 'worked_days',
                                name: 'worked_days',
                            },
                            {
                                data: 'total_worked_hours',
                                name: 'total_worked_hours',
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
                                'targets': [0]
                            },
                            {
                                'render': function (data, type, row, meta) {
                                    if (type == 'display') {
                                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                                    }

                                    return data;
                                },
                                'checkboxes': {
                                    'selectRow': true,
                                    'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                                },
                                'targets': [0]
                            },
                        ],

                        'select': {style: 'multi', selector: 'td:first-child'},
                        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        dom: '<"row"lfB>rtip',
                        buttons: [
                            {
                                extend:'pdf',
                                text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
                                action: function ( e, dt, node, config ) {
                                    exportPDF(dt);
                                }
                            },
                            {
                                extend: 'csv',
                                orientation: 'landscape',
                                pageSize : 'LEGAL',
                                text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
                                exportOptions: {
                                    columns: ':visible:Not(.not-exported)',
                                    rows: ':visible'
                                },
                            },
                            {
                                extend: 'print',
                                orientation: 'landscape',
                                pageSize : 'LEGAL',
                                text: '<i title="print" class="fa fa-print"></i>',
                                exportOptions: {
                                    columns: ':visible:Not(.not-exported)',
                                    rows: ':visible'
                                },
                            },
                        ],
                    });
                }

                $('#submit_form').on('click', function (e) {
                    e.preventDefault();

                    var filter_company = $('#company_id').val();
                    var filter_employee = $('#employee_id').val();
                    var filter_month_year = $('#month_year').val();
                    if (filter_company !== '' && filter_month_year !== '') {
                        $('#month_wise_attendance-table').DataTable().destroy();
                        fill_datatable(filter_company, filter_employee, filter_month_year);
                    }
                    else {
                        alert('<?php echo e(__('Select at least one filter option')); ?>');
                    }
                });
            });


            $('.dynamic').change(function() {
                if ($(this).val() !== '') {
                    let value = $(this).val();
                    let first_name = $(this).data('first_name');
                    let last_name = $(this).data('last_name');
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"<?php echo e(route('dynamic_employee')); ?>",
                        method:"POST",
                        data:{ value:value, _token:_token, first_name:first_name,last_name:last_name},
                        success:function(result)
                        {
                            $('select').selectpicker("destroy");
                            $('#employee_id').html(result);
                            $('select').selectpicker();

                        }
                    });
                }
            });

            const exportPDF = (dt) => {
               let dataTableRows = dt.rows().data()
               let data = [];
               let keys = Object.keys(dataTableRows)
                for (let i = 0; i < dataTableRows.length; i++) {
                    data.push(dataTableRows[i])
                }
                $.ajax({
                        url:"<?php echo e(route('export_monthly_attendance_pdf.index')); ?>",
                        method:"POST",
                        data:{ value:data},
                        xhrFields: {
                              responseType: 'blob'
                        },
                        success: function(response){
                            var blob = new Blob([response]);
                            console.log(response);
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = "monthly-attendance.pdf";
                            link.click();
                        },
                        error: function(blob){
                            console.log(blob);
                        }
                    });
            }
        })(jQuery);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/timesheet/monthlyAttendance/index.blade.php ENDPATH**/ ?>