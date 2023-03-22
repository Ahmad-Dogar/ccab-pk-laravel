<section>

    <span id="document_general_result"></span>


    <div class="container-fluid">
        <?php if(auth()->user()->can('store-details-employee') || auth()->user()->id == $employee->id): ?>
            <button type="button" class="btn btn-info" name="create_record" id="create_document_record"><i
                        class="fa fa-plus"></i><?php echo e(__('Add Document')); ?></button>
        <?php endif; ?>
    </div>


    <div class="table-responsive">
        <table id="document-table" class="table ">
            <thead>
            <tr>
                <th><?php echo e(__('Document Type')); ?></th>
                <th><?php echo e(trans('file.Title')); ?></th>
                <th><?php echo e(__('Expired Date')); ?></th>
                <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
            </tr>
            </thead>

        </table>
    </div>


    <div id="DocumentformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Document')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="document-close"><span
                                aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <span id="document_form_result"></span>
                    <form method="post" id="document_sample_form" class="form-horizontal" enctype="multipart/form-data"
                          autocomplete="off">

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Document Type')); ?></label>
                                <select name="document_type_id" id="document_document_type_id" required
                                        class="form-control selectpicker"
                                        data-live-search="true" data-live-search-style="begins"
                                        title='<?php echo e(__('Selecting',['key'=>__('Document Type')])); ?>...'>
                                    <?php $__currentLoopData = $document_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($document_type->id); ?>"><?php echo e($document_type->document_type); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Title')); ?> *</label>
                                <input type="text" name="document_title" id="document_title"
                                       placeholder=<?php echo e(trans('file.Title')); ?>

                                               required class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(__('Expired Date')); ?> *</label>
                                <input type="text" name="expiry_date" id="document_expiry_date" required
                                       autocomplete="off" class="form-control date" value="">
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Description')); ?></label>
                                    <textarea class="form-control" name="description" id="document_description"
                                              rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Document')); ?> <?php echo e(trans('file.File')); ?> *</label>
                                <input type="file" name="document_file" id="document_document_file"
                                       class="form-control">
                                <span id="stored_document_document"></span>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="is_notify"
                                           id="document_is_notify" value="1">
                                    <label class="custom-control-label"
                                           for="document_is_notify"><?php echo e(__('Send Notification?')); ?>

                                        (<?php echo e(__('will get notification email before 3 days of expiry date')); ?>)</label>
                                </div>
                            </div>


                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="document_action"/>
                                    <input type="hidden" name="hidden_id" id="document_hidden_id"/>
                                    <input type="submit" name="action_button" id="document_action_button"
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
                    <button type="button" class="bank-close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;"><?php echo e(__('Are you sure you want to remove this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button"  class="btn btn-danger document-ok"><?php echo e(trans('file.OK')); ?></button>
                    <button type="button" class="bank-close btn-default" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>

</section>

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/documents/index.blade.php ENDPATH**/ ?>