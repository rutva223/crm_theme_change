<?php
    $lead_files=\App\Models\Utility::get_file('lead_files');
?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('pre-purpose-script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
    <script src="<?php echo e(asset('css/summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/dropzone-amd-module.min.js')); ?>"></script>


    <script>
        var Dropzones = function() {
            var e = $('[data-toggle="dropzone"]'),
                t = $(".dz-preview");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            e.length && (Dropzone.autoDiscover = !1, e.each(function() {
                var e, a, n, o, i;
                e = $(this), a = void 0 !== e.data("dropzone-multiple"), n = e.find(t), o = void 0, i = {
                    url: "<?php echo e(route('lead.file.upload', $lead->id)); ?>",
                    headers: {
                        'x-csrf-token': CSRF_TOKEN,
                    },
                    thumbnailWidth: null,
                    thumbnailHeight: null,
                    previewsContainer: n.get(0),
                    previewTemplate: n.html(),
                    maxFiles: a ? null : 1,

                    success: function(file, response) {
                        location.reload()
                        if (response.is_success) {
                            toastrs('<?php echo e(__("Success")); ?>', 'Attachment Create Successfully!', 'success');
                            dropzoneBtn(file, response);
                        } else {
                            // Dropzones.removeFile(file);
                            toastrs('<?php echo e(__("Error")); ?>', 'The attachment must be same as storage setting.', 'error');
                        }
                    },
                    error: function(file, response) {
                        // Dropzones.removeFile(file);
                        if (response.error) {
                            toastrs('<?php echo e(__("Error")); ?>', 'The attachment must be same as storage setting.', 'error');
                        } else {
                            toastrs('<?php echo e(__("Error")); ?>', 'The attachment must be same as storage setting.', 'error');
                        }
                    },
                    init: function() {
                        this.on("addedfile", function(e) {
                            !a && o && this.removeFile(o), o = e
                        })
                    }
                }, n.html(""), e.dropzone(i)
            }))
        }()
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Lead Detail')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> <?php echo e($lead->name); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('lead.index')); ?>"><?php echo e(__('Lead')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e($lead->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(\Auth::user()->type == 'company'): ?>
        <div class="col-auto">
            <div class="actions">

                <?php if(!empty($deal)): ?>
                    <div class="action-btn bg-warning ms-2">
                        <a href="<?php if($deal->is_active): ?> <?php echo e(route('deal.show', \Crypt::encrypt($deal->id))); ?> <?php else: ?> # <?php endif; ?>"
                            data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Already Convert To Deal')); ?>"
                            class="mx-3 btn btn-sm d-inline-flex align-items-center">
                            <i class="ti ti-eye text-white"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="action-btn bg-warning ms-2">
                        <a href="#" data-url="<?php echo e(route('lead.convert.deal', $lead->id)); ?>" data-size="lg"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="<?php echo e(__('Lead Convert')); ?>"
                            data-title="<?php echo e(__('Convert [' . $lead->subject . '] To Deal')); ?>" data-toggle="tooltip"
                            data-original-title="<?php echo e(__('Convert To Deal')); ?>"
                            class="mx-3 btn btn-sm d-inline-flex align-items-center">
                            <i data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Convert To Deal')); ?>" class="ti ti-exchange text-white"></i></a>
                    </div>
                <?php endif; ?>
                <div class="action-btn bg-dark ms-2">
                    <a href="#" data-url="<?php echo e(route('lead.label', $lead->id)); ?>" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="<?php echo e(__('Add Label')); ?>"
                        data-title="<?php echo e(__('Add Label')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Label')); ?>"
                        class="mx-3 btn btn-sm d-inline-flex align-items-center">
                        <i data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Label')); ?>" class="ti ti-tag text-white"></i>
                    </a>
                </div>

                <div class="action-btn bg-info ms-2">
                    <a href="#" data-url="<?php echo e(route('lead.edit', $lead->id)); ?>" data-size="lg" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="<?php echo e(__('Edit Lead')); ?>"
                        data-title="<?php echo e(__('Edit Lead')); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center"
                        data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                        <i data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Edit')); ?>" class="ti ti-edit text-white"></i>
                    </a>
                </div>
                <div class="action-btn bg-danger ms-2">
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['deal.destroy', $lead->id, $lead->id]]); ?>

                    <a href="#!"
                        class="mx-3 btn btn-sm  align-items-center show_confirm ">
                        <i class="ti ti-trash text-white"
                            data-bs-toggle="tooltip"
                            data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                    </a>
                    <?php echo Form::close(); ?>

                </div>

            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $products = $lead->items();
            $sources = $lead->sources();
            $calls = $lead->calls;
            $emails = $lead->emails;
            $files = $lead->files;

        ?>
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('General')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-2"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Sources')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-3"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Files')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-4"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Discussion')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-5"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Notes')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-6"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Calls')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-7"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Emails')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-9">
                    <div id="useradd-1">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="theme-avtar bg-primary">
                                                    <i class="ti ti-user-plus"></i>
                                                </div>
                                                <h6 class="mb-3 mt-2"><?php echo e(__('Product')); ?></h6>
                                                <h3 class="mb-0"><?php echo e(count($products)); ?> </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="theme-avtar bg-info">
                                                    <i class="ti ti-click"></i>
                                                </div>
                                                <h6 class="mb-3 mt-2"><?php echo e(__('Source')); ?></h6>
                                                <h3 class="mb-0"><?php echo e(count($sources)); ?> </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="theme-avtar bg-warning">
                                                    <i class="ti ti-file"></i>
                                                </div>
                                                <h6 class="mb-3 mt-2"><?php echo e(__('Files')); ?></h6>
                                                <h3 class="mb-0"><?php echo e(count($lead->files)); ?> </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="float-end">
                                            <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                                <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-url="<?php echo e(route('lead.users.edit', $lead->id)); ?>"
                                                    data-bs-whatever="<?php echo e(__('Create New User')); ?>"> <span
                                                        class="text-white">
                                                        <i class="ti ti-plus" data-bs-toggle="tooltip"
                                                            data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                                </a>
                                            </p>
                                        </div>
                                        <h5 class="mb-0"><?php echo e(__('Users')); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <?php $__currentLoopData = $lead->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item px-0">
                                                    <div class="row align-items-center justify-content-between">
                                                        <div class="col-sm-auto mb-3 mb-sm-0">
                                                            <div class="d-flex align-items-center ">
                                                                <img <?php if(!empty($user->avatar)): ?> src="<?php echo e(asset('storage/uploads/avatar/' . $user->avatar)); ?>" <?php else: ?> avatar="<?php echo e($user->name); ?>" <?php endif; ?>
                                                                    class="avatar  rounded-circle avatar-sm">
                                                                <div class="div">
                                                                    <h6 class="m-0 ms-3"> <?php echo e($user->name); ?> </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-auto text-sm-end d-flex align-items-center">
                                                            <?php if($user->type != 'company'): ?>
                                                                <?php if($lead->created_by == \Auth::user()->id): ?>
                                                                    <div class="action-btn bg-danger ms-2">
                                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['lead.users.destroy', $lead->id, $user->id]]); ?>

                                                                        <a href="#!"
                                                                            class="mx-3 btn btn-sm  align-items-center show_confirm ">
                                                                            <i class="ti ti-trash text-white"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                                        </a>
                                                                        <?php echo Form::close(); ?>



                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Attachments')); ?></h5>
                                    </div>
                                    <div class="card-body Attachments">
                                        <ul class="list-group list-group-flush mt-3 w-100">
                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item card rounded mb-3">
                                                    <div class="row align-items-center justify-content-between">
                                                        <div class="col-sm-auto mb-3 mb-sm-0">
                                                            <div class="d-flex align-items-center">
                                                                <img src="../assets/images/pages/pdf.svg"
                                                                    class="wid-30 me-3" alt="images">
                                                                <div class="div">
                                                                    <h5 class="m-0"><?php echo e($file->file_name); ?></h5>
                                                                     
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-auto text-sm-end d-flex align-items-center">
                                                            <a class="btn btn-sm btn-primary d-flex align-items-center"
                                                                href="<?php echo e(asset(Storage::url('uploads/lead_files')) . '/' . $file->file_path); ?>"
                                                                download="">
                                                                <i
                                                                    class="ti ti-arrow-bar-to-down me-2"></i><?php echo e(__('Download')); ?>

                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5><?php echo e(__('Lead Detail')); ?></h5>
                                        <div class="row  mt-4">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <?php echo e($lead->subject); ?>

                                                </div>
                                                <div class="col">
                                                    <div class="progress-wrapper">
                                                        <span class="progress-percentage"><small
                                                                class="font-weight-bold"><?php echo e(__('Completed')); ?>:
                                                            </small><?php echo e($precentage); ?>%</span>
                                                        <div class="progress progress-xs mt-2">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                                                style="width:<?php echo e($precentage); ?>%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 mt-2">
                                                <div class="d-flex align-items-start">
                                                    <div class="theme-avtar bg-success mt-2">
                                                        <i class="ti ti-calendar-stats "></i>
                                                    </div>
                                                    <div class="ms-2 mt-2">
                                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Created')); ?></p>
                                                        <h6 class="mb-0 text-success">
                                                            <?php echo e(\Auth::user()->dateFormat($lead->created_at)); ?></h6>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 my-3 my-sm-0 mt-4">
                                                <div class="d-flex align-items-start">
                                                    <div class="theme-avtar bg-info mt-3">
                                                        <i class="ti ti-thumb-up"></i>
                                                    </div>
                                                    <div class="ms-2 mt-3">
                                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Pipeline')); ?>:</p>
                                                        <h6 class="mb-0 text-info">
                                                            <?php echo e(!empty($lead->pipeline) ? $lead->pipeline->name : ''); ?></h6>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 my-3 my-sm-0 mt-4">
                                                <div class="d-flex align-items-start">
                                                    <div class="theme-avtar bg-warning mt-3">
                                                        <i class="ti ti-heart"></i>
                                                    </div>
                                                    <div class="ms-2 mt-3">
                                                        <p class="text-muted text-sm mb-0"><?php echo e(__('Stage')); ?>:</p>
                                                        <h6 class="mb-0 text-warning">
                                                            <?php echo e(!empty($lead->stage) ? $lead->stage->name : ''); ?></h6>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="float-end">
                                            <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                                <a href="#" class="btn btn-sm btn-primary btn-icon m-1"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-url="<?php echo e(route('lead.items.edit', $lead->id)); ?>"
                                                    data-bs-whatever="<?php echo e(__('Create New Item')); ?>"> <span
                                                        class="text-white">
                                                        <i class="ti ti-plus" data-bs-toggle="tooltip"
                                                            data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                                </a>
                                            </p>
                                        </div>
                                        <h5 class="mb-0"><?php echo e(__('Items')); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <?php if($lead->items()): ?>
                                                <?php $__currentLoopData = $lead->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center justify-content-between">
                                                            <div class="col-sm-auto mb-3 mb-sm-0">
                                                                <div class="d-flex align-items-center">

                                                                    <div class="div">
                                                                        <h5 class="m-0"><?php echo e($product->name); ?>

                                                                        </h5>
                                                                        <small
                                                                            class="text-muted"><?php echo e(\Auth::user()->priceFormat($product->sale_price)); ?></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-auto text-sm-end d-flex align-items-center">
                                                                <div class="action-btn bg-danger ms-2">
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['lead.items.destroy', $lead->id, $product->id]]); ?>

                                                                    <a href="#!"
                                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center show_confirm">
                                                                        <i class="ti ti-trash text-white"></i>
                                                                    </a>
                                                                    <?php echo Form::close(); ?>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                                <div id="activity" class="card">
                                    <div class="card-header">
                                        <h5><?php echo e(__('Activity')); ?></h5>
                                    </div>
                                    <div class="card-body height-450">

                                        <div class="row" style="height:450px !important;overflow-y: scroll;">
                                            <ul class="event-cards list-group list-group-flush mt-3 w-100">
                                                <?php if(!$lead->activities->isEmpty()): ?>
                                                    <?php $__currentLoopData = $lead->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($activity->log_type == 'Move'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php elseif($activity->log_type == 'Add Product'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php elseif($activity->log_type == 'Create Invoice'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php elseif($activity->log_type == 'Add Contact'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php elseif($activity->log_type == 'Create Lead Email'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php elseif($activity->log_type == 'Create Lead Call'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php elseif($activity->log_type == 'Create Task'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php elseif($activity->log_type == 'Add user'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php elseif($activity->log_type == 'Add Discussion'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <?php elseif($activity->log_type == 'Add Notes'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php elseif($activity->log_type == 'Upload File'): ?>
                                                            <li class="list-group-item card mb-3">
                                                                <div
                                                                    class="row align-items-center justify-content-between">
                                                                    <div class="col-auto mb-3 mb-sm-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="theme-avtar bg-primary">
                                                                                <i class="ti ti-activity text-white"
                                                                                    class="fas <?php echo e($k + 1); ?>"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <span
                                                                                    class="text-dark text-sm"><?php echo e(__($activity->log_type)); ?></span>
                                                                                <h6 class="m-0">
                                                                                    <?php echo $activity->getLeadRemark(); ?></h6>
                                                                                <small
                                                                                    class="text-muted"><?php echo e($activity->created_at->diffForHumans()); ?></small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php echo e(__('No activity found yet.')); ?>

                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div id="useradd-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            data-url="<?php echo e(route('lead.sources.edit', $lead->id)); ?>"
                                            data-bs-whatever="<?php echo e(__('Create New Source')); ?>"> <span
                                                class="text-white">
                                                <i class="ti ti-plus" data-bs-toggle="tooltip"
                                                    data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                        </a>
                                    </p>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Sources')); ?></h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <?php if($sources): ?>
                                        <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item px-0">
                                                <div class="row align-items-center justify-content-between">
                                                    <div class="col-sm-auto mb-3 mb-sm-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="div">
                                                                <h6 class="m-0"><?php echo e($source->name); ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-auto text-sm-end d-flex align-items-center">
                                                        <div class="action-btn bg-danger ms-2">
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['lead.sources.destroy', $lead->id, $source->id]]); ?>

                                                            <a href="#!"
                                                                class="mx-3 btn btn-sm  align-items-center show_confirm ">
                                                                <i data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('delete')); ?>" class="ti ti-trash text-white"></i>
                                                            </a>
                                                            <?php echo Form::close(); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="useradd-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(__('Lead attachments')); ?></h5>
                                <small> <?php echo e(__('Drag and drop lead files')); ?> </small>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="dropzone dropzone-multiple" data-toggle="dropzone"
                                        data-dropzone-url="http://" data-dropzone-multiple>
                                        <div class="fallback"   >
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="dropzone-1" multiple>
                                                <label class="custom-file-label"
                                                    for="customFileUpload"><?php echo e(__('Choose file')); ?></label>
                                            </div>
                                        </div>
                                        <ul
                                            class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                            <li class="list-group-item px-0">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <img class="dropzone" src="" alt="Image placeholder"
                                                            data-dz-thumbnail style="width:150px;">

                                                    </div>
                                                    <div class="col">
                                                        
                                                        <p class="small text-muted mb-0" data-dz-size></p>
                                                    </div>
                                                    <div class="col-auto">

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="scrollbar-inner">
                                        <div class="card-wrapper p-3 lead-common-box">

                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card mb-3 border shadow-none">
                                                    <div class="px-3 py-3">
                                                        <div class="row align-items-center">
                                                            <div class="col ml-n2">
                                                                <h6 class="text-sm mb-0">
                                                                    <a href="#!"><?php echo e($file->file_name); ?></a>
                                                                </h6>
                                                                
                                                            </div>

                                                            <div class="action-btn bg-warning ">
                                                                <a href="<?php echo e($lead_files  . $file->file_path); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                    download="" data-bs-toggle="tooltip" title="Download">
                                                                    <span class="text-white"> <i
                                                                            class="ti ti-download"></i></span></a>
                                                            </div>

                                                            <div class="col-auto actions">
                                                                <div class="action-btn bg-danger ms-2">
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['lead.file.delete', $lead->id, $file->id]]); ?>

                                                                    <a href="#!"
                                                                        class="mx-3 btn btn-sm  align-items-center show_confirm ">
                                                                        <i class="ti ti-trash text-white"></i>
                                                                    </a>
                                                                    <?php echo Form::close(); ?>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="useradd-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                        <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                            <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                data-url="<?php echo e(route('lead.discussions.create', $lead->id)); ?>"
                                                data-bs-whatever="<?php echo e(__('Create New Discussion')); ?>"> <span
                                                    class="text-white">
                                                    <i class="ti ti-plus" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Discussion')); ?></h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <?php $__currentLoopData = $lead->discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <img <?php if(!empty($discussion->user) && !empty($discussion->user->avatar)): ?> src="<?php echo e(asset(Storage::url('uploads/avatar')) . '/' . $discussion->user->avatar); ?>" <?php else: ?>
                                                    avatar="<?php echo e(!empty($discussion->user) ? $discussion->user->name : ''); ?>" <?php endif; ?>
                                                        class="avatar  rounded-circle avatar-sm">
                                                </div>
                                                <div class="flex-fill ml-3">
                                                    <div class="h6 text-sm mb-0 ms-3">
                                                        <?php echo e(!empty($discussion->user) ? $discussion->user->name : ''); ?> <small
                                                            class="float-end text-muted"><?php echo e($discussion->created_at->diffForHumans()); ?></small>
                                                    </div>
                                                    <p class="text-sm lh-140 mb-0 ms-3">
                                                        <?php echo e($discussion->comment); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="useradd-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(__('Notes')); ?></h5>
                            </div>
                            <div class="card-body p-0">
                                <?php echo e(Form::open(['route' => ['lead.note.store', $lead->id]])); ?>

                                <div class="col-md-12">
                                    <div class="form-group mt-3">
                                        <textarea class="tox-target summernote-simple" name="notes" id="pc_demo1" rows="8"><?php echo $lead->notes; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-end">
                                    <div class="form-group mt-3 me-3">
                                        <?php echo e(Form::submit(__('Add'), ['class' => 'btn  btn-primary'])); ?>

                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>

                    <div id="useradd-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                        <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                            <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-size="lg" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                data-url="<?php echo e(route('lead.call.create', $lead->id)); ?>"
                                                data-bs-whatever="<?php echo e(__('Create New Call')); ?>"> <span
                                                    class="text-white">
                                                    <i class="ti ti-plus" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Calls')); ?></h5>
                            </div>

                            <div class="table">
                                <table class="table align-items-center">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Subject')); ?></th>
                                            <th><?php echo e(__('Call Type')); ?></th>
                                            <th><?php echo e(__('Duration')); ?></th>
                                            <th><?php echo e(__('User')); ?></th>
                                            <?php if(\Auth::user()->type == 'company'): ?>
                                                <th class="text-end"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $calls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $call): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($call->subject); ?></td>
                                                <td><?php echo e(ucfirst($call->call_type)); ?></td>
                                                <td><?php echo e($call->duration); ?></td>
                                                <td><?php echo e(!empty($call->getLeadCallUser) ? $call->getLeadCallUser->name : ''); ?>

                                                </td>
                                                <?php if(\Auth::user()->type == 'company'): ?>
                                                    <td class="text-end">
                                                        <div class="action-btn bg-info ms-2">
                                                            <a href="#"
                                                                class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                                data-bs-toggle="modal" data-size="lg" data-bs-target="#exampleModal"
                                                                data-url="<?php echo e(route('lead.call.edit', [$lead->id, $call->id])); ?>"
                                                                data-bs-whatever="<?php echo e(__('Edit Call')); ?>"> <span
                                                                    class="text-white">
                                                                    <i class="ti ti-edit" data-bs-toggle="tooltip"
                                                                        data-bs-original-title="<?php echo e(__('Edit')); ?>"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="action-btn bg-danger ms-2">

                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['lead.call.destroy', $lead->id, $call->id]]); ?>

                                                            <a href="#!"
                                                                class="mx-3 btn btn-sm  align-items-center show_confirm ">
                                                                <i data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('delete')); ?>" class="ti ti-trash text-white"></i>
                                                            </a>
                                                            <?php echo Form::close(); ?>

                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td class="text-center h5"><?php echo e(__('No data found')); ?></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="useradd-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-end">
                                    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee'): ?>
                                        <p class="text-muted d-none d-sm-flex align-items-center mb-0">
                                            <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                data-url="<?php echo e(route('lead.email.create', $lead->id)); ?>"
                                                data-bs-whatever="<?php echo e(__('Create New Email')); ?>"> <span
                                                    class="text-white">
                                                    <i class="ti ti-plus " data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <h5 class="mb-0"><?php echo e(__('Email')); ?></h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <img src="" avatar="<?php echo e($email->to); ?>"
                                                        class="avatar  rounded-circle avatar-sm">
                                                </div>
                                                <div class="flex-fill ml-3">
                                                    <div class="h6 text-sm mb-0 ms-3"><?php echo e($email->to); ?> <small
                                                            class="float-end text-muted">
                                                            <?php echo e($email->created_at->diffForHumans()); ?></small></div>
                                                    <p class="text-sm lh-140 mb-0 ms-3">
                                                        <?php echo e($email->subject); ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/lead/view.blade.php ENDPATH**/ ?>