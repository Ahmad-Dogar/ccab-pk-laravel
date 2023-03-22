
$('#employee_payslip-table').DataTable().clear().destroy();


var table_table = $('#employee_payslip-table').DataTable({
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
        url: "<?php echo e(route('employee_payslip.index',$employee->id)); ?>",
    },

    columns: [
        {
            data: 'net_salary',
            name: 'net_salary',
render: function (data) {
if ('<?php echo e(config('variable.currency_format') =='suffix'); ?>') {
return data + ' <?php echo e(config('variable.currency')); ?>';
} else {
return '<?php echo e(config('variable.currency')); ?> ' + data;

}
}
        },
        {
            data: 'month_year',
            name: 'month_year',
        },
        {
            data: 'created_at',
            name: 'created_at',

        },
        {
            data: 'status',
            name: 'status',
render: function (data) {
if (data == 1) {
return "<td><div class = 'badge badge-success'><?php echo e(trans('file.Paid')); ?></div>"
    } else {
    return "<td><div class = 'badge badge-danger'><?php echo e(trans('file.Unpaid')); ?></div>"
    }
    }
    },  {
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
            'targets': [0, 4],
        },
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

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/payslip/index_js.blade.php ENDPATH**/ ?>