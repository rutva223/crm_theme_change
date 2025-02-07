<?php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Employee Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> <?php echo e(__('Employee Edit')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('employee.index')); ?>"><?php echo e(__('Employee List')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Employee Edit')); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Personal Info</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Company Info</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Bank Info</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                    <?php echo e(Form::model($employee, ['route' => ['employee.personal.update', $employee->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('name', __('Name'))); ?>

                                                    <?php echo e(Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Name'])); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('mobile', __('Mobile'))); ?>

                                                    <?php echo e(Form::number('mobile', $employee->mobile, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Mobile'])); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('emergency_contact', __('Emergency Contact'))); ?>

                                                    <?php echo e(Form::text('emergency_contact', $employee->emergency_contact, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Emergency Contact'])); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('dob', __('Date of Birth')); ?>

                                                    <?php echo Form::date('dob', null, ['class' => 'form-control', 'required' => 'required']); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group ">
                                                    <?php echo Form::label('gender', __('Gender')); ?>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" value="Male" id="customCheckinlh1"
                                                                    <?php echo e($employee->gender == 'Male' ? 'checked' : 'checked'); ?>>
                                                                <label class="form-check-label" for="customCheckinlh1">
                                                                    <?php echo e(__('Male')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" value="Female" id="customCheckinlh2"
                                                                    <?php echo e($employee->gender == 'Female' ? 'checked' : ''); ?>>
                                                                <label class="form-check-label" for="customCheckinlh2">
                                                                    <?php echo e(__('Female')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3  mb-3">
                                                <div class="card bg-gradient-primary hover-shadow-lg border-0">
                                                    <div class="card-body py-3">
                                                        <div class="row row-grid align-items-center">
                                                            <div class="col-lg-12">
                                                                <div class="media align-items-center">
                                                                    <a href="#"
                                                                        class="avatar avatar-lg rounded-circle mr-3">
                                                                        <img <?php if(!empty($user->avatar)): ?> src="<?php echo e($profile . '/' . $user->avatar); ?>" <?php else: ?> avatar="<?php echo e($user->name); ?>" <?php endif; ?>
                                                                            class="avatar  rounded-circle avatar-lg"
                                                                            style="width:60px">
                                                                    </a>
                                                                    <div class="media-body ms-3">
                                                                        <h5 class="text-dark mb-2">
                                                                            <?php echo e($user->name); ?></h5>
                                                                        <div>
                                                                            <div class="input-group">
                                                                                <input type="file" class="form-control"
                                                                                    id="file-1" name="profile"
                                                                                    aria-describedby="inputGroupFileAddon04"
                                                                                    aria-label="Upload"
                                                                                    data-multiple-caption="{count} files selected"
                                                                                    multiple />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12  mb-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('address', __('Address'))); ?>

                                                    <?php echo e(Form::textarea('address', $employee->address, ['class' => 'form-control', 'required' => 'required', 'rows' => '3'])); ?>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center'])); ?>

                                            </div>
                                        </div>
                                    </form>
                                    <?php echo e(Form::close()); ?>

                                </div>

                                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                    <?php echo e(Form::model($employee, ['route' => ['employee.company.update', $employee->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('emp_id', __('Employee ID')); ?>

                                                    <?php echo Form::text('emp_id', $employeesId, ['class' => 'form-control', 'readonly']); ?>

                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <?php echo e(Form::label('branch_id', __('Branch'))); ?>

                                                <?php echo e(Form::select('branch_id', $branches, null, ['class' => 'form-control select', 'required' => 'required', 'id' => 'branch_id'])); ?>

                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <?php echo e(Form::label('department_id', __('Department'), ['placeholder' => 'Select Department'])); ?>

                                                <select class=" select form-control " id="department_id"
                                                    name="department_id" required="required">
                                                    <option value=""><?php echo e(__('Select any Department')); ?></option>
                                                    <?php $__currentLoopData = $departmentData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"
                                                            <?php echo e($key == $employee->department ? 'selected' : ''); ?>>
                                                            <?php echo e($val); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 mb-3">
                                                <?php echo e(Form::label('designation_id', __('Designation'))); ?>

                                                <select class="select form-control " id="designation_id"
                                                    name="designation_id" required="required"></select>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div cla`s="form-group">
                                                    <?php echo Form::label('joining_date', __('Date of Joining')); ?>

                                                    <?php echo Form::date('joining_date', null, ['class' => 'form-control', 'required' => 'required']); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('exit_date', __('Date of Exit')); ?>

                                                    <?php echo Form::date('exit_date', !empty($employee->exit_date) ? null : '', [
                                                        'class' => 'form-control',
                                                        'required' => 'required',
                                                    ]); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group ">
                                                    <?php echo e(Form::label('salary_type', __('Salary Type'))); ?>

                                                    <?php echo e(Form::select('salary_type', $salaryType, null, ['class' => 'form-control multi-select'])); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('salary', __('Salary')); ?>

                                                    <?php echo Form::number('salary', null, ['class' => 'form-control']); ?>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center'])); ?>

                                            </div>
                                        </div>
                                    </form>
                                    <?php echo e(Form::close()); ?>

                                </div>
                                <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                                    <?php echo e(Form::model($employee, ['route' => ['employee.bank.update', $employee->user_id], 'method' => 'post'])); ?>

                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('account_holder_name', __('Account Holder Name')); ?>

                                                    <?php echo Form::text('account_holder_name', null, [
                                                        'class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Account Holder Name',
                                                    ]); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('account_number', __('Account Number'))); ?>

                                                    <?php echo Form::text('account_number', null, [
                                                        'class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Account Number',
                                                    ]); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('bank_name', __('Bank Name'))); ?>

                                                    <?php echo Form::text('bank_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Bank Name']); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('bank_identifier_code', __('Bank Identifier Code')); ?>

                                                    <?php echo Form::text('bank_identifier_code', null, [
                                                        'class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Bank Identifier Code',
                                                    ]); ?>

                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <div class="form-group">
                                                    <?php echo Form::label('branch_location', __('Branch Location')); ?>

                                                    <?php echo Form::text('branch_location', null, [
                                                        'class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Branch Location',
                                                    ]); ?>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center'])); ?>

                                            </div>
                                        </div>
                                    </form>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript">
        $(document).on('change', '#branch_id', function() {
            var branch_id = $(this).val();
            getDepartment(branch_id);
        });

        function getDepartment(branch_id) {
            var data = {
                "branch_id": branch_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            }

            $.ajax({
                url: '<?php echo e(route('employee.getdepartment')); ?>',
                method: 'POST',
                data: data,
                success: function(data) {
                    $('#department_id').empty();
                    $('#department_id').append(
                        '<option value="" disabled><?php echo e(__('Select any Department')); ?></option>');

                    $.each(data, function(key, value) {
                        $('#department_id').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                    $('#department_id').val('');
                }
            });
        }
    </script>
    <script type="text/javascript">
        function getDesignation(did) {
            $.ajax({
                url: '<?php echo e(route('employee.json')); ?>',
                type: 'POST',
                data: {
                    "department_id": did,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    $('#designation_id').empty();
                    $('#designation_id').append(
                        '<option value=""><?php echo e(__('Select any Designation')); ?></option>');

                    $.each(data, function(key, value) {
                        var select = '';
                        if (key == '<?php echo e($employee->designation); ?>') {
                            select = 'selected';
                        }

                        $('#designation_id').append('<option value="' + key + '"  ' + select + '>' +
                            value + '</option>');
                    });
                }
            });
        }

        $(document).ready(function() {
            var d_id = $('#department_id').val();
            var designation_id = '<?php echo e($employee->designation); ?>';
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function() {
            var department_id = $(this).val();
            getDesignation(department_id);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/employee/edit.blade.php ENDPATH**/ ?>