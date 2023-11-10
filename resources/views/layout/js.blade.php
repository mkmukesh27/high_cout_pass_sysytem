        <!-- JQUERY JS -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- SIDE-MENU JS -->
        <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
        <!-- Perfect SCROLLBAR JS-->
        <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
        <!-- STICKY JS -->
        <script src="{{ asset('assets/js/sticky.js') }}"></script>
        <!-- COLOR THEME JS -->
        <script src="{{ asset('assets/js/themeColors.js') }}"></script>
        <!-- CUSTOM JS -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <!-- Sweet-alert js  -->
        <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweet-alert/jquery.sweet-alert.js') }}"></script>
        <!-- SWITCHER JS -->
        <script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>
        <!-- DATA TABLE JS-->
        <script src="{{ asset('assets/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/datatable/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/datatable/js/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/datatable/js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/datatable/js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/datatable/js/buttons.html5.min.js') }}"></script>
        <script>
            function successMsgAutoClose(msg) {
                $('body').removeClass('timer-alert');
                swal({
                    title: "",
                    text: msg,
                    timer: 2000
                })?.then(
                    function() {},
                    // handling the promise rejection
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            console.log('I was closed by the timer')
                        }
                    }
                )
            }
            function successMsg(msg) {
                $('body').removeClass('timer-alert');
                swal({ title: "", text: msg });
            }
            function warningMsgAutoClose(msg) {
                $('body').removeClass('timer-alert');
                swal({
                    title: "",
                    text: msg,
                    type: "warning",
                    timer: 2000
                })?.then(
                    function() {},
                    // handling the promise rejection
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            console.log('I was closed by the timer')
                        }
                    }
                )
            }
            function warningMsg(msg) {
                $('body').removeClass('timer-alert');
                swal({ title: "", text: msg, type: "warning", });
            }
            function dangerMsgAutoClose(msg) {
                $('body').removeClass('timer-alert');
                swal({
                    title: "",
                    text: msg,
                    type: "error",
                    timer: 2000
                })?.then(
                    function() {},
                    // handling the promise rejection
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            console.log('I was closed by the timer')
                        }
                    }
                )
            }
            function dangerMsg(msg) {
                $('body').removeClass('timer-alert');
                swal({ title: "", text: msg, type: "error", });
            }
        </script>
        @stack('js')
