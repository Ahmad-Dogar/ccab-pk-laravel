
    $('#immigration-table').DataTable().clear().destroy();
    var date = $('.date');
    date.datepicker({
        format: '<?php echo e(env('Date_Format_JS')); ?>',
        autoclose: true,
        todayHighlight: true
    });


    var table_table = $('#immigration-table').DataTable({
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
            url: "<?php echo e(route('immigrations.show',$employee->id)); ?>",
        },

        columns: [

            {
                data: 'document',
                name: 'document',

            },
            {
                data: 'issue_date',
                name: 'issue_date',
            },
            {
                data: 'expiry_date',
                name: 'expiry_date',
            },
            {
                data: 'country',
                name: 'country',
            },
            {
                data: 'eligible_review_date',
                name: 'eligible_review_date',
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


        'select': {style: 'multi', selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
    });
    new $.fn.dataTable.FixedHeader(table_table);


    $('#create_immigration_record').click(function () {

        $('.modal-title').text('<?php echo e(__('Add Immigration')); ?>');
        $('#immigration_action_button').val('<?php echo e(trans('file.Add')); ?>');
        $('#immigration_action').val('<?php echo e(trans('file.Add')); ?>');
        $('#ImmigrationformModal').modal('show');
    });

    $('#immigration_sample_form').on('submit', function (event) {
        event.preventDefault();
        if ($('#immigration_action').val() == '<?php echo e(trans('file.Add')); ?>') {

            $.ajax({
                url: "<?php echo e(route('immigrations.store',$employee->id)); ?>",
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
                        $('#immigration_sample_form')[0].reset();
                            $('select').selectpicker('refresh');
                            $('.date').datepicker('update');
                            $('#immigration-table').DataTable().ajax.reload();
                        }
                        $('#immigration_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    }

            });
        }

        if ($('#immigration_action').val() == '<?php echo e(trans('file.Edit')); ?>') {
            $.ajax({
                url: "<?php echo e(route('immigrations.update')); ?>",
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
                            $('#ImmigrationformModal').modal('hide');
                            $('.date').datepicker('update');
                            $('select').selectpicker('refresh');
                            $('#immigration-table').DataTable().ajax.reload();
                            $('#immigration_sample_form')[0].reset();
                        }, 2000);

                    }
                    $('#immigration_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            });
        }
    });


    $(document).on('click', '.immigration_edit', function () {

        var id = $(this).attr('id');

        var target = "<?php echo e(route('immigrations.index')); ?>/" + id + '/edit';


        $.ajax({
            url: target,
            dataType: "json",
            success: function (html) {

                let id = html.data.id;

                $('#immigration_document_number').val(html.data.document_number);
                $('#immigration_issue_date').val(html.data.issue_date);
                $('#immigration_expiry_date').val(html.data.expiry_date);
                $('#immigration_eligible_review_date').val(html.data.eligible_review_date);
                $('#immigration_document_type_id').selectpicker('val', html.data.document_type_id);
                $('#immigration_country').selectpicker('val', html.data.country_id);







                $('#immigration_hidden_id').val(html.data.id);
                $('.modal-title').text('<?php echo e(trans('file.Edit')); ?>');
                $('#immigration_action_button').val('<?php echo e(trans('file.Edit')); ?>');
                $('#immigration_action').val('<?php echo e(trans('file.Edit')); ?>');
                $('#ImmigrationformModal').modal('show');
            }
        })
    });


    let immigration_delete_id;

    $(document).on('click', '.immigration_delete', function () {
    immigration_delete_id = $(this).attr('id');
        $('.confirmModal').modal('show');
        $('.modal-title').text('<?php echo e(__('DELETE Record')); ?>');
        $('.immigration-ok').text('<?php echo e(trans('file.OK')); ?>');
    });


    $('.immigration-close').click(function () {
        $('#immigration_sample_form')[0].reset();
        $('select').selectpicker('refresh');
        $('.date').datepicker('update');
    $('.confirmModal').modal('hide');
        $('#immigration-table').DataTable().ajax.reload();
    });

    $('.immigration-ok').click(function () {
        let target = "<?php echo e(route('immigrations.index')); ?>/" + immigration_delete_id + '/delete';
        $.ajax({
            url: target,
            beforeSend: function () {
                $('.immigration-ok').text('<?php echo e(trans('file.Deleting...')); ?>');
            },
            success: function (data) {
                setTimeout(function () {
                    $('.confirmModal').modal('hide');
                    $('#immigration-table').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/immigration/index_js.blade.php ENDPATH**/ ?>