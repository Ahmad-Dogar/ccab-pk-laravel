
$('#salary_pension_form').on('submit', function (event) {
    event.preventDefault();

    $.ajax({
        url: "<?php echo e(route('employees.pension_update',$employee->id)); ?>",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            console.log(data);
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
            }
            $('#pension_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
        }

    });
});

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/salary/pension_amount_js.blade.php ENDPATH**/ ?>