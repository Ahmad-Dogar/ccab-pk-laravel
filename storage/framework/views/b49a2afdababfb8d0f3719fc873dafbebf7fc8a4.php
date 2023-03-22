<section>

    <span id="deduction_general_result"></span>


    <div class="mb-3">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('set-salary')): ?>
            <button type="button" class="btn btn-info" name="create_record" id="create_deduction_record"><i
                        class="fa fa-plus"></i><?php echo e(__('Add Deduction')); ?></button>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table id="deduction-table" class="table ">
                <thead>
                <tr>
                    <th><?php echo e(__('Month-Year')); ?></th>
                    <th><?php echo e(__('Deduction Type')); ?></th>
                    <th><?php echo e(trans('file.Title')); ?></th>
                    <?php if(config('variable.currency_format')=='suffix'): ?>
                        <th><?php echo e(__('Amount')); ?> (<?php echo e(config('variable.currency')); ?>)</th>
                    <?php else: ?>
                        <th>(<?php echo e(config('variable.currency')); ?>) <?php echo e(__('Amount')); ?></th>
                    <?php endif; ?>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>

            </table>
        </div>
    </div>

    <div id="DeductionformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Statutory Deduction')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="deduction-close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="deduction_form_result"></span>
                    <form method="post" id="deduction_sample_form" class="form-horizontal" autocomplete="off">

                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Month Year')); ?> *</label>
                                <input class="form-control month_year"  name="month_year" type="text" id="month_year">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Deduction Option')); ?> *</label>
                                <select name="deduction_type" id="deduction_type" required
                                        class="form-control selectpicker"
                                        data-live-search="false" data-live-search-style="begins"
                                        title='<?php echo e(__('Deduction Option')); ?>'>
                                    <option value="Social Security System"><?php echo e(__('Social Security System')); ?></option>
                                    <option value="Health Insurance Corporation"><?php echo e(__('Health Insurance Corporation')); ?></option>
                                    <option value="Home Development Mutual Fund"><?php echo e(__('Home Development Mutual Fund')); ?></option>
                                    <option value="Withholding Tax On Wages"><?php echo e(__('Withholding Tax On Wages')); ?></option>
                                    <option value="Other Statutory Deduction"><?php echo e(__('Other Statutory Deduction')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Deduction Title')); ?> *</label>
                                <input type="text" name="deduction_title" id="deduction_title"
                                       placeholder=<?php echo e(__('Deduction Title')); ?>

                                               required class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <?php if(config('variable.currency_format')=='suffix'): ?>
                                    <label><?php echo e(__('Deduction Amount')); ?> (<?php echo e(config('variable.currency')); ?>) *</label>
                                <?php else: ?>
                                    <label>(<?php echo e(config('variable.currency')); ?>) <?php echo e(__('Deduction Amount')); ?> *</label>
                                <?php endif; ?> <input type="text" name="deduction_amount" id="deduction_amount"
                                              placeholder=<?php echo e(__('Deduction Amount')); ?>

                                                      required class="form-control">
                            </div>


                            <div class="container">
                                <br>
                                
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="deduction_action"/>
                                    <input type="hidden" name="hidden_id" id="deduction_hidden_id"/>
                                    <input type="submit" name="action_button" id="deduction_action_button"
                                           class="btn btn-warning" value=<?php echo e(trans('file.Add')); ?> />
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade confirmModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><?php echo e(trans('file.Confirmation')); ?></h2>
                    <button type="button" class="deduction-close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;"><?php echo e(__('Are you sure you want to remove this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button"  class="btn btn-danger deduction-ok"><?php echo e(trans('file.OK')); ?></button>
                    <button type="button" class="deduction-close btn-default" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>

</section>

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/salary/deduction/index.blade.php ENDPATH**/ ?>