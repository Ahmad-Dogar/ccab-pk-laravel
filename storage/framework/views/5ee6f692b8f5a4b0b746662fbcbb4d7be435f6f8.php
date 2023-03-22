<?php $__env->startSection('content'); ?>

    <section>

    <?php echo $__env->make('shared.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- Content -->
        <div class="container-fluid">on
            <div class="row">

                <div class="col-3 col-md-2 mb-3">
                    <img src=<?php echo e(URL::to('/public/uploads/profile_photos')); ?>/<?php echo e($user->profile_photo ?? 'avatar.jpg'); ?>  width='150'
                         class='rounded-circle'>
                </div>

                <div class="col-9 col-md-10 mb-3">
                    <h4 class="font-weight-bold"><?php echo e($employee->full_name); ?> <span class="text-muted font-weight-normal"> (<?php echo e($user->username); ?>)</span>
                    </h4>
                    <div class="text-muted mb-2"><?php echo e($employee->designation->designation_name ?? ''); ?>, <?php echo e($employee->department->department_name ?? ''); ?></div>
                    <p class="text-muted"><?php echo e(__('Last Login')); ?>: <?php echo e($user->last_login_date); ?></p>
                    <p class="text-muted"><?php echo e(__('My Office Shift')); ?>:
                    <?php if(!$shift_in): ?>
                        <?php echo e(__('No Shift Today')); ?>

                    <?php else: ?>
                        <?php echo e($shift_in); ?> To <?php echo e($shift_out); ?>

                    <?php endif; ?>
                    (<?php echo e($shift_name); ?>)</p>
                    <a class="btn btn-default btn-sm" id="my_profile" href="<?php echo e(route('profile')); ?>">
                        <i class="dripicons-user"></i> <?php echo e(trans('file.Profile')); ?>

                    </a>
                    <form class="d-inline m1-2" action="<?php echo e(route('employee_attendance.post',$employee->id)); ?>" name="set_clocking"
                          id="set_clocking" autocomplete="off" class="form" method="post" accept-charset="utf-8">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" value="<?php echo e($shift_in); ?>" name="office_shift_in" id="shift_in">
                        <input type="hidden" value="<?php echo e($shift_out); ?>" name="office_shift_out" id="shift_out">
                        <input type="hidden" value="" name="in_out_value" id="in_out">

                        <?php if(!$employee_attendance || $employee_attendance->clock_in_out== 0): ?>
                            <button class="btn btn-success btn-sm" <?php if($employee->attendance_type=='ip_based' && $ipCheck!=true): ?> disabled <?php endif; ?> type="submit" id="clock_in_btn"><i class="dripicons-enter"></i> <?php echo e(__('Clock IN')); ?></button>
                        <?php else: ?>
                            <button class="btn btn-danger btn-sm" <?php if($employee->attendance_type=='ip_based' && $ipCheck!=true): ?> disabled <?php endif; ?> type="submit" id="clock_out_btn"><i class="dripicons-exit"></i> <?php echo e(__('Clock OUT')); ?></button>
                        <?php endif; ?>
                        
                        <?php if($employee->attendance_type=='ip_based' && $ipCheck!=true): ?> <small class="text-danger"><i>[Please login with your office's internet to clock in or clock out]</i></small> <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">

                <!--<div class="col-md-3 mt-4">-->
                <!--    <div class="d-flex wrapper count-title">-->
                <!--        <div class="icon blue-text ml-2 mr-3">-->
                <!--            <i class="dripicons-wallet display-5"></i>-->
                <!--        </div>-->
                <!--        <a href="<?php echo e(route('profile').'#Employee_Payslip'); ?>">-->
                <!--            <div class="name"><h4><?php echo e(__('Payslip')); ?></h4></div>-->
                <!--            <p><?php echo e(__('View Details')); ?></p>-->
                <!--        </a>-->
                <!--    </div>-->
                <!--</div>-->

                <!--<div class="col-md-3 mt-4">-->
                <!--    <div class="d-flex wrapper count-title">-->
                <!--        <div class="icon purple-text ml-2 mr-3">-->
                <!--            <i class="dripicons-trophy"></i>-->
                <!--        </div>-->
                <!--        <a href="<?php echo e(route('profile').'#Employee_Core_hr'); ?>">-->
                <!--            <div class="name"><h4><?php echo e($employee_award_count); ?> <?php echo e(__('Award')); ?></h4></div>-->
                <!--            <p><?php echo e(__('View Details')); ?></p>-->
                <!--        </a>-->
                <!--    </div>-->
                <!--</div>-->


                <div class="col-md-6 mt-4">
                    <div class="d-flex wrapper count-title">
                        <div class="icon orange-text ml-2 mr-3">
                            <i class="dripicons-feed"></i>
                        </div>
                        <a href="<?php echo e(route('announcements.index')); ?>">
                            <div class="text-center"><h4><?php echo e(count($announcements)); ?> <?php echo e(trans('file.Announcement')); ?></h4>
                            </div>
                            <p><?php echo e(__('View Details')); ?></p>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 mt-4">
                    <div class="d-flex wrapper count-title">
                        <div class="icon green-text ml-2 mr-3">
                            <i class="dripicons-gaming"></i>
                        </div>
                        <?php if(count($holidays) > 0): ?>
                        <div id="holiday" class="">
                        <?php else: ?>
                        <div class="">
                        <?php endif; ?>
                            <h4><?php echo e(count($holidays)); ?> <?php echo e(__('Upcoming Holidays')); ?></h4>
                            <p><?php echo e(__('View Details')); ?></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Leave</h3>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-link btn-block" href="<?php echo e(route('profile').'#Leave'); ?>">
                                <?php echo e(__(' View Leave Info')); ?>

                            </a>
                        
                            <!--<button class="btn btn-light btn-block mt-0" id="leave_request" <?php if($onProbation): ?> disabled <?php endif; ?>><?php echo e(__('Request Leave')); ?></button>-->
                            <button class="btn btn-light btn-block mt-0" id="leave_request"><?php echo e(__('Request Leave')); ?></button>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Travel</h3>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-link btn-block" href="<?php echo e(route('profile').'#Employee_travel'); ?>">
                            <?php echo e(__('View Travel Info')); ?>

                        </a>
                            <button class="btn btn-light btn-block mt-0" id="travel_request"><?php echo e(__('Request Travel')); ?></button>
                        </div>
                    </div>
                </div>


                <!--<div class="col-md-4 mt-4">-->
                <!--    <div class="card">-->
                <!--        <div class="card-body">-->
                <!--            <h3 class="text-center"><?php echo e(__('Ticket')); ?></h3>-->
                <!--        </div>-->
                <!--        <div class="d-flex justify-content-between">-->
                <!--            <a class="btn btn-link btn-block"  href="<?php echo e(route('profile').'#Employee_ticket'); ?>">-->
                <!--                <?php echo e(__('Ticket Info')); ?>-->
                <!--            </a>-->
                <!--            <button class="btn btn-light btn-block mt-0" id="ticket_request"><?php echo e(__('Open A Ticket')); ?></button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

            </div>
        </div>


        <div class="container-fluid">
            <div class="row">

                <!--<div class="col-md-4 mt-4">-->
                <!--    <div class="card">-->
                <!--        <div class="card-header">-->
                <!--            <h4><?php echo e(__('Assigned Projects')); ?> (<?php echo e($assigned_projects_count); ?>)</h4>-->
                <!--        </div>-->
                <!--        <div class="card-body list pt-0">-->
                <!--            <table class="table">-->
                <!--                <tbody>-->
                <!--                    <?php $__currentLoopData = $assigned_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                        <?php if(count($project->assignedProjects)!=0): ?>-->
                <!--                            <tr>-->
                <!--                                <td>-->
                <!--                                    <a href="<?php echo e(route('projects.show',$project->assignedProjects[0]->id)); ?>"><h5><?php echo e($project->assignedProjects[0]->title); ?></h5></a>-->
                <!--                                </td>-->
                <!--                            </tr>-->
                <!--                        <?php endif; ?>-->
                <!--                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--                </tbody>-->
                <!--            </table>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo e(__('Assigned Tasks')); ?> (<?php echo e($assigned_tasks_count); ?>)</h4>
                        </div>
                        <div class="card-body list pt-0">
                            <table class="table">
                                <tbody>
                                    <?php $__currentLoopData = $assigned_tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($task->assignedTasks)!=0): ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('tasks.show',$task->assignedTasks[0]->id)); ?>"><h5><?php echo e($task->assignedTasks[0]->task_name); ?></h5></a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--<div class="col-md-4 mt-4">-->
                <!--    <div class="card">-->
                <!--        <div class="card-header">-->
                <!--            <h4><?php echo e(__('Assigned Tickets')); ?> (<?php echo e($assigned_tickets_count); ?>)</h4>-->
                <!--        </div>-->
                <!--        <div class="card-body list pt-0">-->
                <!--            <table class="table">-->
                <!--                <tbody>-->
                <!--                    <?php $__currentLoopData = $assigned_tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                        <?php if(count($ticket->assignedTickets)!=0): ?>-->
                <!--                            <tr>-->
                <!--                                <td>-->
                <!--                                    <a href="<?php echo e(route('tickets.show',$ticket->assignedTickets[0]->ticket_code)); ?>"><h5><?php echo e($ticket->assignedTickets[0]->subject); ?></h5></a>-->
                <!--                                </td>-->
                <!--                            </tr>-->
                <!--                        <?php endif; ?>-->
                <!--                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--                </tbody>-->
                <!--            </table>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>

        <div id="holidayModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Holidays')); ?></h5>
                        <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <?php $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div><strong class="name blue-text"><?php echo e($holiday->event_name); ?></strong><?php echo e(trans('file.From')); ?>

                                :<?php echo e($holiday->start_date); ?> <?php echo e(trans('file.To')); ?>:<?php echo e($holiday->end_date); ?></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="leaveModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Leave Request')); ?></h5>
                        <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <span id="leave_form_result"></span>
                        <form method="post" id="leave_sample_form" class="form-horizontal">

                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Your Remaining Leaves')); ?>  (Year - <?php echo e(date('Y')); ?>)</label><br>
                                    <div class="row">
                                        <input class="col-sm-6 ml-2" type="number" readonly name="remaining_leave" id="remaining_leave" autocomplete="off" class="form-control" value="<?php echo e($employee->remaining_leave); ?>">
                                        <span class="ml-2"><?php echo e(__('Days')); ?></span>
                                    </div>
                                    <small class="text-danger col-sm-4"><i>(Read Only)</i></small>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Leave Type')); ?><?php echo e($employee->probation_id); ?></label>
                                    
                                    <select name="leave_type" id="leave_type" class="form-control selectpicker "
                                            data-live-search="true" data-live-search-style="begins"
                                            title='<?php echo e(__('Selecting',['key'=>__('Leave Type')])); ?>...'>
                                        
                                         
                                        <?php if($employee->probation_id == 0 || $employee->probation_id == 1 ): ?>
                                        
                                        <?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <option value="<?php echo e($leave_type->id); ?>"><?php echo e($leave_type->leave_type); ?>

                                                (<?php echo e($leave_type->allocated_day); ?> Days)
                                            </option>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                       
                                        <?php else: ?>
                                        
                                        <?php $__currentLoopData = $onprob; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_typee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                       
                                            <option value="<?php echo e($leave_typee->id); ?>"><?php echo e($leave_typee->leave_type); ?>

                                                (<?php echo e($leave_typee->allocated_day); ?> Days)
                                            </option>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                
                                        
                                            
                                        <?php endif; ?>
                                        
                                    </select>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Start Date')); ?></label>
                                    <input type="text" name="start_date" id="leave_start_date" class="form-control date"
                                           value="" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('End Date')); ?></label>
                                    <input type="text" name="end_date" id="leave_end_date" class="form-control date"
                                           value="" required>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="leave_reason"><?php echo e(trans('file.Description')); ?></label>
                                        <textarea class="form-control" id="leave_reason" name="leave_reason"
                                                  rows="3"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-6 form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="is_half"
                                               id="leave_is_half" value="1">
                                        <label for="leave_is_half"
                                               class="custom-control-label"><?php echo e(__('Half Day')); ?></label>

                                    </div>
                                </div>


                                <div class="container">
                                    <div class="form-group" align="center">
                                        <input type="hidden" name="company_id" value="<?php echo e($employee->company_id); ?>"/>
                                        <input type="hidden" name="department_id" value="<?php echo e($employee->department_id); ?>"/>
                                        <input type="hidden" name="employee_id" value="<?php echo e($employee->id); ?>"/>
                                        <input type="hidden" name="status" value="pending"/>

                                        <input type="hidden" name="diff_date_hidden" id="diff_date_hidden"/>
                                        <input type="submit" name="action_button" class="btn btn-warning"
                                               value=<?php echo e(trans('file.Add')); ?> />
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div id="travelModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Travel Request')); ?></h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <span id="travel_form_result"></span>
                        <form method="post" id="travel_sample_form" class="form-horizontal">

                            <?php echo csrf_field(); ?>
                            <div class="row">


                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Arrangement Type')); ?></label>
                                    <select name="travel_type_id" class="form-control selectpicker "
                                            data-live-search="true" data-live-search-style="begins"
                                            title='<?php echo e(__('Selecting',['key'=>trans('file.Arrangement')])); ?>...'>
                                        <?php $__currentLoopData = $travel_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $travel_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($travel_type->id); ?>"><?php echo e($travel_type->arrangement_type); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Purpose Of Visit')); ?> *</label>
                                    <input type="text" name="purpose_of_visit" class="form-control"
                                           placeholder="<?php echo e(__('Purpose Of Visit')); ?>">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Place Of Visit')); ?> *</label>
                                    <input type="text" name="place_of_visit" class="form-control"
                                           placeholder="<?php echo e(__('Place Of Visit')); ?>">
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Description')); ?></label>
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Start Date')); ?> *</label>
                                    <input type="text" name="start_date" class="form-control date" autocomplete="off"
                                           value="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('End Date')); ?> *</label>
                                    <input type="text" name="end_date" class="form-control date" autocomplete="off"
                                           value="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Expected Budget')); ?></label>
                                    <input type="text" name="expected_budget" class="form-control">
                                </div>


                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Travel Mode')); ?></label>
                                    <select name="travel_mode" class="form-control selectpicker "
                                            data-live-search="true" data-live-search-style="begins"
                                            title='<?php echo e(__('Travel Mode')); ?>'>
                                        <option value="By Bus"><?php echo e(__('By Bus')); ?></option>
                                        >
                                        <option value="By Train"><?php echo e(__('By Train')); ?></option>
                                        <option value="By Plane"><?php echo e(__('By Plane')); ?></option>
                                        <option value="By Taxi"><?php echo e(__('By Taxi')); ?></option>
                                        <option value="By Rental Car"><?php echo e(__('By Rental Car')); ?></option>
                                        <option value="By Other"><?php echo e(__('By Other')); ?></option>
                                    </select>
                                </div>


                                <div class="container">
                                    <div class="form-group" align="center">

                                        <input type="hidden" name="company_id" value="<?php echo e($employee->company_id); ?>"/>
                                        <input type="hidden" name="department_id" value="<?php echo e($employee->department_id); ?>"/>
                                        <input type="hidden" name="employee_id" value="<?php echo e($employee->id); ?>"/>
                                        <input type="hidden" name="status" value="pending"/>

                                        <input type="submit" name="action_button" class="btn btn-warning"
                                               value=<?php echo e(trans('file.Add')); ?> />
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div id="ticketModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Open Ticket')); ?></h5>
                        <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <span id="ticket_form_result"></span>
                        <form method="post" id="ticket_sample_form" class="form-horizontal"
                              enctype="multipart/form-data">

                            <?php echo csrf_field(); ?>

                            <div class="row">


                                <div class="col-md-6 form-group">
                                    <label><?php echo e(trans('file.Priority')); ?></label>
                                    <select name="ticket_priority" id="ticket_priority"
                                            class="form-control selectpicker "
                                            data-live-search="true" data-live-search-style="begins"
                                            title='<?php echo e(__('Selecting',['key'=>trans('file.Priority')])); ?>...'>
                                        <option value="low"><?php echo e(trans('file.Low')); ?></option>
                                        <option value="medium"><?php echo e(trans('file.Medium')); ?></option>
                                        <option value="high"><?php echo e(trans('file.High')); ?></option>
                                        <option value="critical">Critical</option>
                                    </select>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(trans('file.Subject')); ?> *</label>
                                    <input type="text" name="subject" id="subject" class="form-control"
                                           placeholder="<?php echo e(trans('file.Subject')); ?>">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label><?php echo e(__('Ticket Note')); ?></label>
                                    <input type="text" name="ticket_note" id="ticket_note" class="form-control"
                                           placeholder="<?php echo e(trans('file.Optional')); ?>">
                                </div>

                                <div class="col-md-6 form-group hide_edit">
                                    <label><?php echo e(__('Ticket Attachments')); ?> </label>
                                    <input type="file" name="ticket_attachments" id="ticket_attachments"
                                           class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Description')); ?></label>
                                        <textarea class="form-control" id="description" name="description"
                                                  rows="3"></textarea>
                                    </div>
                                </div>


                                <div class="container">
                                    <div class="form-group" align="center">
                                        <input type="hidden" name="company_id" value="<?php echo e($employee->company_id); ?>"/>
                                        <input type="hidden" name="department_id" value="<?php echo e($employee->department_id); ?>"/>
                                        <input type="hidden" name="employee_id" value="<?php echo e($employee->id); ?>"/>
                                        <input type="hidden" name="ticket_status" value="pending"/>

                                        <input type="submit" name="action_button" class="btn btn-warning"
                                               value=<?php echo e(trans('file.Add')); ?> />

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <script>
            (function($) {
                "use strict";

                let date = $('.date');
                date.datepicker({
                    format: '<?php echo e(env('Date_Format_JS')); ?>',
                    autoclose: true,
                    todayHighlight: true
                });

                $('#holiday').on('click', function () {
                    $('#holidayModal').modal('show');
                });

                $('#leave_request').on('click', function () {
                    $('#leaveModal').modal('show');
                });

                $('#travel_request').on('click', function () {
                    $('#travelModal').modal('show');
                });

                $('#ticket_request').on('click', function () {
                    $('#ticketModal').modal('show');
                });

                $('#leave_sample_form').on('submit', function (event) {
                    event.preventDefault();

                    let start_date = $("#leave_start_date").datepicker('getDate');
                    let end_date = $("#leave_end_date").datepicker('getDate');
                    let dayDiff = Math.ceil((end_date - start_date) / (1000 * 60 * 60 * 24)) + 1;
                    let remaining_leave = $("#remaining_leave").val();

                    $('#diff_date_hidden').val(dayDiff);
                    
                    // if(<?php echo json_encode($onProbation, 15, 512) ?>) {
                    //     let html = '<div class="alert alert-danger">' + 'You are on probation period' + '</div>';
                    //     $('#leave_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                    // } 
                    if (dayDiff > remaining_leave) {
                        let html = '<div class="alert alert-danger">' + 'Your total remaining leaves are insufficient' + '</div>';
                        $('#leave_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        console.log(html);
                    }
                    else
                    {
                        $.ajax({
                        url: "<?php echo e(route('leaves.store')); ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                                console.log(data);
                                let html = '';
                                if (data.errors) {
                                    html = '<div class="alert alert-danger">';
                                    for (var count = 0; count < data.errors.length; count++) {
                                        html += '<p>' + data.errors[count] + '</p>';
                                    }
                                    html += '</div>';
                                }
                                if (data.limit) {
                                    html = '<div class="alert alert-danger">' + data.limit + '</div>';
                                }
                                if (data.success) {
                                    html = '<div class="alert alert-success">' + data.success + '</div>';
                                    $('#leave_sample_form')[0].reset();
                                    $('select').selectpicker('refresh');
                                    $('.date').datepicker('update');
                                }
                                $('#leave_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                            }
                        });
                    }


                });

                $('#travel_sample_form').on('submit', function (event) {
                    event.preventDefault();

                    $.ajax({
                        url: "<?php echo e(route('travels.store')); ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            let html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.error) {
                                html = '<div class="alert alert-danger">' + data.error + '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#travel_sample_form')[0].reset();
                                $('select').selectpicker('refresh');
                                $('.date').datepicker('update');
                            }
                            $('#travel_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        }
                    })
                });


                $('#ticket_sample_form').on('submit', function (event) {
                    event.preventDefault();

                    $.ajax({
                        url: "<?php echo e(route('tickets.store')); ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            let html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger">';
                                for (var count = 0; count < data.errors.length; count++) {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#ticket_sample_form')[0].reset();
                                $('select').selectpicker('refresh');
                            }
                            $('#ticket_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                        }
                    })
                });

            })(jQuery);
        </script>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/dashboard/employee_dashboard.blade.php ENDPATH**/ ?>