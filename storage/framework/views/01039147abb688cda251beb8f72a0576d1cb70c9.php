<?php $__env->startSection('content'); ?>



    <section>

        <div class="container-fluid"><span id="general_result"></span></div>


        <div class="container-fluid mb-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store-holiday')): ?>
                <button type="button" class="btn btn-info" name="create_record" id="create_record"><i
                            class="fa fa-plus"></i> <?php echo e(__('Add Holiday')); ?></button>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-holiday')): ?>
                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i
                            class="fa fa-minus-circle"></i> <?php echo e(__('Bulk delete')); ?></button>
            <?php endif; ?>
        </div>


        <div class="table-responsive">
            <table id="holiday-table" class="table ">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(__('Event Name')); ?></th>
                    <th><?php echo e(trans('file.Company')); ?></th>
                    <th><?php echo e(__('Start Date')); ?></th>
                    <th><?php echo e(__('End Date')); ?></th>
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
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Holiday')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal">

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Event Name')); ?> *</label>
                                <input type="text" name="event_name" id="event_name" required class="form-control"
                                       placeholder="<?php echo e(__('Event Name')); ?>">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Company')); ?></label>
                                    <select name="company_id" id="company_id" class="form-control selectpicker dynamic"
                                            data-live-search="true" data-live-search-style="begins"
                                            title='<?php echo e(__('Selecting',['key'=>trans('file.Company')])); ?>...'>
                                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Description')); ?></label>
                                    <textarea class="form-control" id="description" name="description"
                                              rows="3"></textarea>
                                </div>
                            </div>


                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Start Date')); ?></label>
                                <input type="text" name="start_date" id="start_date" class="form-control date" value=""
                                       required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('End Date')); ?></label>
                                <input type="text" name="end_date" id="end_date" class="form-control date" value=""
                                       required>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Status')); ?>*</label>
                                    <select name="is_publish" id="is_publish" class="form-control selectpicker "
                                            data-live-search="true" data-live-search-style="begins"
                                            title='<?php echo e(__('Selecting',['key'=>trans('file.Category')])); ?>...'>
                                        <option value="" disabled selected><?php echo e(trans('file.status')); ?></option>
                                        <option value="1"><?php echo e(trans('file.published')); ?></option>
                                        <option value="2"><?php echo e(trans('file.unpublished')); ?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="action"/>
                                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                                           value=<?php echo e(trans('file.Add')); ?> />
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="holiday_modal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Holiday Info')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table  table-bordered">
                                    <tr>
                                        <th><?php echo e(__('Event Name')); ?></th>
                                        <td id="event_name_id"></td>
                                    </tr>


                                    <tr>
                                        <th><?php echo e(trans('file.Description')); ?></th>
                                        <td id="description_id"></td>
                                    </tr>

                                    <tr>
                                        <th> <?php echo e(trans('file.Company')); ?></th>
                                        <td id="company_id_show"></td>
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
                                        <th><?php echo e(trans('file.Status')); ?></th>
                                        <td id="publish_id"></td>
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

            $(document).ready(function () {

                var date = $('.date');
                date.datepicker({
                    format: '<?php echo e(env('Date_Format_JS')); ?>',
                    autoclose: true,
                    todayHighlight: true
                });


                $('#holiday-table').DataTable({
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
                    serverSide: true,
                    ajax: {
                        url: "<?php echo e(route('holidays.index')); ?>",
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

                                if (data.is_publish == 1) {
                                    return data.event_name + "<br><td><div class = 'badge badge-success'> (<?php echo e(trans('file.published')); ?>)</div></td><br>";
                                } else {
                                    return data.event_name + "<br><td><div class = 'badge badge-danger'> (<?php echo e(trans('file.unpublished')); ?>)</div></td><br>"
                                }
                            }

                        },

                        {
                            data: 'company',
                            name: 'company',
                        },
                        {
                            data: 'start_date',
                            name: 'start_date',
                        },
                        {
                            data: 'end_date',
                            name: 'end_date',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
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
                            'targets': [0, 5]
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
            });


            $('#create_record').on('click', function () {

                $('.modal-title').text('<?php echo e(__('Add Holiday')); ?>');
                $('#action_button').val('<?php echo e(trans("file.Add")); ?>');
                $('#action').val('<?php echo e(trans("file.Add")); ?>');
                $('#formModal').modal('show');


            });

            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                if ($('#action').val() == '<?php echo e(trans('file.Add')); ?>') {

                    $.ajax({
                        url: "<?php echo e(route('holidays.store')); ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            var html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#sample_form')[0].reset();
                                $('select').selectpicker('refresh');
                                $('.date').datepicker('update');
                                $('#holiday-table').DataTable().ajax.reload();
                            }
                            $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        }
                    })
                }

                if ($('#action').val() == '<?php echo e(trans('file.Edit')); ?>') {
                    $.ajax({
                        url: "<?php echo e(route('holidays.update')); ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            var html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                setTimeout(function () {
                                    $('#formModal').modal('hide');
                                    $('.date').datepicker('update');
                                    $('#holiday-table').DataTable().ajax.reload();
                                    $('#sample_form')[0].reset();


                                }, 2000);

                            }
                            $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        }
                    });
                }
            });


            $(document).on('click', '.show_new', function () {

                var id = $(this).attr('id');
                $('#form_result').html('');

                var target = '<?php echo e(route('holidays.index')); ?>/' + id;

                $.ajax({
                    url: target,
                    dataType: "json",
                    success: function (result) {

                        $('#event_name_id').html(result.data.event_name);
                        $('#description_id').html(result.data.description);
                        $('#company_id_show').html(result.company_name);
                        $('#start_date_id').html(result.data.start_date);
                        $('#end_date_id').html(result.data.end_date);
                        if (result.data.is_publish == 1)
                            $('#publish_id').html('<?php echo e(trans('file.Published')); ?>');
                        else {
                            $('#publish_id').html('<?php echo e(trans('file.Unpublished')); ?>');
                        }


                        $('#holiday_modal').modal('show');
                        $('.modal-title').text("<?php echo e(__('Holiday Info')); ?>");
                    }
                });
            });


            $(document).on('click', '.edit', function () {


                var id = $(this).attr('id');
                $('#form_result').html('');

                $('.date').datepicker('update');


                var target = "<?php echo e(route('holidays.index')); ?>/" + id + '/edit';


                $.ajax({
                    url: target,
                    dataType: "json",
                    success: function (html) {
                        $('#event_name').val(html.data.event_name);
                        $('#start_date').val(html.data.start_date);
                        $('#end_date').val(html.data.end_date);
                        $('#description').val(html.data.description);
                        $('#is_publish').selectpicker('val', html.data.is_publish);
                        $('#company_id').selectpicker('val', html.data.company_id);


                        $('#hidden_id').val(html.data.id);
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

                var id = [];
                let table = $('#holiday-table').DataTable();
                id = table.rows({selected: true}).ids().toArray();
                if (id.length > 0) {
                    if (confirm('<?php echo e(__('Delete Selection',['key'=>trans('file.Holiday')])); ?>')) {
                        $.ajax({
                            url: '<?php echo e(route('mass_delete_holidays')); ?>',
                            method: 'POST',
                            data: {
                                holidayIdArray: id
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
                $('#holiday-table').DataTable().ajax.reload();
                $('select').selectpicker('refresh');
                $('.date').datepicker('update');
            });

            $('#ok_button').on('click', function () {
                let target = "<?php echo e(route('holidays.index')); ?>/" + delete_id + '/delete';
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
                            $('#holiday-table').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            });
        })(jQuery);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/timesheet/holiday/index.blade.php ENDPATH**/ ?>