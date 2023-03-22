<?php $__env->startSection('content'); ?>


    <link rel="stylesheet" href="<?php echo asset('public/css/kendo.default.v2.min.css') ?>" type="text/css">

    <script type="text/javascript" src="<?php echo asset('public/js/kendo.all.min.js') ?>"></script>

    <section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <span id="form_result_permission"></span>

                    <h1 class="text-center mt-2"><?php echo e($role->name); ?></h1>
                    <p><?php echo e(__('You can assign permission for this role')); ?></p>

                    <div id="all_resources">
                        <div class="demo-section k-content">

                            <h4><?php echo e(__('Select modules')); ?></h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="treeview1"></div>
                                </div>
                                <div class="col-md-4">
                                    <div  id="treeview2"></div>
                                </div>
                                <div class="col-md-4">
                                    <div id="treeview3"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-md-6 offset-md-3">
                            <input id="role_id" type="hidden" name="role_id" value=<?php echo e($role->id); ?>>
                            <button class="btn btn-primary btn-block" id="set_permission_btn" type="submit" class="roles-btn btn-primary">
                                <?php echo e(__('Submit')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        (function($) {
            "use strict";

            var checkedNodes;


            $(document).ready(function () {

                $("ul#setting").siblings('a').attr('aria-expanded', 'true');
                $("ul#setting").addClass("show");
                $("ul#setting #role-menu").addClass("active");

                var target = '<?php echo e(route('permissionDetails',$role->id)); ?>';
                $.ajax({
                    type: "GET",
                    url: target,
                    dataType: 'json',
                    success: function (result) {

                        $("#treeview1").empty();
                        $("#treeview1").kendoTreeView({
                            checkboxes: {
                                checkChildren: true
                            },

                            check: onCheck,

                            dataSource: [
                                {
                                    id: 'user',
                                    text: "<?php echo e(trans('User')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('user', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-user',
                                            text: '<?php echo e(__('View User')); ?>',
                                            checked: ($.inArray('view-user', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'store-user',
                                            text: '<?php echo e(__('Add User')); ?>',
                                            checked: ($.inArray('store-user', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'edit-user',
                                            text: '<?php echo e(__('Edit User')); ?>',
                                            checked: ($.inArray('edit-user', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'delete-user',
                                            text: "<?php echo e(__('Delete User')); ?>",
                                            checked: ($.inArray('delete-user', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'last-login-user',
                                            text: "<?php echo e(__('Users Last Login')); ?>",
                                            checked: ($.inArray('last-login-user', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'role-access-user',
                                            text: "<?php echo e(__('Assign Role')); ?>",
                                            checked: ($.inArray('role-access-user', result) >= 0) ? true : false
                                        }
                                        // {
                                        //     id: 'assign-role',
                                        //     text: '<?php echo e(__('Assign Role')); ?>',
                                        //     checked: ($.inArray('assign-role', result) >= 0) ? true : false
                                        // },
                                    ]
                                },
                                {
                                    id: 'details-employee',
                                    text: "<?php echo e(trans('Employee Details')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('details-employee', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-details-employee',
                                            text: '<?php echo e(__('View Employee Details')); ?>',
                                            checked: ($.inArray('view-details-employee', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'store-details-employee',
                                            text: '<?php echo e(__('Add Employee Details')); ?>',
                                            checked: ($.inArray('store-details-employee', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'modify-details-employee',
                                            text: '<?php echo e(__('Modify Employee Details')); ?>',
                                            checked: ($.inArray('modify-details-employee', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'import-employee',
                                            text: '<?php echo e(__('Import Employee')); ?>',
                                            checked: ($.inArray('import-employee', result) >= 0) ? true : false
                                        },
                                    ]
                                },

                                {
                                    id: 'customize-setting',
                                    text: "<?php echo e(__('Customize Setting')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('customize-setting', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'role',
                                            text: "<?php echo e(trans('Role')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('role', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-role',
                                                    text: '<?php echo e(__('View Role')); ?>',
                                                    checked: ($.inArray('view-role', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-role',
                                                    text: '<?php echo e(__('Add Role')); ?>',
                                                    checked: ($.inArray('store-role', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-role',
                                                    text: '<?php echo e(__('Edit Role')); ?>',
                                                    checked: ($.inArray('edit-role', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-role',
                                                    text: "<?php echo e(__('Delete Role')); ?>",
                                                    checked: ($.inArray('delete-role', result) >= 0) ? true : false
                                                },
                                                // {
                                                //     id: 'assign-role',
                                                //     text: '<?php echo e(__('Assign Role')); ?>',
                                                //     checked: ($.inArray('assign-role', result) >= 0) ? true : false
                                                // },
                                                {
                                                    id: 'set-permission',
                                                    text: '<?php echo e(__('Set Permission')); ?>',
                                                    checked: ($.inArray('set-permission', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'general-setting',
                                            text: "<?php echo e(__('General Setting')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('general-setting', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-general-setting',
                                                    text: '<?php echo e(__('View General Setting')); ?>',
                                                    checked: ($.inArray('view-general-setting', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-general-setting',
                                                    text: '<?php echo e(__('Store General Setting')); ?>',
                                                    checked: ($.inArray('store-general-setting', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'mail-setting',
                                            text: "<?php echo e(__('Mail Setting')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('mail-setting', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-mail-setting',
                                                    text: '<?php echo e(__('View Mail Setting')); ?>',
                                                    checked: ($.inArray('view-mail-setting', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-mail-setting',
                                                    text: '<?php echo e(__('Store Mail Setting')); ?>',
                                                    checked: ($.inArray('store-mail-setting', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'access-variable_type',
                                            text: '<?php echo e(__('Access Variable Type')); ?>',
                                            checked: ($.inArray('access-variable_type', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'access-variable_method',
                                            text: '<?php echo e(__('Access Variable Method')); ?>',
                                            checked: ($.inArray('access-variable_method', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'access-language',
                                            text: '<?php echo e(__('Access Language')); ?>',
                                            checked: ($.inArray('access-language', result) >= 0) ? true : false
                                        },
                                    ]
                                },

                                {
                                    id: 'core_hr',
                                    text: "<?php echo e(trans('Core HR')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('core_hr', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-calendar',
                                            text: '<?php echo e(__('View Calendar')); ?>',
                                            checked: ($.inArray('view-calendar', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'promotion',
                                            text: "<?php echo e(trans('Promotion')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('promotion', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-promotion',
                                                    text: '<?php echo e(__('View Promotion')); ?>',
                                                    checked: ($.inArray('view-promotion', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-promotion',
                                                    text: '<?php echo e(__('Add Promotion')); ?>',
                                                    checked: ($.inArray('store-promotion', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-promotion',
                                                    text: '<?php echo e(__('Edit Promotion')); ?>',
                                                    checked: ($.inArray('edit-promotion', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-promotion',
                                                    text: "<?php echo e(__('Delete Promotion')); ?>",
                                                    checked: ($.inArray('delete-promotion', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'award',
                                            text: "<?php echo e(trans('Award')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('award', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-award',
                                                    text: '<?php echo e(__('View Award')); ?>',
                                                    checked: ($.inArray('view-award', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-award',
                                                    text: '<?php echo e(__('Add Award')); ?>',
                                                    checked: ($.inArray('store-award', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-award',
                                                    text: '<?php echo e(__('Edit Award')); ?>',
                                                    checked: ($.inArray('edit-award', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-award',
                                                    text: "<?php echo e(__('Delete Award')); ?>",
                                                    checked: ($.inArray('delete-award', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'transfer',
                                            text: "<?php echo e(trans('Transfer')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('transfer', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-transfer',
                                                    text: '<?php echo e(__('View Transfer ')); ?>',
                                                    checked: ($.inArray('view-transfer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-transfer',
                                                    text: '<?php echo e(__('Add Transfer')); ?>',
                                                    checked: ($.inArray('store-transfer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-transfer',
                                                    text: '<?php echo e(__('Edit Transfer')); ?>',
                                                    checked: ($.inArray('edit-transfer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-transfer',
                                                    text: "<?php echo e(__('Delete Transfer')); ?>",
                                                    checked: ($.inArray('delete-transfer', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'travel',
                                            text: "<?php echo e(trans('Travel')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('travel', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-travel',
                                                    text: '<?php echo e(__('View Travel ')); ?>',
                                                    checked: ($.inArray('view-travel', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-travel',
                                                    text: '<?php echo e(__('Add Travel')); ?>',
                                                    checked: ($.inArray('store-travel', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-transfer',
                                                    text: '<?php echo e(__('Edit Travel')); ?>',
                                                    checked: ($.inArray('edit-travel', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-travel',
                                                    text: "<?php echo e(__('Delete Travel')); ?>",
                                                    checked: ($.inArray('delete-travel', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'resignation',
                                            text: "<?php echo e(trans('Resignation')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('resignation', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-resignation',
                                                    text: '<?php echo e(__('View Resignation')); ?>',
                                                    checked: ($.inArray('view-resignation', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-resignation',
                                                    text: '<?php echo e(__('Add Resignation')); ?>',
                                                    checked: ($.inArray('store-resignation', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-promotion',
                                                    text: '<?php echo e(__('Edit Resignation')); ?>',
                                                    checked: ($.inArray('edit-promotion', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-resignation',
                                                    text: "<?php echo e(__('Delete Resignation')); ?>",
                                                    checked: ($.inArray('delete-resignation', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'complaint',
                                            text: "<?php echo e(trans('Complaint')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('complaint', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-complaint',
                                                    text: '<?php echo e(__('View Complaint')); ?>',
                                                    checked: ($.inArray('view-complaint', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-complaint',
                                                    text: '<?php echo e(__('Add Complaint')); ?>',
                                                    checked: ($.inArray('store-complaint', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-complaint',
                                                    text: '<?php echo e(__('Edit Complaint')); ?>',
                                                    checked: ($.inArray('edit-complaint', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-complaint',
                                                    text: "<?php echo e(__('Delete Complaint')); ?>",
                                                    checked: ($.inArray('delete-complaint', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'warning',
                                            text: "<?php echo e(trans('Warning')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('warning', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-warning',
                                                    text: '<?php echo e(__('View Warning ')); ?>',
                                                    checked: ($.inArray('view-warning', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-warning',
                                                    text: '<?php echo e(__('Add Warning')); ?>',
                                                    checked: ($.inArray('store-warning', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-warning',
                                                    text: '<?php echo e(__('Edit Warning')); ?>',
                                                    checked: ($.inArray('edit-warning', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-warning',
                                                    text: "<?php echo e(__('Delete Warning')); ?>",
                                                    checked: ($.inArray('delete-warning', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'termination',
                                            text: "<?php echo e(trans('Termination')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('termination', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-termination',
                                                    text: '<?php echo e(__('View Termination')); ?>',
                                                    checked: ($.inArray('view-termination', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-termination',
                                                    text: '<?php echo e(__('Add Termination')); ?>',
                                                    checked: ($.inArray('store-termination', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-termination',
                                                    text: '<?php echo e(__('Edit Termination')); ?>',
                                                    checked: ($.inArray('edit-termination', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-termination',
                                                    text: "<?php echo e(__('Delete Termination')); ?>",
                                                    checked: ($.inArray('delete-termination', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },

                                {
                                    id: 'timesheet',
                                    text: "<?php echo e(trans('Timesheet')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('timesheet', result) >= 0) ? true : false,
                                    items: [

                                        {
                                            id: 'attendance',
                                            text: "<?php echo e(trans('Attendance')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('attendance', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-attendance',
                                                    text: '<?php echo e(__('View Attendance ')); ?>',
                                                    checked: ($.inArray('view-attendance', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-attendance',
                                                    text: '<?php echo e(__('Edit Attendance')); ?>',
                                                    checked: ($.inArray('edit-attendance', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-attendance',
                                                    text: "<?php echo e(__('Delete Attendance')); ?>",
                                                    checked: ($.inArray('delete-attendance', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'import-attendance',
                                                    text: '<?php echo e(__('Import Attendance')); ?>',
                                                    checked: ($.inArray('import-attendance', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'office_shift',
                                            text: "<?php echo e(trans('Office Shift')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('office_shift', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-office_shift',
                                                    text: '<?php echo e(__('View Office Shift')); ?>',
                                                    checked: ($.inArray('view-office_shift', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-office_shift',
                                                    text: '<?php echo e(__('Add Office Shift')); ?>',
                                                    checked: ($.inArray('store-office_shift', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-office_shift',
                                                    text: '<?php echo e(__('Edit Office Shift')); ?>',
                                                    checked: ($.inArray('edit-office_shift', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-office_shift',
                                                    text: "<?php echo e(__('Delete Office Shift')); ?>",
                                                    checked: ($.inArray('delete-office_shift', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'holiday',
                                            text: "<?php echo e(trans('Holiday')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('holiday', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-holiday',
                                                    text: '<?php echo e(__('View Holiday')); ?>',
                                                    checked: ($.inArray('view-holiday', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-holiday',
                                                    text: '<?php echo e(__('Add Holiday')); ?>',
                                                    checked: ($.inArray('store-holiday', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-holiday',
                                                    text: '<?php echo e(__('Edit Holiday')); ?>',
                                                    checked: ($.inArray('edit-holiday', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-holiday',
                                                    text: "<?php echo e(__('Delete Holiday')); ?>",
                                                    checked: ($.inArray('delete-holiday', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'leave',
                                            text: "<?php echo e(trans('Leave')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('leave', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-leave',
                                                    text: '<?php echo e(__('View Leave')); ?>',
                                                    checked: ($.inArray('view-leave', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-leave',
                                                    text: '<?php echo e(__('Add Leave')); ?>',
                                                    checked: ($.inArray('store-leave', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-leave',
                                                    text: '<?php echo e(__('Edit Leave')); ?>',
                                                    checked: ($.inArray('edit-leave', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-leave',
                                                    text: "<?php echo e(__('Delete Leave')); ?>",
                                                    checked: ($.inArray('delete-leave', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },
                            ]
                        });

                        $("#treeview2").empty();
                        $("#treeview2").kendoTreeView({
                            checkboxes: {
                                checkChildren: true
                            },

                            check: onCheck,

                            dataSource: [

                                {
                                    id: 'payment-module',
                                    text: "<?php echo e(trans('Payment Module')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('payment-module', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-payslip',
                                            text: '<?php echo e(__('View Payslip')); ?>',
                                            checked: ($.inArray('view-payslip', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'make-payment',
                                            text: '<?php echo e(__('Make Payment')); ?>',
                                            checked: ($.inArray('make-payment', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'make-bulk_payment',
                                            text: '<?php echo e(__('Make Bulk Payment')); ?>',
                                            checked: ($.inArray('make-bulk_payment', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'view-paylist',
                                            text: "<?php echo e(__('View Paylist')); ?>",
                                            checked: ($.inArray('view-paylist', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'set-salary',
                                            text: "<?php echo e(__('Set Salary')); ?>",
                                            checked: ($.inArray('set-salary', result) >= 0) ? true : false
                                        },
                                    ]
                                },

                                {
                                    id: 'hr_report',
                                    text: "<?php echo e(trans('Report Module')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('hr_report', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'report-payslip',
                                            text: '<?php echo e(__('Payslip Report')); ?>',
                                            checked: ($.inArray('report-payslip', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-attendance',
                                            text: '<?php echo e(__('Attendance Report')); ?>',
                                            checked: ($.inArray('report-attendance', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-training',
                                            text: '<?php echo e(__('Training Report')); ?>',
                                            checked: ($.inArray('report-training', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-project',
                                            text: '<?php echo e(__('Project Report')); ?>',
                                            checked: ($.inArray('report-project', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-task',
                                            text: '<?php echo e(__('Task Report')); ?>',
                                            checked: ($.inArray('report-task', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-employee',
                                            text: '<?php echo e(__('Employee Report')); ?>',
                                            checked: ($.inArray('report-employee', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-account',
                                            text: '<?php echo e(__('Account Report')); ?>',
                                            checked: ($.inArray('report-account', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-deposit',
                                            text: '<?php echo e(__('Deposit Report')); ?>',
                                            checked: ($.inArray('report-deposit', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-expense',
                                            text: '<?php echo e(__('Expense Report')); ?>',
                                            checked: ($.inArray('report-expense', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'report-transaction',
                                            text: '<?php echo e(__('Transaction Report')); ?>',
                                            checked: ($.inArray('report-transaction', result) >= 0) ? true : false
                                        },
                                    ]
                                },

                                {
                                    id: 'recruitment',
                                    text: "<?php echo e(__('Recruitment')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('recruitment', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'job_post',
                                            text: "<?php echo e(trans('Job Post')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('job_post', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-job_post',
                                                    text: '<?php echo e(__('View Job Post')); ?>',
                                                    checked: ($.inArray('view-job_post', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-job_post',
                                                    text: '<?php echo e(__('Add Job Post')); ?>',
                                                    checked: ($.inArray('store-job_post', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-job_post',
                                                    text: '<?php echo e(__('Edit Job Post')); ?>',
                                                    checked: ($.inArray('edit-job_post', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-job_post',
                                                    text: "<?php echo e(__('Delete Job Post')); ?>",
                                                    checked: ($.inArray('delete-job_post', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'job_candidate',
                                            text: "<?php echo e(trans('Job Candidate')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('job_candidate', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-job_candidate',
                                                    text: '<?php echo e(__('View Job Candidate')); ?>',
                                                    checked: ($.inArray('view-job_candidate', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-job_candidate',
                                                    text: "<?php echo e(__('Delete Job Candidate')); ?>",
                                                    checked: ($.inArray('delete-job_candidate', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'job_interview',
                                            text: "<?php echo e(trans('Job Interview')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('job_interview', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-job_interview',
                                                    text: '<?php echo e(__('View Job Interview')); ?>',
                                                    checked: ($.inArray('view-job_interview', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-job_interview',
                                                    text: "<?php echo e(__('Store Job Interview')); ?>",
                                                    checked: ($.inArray('store-job_interview', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-job_interview',
                                                    text: "<?php echo e(__('Delete Job Interview')); ?>",
                                                    checked: ($.inArray('delete-job_interview', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'cms',
                                            text: "<?php echo e(__('CMS')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('cms', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-cms',
                                                    text: '<?php echo e(__('View CMS')); ?>',
                                                    checked: ($.inArray('view-cms', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-cms',
                                                    text: "<?php echo e(__('Add CMS')); ?>",
                                                    checked: ($.inArray('store-cms', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },

                                {
                                    id: 'project-management',
                                    text: "<?php echo e(trans('Project Management')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('project-management', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'project',
                                            text: "<?php echo e(trans('Project')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('project', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-project',
                                                    text: '<?php echo e(__('View Project')); ?>',
                                                    checked: ($.inArray('view-project', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-project',
                                                    text: '<?php echo e(__('Add Project')); ?>',
                                                    checked: ($.inArray('store-project', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-project',
                                                    text: '<?php echo e(__('Edit Project')); ?>',
                                                    checked: ($.inArray('edit-project', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-project',
                                                    text: "<?php echo e(__('Delete Project')); ?>",
                                                    checked: ($.inArray('delete-project', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'assign-project',
                                                    text: '<?php echo e(__('Assign Project')); ?>',
                                                    checked: ($.inArray('assign-project', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'task',
                                            text: "<?php echo e(trans('Task')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('task', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-task',
                                                    text: '<?php echo e(__('View Task')); ?>',
                                                    checked: ($.inArray('view-task', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-task',
                                                    text: '<?php echo e(__('Add Task')); ?>',
                                                    checked: ($.inArray('store-task', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-task',
                                                    text: '<?php echo e(__('Edit Task')); ?>',
                                                    checked: ($.inArray('edit-task', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-task',
                                                    text: "<?php echo e(__('Delete Task')); ?>",
                                                    checked: ($.inArray('delete-task', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'assign-task',
                                                    text: "<?php echo e(__('Assign Task')); ?>",
                                                    checked: ($.inArray('assign-task', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'client',
                                            text: "<?php echo e(trans('Client')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('client', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-client',
                                                    text: '<?php echo e(__('View Client')); ?>',
                                                    checked: ($.inArray('view-client', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-client',
                                                    text: '<?php echo e(__('Add Client')); ?>',
                                                    checked: ($.inArray('store-client', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-client',
                                                    text: '<?php echo e(__('Edit Client')); ?>',
                                                    checked: ($.inArray('edit-client', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-client',
                                                    text: "<?php echo e(__('Delete Client')); ?>",
                                                    checked: ($.inArray('delete-client', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'invoice',
                                            text: "<?php echo e(trans('Invoice')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('invoice', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-invoice',
                                                    text: '<?php echo e(__('View Invoice')); ?>',
                                                    checked: ($.inArray('view-invoice', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-invoice',
                                                    text: '<?php echo e(__('Add Invoice')); ?>',
                                                    checked: ($.inArray('store-invoice', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-invoice',
                                                    text: '<?php echo e(__('Edit Invoice')); ?>',
                                                    checked: ($.inArray('edit-invoice', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-invoice',
                                                    text: "<?php echo e(__('Delete Invoice')); ?>",
                                                    checked: ($.inArray('delete-invoice', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },


                                {
                                    id: 'ticket',
                                    text: "<?php echo e(trans('Ticket')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('ticket', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-ticket',
                                            text: '<?php echo e(__('View Ticket')); ?>',
                                            checked: ($.inArray('view-ticket', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'store-ticket',
                                            text: '<?php echo e(__('Add Ticket')); ?>',
                                            checked: ($.inArray('store-ticket', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'edit-ticket',
                                            text: '<?php echo e(__('Edit Ticket')); ?>',
                                            checked: ($.inArray('edit-ticket', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'delete-ticket',
                                            text: "<?php echo e(__('Delete Ticket')); ?>",
                                            checked: ($.inArray('delete-ticket', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'assign-ticket',
                                            text: '<?php echo e(__('Assign Ticket')); ?>',
                                            checked: ($.inArray('assign-ticket', result) >= 0) ? true : false
                                        },
                                    ]
                                },

                                {
                                    id: 'file_module',
                                    text: "<?php echo e(trans('File Module')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('file_module', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'file_manager',
                                            text: "<?php echo e(trans('File Manager')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('file_manager', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-file_manager',
                                                    text: '<?php echo e(__('View File Manager')); ?>',
                                                    checked: ($.inArray('view-file_manager', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-file_manager',
                                                    text: '<?php echo e(__('Add File Manager')); ?>',
                                                    checked: ($.inArray('store-file_manager', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-file_manager',
                                                    text: '<?php echo e(__('Edit File Manager')); ?>',
                                                    checked: ($.inArray('edit-file_manager', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-file_manager',
                                                    text: "<?php echo e(__('Delete File Manager')); ?>",
                                                    checked: ($.inArray('delete-file_manager', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'view-file_config',
                                                    text: "<?php echo e(__('Access File Config')); ?>",
                                                    checked: ($.inArray('view-file_config', result) >= 0) ? true : false
                                                },


                                            ]
                                        },
                                        {
                                            id: 'official_document',
                                            text: "<?php echo e(trans('Official Document')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('official_document', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-official_document',
                                                    text: '<?php echo e(__('View Official Document')); ?>',
                                                    checked: ($.inArray('view-official_document', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-office_shift',
                                                    text: '<?php echo e(__('Add Official Document')); ?>',
                                                    checked: ($.inArray('store-office_shift', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-official_document',
                                                    text: '<?php echo e(__('Edit Office Shift')); ?>',
                                                    checked: ($.inArray('edit-official_document', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-official_document',
                                                    text: "<?php echo e(__('Delete Official Document')); ?>",
                                                    checked: ($.inArray('delete-official_document', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },


                                {
                                    id: 'event-meeting',
                                    text: "<?php echo e(trans('Event and Meeting')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('event-meeting', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'meeting',
                                            text: "<?php echo e(trans('Meeting')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('meeting', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-meeting',
                                                    text: '<?php echo e(__('View Meeting')); ?>',
                                                    checked: ($.inArray('view-meeting', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-meeting',
                                                    text: '<?php echo e(__('Add Location')); ?>',
                                                    checked: ($.inArray('store-meeting', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-meeting',
                                                    text: '<?php echo e(__('Edit Location')); ?>',
                                                    checked: ($.inArray('edit-meeting', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-meeting',
                                                    text: "<?php echo e(__('Delete Location')); ?>",
                                                    checked: ($.inArray('delete-meeting', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'event',
                                            text: "<?php echo e(trans('Event')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('event', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-event',
                                                    text: '<?php echo e(__('View Event')); ?>',
                                                    checked: ($.inArray('view-event', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-event',
                                                    text: '<?php echo e(__('Add Event')); ?>',
                                                    checked: ($.inArray('store-event', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-event',
                                                    text: '<?php echo e(__('Edit Event')); ?>',
                                                    checked: ($.inArray('edit-event', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-event',
                                                    text: "<?php echo e(__('Delete Event')); ?>",
                                                    checked: ($.inArray('delete-event', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },

                                {
                                    id: 'assets-and-category',
                                    text: "<?php echo e(trans('Assets And Category')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('assets-and-category', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'category',
                                            text: "<?php echo e(__('Category')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('category', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-assets-category',
                                                    text: '<?php echo e(__('View Category')); ?>',
                                                    checked: ($.inArray('view-assets-category', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-assets-category',
                                                    text: '<?php echo e(__('Add Category')); ?>',
                                                    checked: ($.inArray('store-assets-category', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-assets-category',
                                                    text: '<?php echo e(__('Edit Category')); ?>',
                                                    checked: ($.inArray('edit-assets-category', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-assets-category',
                                                    text: "<?php echo e(__('Delete Category')); ?>",
                                                    checked: ($.inArray('delete-assets-category', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'assets',
                                            text: "<?php echo e(trans('Asset')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('assets', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-assets',
                                                    text: '<?php echo e(__('View Asset')); ?>',
                                                    checked: ($.inArray('view-assets', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-assets',
                                                    text: '<?php echo e(__('Add Asset')); ?>',
                                                    checked: ($.inArray('store-assets', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-assets',
                                                    text: '<?php echo e(__('Edit Asset')); ?>',
                                                    checked: ($.inArray('edit-assets', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-assets',
                                                    text: "<?php echo e(__('Delete Asset')); ?>",
                                                    checked: ($.inArray('delete-assets', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },
                            ]
                        });

                        $("#treeview3").empty();
                        $("#treeview3").kendoTreeView({
                            checkboxes: {
                                checkChildren: true
                            },

                            check: onCheck,

                            dataSource: [
                                {
                                    id: 'finance',
                                    text: "<?php echo e(trans('Finance')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('finance', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'account',
                                            text: "<?php echo e(trans('Account')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('account', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-account',
                                                    text: '<?php echo e(__('View Account')); ?>',
                                                    checked: ($.inArray('view-account', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-account',
                                                    text: '<?php echo e(__('Add Account')); ?>',
                                                    checked: ($.inArray('store-account', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-account',
                                                    text: '<?php echo e(__('Edit Account')); ?>',
                                                    checked: ($.inArray('edit-account', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-account',
                                                    text: "<?php echo e(__('Delete Account')); ?>",
                                                    checked: ($.inArray('delete-account', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'view-transaction',
                                                    text: '<?php echo e(__('View Transaction')); ?>',
                                                    checked: ($.inArray('view-transaction', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'view-balance_transfer',
                                                    text: '<?php echo e(__('View Balance Transfer')); ?>',
                                                    checked: ($.inArray('view-balance_transfer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-balance_transfer',
                                                    text: '<?php echo e(__('Store Balance Transfer')); ?>',
                                                    checked: ($.inArray('store-balance_transfer', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'expense',
                                            text: "<?php echo e(trans('Expense')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('expense', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-expense',
                                                    text: '<?php echo e(__('View Expense')); ?>',
                                                    checked: ($.inArray('view-expense', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-expense',
                                                    text: '<?php echo e(__('Add Event')); ?>',
                                                    checked: ($.inArray('store-expense', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-expense',
                                                    text: '<?php echo e(__('Edit Expense')); ?>',
                                                    checked: ($.inArray('edit-expense', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-expense',
                                                    text: "<?php echo e(__('Delete Expense')); ?>",
                                                    checked: ($.inArray('delete-expense', result) >= 0) ? true : false
                                                },
                                            ]
                                        },


                                        {
                                            id: 'deposit',
                                            text: "<?php echo e(trans('Deposit')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('deposit', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-deposit',
                                                    text: '<?php echo e(__('View Deposit')); ?>',
                                                    checked: ($.inArray('view-deposit', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-deposit',
                                                    text: '<?php echo e(__('Add Deposit')); ?>',
                                                    checked: ($.inArray('store-deposit', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-deposit',
                                                    text: '<?php echo e(__('Edit Deposit')); ?>',
                                                    checked: ($.inArray('edit-deposit', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-deposit',
                                                    text: "<?php echo e(__('Delete Deposit')); ?>",
                                                    checked: ($.inArray('delete-deposit', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'payer',
                                            text: "<?php echo e(trans('Payer')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('payer', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-payer',
                                                    text: '<?php echo e(__('View Payer')); ?>',
                                                    checked: ($.inArray('view-payer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-payer',
                                                    text: '<?php echo e(__('Add Payer')); ?>',
                                                    checked: ($.inArray('store-payer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-payer',
                                                    text: '<?php echo e(__('Edit Payer')); ?>',
                                                    checked: ($.inArray('edit-payer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-payer',
                                                    text: "<?php echo e(__('Delete Payer')); ?>",
                                                    checked: ($.inArray('delete-payer', result) >= 0) ? true : false
                                                },
                                            ]
                                        },

                                        {
                                            id: 'payee',
                                            text: "<?php echo e(trans('payee')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('payee', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-payee',
                                                    text: '<?php echo e(__('View payee')); ?>',
                                                    checked: ($.inArray('view-payer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-payee',
                                                    text: '<?php echo e(__('Add payee')); ?>',
                                                    checked: ($.inArray('store-payee', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-payee',
                                                    text: '<?php echo e(__('Edit payee')); ?>',
                                                    checked: ($.inArray('edit-payee', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-payee',
                                                    text: "<?php echo e(__('Delete payee')); ?>",
                                                    checked: ($.inArray('delete-payee', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },
                                {
                                    id: 'training_module',
                                    text: "<?php echo e(trans('Training Module')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('training_module', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'trainer',
                                            text: "<?php echo e(trans('Trainer')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('trainer', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-trainer',
                                                    text: '<?php echo e(__('View Trainer')); ?>',
                                                    checked: ($.inArray('view-trainer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-trainer',
                                                    text: '<?php echo e(__('Add Trainer')); ?>',
                                                    checked: ($.inArray('store-trainer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-trainer',
                                                    text: '<?php echo e(__('Edit Trainer')); ?>',
                                                    checked: ($.inArray('edit-trainer', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-trainer',
                                                    text: "<?php echo e(__('Delete Trainer')); ?>",
                                                    checked: ($.inArray('delete-trainer', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'training',
                                            text: "<?php echo e(trans('Training')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('training', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-training',
                                                    text: '<?php echo e(__('View Training')); ?>',
                                                    checked: ($.inArray('view-training', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-training',
                                                    text: '<?php echo e(__('Add Training')); ?>',
                                                    checked: ($.inArray('store-training', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-training',
                                                    text: '<?php echo e(__('Edit Training')); ?>',
                                                    checked: ($.inArray('edit-training', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-training',
                                                    text: "<?php echo e(__('Delete Training')); ?>",
                                                    checked: ($.inArray('delete-training', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },

                                {
                                    id: 'announcement',
                                    text: "<?php echo e(trans('Announcement')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('announcement', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'store-announcement',
                                            text: '<?php echo e(__('Add Announcement')); ?>',
                                            checked: ($.inArray('store-announcement', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'edit-announcement',
                                            text: '<?php echo e(__('Edit Announcement')); ?>',
                                            checked: ($.inArray('edit-announcement', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'delete-announcement',
                                            text: "<?php echo e(__('Delete Announcement')); ?>",
                                            checked: ($.inArray('delete-announcement', result) >= 0) ? true : false
                                        },
                                    ]
                                },

                                {
                                    id: 'company',
                                    text: "<?php echo e(trans('Company')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('company', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-company',
                                            text: '<?php echo e(__('View Company')); ?>',
                                            checked: ($.inArray('view-company', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'store-company',
                                            text: '<?php echo e(__('Add Company')); ?>',
                                            checked: ($.inArray('store-company', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'edit-company',
                                            text: '<?php echo e(__('Edit Company')); ?>',
                                            checked: ($.inArray('edit-company', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'delete-company',
                                            text: "<?php echo e(__('Delete Company')); ?>",
                                            checked: ($.inArray('delete-company', result) >= 0) ? true : false
                                        },
                                    ]
                                },

                                {
                                    id: 'department',
                                    text: "<?php echo e(trans('Department')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('department', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-department',
                                            text: '<?php echo e(__('View Department')); ?>',
                                            checked: ($.inArray('view-department', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'store-department',
                                            text: '<?php echo e(__('Add Department')); ?>',
                                            checked: ($.inArray('store-department', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'edit-department',
                                            text: '<?php echo e(__('Edit Department')); ?>',
                                            checked: ($.inArray('edit-department', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'delete-department',
                                            text: "<?php echo e(__('Delete Department')); ?>",
                                            checked: ($.inArray('delete-department', result) >= 0) ? true : false
                                        },
                                    ]
                                },
                                {
                                    id: 'designation',
                                    text: "<?php echo e(trans('Designation')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('designation', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-designation',
                                            text: '<?php echo e(__('View Designation')); ?>',
                                            checked: ($.inArray('view-designation', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'store-designation',
                                            text: '<?php echo e(__('Add Designation')); ?>',
                                            checked: ($.inArray('store-designation', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'edit-designation',
                                            text: '<?php echo e(__('Edit Designation')); ?>',
                                            checked: ($.inArray('edit-designation', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'delete-designation',
                                            text: "<?php echo e(__('Delete Designation')); ?>",
                                            checked: ($.inArray('delete-designation', result) >= 0) ? true : false
                                        },
                                    ]
                                },
                                {
                                    id: 'location',
                                    text: "<?php echo e(trans('Location')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('location', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'view-location',
                                            text: '<?php echo e(__('View Location')); ?>',
                                            checked: ($.inArray('view-location', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'store-location',
                                            text: '<?php echo e(__('Add Location')); ?>',
                                            checked: ($.inArray('store-location', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'edit-location',
                                            text: '<?php echo e(__('Edit Location')); ?>',
                                            checked: ($.inArray('edit-location', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'delete-location',
                                            text: "<?php echo e(__('Delete Location')); ?>",
                                            checked: ($.inArray('delete-location', result) >= 0) ? true : false
                                        },
                                    ]
                                },
                                {
                                    id: 'policy',
                                    text: "<?php echo e(trans('Policy')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('policy', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'store-policy',
                                            text: '<?php echo e(__('Add Policy')); ?>',
                                            checked: ($.inArray('store-policy', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'edit-policy',
                                            text: '<?php echo e(__('Edit Policy')); ?>',
                                            checked: ($.inArray('edit-policy', result) >= 0) ? true : false
                                        },
                                        {
                                            id: 'delete-policy',
                                            text: "<?php echo e(__('Delete Policy')); ?>",
                                            checked: ($.inArray('delete-policy', result) >= 0) ? true : false
                                        },
                                    ]
                                },
                                {
                                    id: 'performance',
                                    text: "<?php echo e(trans('Performance')); ?>",
                                    expanded: true,
                                    checked: ($.inArray('performance', result) >= 0) ? true : false,
                                    items: [
                                        {
                                            id: 'goal-type',
                                            text: "<?php echo e(trans('Goal Type')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('goal-type', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-goal-type',
                                                    text: '<?php echo e(__('View Goal Type')); ?>',
                                                    checked: ($.inArray('view-goal-type', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-goal-type',
                                                    text: '<?php echo e(__('Add Goal Type')); ?>',
                                                    checked: ($.inArray('store-goal-type', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-goal-type',
                                                    text: '<?php echo e(__('Edit Goal Type')); ?>',
                                                    checked: ($.inArray('edit-goal-type', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-goal-type',
                                                    text: "<?php echo e(__('Delete Goal Type')); ?>",
                                                    checked: ($.inArray('delete-goal-type', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'goal-tracking',
                                            text: "<?php echo e(trans('Goal Tracking')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('goal-tracking', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-goal-tracking',
                                                    text: '<?php echo e(__('View Goal Tracking')); ?>',
                                                    checked: ($.inArray('view-goal-tracking', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-goal-tracking',
                                                    text: '<?php echo e(__('Add Goal Tracking')); ?>',
                                                    checked: ($.inArray('store-goal-tracking', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-goal-tracking',
                                                    text: '<?php echo e(__('Edit Goal Tracking')); ?>',
                                                    checked: ($.inArray('edit-goal-tracking', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-goal-tracking',
                                                    text: "<?php echo e(__('Delete Goal Tracking')); ?>",
                                                    checked: ($.inArray('delete-goal-tracking', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'indicator',
                                            text: "<?php echo e(trans('Indicator')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('indicator', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-indicator',
                                                    text: '<?php echo e(__('View Indicator')); ?>',
                                                    checked: ($.inArray('view-indicator', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-indicator',
                                                    text: '<?php echo e(__('Add Indicator')); ?>',
                                                    checked: ($.inArray('store-indicator', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-indicator',
                                                    text: '<?php echo e(__('Edit Indicator')); ?>',
                                                    checked: ($.inArray('edit-indicator', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-indicator',
                                                    text: "<?php echo e(__('Delete Indicator')); ?>",
                                                    checked: ($.inArray('delete-indicator', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                        {
                                            id: 'appraisal',
                                            text: "<?php echo e(trans('Appraisal')); ?>",
                                            expanded: true,
                                            checked: ($.inArray('appraisal', result) >= 0) ? true : false,
                                            items: [
                                                {
                                                    id: 'view-appraisal',
                                                    text: '<?php echo e(__('View Appraisal')); ?>',
                                                    checked: ($.inArray('view-appraisal', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'store-appraisal',
                                                    text: '<?php echo e(__('Add Appraisal')); ?>',
                                                    checked: ($.inArray('store-appraisal', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'edit-appraisal',
                                                    text: '<?php echo e(__('Edit Appraisal')); ?>',
                                                    checked: ($.inArray('edit-appraisal', result) >= 0) ? true : false
                                                },
                                                {
                                                    id: 'delete-appraisal',
                                                    text: "<?php echo e(__('Delete Appraisal')); ?>",
                                                    checked: ($.inArray('delete-appraisal', result) >= 0) ? true : false
                                                },
                                            ]
                                        },
                                    ]
                                },
                            ]
                        });


                        // function that gathers IDs of checked nodes
                        function checkedNodeIds(nodes, checkedNodes) {

                            for (var i = 0; i < nodes.length; i++) {
                                if (nodes[i].checked) {
                                    getParentIds(nodes[i], checkedNodes);
                                    checkedNodes.push(nodes[i].id);
                                }

                                if (nodes[i].hasChildren) {
                                    checkedNodeIds(nodes[i].children.view(), checkedNodes);
                                }
                            }
                        }

                        function getParentIds(node, checkedNodes) {
                            if (node.parent() && node.parent().parent() && checkedNodes.indexOf(node.parent().parent().id) == -1) {
                                getParentIds(node.parent().parent(), checkedNodes);
                                checkedNodes.push(node.parent().parent().id);
                            }
                        }

                        // show checked node IDs on datasource change
                        function onCheck() {
                            checkedNodes = [];
                            var treeView1 = $('#treeview1').data("kendoTreeView"),
                                message;
                            var treeView2 = $('#treeview2').data("kendoTreeView"),
                                message;
                            var treeView3 = $('#treeview3').data("kendoTreeView"),
                                message;

                            //console.log(treeView.dataSource.view());
                            //console.log(checkedNodes);

                            checkedNodeIds(treeView1.dataSource.view(), checkedNodes);
                            checkedNodeIds(treeView2.dataSource.view(), checkedNodes);
                            checkedNodeIds(treeView3.dataSource.view(), checkedNodes);

                            // if (checkedNodes.length > 0) {
                            //     message = "IDs of checked nodes: " + checkedNodes.join();
                            // } else {
                            //     message = "No nodes checked.";
                            // }
                            // $("#result").html(message);
                        }

                    }
                });


                $('#set_permission_btn').on('click', function () {

                    if (checkedNodes) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-T<?php echo e(trans('file.OK')); ?>EN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var target = '<?php echo e(route('set_permission')); ?>';

                        $.ajax({
                            type: 'POST',
                            url: target,
                            data: {
                                checkedId: checkedNodes,
                                roleId: "<?php echo e($role->id); ?>",
                            },
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
                                }
                                if (data.error) {
                                    html = '<div class="alert alert-danger">' + data.error + '</div>';
                                }
                                $('#form_result_permission').html(html).slideDown(100).delay(3000).slideUp(100);
                            }
                        });
                    } else {
                        alert('<?php echo e(__('Please select atleast one checkbox')); ?>');
                    }


                });

            });
        })(jQuery);
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/settings/roles/permission.blade.php ENDPATH**/ ?>