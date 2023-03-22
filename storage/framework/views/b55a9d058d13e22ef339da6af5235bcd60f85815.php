<div class="row">
    <div class="col-md-3">

        <ul class="nav nav-tabs vertical" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="employee_project-tab" data-toggle="tab" href="#Employee_project"
                   role="tab" aria-controls="Employee_project_task" aria-selected="true"><?php echo e(trans('file.Project')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('employee_task.show',$employee)); ?>" id="employee_task-tab"
                   data-toggle="tab" data-table="employee_task" data-target="#Employee_task" role="tab"
                   aria-controls="Employee_task" aria-selected="false"><?php echo e(trans('file.Task')); ?></a>
            </li>
        </ul>

    </div>
    <div class="col-md-9">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Employee_project" role="tabpanel"
                 aria-labelledby="employee_project-tab">
                <!--Contents for Basic starts here-->
                <?php echo e(__('Project Info')); ?>

                <hr>
                <?php echo $__env->make('employee.project_task.project.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>


            <div class="tab-pane fade" id="Employee_task" role="tabpanel" aria-labelledby="employee_task-tab">
                <?php echo e(__('Task Info')); ?>

                <hr>
                <?php echo $__env->make('employee.project_task.task.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/project_task/index.blade.php ENDPATH**/ ?>