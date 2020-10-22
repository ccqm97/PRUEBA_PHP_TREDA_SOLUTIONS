      </div>
      <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
            <span>Copyright © TransmiApp 2020</span>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- info Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>TiendApp<i class="fas fa-store"></i> V1.0</strong></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
                Aplicación desarrollada por:
                <br>
                <br>
                <h2 style="font-size: 30px;"><i class="fas fa-user-tie"></i> Cristian Camilo Quiroga Moreno</h2> 
        </div>
        <div class="modal-footer">
          <div class="container my-auto">
              <div class="copyright text-center my-auto">
              <span>Copyright © TiendApp 2020</span>
              </div>
          </div>  
        </div>
      </div>
    </div>
  </div> 

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>

  <!-- DataTable-->    
  <script src="<?php echo base_url();?>assets/DataTable/datatables.min.js"></script>
 
  <!-- PNotify -->
  <script src="<?php echo base_url();?>assets/pnotify/dist/pnotify.js"></script>
  <script src="<?php echo base_url();?>assets/pnotify/dist/pnotify.buttons.js"></script>
  <script src="<?php echo base_url();?>assets/pnotify/dist/pnotify.nonblock.js"></script>

  <!-- TimePicker-->
  <script src="<?php echo base_url();?>assets/timepicker/js/timepicker.js"></script>
  <script type="text/javascript">
    var baseUrl = "<?php echo base_url();?>";
    $(document).ready(function (){
        $('.ui-pnotify').remove();
    });
  </script>
  <!--Script propios-->  
  <?php if($this->uri->segment(2)=='moduloCrearTienda') { ?>
    <script src="<?= base_url();?>js/jsTienda.js"></script>
  <?php }?>
  <?php if($this->uri->segment(2)=='moduloCrearProducto') { ?>
    <script src="<?= base_url();?>js/jsProducto.js"></script>
  <?php }?>
</body>

</html>