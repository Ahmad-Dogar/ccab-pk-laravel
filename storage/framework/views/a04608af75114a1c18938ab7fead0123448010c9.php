<div class="container-fluid">
    <div class="card mb-0">
        <div class="card-body">           
            <h3 class="card-title"><?php echo e(__('Add Warning Type')); ?></h3>
            <form method="post" id="warning_type_form" class="form-horizontal" >
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input type="text" name="warning_title" id="warning_title"  class="form-control"
                           placeholder="<?php echo e(__('Warning Type')); ?>">
                    <input type="submit" name="warning_type_submit" id="warning_type_submit" class="btn btn-success" value=<?php echo e(trans("file.Save")); ?>>
                </div>
            </form>
        </div>
    </div>
</div>
<span class="warning_result"></span>
<div class="table-responsive">
    <table id="warning_type-table" class="table ">
        <thead>
        <tr>
            <th><?php echo e(__('Warning Type')); ?></th>
            <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
        </tr>
        </thead>

    </table>
</div>
        


<div id="WarningEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="WarningModalLabel" class="modal-title"><?php echo e(trans('file.Edit')); ?></h5>

                <button type="button" data-dismiss="modal" id="warning_close" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
            </div>
            <span class="warning_result_edit"></span>

            <div class="modal-body">
                <form method="post" id="warning_type_form_edit" class="form-horizontal" enctype="multipart/form-data" >

                    <?php echo csrf_field(); ?>
                    <div class="col-md-4 form-group">
                        <label><?php echo e(__('Warning Type')); ?> *</label>
                        <input type="text" name="warning_title_edit" id="warning_title_edit"  class="form-control"
                               placeholder="<?php echo e(__('Warning Type')); ?>">
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="hidden" name="hidden_warning_id" id="hidden_warning_id" />
                        <input type="submit" name="warning_type_edit_submit" id="warning_type_edit_submit" class="btn btn-success" value=<?php echo e(trans("file.Edit")); ?> />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/settings/variables/partials/warning_type.blade.php ENDPATH**/ ?>