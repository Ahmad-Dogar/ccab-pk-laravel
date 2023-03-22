<section>

    <span id="allowance_general_result"></span>


    <div class="mb-3">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('set-salary')): ?>
            <button type="button" class="btn btn-info" name="create_record" id="create_basic_salary_record"><i
                        class="fa fa-plus"></i><?php echo e(__('Add Basic Salary')); ?></button>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table id="basic_table" class="table ">
                <thead>
                    <tr>
                        <th><?php echo e(__('Month-Year')); ?></th>
                        <th><?php echo e(__('Payslip Type')); ?></th>
                        <?php if(config('variable.currency_format')=='suffix'): ?>
                            <th><?php echo e(__('Basic Salary')); ?> (<?php echo e(config('variable.currency')); ?>)</th>
                        <?php else: ?>
                            <th>(<?php echo e(config('variable.currency')); ?>) <?php echo e(__('Basic Salary')); ?></th>
                        <?php endif; ?>
                        <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div id="basicSalaryformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Salary')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="allowance-close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="basic_salary_form_result"></span>
                    <form method="post" id="basic_salary_sample_form" class="form-horizontal" autocomplete="off">

                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="employee_id" id="employee_id">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Month Year')); ?> *</label>
                                <input class="form-control month_year"  name="month_year" type="text" id="month_year">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Payslip Type')); ?> *</label>
                                <select name="payslip_type" id="payslip_type_edit" required class="selectpicker form-control" title="<?php echo e(__('Selecting',['key'=>__('Payslip Type')])); ?>...">
                                    <option value="Monthly"><?php echo e(__('Monthly Payslip')); ?></option>
                                    <option value="Hourly"><?php echo e(__('Hourly Payslip')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <?php if(config('variable.currency_format')=='suffix'): ?>
                                    <label><?php echo e(__('Basic Salary')); ?> (<?php echo e(config('variable.currency')); ?>) *</label>
                                <?php else: ?>
                                    <label>(<?php echo e(config('variable.currency')); ?>) <?php echo e(__('Basic Salary')); ?> *</label>
                                <?php endif; ?>

                                <input type="text" name="basic_salary" id="basic_salary_edit" placeholder="<?php echo e(__('0.00')); ?>"  class="form-control">
                            </div>

                            <div class="container">
                                <br><br>
                                <span class="text-danger"><i></i></span> <br><br>
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="basic_salary_action"/>
                                    <input type="hidden" name="hidden_id" id="basic_salary_hidden_id"/>
                                    <input type="submit" name="action_button" id="basic_salary_action_button"
                                           class="btn btn-warning" value=<?php echo e(trans('file.Add')); ?> />
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><?php echo e(trans('file.Confirmation')); ?></h2>
                    <button type="button" class="basic_salary-close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" id="confirmMessage"><?php echo e(__('Are you sure to delete this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" id="ok_button" class="btn btn-danger basic-ok"><?php echo e(trans('file.Yes')); ?></button>
                    <button type="button" class="basic_salary-close btn btn-secondary" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
      </div>


</section>

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/salary/basic/index.blade.php ENDPATH**/ ?>