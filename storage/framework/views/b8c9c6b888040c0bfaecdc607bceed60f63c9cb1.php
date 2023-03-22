<section>

    <span id="allowance_general_result"></span>


    <div class="mb-3">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('set-salary')): ?>
            <button type="button" class="btn btn-info" name="create_record" id="create_allowance_record"><i
                        class="fa fa-plus"></i><?php echo e(__('Add Allowance')); ?></button>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table id="allowance-table" class="table ">
                <thead>
                <tr>
                    <th><?php echo e(__('Month-Year')); ?></th>
                    <th><?php echo e(__('Allowance Type')); ?></th>
                    <th><?php echo e(__('Allowance Title')); ?></th>
                    <?php if(config('variable.currency_format')=='suffix'): ?>
                        <th><?php echo e(__('Allowance Amount')); ?> (<?php echo e(config('variable.currency')); ?>)</th>
                    <?php else: ?>
                        <th>(<?php echo e(config('variable.currency')); ?>) <?php echo e(__('Allowance Amount')); ?></th>
                    <?php endif; ?>
                    <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                </tr>
                </thead>

            </table>
        </div>
    </div>

    <div id="AllowanceformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Allowance')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="allowance-close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="allowance_form_result"></span>
                    <form method="post" id="allowance_sample_form" class="form-horizontal" autocomplete="off">

                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Month Year')); ?> *</label>
                                <input class="form-control month_year" id="month_year" name="month_year" type="text">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Allowance Type')); ?> *</label>
                                <select name="is_taxable" id="allowance_is_taxable" required
                                        class="form-control selectpicker"
                                        title='<?php echo e(__('Selecting',['key'=>__('Allowance Type')])); ?>...'>
                                    <option value="1"><?php echo e(trans('file.Taxable')); ?></option>
                                    <option value="0"><?php echo e(trans('file.Non-Taxable')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Allowance Title')); ?> *</label>
                                <input type="text" name="allowance_title" id="allowance_title"
                                       placeholder=<?php echo e(__('Allowance Type')); ?>

                                               required class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <?php if(config('variable.currency_format')=='suffix'): ?>
                                    <label><?php echo e(__('Allowance Amount')); ?> (<?php echo e(config('variable.currency')); ?>)
                                            *</label>
                                <?php else: ?>
                                    <label>(<?php echo e(config('variable.currency')); ?>) <?php echo e(__('Allowance Amount')); ?>

                                            *</label>
                                <?php endif; ?>
                                <input type="text" name="allowance_amount" id="allowance_amount"
                                       placeholder=<?php echo e(__('Allowance Amount')); ?>

                                               required class="form-control">
                            </div>

                            <div class="container">
                                <br>
                                
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="allowance_action"/>
                                    <input type="hidden" name="hidden_id" id="allowance_hidden_id"/>
                                    <input type="submit" name="action_button" id="allowance_action_button"
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
                    <button type="button" class="allowance-close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;"><?php echo e(__('Are you sure you want to remove this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button"  class="btn btn-danger allowance-ok"><?php echo e(trans('file.OK')); ?></button>
                    <button type="button" class="allowance-close btn-default" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>


</section>

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/salary/allowance/index.blade.php ENDPATH**/ ?>