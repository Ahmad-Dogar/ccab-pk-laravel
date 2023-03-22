
    $('#basic_table').DataTable().clear().destroy();

    var table_table = $('#basic_table').DataTable({
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
            url: "<?php echo e(route('salary_basic.show',$employee->id)); ?>",
        },

        columns: [

            {
                data: 'month_year',
                name: 'month_year',
            },
            {
                data: 'payslip_type',
                name: 'payslip_type',
            },
            {
                data: 'basic_salary',
                name: 'basic_salary',
                render: function (data) {
                    if ('<?php echo e(config('variable.currency_format') =='suffix'); ?>') {
                        return data + ' <?php echo e(config('variable.currency')); ?>';
                    } else {
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
                'targets': [0, 3],
            },
        ],


        
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });
    new $.fn.dataTable.FixedHeader(table_table);


    $('#create_basic_salary_record').click(function () {

        $('.modal-title').text('<?php echo e(__('Add Basic Salary')); ?>');
        $('#basic_salary_action_button').val('<?php echo e(trans('file.Add')); ?>');
        $('#basic_salary_action').val('<?php echo e(trans('file.Add')); ?>');
        $('#basicSalaryformModal').modal('show');
    });

    $('#basic_salary_sample_form').on('submit', function (event) {
        event.preventDefault();
        if ($('#basic_salary_action').val() == '<?php echo e(trans('file.Add')); ?>') {

            $.ajax({
                url: "<?php echo e(route('salary_basic.store',$employee)); ?>",
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
                    if (data.check_month_year) {
                        html = '<div class="alert alert-danger">' + data.check_month_year + '</div>';
                    }
                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#basic_salary_sample_form')[0].reset();
                        $('select').selectpicker('refresh');
                        $('#basic_table').DataTable().ajax.reload();
                    }
                    $('#basic_salary_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            });
        }

        if ($('#basic_salary_action').val() == '<?php echo e(trans('file.Edit')); ?>') {
            $.ajax({
                url: "<?php echo e(route('salary_basic.update')); ?>",
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
                    if (data.check_month_year) {
                        html = '<div class="alert alert-danger">' + data.check_month_year + '</div>';
                    }

                    if (data.success) {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        setTimeout(function () {
                            $('#basicSalaryformModal').modal('hide');
                            $('select').selectpicker('refresh');
                            $('#basic_table').DataTable().ajax.reload();
                            $('#basic_salary_sample_form')[0].reset();
                        }, 2000);

                    }
                    $('#basic_salary_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            });
        }
    });


    $(document).on('click', '.salary_basic_edit', function () {

        var id = $(this).data("id");
        var target = "<?php echo e(route('salary_basic.index')); ?>/" + id + '/edit';

        $.ajax({
            url: target,
            dataType: "json",
            success: function (html) {
                $('#employee_id').val(html.data.employee_id);
                $('#month_year').val(html.data.month_year);
                $('#payslip_type_edit').selectpicker('val', html.data.payslip_type);
                $('#basic_salary_edit').val(html.data.basic_salary);

                $('#basic_salary_hidden_id').val(html.data.id);
                $('.modal-title').text('<?php echo e(trans('file.Edit')); ?>');
                $('#basic_salary_action_button').val('<?php echo e(trans('file.Edit')); ?>');
                $('#basic_salary_action').val('<?php echo e(trans('file.Edit')); ?>');
                $('#basicSalaryformModal').modal('show');
            }
        })
    });


    

    $(document).on('click', '.salary_basic_delete', function () {
    salary_basic_delete_id = $(this).data("id");
        $('.modal-title').text('<?php echo e(__('DELETE Record')); ?>');
        $('.basic-ok').text('<?php echo e(trans('file.OK')); ?>');
        
        $('#confirmModal').modal('show');
    });


    $('.basic_salary-close').click(function () {
        $('#basic_salary_sample_form')[0].reset();
        $('select').selectpicker('refresh');
        $('.confirmModal').modal('hide');
        $('#basic_table').DataTable().ajax.reload();
    });

    $('.basic-ok').click(function () {
        let target = "<?php echo e(route('salary_basic.index')); ?>/" + salary_basic_delete_id + '/delete';
        $.ajax({
            url: target,
            beforeSend: function () {
                $('.basic-ok').text('<?php echo e(trans('file.Deleting...')); ?>');
            },
            success: function (data) {
                setTimeout(function () {
                    $('#confirmModal').modal('hide');
                    $('#basic_table').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });
<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/salary/basic/index_js.blade.php ENDPATH**/ ?>