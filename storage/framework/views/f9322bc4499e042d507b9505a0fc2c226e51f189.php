<div class="row">    
    <div class="table-responsive">
        <table id="employee_travel-table" class="table ">
            <thead>
            <tr>
                <th><?php echo e(trans('file.Summary')); ?></th>
                <th><?php echo e(__('Place Of Visit')); ?></th>
                <th><?php echo e(__('Start Date')); ?></th>
                <th><?php echo e(__('End Date')); ?></th>
                <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
            </tr>
            </thead>

        </table>
    </div>
</div>
<div class="modal fade" id="employee_travel_modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><?php echo e(__('Travel Info')); ?></h4>
                <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <span id="travel_travel_photo_id"></span>

                <div class="row">
                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table  table-bordered">

                                <tr>
                                    <th><?php echo e(trans('file.Company')); ?></th>
                                    <td id="travel_company_id_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(trans('file.Employee')); ?></th>
                                    <td id="travel_employee_id_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Start Date')); ?></th>
                                    <td id="travel_start_date_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('End Date')); ?></th>
                                    <td id="travel_end_date_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Purpose Of Visit')); ?></th>
                                    <td id="travel_purpose_of_visit_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Place Of Visit')); ?></th>
                                    <td id="travel_place_of_visit_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Travel Mode')); ?></th>
                                    <td id="travel_travel_mode_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Arrangement Type')); ?></th>
                                    <td id="travel_travel_type_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Expected Budget')); ?></th>
                                    <td id="travel_expected_budget_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Actual Budget')); ?></th>
                                    <td id="travel_actual_budget_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(trans('file.Status')); ?></th>
                                    <td id="travel_status_show"></td>
                                </tr>

                                <tr>
                                    <th><?php echo e(__('Travel Info')); ?></th>
                                    <td id="travel_description_show"></td>
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





<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/core_hr/travel/index.blade.php ENDPATH**/ ?>