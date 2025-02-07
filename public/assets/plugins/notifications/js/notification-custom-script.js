document.addEventListener("DOMContentLoaded", function () {
    if (typeof sessionMessages !== 'undefined') {
        if (sessionMessages.success) {
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                size: 'mini',
                icon: 'bx bx-check-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: sessionMessages.success
            });
        }

        if (sessionMessages.error) {
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                icon: 'bx bx-x-circle',
                size: 'mini',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: sessionMessages.error
            });
        }

        if (sessionMessages.warning) {
            Lobibox.notify('warning', {
                pauseDelayOnHover: true,
                icon: 'bx bx-error',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                size: 'mini',
                msg: sessionMessages.warning
            });
        }

        if (sessionMessages.info) {
            Lobibox.notify('info', {
                pauseDelayOnHover: true,
                icon: 'bx bx-info-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                size: 'mini',
                msg: sessionMessages.info
            });
        }
    }
});
