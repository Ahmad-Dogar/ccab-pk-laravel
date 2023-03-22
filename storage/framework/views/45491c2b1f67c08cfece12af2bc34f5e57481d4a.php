<div class="row">
    <div class="col-md-3">

            <ul class="nav nav-tabs vertical" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="employee_award-tab" data-toggle="tab" href="#Employee_award"
                       role="tab" aria-controls="Employee_award" aria-selected="true"><?php echo e(trans('file.Award')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Employee_travel" id="employee_travel-tab"
                       data-toggle="tab" data-table="employee_travel" data-target="#Employee_travel" role="tab"
                       aria-controls="Employee_travel" aria-selected="false"><?php echo e(trans('file.Travel')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('employee_training.index',$employee)); ?>" id="employee_training-tab"
                       data-toggle="tab" data-table="employee_training" data-target="#Employee_training" role="tab"
                       aria-controls="Employee_training" aria-selected="false"><?php echo e(trans('file.Training')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Employee_ticket" id="employee_ticket-tab"
                       data-toggle="tab" data-table="employee_ticket" data-target="#Employee_ticket" role="tab"
                       aria-controls="Employee_ticket" aria-selected="false"><?php echo e(trans('file.Ticket')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('employee_transfer.show',$employee)); ?>" id="employee_transfer-tab"
                       data-toggle="tab" data-table="employee_transfer" data-target="#Employee_transfer" role="tab"
                       aria-controls="Employee_transfer" aria-selected="false"><?php echo e(trans('file.Transfer')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('employee_promotion.show',$employee)); ?>"
                       id="employee_promotion-tab"
                       data-toggle="tab" data-table="employee_promotion" data-target="#Employee_promotion" role="tab"
                       aria-controls="Employee_promotion" aria-selected="false"><?php echo e(trans('file.Promotion')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('employee_complaint.show',$employee)); ?>"
                       id="employee_complaint-tab"
                       data-toggle="tab" data-table="employee_complaint" data-target="#Employee_complaint" role="tab"
                       aria-controls="Employee_complaint" aria-selected="false"><?php echo e(trans('file.Complaint')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('employee_warning.show',$employee)); ?>" id="employee_warning-tab"
                       data-toggle="tab" data-table="employee_warning" data-target="#Employee_warning" role="tab"
                       aria-controls="Employee_warning" aria-selected="false"><?php echo e(trans('file.Warning')); ?></a>
                </li>
            </ul>

    </div>

    <div class="col-md-9">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Employee_award" role="tabpanel"
                 aria-labelledby="employee_award-tab">
                <!--Contents for Basic starts here-->
                <?php echo e(__('Award Info')); ?>

                <hr>
                <div class="row">
                    <div class="table-responsive">
                        <table id="employee_award-table" class="table ">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Award Name')); ?></th>
                                <th><?php echo e(trans('file.Details')); ?></th>
                                <th><?php echo e(trans('file.Gift')); ?></th>
                                <th><?php echo e(__('Award Date')); ?></th>
                                <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <div class="modal fade" id="employee_award_modal" tabindex="-1" role="dialog"
                     aria-labelledby="basicModal"
                     aria-hidden="true" style="margin-top: -20px;">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Award Info')); ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                </button>
                            </div>
                            <div class="modal-body">

                                <span id="award_award_photo_id"></span>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="table-responsive">

                                            <table class="table  table-bordered">

                                                <tr>
                                                    <th><?php echo e(trans('file.Company')); ?></th>
                                                    <td id="award_company_id_show"></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo e(trans('file.Employee')); ?></th>
                                                    <td id="award_employee_id_show"></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo e(trans('file.Department')); ?></th>
                                                    <td id="award_department_id_show"></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo e(__('Award Type')); ?></th>
                                                    <td id="award_award_type_id_show"></td>
                                                </tr>


                                                <tr>
                                                    <th><?php echo e(__('Award Info')); ?></th>
                                                    <td id="award_award_information_id"></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo e(trans('file.Gift')); ?></th>
                                                    <td id="award_gift_id"></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo e(trans('file.Cash')); ?></th>
                                                    <td id="award_cash_id"></td>
                                                </tr>

                                                <tr>
                                                    <th><?php echo e(__('Award Date')); ?></th>
                                                    <td id="award_award_date_id"></td>
                                                </tr>


                                            </table>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal"><?php echo e(trans('file.Close')); ?></button>

                        </div>
                    </div>
                </div>

            </div>


            <div class="tab-pane fade" id="Employee_travel" role="tabpanel" aria-labelledby="Employee_travel-tab">
                <?php echo e(__('Travel Info')); ?>

                <hr>

                <?php echo $__env->make('employee.core_hr.travel.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
            <div class="tab-pane fade" id="Employee_training" role="tabpanel" aria-labelledby="Employee_training-tab">
                <?php echo e(__('Training Info')); ?>

                <hr>

                <?php echo $__env->make('employee.core_hr.training.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

            <div class="tab-pane fade" id="Employee_ticket" role="tabpanel" aria-labelledby="Employee_ticket-tab">
                <?php echo e(__('Ticket Info')); ?>

                <hr>

                <?php echo $__env->make('employee.core_hr.ticket.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>


            <div class="tab-pane fade" id="Employee_transfer" role="tabpanel" aria-labelledby="Employee_transfer-tab">
                <?php echo e(__('Transfer Info')); ?>

                <hr>

                <?php echo $__env->make('employee.core_hr.transfer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="Employee_promotion" role="tabpanel" aria-labelledby="Employee_promotion-tab">
                <?php echo e(__('Promotion Info')); ?>

                <hr>

                <?php echo $__env->make('employee.core_hr.promotion.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="Employee_complaint" role="tabpanel" aria-labelledby="Employee_complaint-tab">
                <?php echo e(__('Complaint Info')); ?>

                <hr>

                <?php echo $__env->make('employee.core_hr.complaint.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="Employee_warning" role="tabpanel" aria-labelledby="Employee_warning-tab">
                <?php echo e(__('Warning Info')); ?>

                <hr>

                <?php echo $__env->make('employee.core_hr.warning.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>
    </div>
</div>




<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/core_hr/award/index.blade.php ENDPATH**/ ?>