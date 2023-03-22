
    $('#employee_ticket-table').DataTable().clear().destroy();
    var date = $('.date');
    date.datepicker({
        format: '<?php echo e(env('Date_Format_JS')); ?>',
        autoclose: true,
        todayHighlight: true
    });

    let table_table = $('#employee_ticket-table').DataTable({
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
            url: "<?php echo e(route('employee_ticket.index',$employee->id)); ?>",
        },

        columns: [
            {
                data: 'ticket_details',
                name: 'ticket_details',
                render: function (data, type, row) {
                    return data + "<td><div class = 'badge badge-success'>" + row.ticket_status + "</div></td>";
                }
            },
            {
                data: 'subject',
                name: 'subject',
            },
            {
                data: 'ticket_priority',
                name: 'ticket_priority',
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


<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/core_hr/ticket/index_js.blade.php ENDPATH**/ ?>