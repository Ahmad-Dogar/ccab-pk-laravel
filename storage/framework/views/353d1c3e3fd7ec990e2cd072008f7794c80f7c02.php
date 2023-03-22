<div class="container-fluid">
    <div class="card mb-0">
        <div class="card-body">           
            <h3 class="card-title"><?php echo e(__('Add Probation Type')); ?></h3>
            <form method="post" id="probation_type_form" class="form-horizontal" >
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input type="text" name="name" id="probation_title"  class="form-control"
                           placeholder="<?php echo e(__('Probation Type')); ?>">
                    <select name="duration" id="probation_duration"
                        class="form-control selectpicker ">
                        <?php for($i = 1; $i < 13; $i++): ?>
                            <?php if($i > 1): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e(__(':num months', ['num' => $i])); ?></option>
                            <?php else: ?> 
                                <option value="<?php echo e($i); ?>"><?php echo e(__(':num month', ['num' => $i])); ?></option> 
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                    <input type="submit" name="probation_type_submit" id="probation_type_submit" class="btn btn-success" value=<?php echo e(trans("file.Save")); ?>>
                </div>
            </form>
        </div>
    </div>
</div>
<span class="probation_result"></span>
<div class="table-responsive">
    <table id="probation_type-table" class="table ">
        <thead>
        <tr>
            <th><?php echo e(__('Probation Type')); ?></th>
            <th><?php echo e(__('Duration')); ?></th>
            <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
        </tr>
        </thead>

    </table>
</div>

<div id="ProbationEditModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="ProbationModalLabel" class="modal-title"><?php echo e(trans('file.Edit')); ?></h5>

                <button type="button" data-dismiss="modal" id="probation_close" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
            </div>
            <span class="probation_result_edit"></span>

            <div class="modal-body">
                <form method="post" id="probation_type_form_edit" class="form-horizontal" enctype="multipart/form-data" >

                    <?php echo csrf_field(); ?>
                    <div class="col-md-4 form-group">
                        <label><?php echo e(__('Probation Type')); ?> *</label>
                        <input type="text" name="name_edit" id="probation_title"  class="form-control"
                           placeholder="<?php echo e(__('Probation Type')); ?>">
                        <select name="duration_edit" id="probation_duration"
                            class="form-control selectpicker ">
                            <?php for($i = 1; $i < 13; $i++): ?>
                                <?php if($i > 1): ?>
                                    <option value="<?php echo e($i); ?>"><?php echo e(__(':num months', ['num' => $i])); ?></option>
                                <?php else: ?> 
                                    <option value="<?php echo e($i); ?>"><?php echo e(__(':num month', ['num' => $i])); ?></option> 
                                <?php endif; ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="hidden" name="hidden_probation_id" id="hidden_probation_id" />
                        <input type="submit" name="probation_type_edit_submit" id="probation_type_edit_submit" class="btn btn-success" value=<?php echo e(trans("file.Edit")); ?> />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/settings/variables/partials/probation_type.blade.php ENDPATH**/ ?>