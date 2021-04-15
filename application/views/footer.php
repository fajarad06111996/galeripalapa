          <footer class="footer">
        <div class="container">
          <nav class="float-left">
           
          </nav>
           <div class="card ">
                <div class="card-body ">
          <div class="copyright float-center">
             Galeri Palapa 44.&copy; <?php echo date('20y'); ?>
            <!--  <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by  -->
           
          </div>
        </div>
      </footer>
    </div>
  </div>
             
              <!--   Core JS Files   -->
              <script src="<?php echo base_url(""); ?>assets/js/core/jquery.min.js"></script>
              <script src="<?php echo base_url(""); ?>assets/js/core/popper.min.js"></script>
              <script src="<?php echo base_url(""); ?>assets/js/core/bootstrap-material-design.min.js"></script>
              <script src="<?php echo base_url(""); ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
              <!-- Plugin for the momentJs  -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/moment.min.js"></script>
              <!--  Plugin for Sweet Alert -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/sweetalert2.js"></script>
              <!-- Forms Validations Plugin -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jquery.validate.min.js"></script>
              <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jquery.bootstrap-wizard.js"></script>
              <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/bootstrap-selectpicker.js"></script>
              <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
              <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jquery.dataTables.min.js"></script>
              <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/bootstrap-tagsinput.js"></script>
              <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jasny-bootstrap.min.js"></script>
              <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/fullcalendar.min.js"></script>
              <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/jquery-jvectormap.js"></script>
              <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/nouislider.min.js"></script>
              <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
              <!-- Library for adding dinamically elements -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/arrive.min.js"></script>
              <!--  Google Maps Plugin    -->
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
              <!-- Place this tag in your head or just before your close body tag. -->
              <script async defer src="https://buttons.github.io/buttons.js"></script>
              <!-- Chartist JS -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/chartist.min.js"></script>
              <!--  Notifications Plugin    -->
              <script src="<?php echo base_url(""); ?>assets/js/plugins/bootstrap-notify.js"></script>
              <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
              <script src="<?php echo base_url(""); ?>assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
              <!-- Material Dashboard DEMO methods, don't include it in your project! -->
              <script src="<?php echo base_url(""); ?>assets/demo/demo.js"></script>
			   <script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>

</body>

</html>