<?php $__env->startSection('content'); ?>



    <section>

        <div class="container-fluid"><span id="general_result"></span></div>

        <div class="container-fluid mb-3">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store-office_shift')): ?>
                <a class="btn btn-info" id="create_record" href="<?php echo e(route('office_shift.create')); ?>"><i class="fa fa-plus"></i> <?php echo e(__('Add Office Shift')); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-office_shift')): ?>
                <button type="button" class="btn btn-danger" name="bulk_delete" id="bulk_delete"><i class="fa fa-minus-circle"></i> <?php echo e(__('Bulk delete')); ?></button>
            <?php endif; ?>
        </div>


        <div class="table-responsive">
            <table id="office_shift-table" class="table ">
                <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th><?php echo e(trans('file.Company')); ?></th>
                    <th><?php echo e(trans('file.Shift')); ?></th>
                    <th><?php echo e(trans('file.Monday')); ?></th>
                    <th><?php echo e(trans('file.Tuesday')); ?></th>
                    <th><?php echo e(trans('file.Wednesday')); ?></th>
                    <th><?php echo e(trans('file.Thursday')); ?></th>
                    <th><?php echo e(trans('file.Friday')); ?></th>
                    <th><?php echo e(trans('file.Saturday')); ?></th>
                    <th><?php echo e(trans('file.Sunday')); ?></th>

                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>

            </table>
        </div>
    </section>








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

        "use strict";
        $(document).ready(function () {

            $('#office_shift-table').DataTable({
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
                    url: "<?php echo e(route('office_shift.index')); ?>",
                },


                columns: [

                    {
                        data: 'id',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'company',
                        name: 'company',

                    },
                    {
                        data: 'shift_name',
                        name: 'shift_name',
                    },
                    {
                        data: null,
                        render: function (data) {
                            if (data.monday_in) {
                                return data.monday_in + ' <?php echo e(trans('file.To')); ?> ' + data.monday_out;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            if (data.tuesday_in) {
                                return data.tuesday_in + ' <?php echo e(trans('file.To')); ?> ' + data.tuesday_out;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            if (data.wednesday_in) {
                                return data.wednesday_in + ' <?php echo e(trans('file.To')); ?> ' + data.wednesday_out;
                            } else {
                                return '';
                            }

                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            if (data.thursday_in) {
                                return data.thursday_in + ' <?php echo e(trans('file.To')); ?> ' + data.thursday_out;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            if (data.friday_in) {
                                return data.friday_in + ' <?php echo e(trans('file.To')); ?> ' + data.friday_out;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            if (data.saturday_in) {
                                return data.saturday_in + ' <?php echo e(trans('file.To')); ?> ' + data.saturday_out;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: null,
                        render: function (data) {
                            if (data.sunday_in) {
                                return data.sunday_in + ' <?php echo e(trans('file.To')); ?> ' + data.sunday_out;
                            } else {
                                return '';
                            }
                        }
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
                        'targets': [0, 4]
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

            $('.modal-title').text('<?php echo e(__('Add Office Shift')); ?>');
            $('#action_button').val('<?php echo e(trans("file.Add")); ?>');
            $('#action').val('<?php echo e(trans("file.Add")); ?>');
            $('#formModal').modal('show');


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
            let table = $('#office_shift-table').DataTable();
            id = table.rows({selected: true}).ids().toArray();
            if (id.length > 0) {
                if (confirm("Are you sure you want to delete the selected Office Shifts?")) {
                    $.ajax({
                        url: '<?php echo e(route('mass_delete_office_shifts')); ?>',
                        method: 'POST',
                        data: {
                            officeShiftIdArray: id
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
            $('#office_shift-table').DataTable().ajax.reload();
            $('select').selectpicker('refresh');
        });

        $('#ok_button').on('click', function () {
            let target = "<?php echo e(route('office_shift.index')); ?>/" + delete_id + '/delete';
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
                        $('#office_shift-table').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/timesheet/office_shift/index.blade.php ENDPATH**/ ?>