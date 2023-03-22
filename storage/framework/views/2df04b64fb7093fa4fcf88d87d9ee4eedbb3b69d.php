    $('#overtime-table').DataTable().clear().destroy();

    var table_table = $('#overtime-table').DataTable({
        initComplete: function () {
            this.api().columns([0]).every(function () {
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
            url: "<?php echo e(route('salary_overtime.show',$employee->id)); ?>",
        },

        columns: [

            {
                data: 'month_year',
                name : 'month_year'
            },
            {
                data: 'overtime_title',
                name: 'overtime_title'
            },
            {
                data: 'no_of_days',
                name: 'no_of_days',
            },
            {
                data: 'overtime_hours',
                name: 'overtime_hours'
            },
            {
                data: 'overtime_rate',
                name: 'overtime_rate',
                render: function (data) {
                    if ('<?php echo e(config('variable.currency_format') =='suffix'); ?>') {
                        return data + ' <?php echo e(config('variable.currency')); ?>';
                    }
                    else {
                        return '<?php echo e(config('variable.currency')); ?> ' + data;
                    }
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
        ],


        "order": [],
        'language': {
            'lengthMenu': '_MENU_ <?php echo e(__('records per page')); ?>',
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
                'targets': [0, 5],
            },
        ],


        
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });
    new $.fn.dataTable.FixedHeader(table_table);


    $('#create_overtime_record').click(function () {


        $('.modal-title').text('<?php echo e(__('Add Overtime')); ?>');
        $('#overtime_action_button').val('<?php echo e(trans('file.Add')); ?>');
        $('#overtime_action').val('<?php echo e(trans('file.Add')); ?>');
        $('#OvertimeformModal').modal('show');
    });

    $('#overtime_sample_form').on('submit', function (event) {
        event.preventDefault();
        if ($('#overtime_action').val() == '<?php echo e(trans('file.Add')); ?>') {

            $.ajax({
                url: "<?php echo e(route('salary_overtime.store',$employee)); ?>",
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
                        $('#overtime_sample_form')[0].reset();
                        $('#overtime-table').DataTable().ajax.reload();
                    }
                    $('#overtime_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }

            });
        }

        if ($('#overtime_action').val() == '<?php echo e(trans('file.Edit')); ?>') {
            $.ajax({
                url: "<?php echo e(route('salary_overtime.update')); ?>",
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
                    if (data.error) {
                        html = '<div class="alert alert-danger">' + data.error + '</div>';
                    }

                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        setTimeout(function () {
                            $('#OvertimeformModal').modal('hide');
                            $('#overtime-table').DataTable().ajax.reload();
                            $('#overtime_sample_form')[0].reset();
                        }, 2000);

                    }
                    $('#overtime_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            });
        }
    });


    $(document).on('click', '.overtime_edit', function () {

        var id = $(this).attr('id');

        var target = "<?php echo e(route('salary_overtime.index')); ?>/" + id + '/edit';


        $.ajax({
            url: target,
            dataType: "json",
            success: function (html) {

                let id = html.data.id;
                $('.month_year').val(html.data.month_year);
                $('#overtime_hours').val(html.data.overtime_hours);
                $('#overtime_title').val(html.data.overtime_title);
                $('#no_of_days').val(html.data.no_of_days);
                $('#overtime_rate').val(html.data.overtime_rate);

                $('#overtime_hidden_id').val(html.data.id);
                $('.modal-title').text('<?php echo e(trans('file.Edit')); ?>');
                $('#overtime_action_button').val('<?php echo e(trans('file.Edit')); ?>');
                $('#overtime_action').val('<?php echo e(trans('file.Edit')); ?>');
                $('#OvertimeformModal').modal('show');
            }
        })
    });


    let overtime_delete_id;

    $(document).on('click', '.overtime_delete', function () {
    overtime_delete_id = $(this).attr('id');
        $('.confirmModal').modal('show');
        $('.modal-title').text('<?php echo e(__('DELETE Record')); ?>');
        $('.overtime-ok').text('<?php echo e(trans('file.OK')); ?>');
    });


    $('.overtime-close').click(function () {
        $('#overtime_sample_form')[0].reset();
        $('.confirmModal').modal('hide');
        $('#overtime-table').DataTable().ajax.reload();
    });

    $('.overtime-ok').click(function () {
        let target = "<?php echo e(route('salary_overtime.index')); ?>/" + overtime_delete_id + '/delete';
        $.ajax({
            url: target,
            beforeSend: function () {
                $('.overtime-ok').text('<?php echo e(trans('file.Deleting...')); ?>');
            },
            success: function (data) {
                setTimeout(function () {
                    $('.confirmModal').modal('hide');
                    $('#overtime-table').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });
<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/salary/overtime/index_js.blade.php ENDPATH**/ ?>