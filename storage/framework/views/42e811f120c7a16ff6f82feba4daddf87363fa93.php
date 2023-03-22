
<?php $__env->startSection('content'); ?>
    <section>
        <div class="container-fluid">
            <div class="card">
                <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('leave_type.index')); ?>" id="Leave_type-tab" data-toggle="tab" data-table= "leave" data-target="#Leave_type" role="tab" aria-controls="Leave_type" aria-selected="true"><?php echo e(__('Leave Type')); ?></a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link " href="<?php echo e(route('award_type.index')); ?>" id="Award_type-tab" data-toggle="tab" data-table= "award" data-target="#Award_type" role="tab" aria-controls="Award_type" aria-selected="false"><?php echo e(__('Award Type')); ?></a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="<?php echo e(route('warning_type.index')); ?>" id="Warning_type-tab" data-toggle="tab" data-table= "warning" data-target="#Warning_type" role="tab" aria-controls="Warning_type" aria-selected="false"><?php echo e(__('Warning Type')); ?></a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="<?php echo e(route('termination_type.index')); ?>" id="Termination_type-tab" data-toggle="tab" data-table= "termination" data-target="#Termination_type" role="tab" aria-controls="Termination_type" aria-selected="false"><?php echo e(__('Termination Type')); ?></a>-->
                    <!--</li>-->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="<?php echo e(route('expense_type.index')); ?>" id="Expense_type-tab" data-toggle="tab" data-table= "expense" data-target="#Expense_type" role="tab" aria-controls="Expense_type" aria-selected="false"><?php echo e(__('Expense Type')); ?></a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('status_type.index')); ?>" id="Status_type-tab" data-toggle="tab" data-table= "status" data-target="#Status_type" role="tab" aria-controls="Status_type" aria-selected="false"><?php echo e(__('Employee Status')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('probation.index')); ?>" id="Probation_type-tab" data-toggle="tab" data-table= "probation" data-target="#Probation_type" role="tab" aria-controls="Probation_type" aria-selected="false"><?php echo e(__('Probation Type')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('document_type.index')); ?>" id="Document_type-tab" data-toggle="tab" data-table= "document" data-target="#Document_type" role="tab" aria-controls="Document_type" aria-selected="false"><?php echo e(__('Document Type')); ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">

            <div class="pt-0 tab-pane fade show active" id="Leave_type" role="tab" aria-labelledby="Leave_type-tab">
              <?php echo $__env->make('settings.variables.partials.leave_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="pt-0 tab-pane fade " id="Award_type" role="tab"  aria-labelledby="Award_type-tab">
               <?php echo $__env->make('settings.variables.partials.award_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="pt-0 tab-pane fade " id="Warning_type" role="tab"  aria-labelledby="Warning_type-tab">
                <?php echo $__env->make('settings.variables.partials.warning_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="pt-0 tab-pane fade " id="Termination_type" role="tab"  aria-labelledby="Termination_type-tab">
                <?php echo $__env->make('settings.variables.partials.termination_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="pt-0 tab-pane fade " id="Expense_type" role="tab"  aria-labelledby="Expense_type-tab">
                <?php echo $__env->make('settings.variables.partials.expense_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="pt-0 tab-pane fade " id="Status_type" role="tab"  aria-labelledby="Status_type-tab">
                <?php echo $__env->make('settings.variables.partials.status_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="pt-0 tab-pane fade " id="Probation_type" role="tab"  aria-labelledby="Probation_type-tab">
                <?php echo $__env->make('settings.variables.partials.probation_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="pt-0 tab-pane fade " id="Document_type" role="tab"  aria-labelledby="Document_type-tab">
                <?php echo $__env->make('settings.variables.partials.document_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>  
        </div>
    </section>

    <script type="text/javascript">
        (function($) {  
            "use strict";

            let leaveLoad = 0;
            $(document).ready(function() {
                if (leaveLoad == 0) {
                    <?php echo $__env->make('settings.variables.JS_DT.leave_type_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        leaveLoad = 1;
                }
            });


            $('[data-table="award"]').one('click', function (e) {
                <?php echo $__env->make('settings.variables.JS_DT.award_type_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            });

            $('[data-table="warning"]').one('click', function (e) {
                <?php echo $__env->make('settings.variables.JS_DT.warning_type_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            });

            $('[data-table="termination"]').one('click', function (e) {
                <?php echo $__env->make('settings.variables.JS_DT.termination_type_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            });

            $('[data-table="expense"]').one('click', function (e) {
                <?php echo $__env->make('settings.variables.JS_DT.expense_type_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            });

            $('[data-table="probation"]').one('click', function (e) {
                <?php echo $__env->make('settings.variables.JS_DT.probation_type_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            });

            $('[data-table="status"]').one('click', function (e) {
                <?php echo $__env->make('settings.variables.JS_DT.status_type_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            });

            $('[data-table="document"]').on('click', function (e) {
                <?php echo $__env->make('settings.variables.JS_DT.document_type_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            });
        })(jQuery);
    </script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/settings/variables/index.blade.php ENDPATH**/ ?>