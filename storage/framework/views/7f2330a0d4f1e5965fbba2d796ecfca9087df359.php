<section>

    <span id="work_experience_general_result"></span>


    <div class="container-fluid">
        <?php if(auth()->user()->can('store-details-employee') || auth()->user()->id == $employee->id): ?>
            <button type="button" class="btn btn-info" name="create_record" id="create_work_experience_record"><i
                        class="fa fa-plus"></i><?php echo e(__('Add Work Experience')); ?></button>
        <?php endif; ?>
    </div>


    <div class="table-responsive">
        <table id="work_experience-table" class="table ">
            <thead>
            <tr>
                <th><?php echo e(trans('file.Company')); ?></th>
                <th><?php echo e(__('From Date')); ?></th>
                <th><?php echo e(__('To Date')); ?></th>
                <th><?php echo e(trans('file.Post')); ?></th>
                <th><?php echo e(trans('file.Description')); ?></th>
                <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
            </tr>
            </thead>

        </table>
    </div>


    <div id="WorkExperienceformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Work Experience')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="experience-close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="work_experience_form_result"></span>
                    <form method="post" id="work_experience_sample_form" class="form-horizontal" autocomplete="off">

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Company')); ?> *</label>
                                <input type="text" name="company_name" id="work_company_name"
                                       placeholder=<?php echo e(trans('file.Company')); ?>

                                               required class="form-control">
                            </div>


                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.From')); ?> *</label>
                                <input type="text" name="from_date" id="work_experience_from_date" required
                                       autocomplete="off" class="form-control date" value="">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.To')); ?> *</label>
                                <input type="text" name="to_date" id="work_experience_to_date" required
                                       autocomplete="off" class="form-control date" value="">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Post')); ?> *</label>
                                <input type="text" name="post" id="work_post" placeholder=<?php echo e(trans('file.Post')); ?>

                                        required class="form-control">
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Description')); ?></label>
                                    <textarea class="form-control" name="description" id="work_experience_description"
                                              rows="3"></textarea>
                                </div>
                            </div>


                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="work_experience_action"/>
                                    <input type="hidden" name="hidden_id" id="work_experience_hidden_id"/>
                                    <input type="submit" name="action_button" id="work_experience_action_button"
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
                    <button type="button" class="experience-close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;"><?php echo e(__('Are you sure you want to remove this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button"  class="btn btn-danger experience-ok"><?php echo e(trans('file.OK')); ?></button>
                    <button type="button" class="experience-close btn-default" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>


</section>

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/work_experience/index.blade.php ENDPATH**/ ?>