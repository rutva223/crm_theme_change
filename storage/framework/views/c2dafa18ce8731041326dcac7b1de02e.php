<!doctype html>
<html lang="en">

<head>
    <?php echo $__env->make('partials.admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title><?php echo $__env->yieldContent('page-title'); ?> | Admin</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php echo $__env->make('partials.admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <header>
            <?php echo $__env->make('partials.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

        <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="body">
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal" style="background-color: rgba(0, 0, 0, 0.7);">
            <span class="close">&times;</span>
            <div class="modal-content" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);width: 80%;max-width: 700px;border-radius: 5px;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                <img id="modalImage" src="" alt="Modal Image">
            </div>
        </div>
        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <footer class="page-footer">
            <p class="mb-0">Copyright © <?php echo date('Y'); ?>. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->

    <!--end switcher-->
    <!-- Bootstrap JS -->
    <?php echo $__env->yieldPushContent('script-page'); ?>
    <!-- Javascript -->
    <?php echo $__env->make('partials.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('after-scripts'); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/layouts/admin.blade.php ENDPATH**/ ?>