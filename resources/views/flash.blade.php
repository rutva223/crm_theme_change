<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(Session::has('success'))
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-check-circle',
                msg: "{{ Session::get('success') }}"
            });
        @endif

        @if(Session::has('error'))
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-x-circle',
                msg: "{{ Session::get('error') }}"
            });
        @endif

        @if(Session::has('warning'))
            Lobibox.notify('warning', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-error',
                msg: "{{ Session::get('warning') }}"
            });
        @endif

        @if(Session::has('info'))
            Lobibox.notify('info', {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-info-circle',
                msg: "{{ Session::get('info') }}"
            });
        @endif
    });
</script>
