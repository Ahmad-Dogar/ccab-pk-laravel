<section>

    <span id="other_payment_general_result"></span>


    <div class="mb-3">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('set-salary')): ?>
            <button type="button" class="btn btn-info" name="create_record" id="create_other_payment_record"><i
                        class="fa fa-plus"></i><?php echo e(__('Add Other Payment')); ?></button>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table id="other_payment-table" class="table ">
                <thead>
                <tr>
                    <th><?php echo e(__('Month-Year')); ?></th>
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

    <div id="OtherPaymentformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Other Payment')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="other_payment-close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="other_payment_form_result"></span>
                    <form method="post" id="other_payment_sample_form" class="form-horizontal" autocomplete="off">

                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Month Year')); ?> *</label>
                                <input class="form-control month_year" name="month_year" type="text" id="month_year">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Title')); ?> *</label>
                                <input type="text" name="other_payment_title" id="other_payment_title"
                                       placeholder=<?php echo e(trans('file.Title')); ?>

                                               required class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <?php if(config('variable.currency_format')=='suffix'): ?>
                                    <label><?php echo e(__('Amount')); ?> (<?php echo e(config('variable.currency')); ?>) *</label>
                                <?php else: ?>
                                    <label>(<?php echo e(config('variable.currency')); ?>) <?php echo e(__('Amount')); ?> *</label>
                                <?php endif; ?> <input type="text" name="other_payment_amount" id="other_payment_amount"
                                              placeholder=<?php echo e(trans('file.Amount')); ?>

                                                      required class="form-control">
                            </div>


                            <div class="container">
                                <br>
                                
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="other_payment_action"/>
                                    <input type="hidden" name="hidden_id" id="other_payment_hidden_id"/>
                                    <input type="submit" name="action_button" id="other_payment_action_button"
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
                    <button type="button" class="other_payment-close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;"><?php echo e(__('Are you sure you want to remove this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button"  class="btn btn-danger other_payment-ok"><?php echo e(trans('file.OK')); ?></button>
                    <button type="button" class="other_payment-close btn-default" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>


</section>

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/salary/other_payment/index.blade.php ENDPATH**/ ?>