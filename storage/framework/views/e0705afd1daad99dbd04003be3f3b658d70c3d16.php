<?php $__env->startSection('content'); ?>



    <section>

        <div class="container-fluid">

            <div class="card mb-4">

                <div class="card-header with-border">

                    <h3 class="card-title text-center"> <?php echo e(__('Date Wise Attendance')); ?> </h3>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12">

                            <form method="post" id="filter_form" class="form-horizontal">

                                <?php echo csrf_field(); ?>

                                <div class="row">





                                    <?php if((Auth::user()->can('view-attendance'))): ?>

                                    

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label><?php echo e(trans('file.Company')); ?> *</label>

                                                <select name="company_id" id="company_id"  class="form-control selectpicker dynamic" required

                                                        data-live-search="true" data-live-search-style="begins"  data-first_name="first_name" data-last_name="last_name"

                                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Company')])); ?>...'>

                                                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-md-6 form-group">

                                            <label><?php echo e(trans('file.Employee')); ?> *</label>

                                            <select name="employee_id" id="employee_id"  class="selectpicker form-control" required

                                                    data-live-search="true" data-live-search-style="contains"

                                                    title='<?php echo e(__('Selecting',['key'=>trans('file.Employee')])); ?>...'>

                                            </select>

                                        </div>

                                    <?php else: ?>

                                        <input type="hidden" name="employee_id" id="employee_id" value="<?php echo e(Auth::user()->id); ?>"> 

                                    <?php endif; ?>



                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="start_date"><?php echo e(__('Start Date')); ?></label>

                                            <input class="form-control month_year date"

                                                   placeholder="Select Date" readonly=""

                                                   id="start_date" name="start_date" type="text" required

                                                   value="">

                                        </div>

                                    </div>





                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="start_date"><?php echo e(__('End Date')); ?></label>

                                            <input class="form-control month_year date"

                                                   placeholder="Select Date" readonly=""

                                                   id="end_date" name="end_date" type="text" required

                                                   value="">

                                        </div>

                                    </div>



                                </div>



                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <div class="form-actions">

                                                <button type="submit" class="filtering btn btn-primary"><i class="fa fa-search"></i> <?php echo e(trans('file.Search')); ?>


                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="table-responsive">

            <table id="date_wise_attendance-table" class="table ">

                <thead>

                <tr>

                    <th></th>

                    <th><?php echo e(trans('file.Employee')); ?></th>

                    <th><?php echo e(trans('file.Company')); ?></th>

                    <th><?php echo e(trans('file.Date')); ?></th>

                    <th><?php echo e(trans('file.status')); ?></th>
                    <th><?php echo e(__('Place')); ?></th>
                    <th><?php echo e(__('OSD')); ?></th>
    
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



            });





                fill_datatable();



                function fill_datatable(filter_start_date = '', filter_end_date = '', company_id = '', employee_id = '') {



                    let table_table = $('#date_wise_attendance-table').DataTable({

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

                            url: "<?php echo e(route('date_wise_attendances.index')); ?>",

                            data: {

                                filter_start_date: filter_start_date,

                                filter_end_date: filter_end_date,

                                company_id: company_id,

                                employee_id: employee_id,

                                "_token": "<?php echo e(csrf_token()); ?>"

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

                                data: 'place',

                                name: 'place',

                            },
                            
                            {

                                data: 'osd',

                                name: 'osd',

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



                                "orderable": true,

                                'targets': [0, 10],

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

                            }

                        ],





                        'select': {style: 'multi', selector: 'td:first-child'},

                        'lengthMenu': [[31, 45, 70, -1], [31, 45, 70, "All"]],

                        dom: '<"row"lfB>rtip',

                        buttons: [

                            {
                                extend:'pdf',

                                text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',

                                exportOptions: {
                                    modifier: {
                                    page: 'all',
                                    search: 'none'   
                                    }
                                },

                                action: function ( e, dt, node, config ) {
                                    console.log(dt);
                                    exportPDF(dt);

                                }

                            },

                            {

                                extend: 'csv',

                                text: '<i title="export to csv" class="fa fa-file-text-o"></i>',

                                exportOptions: {

                                    columns: ':visible:Not(.not-exported)',

                                    rows: ':visible',
                                    page : 'all', // 'all', 'current'
                                    search : 'none' // 'none', 'applied', 'removed'

                                },

                            },

                            {

                                extend: 'print',

                                text: '<i title="print" class="fa fa-print"></i>',

                                exportOptions: {

                                    columns: ':visible:Not(.not-exported)',

                                    rows: ':visible',
                                    modifier: {
                                        page: 'all'
                                    }

                                },

                            },

                            {

                                extend: 'colvis',

                                text: '<i title="column visibility" class="fa fa-eye"></i>',

                                columns: ':gt(0)'

                            },

                        ],

                    });

                    new $.fn.dataTable.FixedHeader(table_table);

                }



                    $('#filter_form').on('submit',function (e) {

                        e.preventDefault();

                        var filter_start_date = $('#start_date').val();

                        var filter_end_date = $('#end_date').val();

                        let company_id = $('#company_id').val();

                        let employee_id = $('#employee_id').val();

                        if (filter_start_date !== '' && filter_end_date !== '' && company_id !== '' && employee_id !== '') {

                            $('#date_wise_attendance-table').DataTable().destroy();

                            fill_datatable(filter_start_date, filter_end_date, company_id, employee_id);

                        } else {

                            alert('<?php echo e(__('Select Both filter option')); ?>');

                        }

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

                
                
                console.log(data);        





                $.ajax({

                        url:"<?php echo e(route('export_attendance_pdf.index')); ?>",

                        method:"POST",

                        data:{ value:JSON.stringify(data)},
                        
                        success: function(response){
                            console.table(response);

                            Object.entries(response).forEach(element => {

                                var link = document.createElement('a');

                                link.href = element[1];

                                link.download = element[0];

                                link.click();

                            });



                        },

                        error: function(blob){

                            console.log(blob);

                        }

                    });

            }

        })(jQuery);

    </script>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/timesheet/dateWiseAttendance/index.blade.php ENDPATH**/ ?>