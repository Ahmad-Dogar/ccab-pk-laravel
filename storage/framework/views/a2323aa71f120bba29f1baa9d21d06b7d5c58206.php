<?php echo $__env->make('shared.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('shared.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section>
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4><?php echo e(__('Change Password')); ?></h4>
                </div>

                <div class="card-body">
                    <p class="italic">
                        <small><?php echo e(__('The field labels marked with * are required input fields')); ?>.</small>
                    </p>
                    <form method="POST" action="<?php echo e(route('change_password',$employee->id)); ?>">
                        <?php echo csrf_field(); ?>


                        <div class="card-header d-flex align-items-center">

                            <div class="row">

                                <div class="form-group">
                                    <label><?php echo e(__('New Password')); ?> *</label>
                                    <input type="password" name="password" required class="form-control"
                                           placeholder="<?php echo e(__('min:4 characters')); ?>">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('Confirm Password')); ?> *</label>
                                    <input type="password" name="password_confirmation" id="confirm_pass" required
                                           class="form-control"
                                           placeholder="<?php echo e(trans('file.Re-Type')); ?> <?php echo e(trans('file.Password')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</section>


<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/profile/employee_related/change_password.blade.php ENDPATH**/ ?>