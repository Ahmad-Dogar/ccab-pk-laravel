<?php $__env->startSection('content'); ?>


    <section>
        <div class="container-fluid"><span id="general_result"></span></div>

        <div class="container-fluid mb-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store-leave')): ?>
                <button type="button" class="btn btn-info" name="create_record" id="create_record"><i
                            class="fa fa-plus"></i> <?php echo e(__('Add Leave')); ?></button>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-leave')): ?>
                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i
                            class="fa fa-minus-circle"></i> <?php echo e(__('Bulk delete')); ?></button>
            <?php endif; ?>
        </div>


        <div class="table-responsive">
            <table id="leave-table" class="table ">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(__('Leave Type')); ?></th>
                    <th><?php echo e(trans('file.Employee')); ?></th>
                    <th><?php echo e(trans('file.Department')); ?></th>
                    <th><?php echo e(trans('file.Duration')); ?></th>
                    <th><?php echo e(__('Applied Date')); ?></th>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>

            </table>
        </div>
    </section>



    <div id="formModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Leave')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal">

                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Leave Type')); ?> *</label>
                                <select name="leave_type" id="leave_type" class="form-control selectpicker " data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Leave Type')); ?>'>
                                    <?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($leave_type->id); ?>"><?php echo e($leave_type->leave_type); ?>

                                            (<?php echo e($leave_type->allocated_day); ?> Days)
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Company')); ?> *</label>
                                <select name="company_id" id="company_id" class="form-control selectpicker dynamic"
                                        data-live-search="true" data-live-search-style="begins"
                                        data-dependent="department_name"
                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Company')])); ?>...'>
                                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>


                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Department')); ?> *</label>
                                <select name="department_id" id="department_id"
                                        class="selectpicker form-control employee"
                                        data-live-search="true" data-live-search-style="begins"
                                        data-first_name="first_name" data-last_name="last_name"
                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Department')])); ?>...'>

                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Employee')); ?> *</label>
                                <select name="employee_id" id="employee_id" class="selectpicker form-control"
                                        data-live-search="true" data-live-search-style="begins"
                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Employee')])); ?>...'>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label><?php echo e(__('Start Date')); ?> *</label>
                                <input type="text" name="start_date" id="start_date" class="form-control date" value="">
                            </div>

                            <div class="col-md-4 form-group">
                                <label><?php echo e(__('End Date')); ?> *</label>
                                <input type="text" name="end_date" id="end_date" class="form-control test date" value="">
                            </div>

                            <div class="col-md-4 form-group">
                                <label><?php echo e(__('Total Days')); ?></label>
                                <input type="text" readonly id="total_days" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="leave_reason"><?php echo e(trans('file.Description')); ?></label>
                                <textarea class="form-control" id="leave_reason" name="leave_reason"
                                          rows="3"></textarea>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="remarks"><?php echo e(trans('file.Remarks')); ?></label>
                                <textarea class="form-control" id="remarks" name="remarks"
                                          rows="3"></textarea>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Status')); ?></label>
                                <select name="status" id="status" class="form-control selectpicker "
                                        data-live-search="true" data-live-search-style="begins"
                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Status')])); ?>...'>
                                    <option value="pending"><?php echo e(trans('file.Pending')); ?></option>
                                    <option value="first level approval"><?php echo e(__('First Level Approval')); ?></option>
                                    <option value="approved"><?php echo e(trans('file.Approved')); ?></option>
                                    <option value="rejected"><?php echo e(trans('file.Rejected')); ?></option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="is_half" id="is_half"
                                           value="1">
                                    <label class="custom-control-label" for="is_half"><?php echo e(__('Half Day')); ?></label>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="is_notify" id="is_notify"
                                           value="1">
                                    <label class="custom-control-label"
                                           for="is_notify"><?php echo e(trans('file.Notification')); ?></label>
                                </div>
                            </div>


                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action"/>
                                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                                    <input type="hidden" name="diff_date_hidden" id="diff_date_hidden"/>
                                    <input type="hidden" name="employee_id_hidden" id="employee_id_hidden"/>
                                    <input type="hidden" name="leave_type_hidden" id="leave_type_hidden"/>
                                    <input type="hidden" name="ticket_status" value="open"/>
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                                           value=<?php echo e(trans('file.Add')); ?>>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="leave_model" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Leave Info')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table  table-bordered">

                                    <tr>
                                        <th><?php echo e(trans('file.Company')); ?></th>
                                        <td id="company_id_show"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(__('Leave For')); ?></th>
                                        <td id="employee_id_show"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(trans('file.Department')); ?></th>
                                        <td id="department_id_show"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(__('Leave Type')); ?></th>
                                        <td id="leave_type_id"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(__('Leave Reason')); ?></th>
                                        <td id="leave_reason_id"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(trans('file.Remarks')); ?></th>
                                        <td id="remarks_id"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(trans('file.Status')); ?></th>
                                        <td id="status_id"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(__('Start Date')); ?></th>
                                        <td id="start_date_id"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(__('End Date')); ?></th>
                                        <td id="end_date_id"></td>
                                    </tr>


                                    <tr>
                                        <th><?php echo e(__('Applied Date')); ?></th>
                                        <td id="applied_date_id"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(__('Total Days')); ?></th>
                                        <td id="total_days_id"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(__('Half Day')); ?></th>
                                        <td id="is_half_id"></td>
                                    </tr>

                                    <tr>
                                        <th><?php echo e(trans('file.Notification')); ?></th>
                                        <td id="is_notify_id"></td>
                                    </tr>

                                </table>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('file.Close')); ?></button>
            </div>
        </div>
    </div>




    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><?php echo e(trans('file.Confirmation')); ?></h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center"><?php echo e(__('Are you sure you want to remove this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger"><?php echo e(trans('file.OK')); ?>'
                    </button>
                    <button type="button" class="close btn-default"
                            data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        (function($) {
            "use strict";

            let global_start_date;
            let global_end_date;
            let global_diff;

            $(document).ready(function () {

                let date = $('.date');
                date.datepicker({
                    format: '<?php echo e(env('Date_Format_JS')); ?>',
                    autoclose: true,
                    todayHighlight: true,
                // });
                }).on('change', function(){
                    let start_date = $("#start_date").datepicker('getDate');
                    let end_date = $("#end_date").datepicker('getDate');
                    if (start_date!=null && end_date!=null && end_date>=start_date) {
                    let dayDiff = Math.ceil((end_date - start_date) / (1000 * 60 * 60 * 24)) + 1;
                        $('#total_days').val(dayDiff);
                    }
                    else if(start_date!=null && end_date!=null && end_date<start_date){
                        $('#total_days').val(0);
                    }
                });



                let table_table = $('#leave-table').DataTable({
                    initComplete: function () {
                        this.api().columns([1]).every(function () {
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
                        url: "<?php echo e(route('leaves.index')); ?>",
                    },

                    columns: [
                        {
                            data: 'id',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: null,
                            render: function (data) {
                                return data.leave_type + "<br><td><div class = 'badge badge-success'> (" + data.status + ")</div></td><br>";

                            }

                        },
                        {
                            data: 'employee',
                            name: 'employee',
                        },
                        {
                            data: 'department',
                            name: 'department',

                        },

                        {
                            data: null,
                            render: function (data) {

                                return data.start_date + ' <?php echo e(trans('file.To')); ?> ' + data.end_date
                                    + "<br>" + ' <?php echo e(trans('file.Total')); ?> ' + data.total_days + ' <?php echo e(trans('file.Days')); ?> ';


                            }

                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        }
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
                            'targets': [0, 6],
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
                    'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    dom: '<"row"lfB>rtip',
                    buttons: [
                        {
                            extend: 'pdf',
                            text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'csv',
                            text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'print',
                            text: '<i title="print" class="fa fa-print"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
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
            });


            $('#create_record').on('click', function () {

                $('.modal-title').text('<?php echo e(__('Add Leave')); ?>');
                $('#action_button').val('<?php echo e(trans("file.Add")); ?>');
                $('#action').val('<?php echo e(trans("file.Add")); ?>');
                $('#formModal').modal('show');
            });

            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                if ($('#action').val() == '<?php echo e(trans('file.Add')); ?>') {

                    let start_date = $("#start_date").datepicker('getDate');
                    let end_date = $("#end_date").datepicker('getDate');
                    let dayDiff = Math.ceil((end_date - start_date) / (1000 * 60 * 60 * 24)) + 1;

                    $('#diff_date_hidden').val(dayDiff);

                    //console.log(dayDiff);


                    $.ajax({
                        url: "<?php echo e(route('leaves.store')); ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            let html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (let count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.limit) {
                                html = '<div class="alert alert-danger">' + data.limit + '</div>';
                            }
                            if (data.remaining_leave) {
                                html = '<div class="alert alert-danger">' + data.remaining_leave + '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#sample_form')[0].reset();
                                $('select').selectpicker('refresh');
                                $('.date').datepicker('update');
                                $('#leave-table').DataTable().ajax.reload();
                            }
                            $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        }
                    })
                }

                if ($('#action').val() == '<?php echo e(trans('file.Edit')); ?>') {

                    let start_date_edit = new Date($("#start_date").val().split('-').reverse().join('-'));
                    let end_date_edit = new Date($("#end_date").val().split('-').reverse().join('-'));
                    let timeDiff_edit;
                    let dayDiff_edit;


                    if (start_date_edit != null && end_date_edit != null) {
                        // dayDiff_edit = Math.ceil((end_date_edit - start_date_edit) / (1000 * 60 * 60 * 24)) + 1;
                        timeDiff_edit = end_date_edit.getTime() - start_date_edit.getTime();
                        dayDiff_edit  = timeDiff_edit / (1000 * 3600 * 24) + 1 ;

                    } else if (start_date_edit == null && end_date_edit == null) {
                        dayDiff_edit = null;
                    }

                    $('#diff_date_hidden').val(dayDiff_edit);
                    console.log(dayDiff_edit);

                    $.ajax({
                        url: "<?php echo e(route('leaves.update')); ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            let html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (let count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.limit) {
                                html = '<div class="alert alert-danger">' + data.limit + '</div>';
                            }
                            if (data.remaining_leave) {
                                html = '<div class="alert alert-danger">' + data.remaining_leave + '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                setTimeout(function () {
                                    $('#formModal').modal('hide');
                                    $('.date').datepicker('update');
                                    $('select').selectpicker('refresh');
                                    $('#leave-table').DataTable().ajax.reload();
                                    $('#sample_form')[0].reset();
                                }, 2000);

                            }
                            $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        }
                    });
                }
            });

            $(document).on('click', '.show_new', function () {

                let id = $(this).attr('id');
                $('#form_result').html('');

                let target = '<?php echo e(route('leaves.index')); ?>/' + id;

                $.ajax({
                    url: target,
                    dataType: "json",
                    success: function (result) {

                        $('#leave_type_id').html(result.leave_type_name);
                        $('#company_id_show').html(result.company_name);
                        $('#employee_id_show').html(result.employee_name);
                        $('#department_id_show').html(result.department);
                        $('#start_date_id').html(result.start_date_name);
                        $('#end_date_id').html(result.end_date_name);
                        $('#applied_date_id').html(result.data.created_at);
                        $('#total_days_id').html(result.data.total_days);
                        $('#status_id').html(result.data.status);
                        $('#leave_reason_id').html(result.data.leave_reason);
                        $('#remarks_id').html(result.data.remarks);

                        if (result.data.is_half == 1)
                            $('#is_half_id').html('Yes');
                        else {
                            $('#is_half_id').html('No');
                        }
                        if (result.data.is_notify == 1)
                            $('#is_notify_id').html('On');
                        else {
                            $('#is_notify_id').html('Off');
                        }


                        $('#leave_model').modal('show');
                        $('.modal-title').text("<?php echo e(__('Leave Info')); ?>");
                    }
                });
            });


            $(document).on('click', '.edit', function () {

                let id = $(this).attr('id');
                $('#form_result').html('');


                let target = "<?php echo e(route('leaves.index')); ?>/" + id + '/edit';


                $.ajax({
                    url: target,
                    dataType: "json",
                    success: function (html) {
                        //console.log(html.data.end_date);

                        $('#status').selectpicker('val', html.data.status);
                        $('#remarks').val(html.data.remarks);
                        $('#leave_reason').val(html.data.leave_reason);
                        $('#leave_type').selectpicker('val', html.data.leave_type_id);
                        $('#company_id').selectpicker('val', html.data.company_id);

                        let all_departments = '';
                        $.each(html.departments, function (index, value) {
                            all_departments += '<option value=' + value['id'] + '>' + value['department_name'] + '</option>';
                        });
                        $('#department_id').empty().append(all_departments);
                        $('#department_id').selectpicker('refresh');
                        $('#department_id').selectpicker('val', html.data.department_id);
                        $('#department_id').selectpicker('refresh');

                        let all_employees = '';
                        $.each(html.employees, function (index, value) {
                            all_employees += '<option value=' + value['id'] + '>' + value['first_name'] + ' ' + value['last_name'] + '</option>';
                        });
                        $('#employee_id').empty().append(all_employees);
                        $('#employee_id').selectpicker('refresh');
                        $('#employee_id').selectpicker('val', html.data.employee_id);
                        $('#employee_id').selectpicker('refresh');
                        $('#start_date').val(html.data.start_date);
                        $('#end_date').val(html.data.end_date);
                        $('#total_days').val(html.data.total_days);

                        if (html.data.is_half == 1) {
                            $('#is_half').prop('checked', true);
                        } else {
                            $('#is_half').prop('checked', false);
                        }

                        if (html.data.is_notify == 1) {
                            $('#is_notify').prop('checked', true);
                        } else {
                            $('#is_notify').prop('checked', false);
                        }

                        $('#hidden_id').val(html.data.id);
                        $('#employee_id_hidden').val(html.data.employee_id);
                        $('#leave_type_hidden').val(html.data.leave_type_id);
                        $('.modal-title').text('<?php echo e(trans('file.Edit')); ?>');
                        $('#action_button').val('<?php echo e(trans('file.Edit')); ?>');
                        $('#action').val('<?php echo e(trans('file.Edit')); ?>');
                        $('#formModal').modal('show');
                    }
                })
            });


            let delete_id;

            $(document).on('click', '.delete', function () {
                delete_id = $(this).attr('id');
                $('#confirmModal').modal('show');
                $('.modal-title').text('<?php echo e(__('DELETE Record')); ?>');
                $('#ok_button').text('<?php echo e(trans('file.OK')); ?>');

            });


            $(document).on('click', '#bulk_delete', function () {

                let id = [];
                let table = $('#leave-table').DataTable();
                id = table.rows({selected: true}).ids().toArray();
                if (id.length > 0) {
                    if (confirm('<?php echo e(__('Delete Selection',['key'=>trans('file.Leave')])); ?>')) {
                        $.ajax({
                            url: '<?php echo e(route('mass_delete_leaves')); ?>',
                            method: 'POST',
                            data: {
                                leaveIdArray: id
                            },
                            success: function (data) {
                                let html = '';
                                if (data.success) {
                                    html = '<div class="alert alert-success">' + data.success + '</div>';
                                }
                                if (data.error) {
                                    html = '<div class="alert alert-danger">' + data.error + '</div>';
                                }
                                table.ajax.reload();
                                table.rows('.selected').deselect();
                                if (data.errors) {
                                    html = '<div class="alert alert-danger">' + data.error + '</div>';
                                }
                                $('#general_result').html(html).slideDown(300).delay(5000).slideUp(300);

                            }

                        });
                    }
                } else {
                    alert('<?php echo e(__('Please select atleast one checkbox')); ?>');
                }
            });


            $('#close').on('click', function () {
                $('#sample_form')[0].reset();
                $('select').selectpicker('refresh');
                $('.date').datepicker('update');
                $('#leave-table').DataTable().ajax.reload();
            });

            $('#ok_button').on('click', function () {
                let target = "<?php echo e(route('leaves.index')); ?>/" + delete_id + '/delete';
                $.ajax({
                    url: target,
                    beforeSend: function () {
                        $('#ok_button').text('<?php echo e(trans('file.Deleting...')); ?>');
                    },
                    success: function (data) {
                        let html = '';
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                        }
                        if (data.error) {
                            html = '<div class="alert alert-danger">' + data.error + '</div>';
                        }
                        setTimeout(function () {
                            $('#general_result').html(html).slideDown(300).delay(5000).slideUp(300);
                            $('#confirmModal').modal('hide');
                            $('#leave-table').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            });

            $('.dynamic').change(function () {
                if ($(this).val() !== '') {
                    let value = $(this).val();
                    let dependent = $(this).data('dependent');
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "<?php echo e(route('dynamic_department')); ?>",
                        method: "POST",
                        data: {value: value, _token: _token, dependent: dependent},
                        success: function (result) {
                            $('select').selectpicker("destroy");
                            $('#department_id').html(result);
                            $('select').selectpicker();

                        }
                    });
                }
            });

            $('.employee').change(function () {
                if ($(this).val() !== '') {
                    let value = $(this).val();
                    let first_name = $(this).data('first_name');
                    let last_name = $(this).data('last_name');
                    let _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "<?php echo e(route('dynamic_employee_department')); ?>",
                        method: "POST",
                        data: {value: value, _token: _token, first_name: first_name, last_name: last_name},
                        success: function (result) {
                            $('select').selectpicker("destroy");
                            $('#employee_id').html(result);
                            $('select').selectpicker();

                        }
                    });
                }
            });
        })(jQuery);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/timesheet/leave/index.blade.php ENDPATH**/ ?>