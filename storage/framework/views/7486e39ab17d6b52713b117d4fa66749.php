<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if(Session::has('success')): ?>
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-check-circle',
                msg: "<?php echo e(Session::get('success')); ?>"
            });
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-x-circle',
                msg: "<?php echo e(Session::get('error')); ?>"
            });
        <?php endif; ?>

        <?php if(Session::has('warning')): ?>
            Lobibox.notify('warning', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-error',
                msg: "<?php echo e(Session::get('warning')); ?>"
            });
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            Lobibox.notify('info', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-info-circle',
                msg: "<?php echo e(Session::get('info')); ?>"
            });
        <?php endif; ?>
    });
</script>
<?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/flash.blade.php ENDPATH**/ ?>