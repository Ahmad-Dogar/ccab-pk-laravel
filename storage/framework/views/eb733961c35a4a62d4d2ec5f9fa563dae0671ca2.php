<div class="container-fluid">
    <div class="card mb-0">
        <div class="card-body">           
            <h3 class="card-title"><?php echo e(__('Add Expense Type')); ?></h3>
            <form method="post" id="expense_type_form" class="form-horizontal" >
                <?php echo csrf_field(); ?>

                <div class="input-group">
                    <select name="company_id" id="company_id" class="form-control selectpicker"
                            data-live-search="true" data-live-search-style="begins"
                            title='<?php echo e(__('Selecting',['key'=>trans('file.Company')])); ?>...'>
                        <?php
                        $companies = App\company::select('id', 'company_name')->get();
                        ?>
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="text" name="expense_type" id="expense_type"  class="form-control"
                           placeholder="<?php echo e(__('Expense Type')); ?>">
                    <input type="submit" name="expense_type_submit" id="expense_type_submit" class="btn btn-success" value=<?php echo e(trans("file.Save")); ?>>
                </div>
            </form>
        </div>
    </div>
</div>
<span class="expense_result"></span>
<div class="table-responsive">
    <table id="expense_type-table" class="table ">
        <thead>
        <tr>
            <th><?php echo e(trans('file.Company')); ?></th>
            <th><?php echo e(__('Expense Type')); ?></th>
            <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
        </tr>
        </thead>

    </table>
</div>

<div id="ExpenseEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="ExpenseModalLabel" class="modal-title"><?php echo e(trans('file.Edit')); ?></h5>

                <button type="button" data-dismiss="modal" id="expense_close" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
            </div>
            <span class="expense_result_edit"></span>

            <div class="modal-body">
                <form method="post" id="expense_type_form_edit" class="form-horizontal"  >

                    <?php echo csrf_field(); ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo e(trans('file.Company')); ?></label>
                            <select name="company_id_edit" id="company_id_edit" class="form-control selectpicker"
                                    data-live-search="true" data-live-search-style="begins"
                                    title='<?php echo e(__('Selecting',['key'=>trans('file.Company')])); ?>...'>
                                <?php
                                    $companies = App\company::select('id', 'company_name')->get();
                                ?>
                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 form-group">
                        <label><?php echo e(__('Expense Type')); ?> *</label>
                        <input type="text" name="expense_type_edit" id="expense_type_edit"  class="form-control"
                               placeholder="<?php echo e(__('Expense Type')); ?>">
                    </div>

                    <div class="col-md-4 form-group">
                        <input type="hidden" name="hidden_expense_id" id="hidden_expense_id" />
                        <input type="submit" name="expense_type_edit_submit" id="expense_type_edit_submit" class="btn btn-success" value=<?php echo e(trans("file.Edit")); ?> />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/settings/variables/partials/expense_type.blade.php ENDPATH**/ ?>