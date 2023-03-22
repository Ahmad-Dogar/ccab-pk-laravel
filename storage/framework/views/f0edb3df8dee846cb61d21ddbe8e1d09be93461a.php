
    $('#employee_project-table').DataTable().clear().destroy();

    let table_table = $('#employee_project-table').DataTable({
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
            url: "<?php echo e(route('employee_project.index',$employee->id)); ?>",
        },

        columns: [
            {
                data: 'summary',
                name: 'summary'

            },
            {
                data: 'project_priority',
                name: 'project_priority',
            },
            {
                data: 'assigned_employee',
                name: 'assigned_employee',
                render: function (data) {
                    return   data.join("<br>");
                }
            },
            {
                data: 'client',
                name: 'client',
            },
            {
                data: 'end_date',
                name: 'end_date',

            },
            {
                data: 'project_progress',
                name: 'project_progress',
                render: function (data)
                {
                    if (data !== null) {
                        return data + '% completed'
                    }
                    else {
                        return 0 + '% completed'
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
                'targets': [0, 6],
            },
        ],


        'select': {style: 'multi', selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],

    });
    new $.fn.dataTable.FixedHeader(table_table);

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/project_task/project/index_js.blade.php ENDPATH**/ ?>