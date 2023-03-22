<?php $__env->startSection('content'); ?>
    <style>
        .nav-tabs li a {
            padding: 0.75rem 1.25rem;
        }

        .nav-tabs.vertical li {
            border: 1px solid #ddd;
            display: block;
            width: 100%
        }

        .tab-pane {
            padding: 15px 0
        }

    </style>
    <section>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-details-employee')): ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2><?php echo e($employee->user->username); ?></h2>
                    </div>
                    <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#General" role="tab"
                               aria-controls="General" aria-selected="true"><?php echo e(trans('file.General')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Profile" role="tab"
                               aria-controls="Profile" aria-selected="false"><?php echo e(trans('file.Profile')); ?></a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" id="set_salary-tab" data-toggle="tab" href="#Set_salary" role="tab"-->
                        <!--       aria-controls="Set_salary" aria-selected="false"><?php echo e(__('Set Salary')); ?></a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link" id="leave-tab" data-toggle="tab" href="#Leave" role="tab"
                               aria-controls="Leave" aria-selected="false"><?php echo e(trans('file.Leave')); ?></a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" id="employee_core_hr-tab" data-toggle="tab" href="#Employee_Core_hr"-->
                        <!--       role="tab" aria-controls="Employee_Core_hr" aria-selected="false"><?php echo e(__('Core HR')); ?></a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" id="employee_project_task-tab" data-toggle="tab"-->
                        <!--       href="#Employee_project_task" role="tab" aria-controls="Employee_project_task"-->
                        <!--       aria-selected="false"><?php echo e(trans('file.Project')); ?> & <?php echo e(trans('file.Task')); ?></a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" id="employee_payslip-tab" data-toggle="tab" href="#Employee_Payslip"-->
                        <!--       role="tab" aria-controls="Employee_Payslip"-->
                        <!--       aria-selected="false"><?php echo e(trans('file.Payslip')); ?></a>-->
                        <!--</li>-->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="General" role="tabpanel"
                             aria-labelledby="general-tab">
                            <!--Contents for General starts here-->
                            <?php echo e(__('General Info')); ?>

                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="nav nav-tabs vertical" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#Basic"
                                               role="tab" aria-controls="Basic"
                                               aria-selected="true"><?php echo e(trans('file.Basic')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('immigrations.show',$employee)); ?>"
                                               id="immigration-tab" data-toggle="tab" data-table="immigration"
                                               data-target="#Immigration" role="tab" aria-controls="Immigration"
                                               aria-selected="false"><?php echo e(trans('file.Immigration')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('contacts.show',$employee)); ?>"
                                               id="emergency-tab" data-toggle="tab" data-table="emergency"
                                               data-target="#Emergency" role="tab" aria-controls="Emergency"
                                               aria-selected="false"><?php echo e(__('Emergency Contacts')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('social_profile.show',$employee)); ?>"
                                               id="social_profile-tab" data-toggle="tab" data-table="social_profile"
                                               data-target="#Social_profile" role="tab" aria-controls="Social_profile"
                                               aria-selected="false"><?php echo e(__('Social Profile')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('documents.show',$employee)); ?>"
                                               id="document-tab" data-toggle="tab" data-table="document"
                                               data-target="#Document" role="tab" aria-controls="Document"
                                               aria-selected="false"><?php echo e(trans('file.Document')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('qualifications.show',$employee)); ?>"
                                               id="qualification-tab" data-toggle="tab" data-table="qualification"
                                               data-target="#Qualification" role="tab" aria-controls="Qualification"
                                               aria-selected="false"><?php echo e(trans('file.Qualification')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('work_experience.show',$employee)); ?>"
                                               id="work_experience-tab" data-toggle="tab" data-table="work_experience"
                                               data-target="#Work_experience" role="tab" aria-controls="Work_experience"
                                               aria-selected="false"><?php echo e(__('Work Experience')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('bank_account.show',$employee)); ?>"
                                               id="bank_account-tab" data-toggle="tab" data-table="bank_account"
                                               data-target="#Bank_account" role="tab" aria-controls="Bank_account"
                                               aria-selected="false"><?php echo e(__('Bank Account')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modify-details-employee')): ?>
                                <div class="col-md-9">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="Basic" role="tabpanel"
                                             aria-labelledby="basic-tab">
                                            <!--Contents for Basic starts here-->
                                            <?php echo e(__('Basic Information')); ?>

                                            <hr>
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
                                                        <label><?php echo e(trans('file.Username')); ?></label>
                                                        <input type="text" name="username" id="username"
                                                               placeholder="<?php echo e(trans('file.Username')); ?>" required
                                                               class="form-control"
                                                               value="<?php echo e($employee->user->username); ?>">
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label>Employee Id</label>
                                                        <input type="text" name="employee_id" id="employee_id"
                                                               placeholder="Employee Id" required
                                                               class="form-control"
                                                               value="<?php echo e($employee->employee_id); ?>">
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label>Nid number</label>
                                                        <input type="text" name="nid" id="nid"
                                                               placeholder="Employee Id" required
                                                               class="form-control"
                                                               value="<?php echo e($employee->nid); ?>">
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label>Father's Name</label>
                                                        <input type="text" name="f_name" id="f_name"
                                                               placeholder="Employee Id" required
                                                               class="form-control"
                                                               value="<?php echo e($employee->f_name); ?>">
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label>Mother's Name</label>
                                                        <input type="text" name="m_name" id="m_name"
                                                               placeholder="Employee Id" required
                                                               class="form-control"
                                                               value="<?php echo e($employee->m_name); ?>">
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label>Present Address</label>
                                                        <input type="text" name="pre_address" id="pre_address"
                                                               placeholder="Employee Id" required
                                                               class="form-control"
                                                               value="<?php echo e($employee->pre_address); ?>">
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label>Permanent Address</label>
                                                        <input type="text" name="p_address" id="p_address"
                                                               placeholder="Employee Id" required
                                                               class="form-control"
                                                               value="<?php echo e($employee->p_address); ?>">
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
                                                        <label><?php echo e(trans('file.State/Province')); ?>

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
                                                                    title="<?php echo e(__('Selecting',['key'=>trans('file.Country')])); ?>...">
                                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($country->id); ?>" <?php echo e(($employee->country == $country->id) ? "selected" : ''); ?>><?php echo e($country->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(__('Date Of Birth')); ?> <span class="text-danger">*</span></label>
                                                        <input type="text" name="date_of_birth" id="date_of_birth"
                                                               required autocomplete="off" class="form-control date"
                                                               value="<?php echo e($employee->date_of_birth); ?>">
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(trans('file.Gender')); ?> <span class="text-danger">*</span></label>
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
                                                        <label><?php echo e(__('Marital Status')); ?> <span class="text-danger">*</span></label>
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

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label><?php echo e(trans('file.Company')); ?> <span class="text-danger">*</span></label>
                                                            <input type="hidden" name="company_id_hidden"
                                                               value="<?php echo e($employee->company_id); ?>"/>
                                                            <select name="company_id" id="company_id"
                                                                    class="form-control selectpicker dynamic"
                                                                    data-live-search="true"
                                                                    data-live-search-style="begins"
                                                                    data-dependent="department_name"
                                                                    data-shift_name="shift_name"
                                                                    title="<?php echo e(__('Selecting',['key'=>trans('file.Company')])); ?>...">
                                                                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($company->id); ?>"><?php echo e($company->company_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label><?php echo e(trans('file.Department')); ?> <span class="text-danger">*</span> </label>
                                                            <input type="hidden" name="department_id_hidden"
                                                               value="<?php echo e($employee->department_id); ?>"/>
                                                            <select name="department_id" id="department_id"
                                                                    class="selectpicker form-control designation"
                                                                    data-live-search="true"
                                                                    data-live-search-style="begins"
                                                                    data-designation_name="designation_name"
                                                                    title="<?php echo e(__('Selecting',['key'=>trans('file.Department')])); ?>...">
                                                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->department_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(trans('file.Designation')); ?> <span class="text-danger">*</span> </label>
                                                        <input type="hidden" name="designation_id_hidden"
                                                               value="<?php echo e($employee->designation_id); ?>"/>
                                                        <select name="designation_id" id="designation_id"
                                                                class="selectpicker form-control"
                                                                data-live-search="true"
                                                                data-live-search-style="begins"
                                                                title="<?php echo e(__('Selecting',['key'=>trans('file.Designation')])); ?>...">
                                                            <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($designation->id); ?>"><?php echo e($designation->designation_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(trans('file.Role')); ?> <span class="text-danger">*</span></label>
                                                        <input type="hidden" name="role_user_hidden"
                                                               value="<?php echo e($employee->role_users_id); ?>"/>
                                                        <select name="role_users_id" id="role_users_id" required <?php if($employee->role_users_id==1): ?> disabled  <?php endif; ?>
                                                                class="selectpicker form-control"
                                                                data-live-search="true"
                                                                data-live-search-style="begins"
                                                                title="<?php echo e(__('Selecting',['key'=>trans('file.Role')])); ?>...">
                                                            
                                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label><?php echo e(trans('file.Status')); ?> <span class="text-danger">*</span></label>
                                                            <input type="hidden" name="status_id_hidden"
                                                               value="<?php echo e($employee->status_id); ?>"/>
                                                            <select name="status_id" id="status_id"
                                                                    class="form-control selectpicker"
                                                                    data-live-search="true"
                                                                    data-live-search-style="begins"
                                                                    title="<?php echo e(__('Selecting',['key'=>trans('file.Status')])); ?>...">
                                                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($status->id); ?>"><?php echo e($status->status_title); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(trans('file.Office Shift')); ?> <span class="text-danger">*</span></label>
                                                        <input type="hidden" name="office_shift_id_hidden"
                                                               value="<?php echo e($employee->office_shift_id); ?>"/>
                                                        <select name="office_shift_id" id="office_shift_id"
                                                                class="selectpicker form-control"
                                                                data-live-search="true"
                                                                data-live-search-style="begins"
                                                                title="<?php echo e(__('Selecting',['key'=>trans('file.Office Shift')])); ?>...">
                                                            <?php $__currentLoopData = $office_shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office_shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($office_shift->id); ?>"><?php echo e($office_shift->shift_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(__('Date Of Joining')); ?> <span class="text-danger">*</span> </label>
                                                        <input type="text" name="joining_date" id="joining_date"
                                                               autocomplete="off" class="form-control date"
                                                               value="<?php echo e($employee->joining_date); ?>">
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(__('Date Of Leaving')); ?></label>
                                                        <input type="text" name="exit_date" id="exit_date"
                                                            class="form-control date"
                                                               value="<?php echo e($employee->exit_date); ?>">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="text-bold"><?php echo e(__('Attendance Type')); ?> <span class="text-danger">*</span></label>
                                                        <select name="attendance_type" id="attendance_type" required class="selectpicker form-control"
                                                                data-live-search="true" data-live-search-style="begins" title="<?php echo e(__('Select Login Type...')); ?>">
                                                                <option value="general" <?php if($employee->attendance_type=='general'): ?> selected  <?php endif; ?>><?php echo e(__('General')); ?></option>
                                                                <option value="ip_based" <?php if($employee->attendance_type=='ip_based'): ?> selected  <?php endif; ?>><?php echo e(__('IP Based')); ?></option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(__('Probation Period')); ?> </label>
                                                        <input type="hidden" name="probation_hidden"
                                                               value="<?php echo e($employee->probation_id); ?>"/>
                                                        <select name="probation_id" id="probation_id" required
                                                                class="selectpicker form-control"
                                                                data-live-search="true"
                                                                data-live-search-style="begins"
                                                                title="<?php echo e(__('Selecting period')); ?>...">
                                                            
                                                            <?php $__currentLoopData = $probation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(__('Total Annual Leave')); ?>  (Year - <?php echo e(date('Y')); ?>)</label>
                                                        <input type="number" min="0" name="total_leave" id="total_leave" autocomplete="off" class="form-control" value="<?php echo e($employee->total_leave); ?>">
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label><?php echo e(__('Remaining Leave')); ?>  (Year - <?php echo e(date('Y')); ?>)</label>
                                                        <input type="number" readonly name="remaining_leave" id="remaining_leave" autocomplete="off" class="form-control" value="<?php echo e($employee->remaining_leave); ?>">
                                                        <small class="text-danger"><i>(Read Only)</i></small>
                                                    </div>


                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4"></div>

                                                    <div class="mt-3 form-group row">
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
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-details-employee')): ?>
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

                        <div class="tab-pane fade" id="Set_salary" role="tabpanel" aria-labelledby="set_salary-tab">
                            <!--Contents for Contact starts here-->
                            <?php echo e(__('Salary Info')); ?>

                            <hr>
                        <?php echo $__env->make('employee.salary.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

                        <!--<div class="tab-pane fade" id="Employee_Payslip" role="tabpanel"-->
                        <!--     aria-labelledby="employee_payslip-tab">-->
                            <!--Contents for Contact starts here-->
                        <!--    <?php echo e(trans('file.Payslip')); ?>-->
                        <!--    <hr>-->
                        <!--<?php echo $__env->make('employee.payslip.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->

                        <!--Contents for Contact ends here-->
                        <!--</div>-->

                    </div>
                </div>
            </div>
        </div>

            <?php endif; ?>

    </section>

    <script type="text/javascript">

        $('select[name="gender"]').val($('input[name="gender_hidden"]').val());
        $('#role_users_id').selectpicker('val', $('input[name="role_user_hidden"]').val());
        $('#probation_id').selectpicker('val', $('input[name="probation_hidden"]').val());
        $('#marital_status').selectpicker('val', $('input[name="marital_status_hidden"]').val());

        $('#company_id').selectpicker('val', $('input[name="company_id_hidden"]').val());
        $('#department_id').selectpicker('val', $('input[name="department_id_hidden"]').val());
        $('#designation_id').selectpicker('val', $('input[name="designation_id_hidden"]').val());

        $('#status_id').selectpicker('val', $('input[name="status_id_hidden"]').val());
        $('#office_shift_id').selectpicker('val', $('input[name="office_shift_id_hidden"]').val());


        $(document).ready(function () {

            let date = $('.date');
            date.datepicker({
                format: '<?php echo e(env('Date_Format_JS')); ?>',
                autoclose: true,
                todayHighlight: true
            });

            let month_year = $('.month_year');
            month_year.datepicker({
                format: "MM-yyyy",
                startView: "months",
                minViewMode: 1,
                autoclose: true,
            }).datepicker("setDate", new Date());
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
           <?php echo $__env->make('employee.salary.basic.index_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> //employee.salary.index_js.blade.php - both are same
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

        $('#salary_pension-tab').one('click', function (e) {
            <?php echo $__env->make('employee.salary.pension_amount_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            var attendance_type = $("#attendance_type").val();
            // console.log(attendance_type);

            $.ajax({
                url: "<?php echo e(route('employees_basicInfo.update',$employee->id)); ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if (data.success) {
                        $('#remaining_leave').val(data.remaining_leave)
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                    }
                    $('#form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                }
            });
        });

        $('.dynamic').change(function () {
            if ($(this).val() !== '') {
                let value = $(this).val();
                let dependent = $(this).data('shift_name');
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "<?php echo e(route('dynamic_office_shifts')); ?>",
                    method: "POST",
                    data: {value: value, _token: _token, dependent: dependent},
                    success: function (result) {
                        $('select').selectpicker("destroy");
                        $('#office_shift_id').html(result);
                        $('#designation_id').html('');
                        $('select').selectpicker();
                    }
                });
            }
        });

        $('.dynamic').change(function () {
            if ($(this).val() !== '') {
                let value = $(this).val();
                let dependent = $(this).data('dependent');
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "<?php echo e(route('dynamic_department')); ?>",
                    method: "POST",
                    data: {value: value, _token: _token, dependent: dependent},
                    success: function (result) {
                        $('select').selectpicker("destroy");
                        $('#department_id').html(result);
                        $('select').selectpicker();
                    }
                });
            }
        });

        $('.designation').change(function () {
            if ($(this).val() !== '') {
                let value = $(this).val();
                let designation_name = $(this).data('designation_name');
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "<?php echo e(route('dynamic_designation_department')); ?>",
                    method: "POST",
                    data: {value: value, _token: _token, designation_name: designation_name},
                    success: function (result) {
                        $('select').selectpicker("destroy");
                        $('#designation_id').html(result);
                        $('select').selectpicker();

                    }
                });
            }
        });

        // Login Type Change
        // $('#login_type').change(function() {
        //     var login_type = $('#login_type').val();
        //     if (login_type=='ip') {
        //         data = '<label class="text-bold"><?php echo e(__("IP Address")); ?> <span class="text-danger">*</span></label>';
        //         data += '<input type="text" name="ip_address" id="ip_address" placeholder="Type IP Address" required class="form-control">';
        //         $('#ipField').html(data)
        //     }else{
        //         $('#ipField').empty();
        //     }
        // });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/dashboard.blade.php ENDPATH**/ ?>