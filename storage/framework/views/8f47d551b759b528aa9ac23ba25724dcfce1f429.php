<span id="profile_form_result"></span>
<div id="employee_profile_photo">
    <?php if($employee->user->profile_photo): ?>
        <div><img src="<?php echo e(url('public/uploads/profile_photos',$employee->user->profile_photo)); ?>" height="100"
                  width="100">
        </div>
    <?php else: ?>
        <div><img src="<?php echo e(url('public/logo/avatar.jpg')); ?>" height="100" width="100">
        </div>
    <?php endif; ?>
</div>

<form method="post" id="profile_sample_form" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">

    <?php echo csrf_field(); ?>

    <div class="col-md-4 form-group">
        <label><?php echo e(__('Image')); ?> *</label>
        <div>(<?php echo e(trans('file.gif,jpg,png,jpeg')); ?>)</div>
        <input type="hidden" name="employee_username" value="<?php echo e($employee->user->username); ?>">
        <input type="file"
               required class="form-control <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               name="profile_photo" placeholder="<?php echo e(__('Upload',['key'=>trans('file.Photo')])); ?>">
    </div>
    <div class="form-group">
        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value=<?php echo e(trans('file.Add')); ?>>
    </div>
</form><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/profile_picture/index.blade.php ENDPATH**/ ?>