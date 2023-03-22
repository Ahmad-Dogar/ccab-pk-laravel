<section>

    <span id="contact_general_result"></span>


    <div class="container-fluid">
        <?php if(auth()->user()->can('store-details-employee') || auth()->user()->id == $employee->id): ?>
            <button type="button" class="btn btn-info" name="create_record" id="create_contact_record"><i
                        class="fa fa-plus"></i><?php echo e(__('Add Contact')); ?></button>
        <?php endif; ?>
    </div>


    <div class="table-responsive">
        <table id="contact-table" class="table ">
            <thead>
            <tr>
                <th><?php echo e(trans('file.Name')); ?></th>
                <th><?php echo e(trans('file.Relation')); ?></th>
                <th><?php echo e(trans('file.Email')); ?></th>
                <th><?php echo e(trans('file.Phone')); ?></th>
                <th class="not-exported"><?php echo e(trans('file.action')); ?></th>
            </tr>
            </thead>

        </table>
    </div>


    <div id="ContactformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(__('Add Contact')); ?></h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="contact-close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="contact_form_result"></span>
                    <form method="post" id="contact_sample_form" class="form-horizontal" autocomplete="off">

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Relation')); ?> *</label>
                                <select name="relation" id="contact_relation" required class="form-control selectpicker"
                                        data-live-search="true" data-live-search-style="begins"
                                        title='<?php echo e(__('Selecting',['key'=>trans('Relation')])); ?>...'>
                                    <option value="self"><?php echo e(trans('file.Self')); ?></option>
                                    <option value="parent"><?php echo e(trans('file.parent')); ?></option>
                                    <option value="spouse"><?php echo e(trans('file.Spouse')); ?></option>
                                    <option value="child"><?php echo e(trans('file.Child')); ?></option>
                                    <option value="sibling"><?php echo e(trans('file.Sibling')); ?></option>
                                    <option value="in laws"><?php echo e(__('In Laws')); ?></option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Email')); ?> *</label>
                                <input type="text" name="work_email" id="contact_work_email"
                                       placeholder="<?php echo e(trans('file.Work')); ?>"
                                       class="form-control mb-2">
                                <input type="text" name="personal_email" id="contact_personal_email"
                                       placeholder="<?php echo e(trans('file.Personal')); ?>"
                                       required class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="is_primary"
                                           id="contact_is_primary" value="1">
                                    <label class="custom-control-label"
                                           for="contact_is_primary"><?php echo e(trans('file.Primary')); ?></label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="is_dependent"
                                           id="contact_is_dependent" value="1">
                                    <label class="custom-control-label"
                                           for="contact_is_dependent"><?php echo e(trans('file.Dependent')); ?></label>
                                </div>

                            </div>


                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Name')); ?> *</label>
                                <input type="text" name="contact_name" id="contact_name"
                                       placeholder="<?php echo e(trans('file.Name')); ?>"
                                       required class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Address')); ?> *</label>
                                <input type="text" name="address_1" id="contact_address_1"
                                       placeholder="<?php echo e(__('Address Line 1')); ?>"
                                       required class="form-control mb-2">
                                <input type="text" name="address_2" id="contact_address_2"
                                       placeholder="<?php echo e(__('Address Line 2')); ?>"
                                       class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label><?php echo e(trans('file.Mobile')); ?> *</label>
                                <input type="text" name="work_phone" id="contact_work_phone"
                                       placeholder="<?php echo e(trans('file.Work')); ?>"
                                       class="form-control mb-2">
                                <input type="text" name="work_phone_ext" id="contact_work_phone_ext"
                                       placeholder="<?php echo e(trans('file.Ext')); ?>"
                                       class="form-control mb-2">
                                <input type="text" name="personal_phone" id="contact_personal_phone"
                                       placeholder="<?php echo e(trans('file.Mobile')); ?>"
                                       required class="form-control mb-2">
                                <input type="text" name="home_phone" id="contact_home_phone"
                                       placeholder="<?php echo e(trans('file.Home')); ?>"
                                       class="form-control ">
                            </div>


                            <div class="col-md-4 form-group">
                                <label><?php echo e(trans('file.City')); ?> </label>
                                <input type="text" name="city" id="contact_city" placeholder="<?php echo e(trans('file.City')); ?>"
                                       required class="form-control">
                            </div>

                            <div class="col-md-4 form-group">
                                <label><?php echo e(trans('file.State/Province')); ?> </label>
                                <input type="text" name="state" id="contact_state"
                                       placeholder="<?php echo e(trans('file.State/Province')); ?>"
                                       required class="form-control">
                            </div>

                            <div class="col-md-4 form-group">
                                <label><?php echo e(trans('file.ZIP')); ?> </label>
                                <input type="text" name="zip" id="contact_zip" placeholder="<?php echo e(trans('file.ZIP')); ?>"
                                       required class="form-control">
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('file.Country')); ?></label>
                                    <select name="country_id" id="contact_country" required
                                            class="form-control selectpicker"
                                            data-live-search="true" data-live-search-style="begins"
                                            title='<?php echo e(__('Selecting',['key'=>trans('file.Country')])); ?>...'>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>" <?php echo e(($employee->country == $country->id) ? "selected" : ''); ?>><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="contact_action"/>
                                    <input type="hidden" name="hidden_id" id="contact_hidden_id"/>
                                    <input type="submit" name="action_button" id="contact_action_button"
                                           class="btn btn-warning" value=<?php echo e(trans('file.Add')); ?> />
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade confirmModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><?php echo e(trans('file.Confirmation')); ?></h2>
                    <button type="button" class="contact-close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;"><?php echo e(__('Are you sure you want to remove this data?')); ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button"  class="btn btn-danger contact-ok"><?php echo e(trans('file.OK')); ?></button>
                    <button type="button" class="contact-close btn-default" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>

</section>

<?php /**PATH /home/dtclbdc/hr.dtclbd.com/resources/views/employee/emergency_contacts/index.blade.php ENDPATH**/ ?>