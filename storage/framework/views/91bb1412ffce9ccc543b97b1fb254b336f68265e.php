<section>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Month-Year')); ?></th>
                        <th><?php echo e(__('Payslip Type')); ?></th>
                        <th><?php echo e(__('Basic Salary')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $salary_basics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->month_year); ?></td>
                            <td><?php echo e($item->payslip_type); ?></td>
                            <td><?php echo e($item->basic_salary); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td></td>
                            <td><?php echo e(__('No Data Found')); ?></td>
                            <td></td>
                        </tr>

                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</section>
<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/profile/employee_related/salary.blade.php ENDPATH**/ ?>