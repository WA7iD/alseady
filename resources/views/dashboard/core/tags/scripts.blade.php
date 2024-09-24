<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dashboard/js/adminlte.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('dashboard/plugins/toastr/toastr.min.js') }}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('dashboard/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dashboard/js/demo.js') }}"></script>
<script src="{{ asset('dashboard/js/pages/dashboard3.js') }}"></script>
<script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
        $('.select2').select2({
            language: {
                searching: function() {}
            },
        });
    });
</script>

@yield('js_addons')
