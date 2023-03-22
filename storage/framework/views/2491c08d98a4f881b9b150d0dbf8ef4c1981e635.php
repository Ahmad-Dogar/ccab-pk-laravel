<div class="row">
    <div class="col-md-3">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-details-employee')): ?>
            <ul class="nav nav-tabs vertical" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="salary-tab" data-toggle="tab" href="#Salary" role="tab"
                       aria-controls="Salary" aria-selected="true"><?php echo e(__('Basic Salary')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('salary_allowance.show',$employee)); ?>" id="salary_allowance-tab"
                       data-toggle="tab" data-table="salary_allowance" data-target="#Salary_allowance" role="tab"
                       aria-controls="Salary_allowance" aria-selected="false"><?php echo e(trans('file.Allowances')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('salary_commission.show',$employee)); ?>" id="salary_commission-tab"
                       data-toggle="tab" data-table="salary_commission" data-target="#Salary_commission" role="tab"
                       aria-controls="Salary_commission" aria-selected="false"><?php echo e(trans('file.Commissions')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('salary_loan.show',$employee)); ?>" id="salary_loan-tab"
                       data-toggle="tab" data-table="salary_loan" data-target="#Salary_loan" role="tab"
                       aria-controls="Salary_loan" aria-selected="false"><?php echo e(trans('file.Loan')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('salary_deduction.show',$employee)); ?>" id="salary_deduction-tab"
                       data-toggle="tab" data-table="salary_deduction" data-target="#Salary_deduction" role="tab"
                       aria-controls="Salary_deduction" aria-selected="false"><?php echo e(__('Statutory Deductions')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('other_payment.show',$employee)); ?>" id="other_payment-tab"
                       data-toggle="tab" data-table="other_payment" data-target="#Other_payment" role="tab"
                       aria-controls="Other_payment" aria-selected="false"><?php echo e(__('Other Payment')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('salary_overtime.show',$employee)); ?>" id="salary_overtime-tab"
                       data-toggle="tab" data-table="salary_overtime" data-target="#Salary_overtime" role="tab"
                       aria-controls="Salary_overtime" aria-selected="false"><?php echo e(__('Overtime')); ?></a>
                </li>

                <!-- New -->
                <li class="nav-item">
                    <a class="nav-link" href="#" id="salary_pension-tab"
                        data-toggle="tab" data-table="salary_pension" data-target="#salary_pension" role="tab"
                        aria-controls="salary_pension" aria-selected="true"><?php echo e(__('Salary Pension')); ?>

                    </a>
                </li>
                <!--/ New -->
            </ul>
        <?php endif; ?>
    </div>

    <div class="col-md-9">
        <div class="tab-content" id="myTabContent">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('set-salary')): ?>
            <div class="tab-pane fade show active" id="Salary" role="tabpanel" aria-labelledby="salary-tab">
                <?php echo e(__('All Basic Salary')); ?>

                <hr>
                <?php echo $__env->make('employee.salary.basic.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endif; ?>

            <!-- New Pension-->
            <div class="tab-pane fade" id="salary_pension" role="tabpanel" aria-labelledby="salary_pension-tab">
                <!--Contents for Basic starts here-->
                <?php echo e(trans('file.Update')); ?> <?php echo e(__('Pension')); ?>


                <div class="modal-body">
                    <span id="pension_form_result"></span>
                    <form method="post" id="salary_pension_form" class="form-horizontal" autocomplete="off">

                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label><?php echo e(__('Pension Type')); ?></label>
                                <input type="hidden" name="pension_type_hidden" value="<?php echo e($employee->pension_type ?? ''); ?>"/>
                                <select name="pension_type" id="pension_type" required class="selectpicker form-control"  title="<?php echo e(__('Selecting',['key'=>__('Pension Type')])); ?>...">
                                    <option value="fixed" <?php if($employee->pension_type=='fixed'): ?> selected <?php endif; ?>><?php echo e(__('Fixed')); ?></option>
                                    <option value="percentage" <?php if($employee->pension_type=='percentage'): ?> selected <?php endif; ?>><?php echo e(__('Percentage')); ?></option>
                                </select>
                            </div>

                            <div class="col-md-3 form-group">
                                <?php if(config('variable.currency_format')=='suffix'): ?>
                                    <label><?php echo e(__('Amount')); ?> (<?php echo e(config('variable.currency')); ?>)</label>
                                <?php else: ?>
                                    <label>(<?php echo e(config('variable.currency')); ?>) <?php echo e(__('Amount')); ?></label>
                                <?php endif; ?>
                                <input type="text" min="0" name="pension_amount" id="pension_amount" placeholder="<?php echo e(__('Amount')); ?>" required class="form-control" value="<?php echo e($employee->pension_amount ?? ''); ?>">
                            </div>
                        </div>

                        <div class="container mt-5px">
                            <span class="text-danger"></span> <br><br>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value=<?php echo e(trans('file.Add')); ?> />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--/ New Pension -->



            <div class="tab-pane fade" id="Salary_allowance" role="tabpanel" aria-labelledby="salary_allowance-tab">
                <?php echo e(__('All allowances')); ?>

                <hr>
                <?php echo $__env->make('employee.salary.allowance.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="tab-pane fade" id="Salary_commission" role="tabpanel" aria-labelledby="Salary_commission-tab">
                <?php echo e(__('All commission')); ?>

                <hr>

                <?php echo $__env->make('employee.salary.commission.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

            <div class="tab-pane fade" id="Salary_loan" role="tabpanel" aria-labelledby="Salary_loan-tab">
                <?php echo e(__('All Loan')); ?>

                <hr>

                <?php echo $__env->make('employee.salary.loan.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>


            <div class="tab-pane fade" id="Salary_deduction" role="tabpanel" aria-labelledby="Salary_deduction-tab">
                <?php echo e(__('All Statutory Deduction')); ?>

                <hr>

                <?php echo $__env->make('employee.salary.deduction.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="Other_payment" role="tabpanel" aria-labelledby="Other_payment-tab">
                <?php echo e(__('Other Payment')); ?>

                <hr>

                <?php echo $__env->make('employee.salary.other_payment.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="Salary_overtime" role="tabpanel" aria-labelledby="Salary_overtime-tab">
                <?php echo e(__('Overtime')); ?>

                <hr>
                <?php echo $__env->make('employee.salary.overtime.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>

<script>
$('select[name="payslip_type"]').val($('input[name="payslip_type_hidden"]').val());
</script>

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/salary/index.blade.php ENDPATH**/ ?>