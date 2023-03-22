<div class="row">    
    <div class="table-responsive">
        <table id="employee_training-table" class="table ">
            <thead>
            <tr>
                <th><?php echo e(__('Training Type')); ?></th>
                <th><?php echo e(trans('file.Trainer')); ?></th>
                <th><?php echo e(__('Start Date')); ?></th>
                <th><?php echo e(__('End Date')); ?></th>
                <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
            </tr>
            </thead>

        </table>
    </div>
</div>
<div class="modal fade" id="employee_training_model" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true"
     style="margin-top: -20px;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Training Info')); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table  table-bordered">

                                <tr>
                                    <th><?php echo e(trans('file.Company')); ?></th>
                                    <td id="training_company_id_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(trans('file.Trainer')); ?></th>
                                    <td id="training_trainer_id_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Training Type')); ?></th>
                                    <td id="training_training_type_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(trans('file.Employee')); ?></th>
                                    <td id="training_employee_id_show"></td>
                                </tr>



                                <tr>
                                    <th><?php echo e(__('Start Date')); ?></th>
                                    <td id="training_start_date_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('End Date')); ?></th>
                                    <td id="training_end_date_show"></td>
                                </tr>


                                <tr>
                                    <th><?php echo e(trans('file.Description')); ?></th>
                                    <td id="training_description_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Training Cost')); ?></th>
                                    <td id="training_training_cost_show"></td>
                                </tr>

                            </table>

                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('file.Close')); ?></button>

        </div>
    </div>
</div>





<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/core_hr/training/index.blade.php ENDPATH**/ ?>