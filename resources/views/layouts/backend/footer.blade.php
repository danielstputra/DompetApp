        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Maju Bersama Atomic Indonesia</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/scrollbar/simplebar.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/sidebar-menu.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/select2/select2.full.min.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/select2/select2-custom.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/height-equal.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/datatable/datatables/datatable.custom.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/script.js"></script>
    <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/theme-customizer/customizer.js"></script>
    <!-- login js-->

    <script>
    $(function () {
      $('#table-dompet').DataTable({
        'language' : {
          'url' : '/templates/backend/CyberFrostModernTheme/js/datatable/datatables/indonesia.json',
          'sEmptyTable' : 'Tidads'
        }
      });
      $('#table-dompet-masuk').DataTable({
        'language' : {
          'url' : '/templates/backend/CyberFrostModernTheme/js/datatable/datatables/indonesia.json',
          'sEmptyTable' : 'Tidads'
        }
      });
      $('#table-dompet-keluar').DataTable({
        'language' : {
          'url' : '/templates/backend/CyberFrostModernTheme/js/datatable/datatables/indonesia.json',
          'sEmptyTable' : 'Tidads'
        }
      });
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
    </script>
    <!-- Plugin used-->
    @stack('js')
  </body>
</html>