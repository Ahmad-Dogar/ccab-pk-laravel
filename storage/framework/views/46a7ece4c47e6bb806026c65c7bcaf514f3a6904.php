<?php $__env->startSection('content'); ?>

    <section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2><?php echo e($user->username); ?></h2>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#General" role="tab"
                               aria-controls="General" aria-selected="true"><?php echo e(trans('file.General')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Profile" role="tab"
                               aria-controls="Profile" aria-selected="false"><?php echo e(trans('file.Profile')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="view_salary-tab" data-toggle="tab" href="#View_salary" role="tab"
                               aria-controls="View_salary" aria-selected="false"><?php echo e(__('Salary')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="leave-tab" data-toggle="tab" href="#Leave" role="tab"
                               aria-controls="Leave" aria-selected="false"><?php echo e(trans('file.Leave')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="employee_core_hr-tab" data-toggle="tab" href="#Employee_Core_hr"
                               role="tab" aria-controls="Employee_Core_hr" aria-selected="false"><?php echo e(__('Core HR')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="employee_project_task-tab" data-toggle="tab"
                               href="#Employee_project_task" role="tab" aria-controls="Employee_project_task"
                               aria-selected="false"><?php echo e(trans('file.Project')); ?> & <?php echo e(trans('file.Task')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="employee_payslip-tab" data-toggle="tab" href="#Employee_Payslip"
                               role="tab" aria-controls="Employee_Payslip"
                               aria-selected="false"><?php echo e(trans('file.Payslip')); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="General" role="tabpanel"
                             aria-labelledby="general-tab">
                            <!--Contents for General starts here-->
                            <?php echo e(__('General Info')); ?>

                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <ul class="nav nav-tabs vertical" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#Basic"
                                               role="tab" aria-controls="Basic"
                                               aria-selected="true"><?php echo e(trans('file.Basic')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Immigration"
                                               id="immigration-tab" data-toggle="tab" data-table="immigration"
                                               data-target="#Immigration" role="tab" aria-controls="Immigration"
                                               aria-selected="false"><?php echo e(trans('file.Immigration')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Emergency"
                                               id="emergency-tab" data-toggle="tab" data-table="emergency"
                                               data-target="#Emergency" role="tab" aria-controls="Emergency"
                                               aria-selected="false"><?php echo e(__('Emergency Contacts')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Social_profile"
                                               id="social_profile-tab" data-toggle="tab" data-table="social_profile"
                                               data-target="#Social_profile" role="tab" aria-controls="Social_profile"
                                               aria-selected="false"><?php echo e(__('Social Profile')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Document"
                                               id="document-tab" data-toggle="tab" data-table="document"
                                               data-target="#Document" role="tab" aria-controls="Document"
                                               aria-selected="false"><?php echo e(trans('file.Document')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Qualification"
                                               id="qualification-tab" data-toggle="tab" data-table="qualification"
                                               data-target="#Qualification" role="tab" aria-controls="Qualification"
                                               aria-selected="false"><?php echo e(trans('file.Qualification')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Work_experience"
                                               id="work_experience-tab" data-toggle="tab" data-table="work_experience"
                                               data-target="#Work_experience" role="tab" aria-controls="Work_experience"
                                               aria-selected="false"><?php echo e(__('Work Experience')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Bank_account"
                                               id="bank_account-tab" data-toggle="tab" data-table="bank_account"
                                               data-target="#Bank_account" role="tab" aria-controls="Bank_account"
                                               aria-selected="false"><?php echo e(__('Bank Account')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#Change_Password"
                                               id="change_password-tab" data-toggle="tab" data-table="change_password"
                                               data-target="#Change_Password" role="tab" aria-controls="Change_Password"
                                               aria-selected="false"><?php echo e(__('Change Password')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="Basic" role="tabpanel"
                                             aria-labelledby="basic-tab">
                                            <!--Contents for Basic starts here-->
                                            <?php echo e(__('Basic Information')); ?>

                                            <hr>
                                            <div class="container">
                                                <div class="widget-user-image">
                                                    <img src=<?php echo e(URL::to('/public/uploads/profile_photos')); ?>/<?php echo e($user->profile_photo ?? 'avatar.jpg'); ?>  width='150'
                                                         class='rounded-circle'>
                                                    <div class="mt-2">
                                                        <h4 class="font-weight-bold mb-0"><?php echo e($employee->full_name); ?> <span
                                                                    class="text-muted font-weight-normal">@-<?php echo e($employee->department->department_name); ?></span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <span id="form_result"></span>
                                                <form method="post" id="basic_sample_form" class="form-horizontal"
                                                      enctype="multipart/form-data" autocomplete="off">

                                                    <?php echo csrf_field(); ?>
                                                    <div class="row">

                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(__('First Name')); ?></label>
                                                            <input type="text" name="first_name" id="first_name"
                                                                   placeholder="<?php echo e(__('First Name')); ?>"
                                                                   required class="form-control"
                                                                   value="<?php echo e($employee->first_name); ?>">
                                                        </div>

                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(__('Last Name')); ?></label>
                                                            <input type="text" name="last_name" id="last_name"
                                                                   placeholder="<?php echo e(__('Last Name')); ?>"
                                                                   required class="form-control"
                                                                   value="<?php echo e($employee->last_name); ?>">
                                                        </div>



                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(trans('file.Email')); ?></label>
                                                            <input type="text" name="email" id="email"
                                                                   placeholder="<?php echo e(trans('file.Email')); ?>"
                                                                   required class="form-control"
                                                                   value="<?php echo e($employee->email); ?>">
                                                        </div>

                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(trans('file.Phone')); ?></label>
                                                            <input type="text" name="contact_no" id="contact_no"
                                                                   placeholder="<?php echo e(trans('file.Phone')); ?>"
                                                                   required class="form-control"
                                                                   value="<?php echo e($employee->contact_no); ?>">
                                                        </div>

                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(trans('file.Gender')); ?> *</label>
                                                            <input type="hidden" name="gender_hidden"
                                                                   value="<?php echo e($employee->gender); ?>"/>
                                                            <select name="gender" id="gender"
                                                                    class="selectpicker form-control"
                                                                    data-live-search="true"
                                                                    data-live-search-style="begins"
                                                                    title="<?php echo e(__('Selecting',['key'=>trans('file.Gender')])); ?>...">
                                                                <option value="Male"><?php echo e(trans('file.Male')); ?></option>
                                                                <option value="Female"><?php echo e(trans('file.Female')); ?></option>
                                                                <option value="Other"><?php echo e(trans('file.Other')); ?></option>
                                                            </select>
                                                        </div>


                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(__('Marital Status')); ?> *</label>
                                                            <input type="hidden" name="marital_status_hidden"
                                                                   value="<?php echo e($employee->marital_status); ?>"/>
                                                            <select name="marital_status" id="marital_status"
                                                                    class="selectpicker form-control"
                                                                    data-live-search="true"
                                                                    data-live-search-style="begins"
                                                                    title="<?php echo e(__('Selecting',['key'=>__('Marital Status')])); ?>...">
                                                                <option value="single"><?php echo e(trans('file.Single')); ?></option>
                                                                <option value="married"><?php echo e(trans('file.Married')); ?></option>
                                                                <option value="widowed"><?php echo e(trans('file.Widowed')); ?></option>
                                                                <option value="divorced"><?php echo e(trans('file.Divorced/Separated')); ?></option>
                                                            </select>
                                                        </div>


                                                        <div class="col-md-8 form-group">
                                                            <label><?php echo e(trans('file.Address')); ?> </label>
                                                            <input type="text" name="address" id="address"
                                                                   placeholder="Address"
                                                                   value="<?php echo e($employee->address); ?>" class="form-control">
                                                        </div>

                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(trans('file.City')); ?> </label>
                                                            <input type="text" name="city" id="city"
                                                                   placeholder="<?php echo e(trans('file.City')); ?>"
                                                                   value="<?php echo e($employee->city); ?>" class="form-control">
                                                        </div>

                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(trans('file.State/Province')); ?> </strong>
                                                            </label>
                                                            <input type="text" name="state" id="state"
                                                                   placeholder="<?php echo e(trans('file.State/Province')); ?>"
                                                                   value="<?php echo e($employee->state); ?>" class="form-control">
                                                        </div>

                                                        <div class="col-md-4 form-group">
                                                            <label><?php echo e(trans('file.ZIP')); ?> </label>
                                                            <input type="text" name="zip_code" id="zip_code"
                                                                   placeholder="<?php echo e(trans('file.ZIP')); ?>"
                                                                   value="<?php echo e($employee->zip_code); ?>" class="form-control">
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label><?php echo e(trans('file.Country')); ?></label>
                                                                <select name="country" id="country"
                                                                        class="form-control selectpicker"
                                                                        data-live-search="true"
                                                                        data-live-search-style="begins"
                                                                        title='<?php echo e(__('Selecting',['key'=>trans('file.Country')])); ?>...'>
                                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($country->id); ?>" <?php echo e(($employee->country == $country->id) ? "selected" : ''); ?>><?php echo e($country->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        <?php echo e(trans('file.Save')); ?>

                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </form>
                                            </div>

                                        </div>


                                        <div class="tab-pane fade" id="Immigration" role="tabpanel"
                                             aria-labelledby="immigration-tab">
                                            <?php echo e(__('Assigned Immigration')); ?>

                                            <hr>
                                            <?php echo $__env->make('employee.immigration.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="tab-pane fade" id="Emergency" role="tabpanel"
                                             aria-labelledby="emergency-tab">
                                            <?php echo e(__('Emergency Contacts')); ?>

                                            <hr>
                                            <?php echo $__env->make('employee.emergency_contacts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="tab-pane fade" id="Social_profile" role="tabpanel"
                                             aria-labelledby="social_profile-tab">
                                            <?php echo e(__('Social Profile')); ?>

                                            <hr>
                                            <?php echo $__env->make('employee.social_profile.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="tab-pane fade" id="Document" role="tabpanel"
                                             aria-labelledby="document-tab">
                                            <?php echo e(__('All Documents')); ?>

                                            <hr>
                                            <?php echo $__env->make('employee.documents.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="tab-pane fade" id="Qualification" role="tabpanel"
                                             aria-labelledby="qualification-tab">
                                            <?php echo e(__('All Qualifications')); ?>

                                            <hr>
                                            <?php echo $__env->make('employee.qualifications.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="tab-pane fade" id="Work_experience" role="tabpanel"
                                             aria-labelledby="work_experience-tab">
                                            <?php echo e(__('Work Experience')); ?>

                                            <hr>
                                            <?php echo $__env->make('employee.work_experience.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="tab-pane fade" id="Bank_account" role="tabpanel"
                                             aria-labelledby="bank_account-tab">
                                            <?php echo e(__('Bank Account')); ?>

                                            <hr>
                                            <?php echo $__env->make('employee.bank_account.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <div class="tab-pane fade" id="Change_Password" role="tabpanel"
                                             aria-labelledby="change_password-tab">
                                            <?php echo e(__('Change Password')); ?>

                                            <hr>
                                            <?php echo $__env->make('profile.employee_related.change_password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!--Contents for General Ends here-->
                        </div>
                        <div class="tab-pane fade" id="Profile" role="tabpanel" aria-labelledby="profile-tab">
                            <!--Contents for Profile starts here-->
                            <?php echo e(__('Profile Picture')); ?>

                            <hr>

                        <?php echo $__env->make('employee.profile_picture.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!--Contents for Profile ends here-->
                        </div>

                        <div class="tab-pane fade" id="View_salary" role="tabpanel" aria-labelledby="view_salary-tab">
                            <!--Contents for Contact starts here-->
                            <?php echo e(__('Salary Info')); ?>

                            <hr>
                        <?php echo $__env->make('profile.employee_related.salary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!--Contents for Contact ends here-->
                        </div>

                        <div class="tab-pane fade" id="Leave" role="tabpanel" aria-labelledby="leave-tab">
                            <!--Contents for Contact starts here-->
                            <?php echo e(__('Leave Info')); ?>

                            <hr>
                        <?php echo $__env->make('employee.leave.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!--Contents for Contact ends here-->
                        </div>

                        <div class="tab-pane fade" id="Employee_Core_hr" role="tabpanel"
                             aria-labelledby="employee_core_hr-tab">
                            <!--Contents for Contact starts here-->
                            <?php echo e(__('Core HR')); ?>

                            <hr>
                        <?php echo $__env->make('employee.core_hr.award.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!--Contents for Contact ends here-->
                        </div>

                        <div class="tab-pane fade" id="Employee_project_task" role="tabpanel"
                             aria-labelledby="employee_project_task-tab">
                            <!--Contents for Contact starts here-->
                            <?php echo e(trans('file.Project')); ?> & <?php echo e(trans('file.Task')); ?>

                            <hr>
                        <?php echo $__env->make('employee.project_task.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!--Contents for Contact ends here-->
                        </div>

                        <div class="tab-pane fade" id="Employee_Payslip" role="tabpanel"
                             aria-labelledby="employee_payslip-tab">
                            <!--Contents for Contact starts here-->
                            <?php echo e(trans('file.Payslip')); ?>

                            <hr>
                        <?php echo $__env->make('employee.payslip.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!--Contents for Contact ends here-->
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <script type="text/javascript">
        (function($) {
          "use strict";

          $('select[name="gender"]').val($('input[name="gender_hidden"]').val());
          $('#role_users_id').selectpicker('val', $('input[name="role_user_hidden"]').val());
          $('#marital_status').selectpicker('val', $('input[name="marital_status_hidden"]').val());


          $(document).ready(function () {

              let date = $('.date');
              date.datepicker({
                  format: '<?php echo e(env('Date_Format_JS')); ?>',
                  autoclose: true,
                  todayHighlight: true
              });
          });

          $('[data-table="immigration"]').one('click', function (e) {
              <?php echo $__env->make('employee.immigration.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('[data-table="emergency"]').one('click', function (e) {
              <?php echo $__env->make('employee.emergency_contacts.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('[data-table="document"]').one('click', function (e) {
              <?php echo $__env->make('employee.documents.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('[data-table="qualification"]').one('click', function (e) {
              <?php echo $__env->make('employee.qualifications.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('[data-table="work_experience"]').one('click', function (e) {
              <?php echo $__env->make('employee.work_experience.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('[data-table="bank_account"]').one('click', function (e) {
              <?php echo $__env->make('employee.bank_account.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });



          $('#profile-tab').one('click', function (e) {
              <?php echo $__env->make('employee.profile_picture.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#set_salary-tab').one('click', function (e) {
            <?php echo $__env->make('employee.salary.basic.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#salary_allowance-tab').one('click', function (e) {
              <?php echo $__env->make('employee.salary.allowance.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#salary_commission-tab').one('click', function (e) {
              <?php echo $__env->make('employee.salary.commission.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#salary_loan-tab').one('click', function (e) {
              <?php echo $__env->make('employee.salary.loan.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#salary_deduction-tab').one('click', function (e) {
              <?php echo $__env->make('employee.salary.deduction.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#other_payment-tab').one('click', function (e) {
              <?php echo $__env->make('employee.salary.other_payment.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#salary_overtime-tab').one('click', function (e) {
              <?php echo $__env->make('employee.salary.overtime.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#leave-tab').one('click', function (e) {
              <?php echo $__env->make('employee.leave.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_core_hr-tab').one('click', function (e) {
              <?php echo $__env->make('employee.core_hr.award.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_travel-tab').one('click', function (e) {
              <?php echo $__env->make('employee.core_hr.travel.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_training-tab').one('click', function (e) {
              <?php echo $__env->make('employee.core_hr.training.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_ticket-tab').one('click', function (e) {
              <?php echo $__env->make('employee.core_hr.ticket.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_transfer-tab').one('click', function (e) {
              <?php echo $__env->make('employee.core_hr.transfer.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_promotion-tab').one('click', function (e) {
              <?php echo $__env->make('employee.core_hr.promotion.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_complaint-tab').one('click', function (e) {
              <?php echo $__env->make('employee.core_hr.complaint.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_warning-tab').one('click', function (e) {
              <?php echo $__env->make('employee.core_hr.warning.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_project_task-tab').one('click', function (e) {
              <?php echo $__env->make('employee.project_task.project.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_task-tab').one('click', function (e) {
              <?php echo $__env->make('employee.project_task.task.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });

          $('#employee_payslip-tab').one('click', function (e) {
              <?php echo $__env->make('employee.payslip.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          });


          $('#basic_sample_form').on('submit', function (event) {
              event.preventDefault();
              $.ajax({
                  url: "<?php echo e(route('employee_profile_update',$employee->id)); ?>",
                  method: "POST",
                  data: new FormData(this),
                  contentType: false,
                  cache: false,
                  processData: false,
                  dataType: "json",
                  success: function (data) {
                      var html = '';
                      if (data.errors) {
                          html = '<div class="alert alert-danger">';
                          for (var count = 0; count < data.errors.length; count++) {
                              html += '<p>' + data.errors[count] + '</p>';
                          }
                          html += '</div>';
                      }
                      if (data.success) {
                          html = '<div class="alert alert-success">' + data.success + '</div>';
                          html = '<div class="alert alert-success">' + data.success + '</div>';
                      }
                      $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                  }
              });
          });

          $(function(){

              var hash = window.location.hash;


              if (hash == '#Employee_travel' || hash == '#Employee_ticket') {
                  let a = "#Employee_Core_hr";
                  a && $('ul.nav a[href="' + a + '"]').tab('show');
              }
              else {
                  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
              }

              var tab = hash.toLowerCase() + '-tab';

              $( tab ).trigger( "click" );

              $('.nav-tabs a').on('click', function(e) {
                  $(this).tab('show');

                  var scrollmem = $('body').scrollTop();
                  window.location.hash = this.hash;
                  $('html,body').scrollTop(scrollmem);
              });

              // Change tab on hashchange
              window.addEventListener('hashchange', function() {
                  var changedHash = window.location.hash;
                  changedHash && $('ul.nav a[href="' + changedHash + '"]').tab('show');
              }, false);
          });
        })(jQuery);
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/profile/employee_profile.blade.php ENDPATH**/ ?>