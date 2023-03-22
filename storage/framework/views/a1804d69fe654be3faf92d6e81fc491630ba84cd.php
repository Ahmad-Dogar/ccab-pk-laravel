<div class="row">    
    <div class="table-responsive">
        <table id="employee_complaint-table" class="table ">
            <thead>
            <tr>
                <th><?php echo e(__('Complaint From')); ?></th>
                <th><?php echo e(__('Complaint To')); ?></th>
                <th><?php echo e(__('Complaint Title')); ?></th>
                <th><?php echo e(__('Complaint Date')); ?></th>
                <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
            </tr>
            </thead>

        </table>
    </div>
</div>
<div class="modal fade" id="employee_complaint_modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Complaint Info')); ?></h4>
                <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table  table-bordered">

                                <tr>
                                    <th><?php echo e(trans('file.Company')); ?></th>
                                    <td id="complaint_company_id_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Complaint From')); ?></th>
                                    <td id="complaint_complaint_from_id_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Complaint Against')); ?></th>
                                    <td id="complaint_complaint_against_id_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Complaint Title')); ?></th>
                                    <td id="complaint_complaint_title_id"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(trans('file.Description')); ?></th>
                                    <td id="complaint_description_id"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Complaint Date')); ?></th>
                                    <td id="complaint_complaint_date_id"></td>
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





<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/core_hr/complaint/index.blade.php ENDPATH**/ ?>