    $('#employee_transfer-table').DataTable().clear().destroy();
    var date = $('.date');
    date.datepicker({
        format: '<?php echo e(env('Date_Format_JS')); ?>',
        autoclose: true,
        todayHighlight: true
    });

    let table_table = $('#employee_transfer-table').DataTable({
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
            url: "<?php echo e(route('employee_transfer.index',$employee->id)); ?>",
        },


        columns: [
            {
                data: 'from_department',
                name: 'from_department',

            },
            {
                data: 'to_department',
                name: 'to_department',

            },
            {
                data: 'company',
                name: 'company',
            },
            {
                data: 'transfer_date',
                name: 'transfer_date',
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
                'targets': [0, 4],
            },
        ],


        'select': {style: 'multi', selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],

    });
    new $.fn.dataTable.FixedHeader(table_table);

    $(document).on('click', '.show_transfer', function () {

        let id = $(this).attr('id');

        let target = '<?php echo e(route('employee_transfer.details')); ?>/' + id;

        $.ajax({
            url: target,
            dataType: "json",
            success: function (result) {

                $('#transfer_description_id').html(result.data.description);
                $('#transfer_company_id_show').html(result.company_name);
                $('#transfer_employee_id_show').html(result.employee_name);
                $('#transfer_from_department_id_show').html(result.from_department);
                $('#transfer_to_department_id_show').html(result.to_department);
                $('#transfer_transfer_date_id').html(result.data.transfer_date);

                $('#employee_transfer_modal').modal('show');
                $('.modal-title').text("<?php echo e(__('Travel Info')); ?>");
            }
        });
    });
<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/core_hr/transfer/index_js.blade.php ENDPATH**/ ?>