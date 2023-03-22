<?php if(auth()->user()->can('store-details-employee') || auth()->user()->id == $employee->id): ?>

    <div class="modal-body">
        <span id="social_form_result"></span>
        <form method="post" id="social_sample_form" class="form-horizontal"
              action="<?php echo e(route('social_profile.store',$employee->id)); ?>">

            <?php echo csrf_field(); ?>
            <div class="row">

                <div class="col-md-6 form-group">
                    <label><?php echo e(__('Facebook Profile')); ?></label>
                    <input type="text" name="fb_id" id="fb_id" placeholder="<?php echo e(__('Facebook Profile')); ?>"
                            class="form-control" value="<?php echo e($employee->fb_id); ?>">
                </div>

                <div class="col-md-6 form-group">
                    <label><?php echo e(__('Skype Profile')); ?></label>
                    <input type="text" name="skype_id" id="skype_id" placeholder="<?php echo e(__('Skype Profile')); ?>"
                            class="form-control" value="<?php echo e($employee->skype_id); ?>">
                </div>


                <div class="col-md-6 form-group">
                    <label><?php echo e(__('LinkedIn Profile')); ?></label>
                    <input type="text" name="linkedIn_id" id="linkedIn_id" placeholder="<?php echo e(__('Linkedin Profile')); ?>"

                           class="form-control" value="<?php echo e($employee->linkedIn_id); ?>">
                </div>

                <div class="col-md-6 form-group">
                    <label><?php echo e(__('Twitter Profile')); ?></label>
                    <input type="text" name="twitter_id" id="twitter_id" placeholder="<?php echo e(__('Twitter Profile')); ?>"
                            class="form-control" value="<?php echo e($employee->twitter_id); ?>">
                </div>

                
                <div class="col-md-12 form-group">
                    <label><?php echo e(__('Whats App Profile')); ?></label>
                    <input type="text" name="whatsapp_id" id="whatsapp_id" placeholder="<?php echo e(__('Whats App Profile')); ?>"
                            class="form-control" value="<?php echo e($employee->whatsapp_id); ?>">
                </div>

                <div class="form-group row">
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(trans('file.Save')); ?>

                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>
<?php endif; ?>

<script type="text/javascript">

    $(document).ready(function () {
        $(".alert").slideDown(300).delay(5000).slideUp(300);
    });

    var form = $('#social_sample_form');


    form.submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
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
                }
                $('#social_form_result').html(html);

            }
        });
    });

</script><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/social_profile/index.blade.php ENDPATH**/ ?>