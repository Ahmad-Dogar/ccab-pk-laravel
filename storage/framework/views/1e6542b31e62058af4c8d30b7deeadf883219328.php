<?php $__env->startSection('content'); ?>



    <section>

        <div class="container-fluid"><span id="general_result"></span></div>


        <div class="container-fluid mb-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store-location')): ?>
                <button type="button" class="btn btn-info" name="create_record" id="create_record"><i
                            class="fa fa-plus"></i> <?php echo e(__('Add Location')); ?></button>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-location')): ?>
                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i
                            class="fa fa-minus-circle"></i> <?php echo e(__('Bulk delete')); ?></button>
            <?php endif; ?>
        </div>


        <div class="table-responsive">
            <table id="location-table" class="table table-responsive w-100 d-block d-md-table ">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(trans('file.Location')); ?></th>
                    <th><?php echo e(__('Location Head')); ?></th>
                    <th><?php echo e(__('Address Line 1')); ?></th>
                    <th><?php echo e(__('Address Line 2')); ?></th>
                    <th><?php echo e(trans('file.City')); ?></th>
                    <th><?php echo e(trans('file.State')); ?></th>
                    <th><?php echo e(trans('file.Country')); ?></th>
                    <th><?php echo e(trans('file.ZIP')); ?></th>
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
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Location')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    <form method="post" id="sample_form" class="form-horizontal">

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Location')); ?> *</label>
                                <input type="text" name="location_name" id="location_name" required class="form-control"
                                       placeholder="<?php echo e(__('Unique Value',['key'=>trans('file.Location')])); ?>">
                            </div>


                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Location Head')); ?></label>
                                <select name="location_head" id="location_head" class="form-control selectpicker"
                                        data-live-search="true" data-live-search-style="begins"
                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Employee')])); ?>...'>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->full_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Address Line 1')); ?> *</label>
                                <input type="text" name="address1" id="address1" required class="form-control"
                                       placeholder="full address">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Address Line 2')); ?> </label>
                                <input type="text" name="address2" id="address2" class="form-control"
                                       placeholder=<?php echo e(trans("file.Optional")); ?>>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.City')); ?> </label>
                                <input type="text" name="city" id="city" class="form-control"
                                       placeholder=<?php echo e(trans("file.Optional")); ?>>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.State')); ?> </label>
                                <input type="text" name="state" id="state" class="form-control"
                                       placeholder=<?php echo e(trans("file.Optional")); ?>>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Country')); ?></label>
                                <select name="country" id="country" class="form-control selectpicker"
                                        data-live-search="true" data-live-search-style="begins"
                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Country')])); ?>...'>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>


                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.ZIP')); ?> </label>
                                <input type="text" name="zip" id="zip" class="form-control"
                                       placeholder=<?php echo e(trans("file.Optional")); ?>>
                            </div>


                            <div class="form-group" align="center">
                                <input type="hidden" name="action" id="action"/>
                                <input type="hidden" name="hidden_id" id="hidden_id"/>
                                <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                                       value=<?php echo e(trans('file.Add')); ?> />
                            </div>

                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>






    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"><?php echo e(trans('file.Confirmation')); ?></h2>
                </div>
                <div class="modal-body">
                    <h4 align="center"><?php echo e(__('Are you sure you want to remove this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger"><?php echo e(trans('file.OK')); ?>'
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        (function($) {
            "use strict";
            $(document).ready(function () {

                $('#location-table').DataTable({
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
                        url: "<?php echo e(route('locations.index')); ?>",
                    },
                    createdRow: function (row, data, dataIndex) {
                        $(row).find('td:eq(0) .dt-checkboxes').attr('data-id', data.id);
                    },
                    columns: [

                        {
                            data: 'id',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'location_name',
                            name: 'location_name',

                        },
                        {
                            data: 'location_head',
                            name: 'location_head'
                        },
                        {
                            data: 'address1',
                            name: 'address1'
                        },
                        {
                            data: 'address2',
                            name: 'address2'
                        },
                        {
                            data: 'city',
                            name: 'city'
                        },
                        {
                            data: 'state',
                            name: 'state'
                        },
                        {
                            data: 'country',
                            name: 'country'
                        },
                        {
                            data: 'zip',
                            name: 'zip'
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
                            'targets': [0, 9]
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

                $('.modal-title').text("<?php echo e(__('Add Location')); ?>");
                $('#action_button').val('<?php echo e(trans("file.Add")); ?>');
                $('#action').val('<?php echo e(trans("file.Add")); ?>');
                $('#formModal').modal('show');
            });

            $('#sample_form').on('submit', function (event) {
                event.preventDefault();
                if ($('#action').val() == '<?php echo e(trans('file.Add')); ?>') {
                    $.ajax({
                        url: "<?php echo e(route('locations.store')); ?>",
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
                                $('#location-table').DataTable().ajax.reload();
                            }
                            $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        }
                    })
                }

                if ($('#action').val() == '<?php echo e(trans('file.Edit')); ?>') {
                    $.ajax({
                        url: "<?php echo e(route('locations.update')); ?>",
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
                                    $('#location-table').DataTable().ajax.reload();
                                    $('#sample_form')[0].reset();
                                }, 2000);

                            }
                            $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        }
                    });
                }
            });


            $(document).on('click', '.edit', function () {

                var id = $(this).attr('id');
                $('#form_result').html('');

                var target = "<?php echo e(url('/organization/locations/edit')); ?>/" + id;


                $.ajax({
                    url: target,
                    dataType: "json",
                    success: function (html) {


                        $('#location_name').val(html.data.location_name);
                        $('#location_head').selectpicker('val', html.data.location_head);
                        $('#address1').val(html.data.address1);
                        $('#address2').val(html.data.address2);
                        $('#city').val(html.data.city);
                        $('#state').val(html.data.state);
                        $('#country').selectpicker('val', html.data.country);
                        $('#zip').val(html.data.zip);

                        $('#hidden_id').val(html.data.id);
                        $('.modal-title').text('<?php echo e(trans('file.Edit')); ?>');
                        $('#action_button').val('<?php echo e(trans('file.Edit')); ?>');
                        $('#action').val('<?php echo e(trans('file.Edit')); ?>');
                        $('#formModal').modal('show');
                    }
                })
            });


            var delete_id;

            $(document).on('click', '.delete', function () {
                delete_id = $(this).attr('id');
                $('#confirmModal').modal('show');
                $('.modal-title').text('<?php echo e(__('DELETE Record')); ?>');
                $('#ok_button').text('<?php echo e(trans('file.OK')); ?>');

            });


            $(document).on('click', '#bulk_delete', function () {

                var id = [];
                let table = $('#location-table').DataTable();
                id = table.rows({selected: true}).ids().toArray();
                if (id.length > 0) {
                    if (confirm('<?php echo e(__('Delete Selection',['key'=>trans('file.Location')])); ?>')) {
                        $.ajax({
                            url: '<?php echo e(route('mass_delete_location')); ?>',
                            method: 'POST',
                            data: {
                                locationIdArray: id
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
            });

            $('#ok_button').on('click', function () {
                var target = "<?php echo e(url('/organization/locations/delete')); ?>/" + delete_id;
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
                            $('#location-table').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            });

        })(jQuery);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/organization/location/index.blade.php ENDPATH**/ ?>