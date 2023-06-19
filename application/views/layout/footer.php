  <?php if($pagina != 'login'){ ?>
          <footer class="main-footer">
            <div class="text-center"><strong> Studio Fer Tolentino </strong> </div>
            <div class="text-center">Todos os direitos reservados &copy; <?php echo date('Y'); ?></div>
          </footer>
        </div>
      </div>
  <?php } ?>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Clique em "<strong>Sair</strong>" para encerrar a sessão.</div>
        <div class="modal-footer">
          <button class="btn btn-light btn-sm" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger btn-sm" href="<?php echo base_url('login/loguot'); ?>">Sair</a>
        </div>
      </div>
    </div>
  </div>
    
  <!-- General JS Scripts -->
  <script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
  
  <?php if(isset($login)){ ?>
      <script src="<?php echo base_url('assets/js/login.js'); ?>"></script>
  <?php } ?>

  <?php if(isset($formulario)){ ?>
    <script src="<?php echo base_url('assets/bundles/jquery-selectric/jquery.selectric.min.js'); ?>"></script>
    <!-- <script src="<?php echo base_url('assets/js/page/forms-advanced-forms.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/js/mask/app.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/mask/jquery.mask.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/principal/scripts.js'); ?>"></script>
  <?php } ?>

  <?php if(isset($datatables)){ ?>
    <script src="<?php echo base_url('assets/bundles/datatables/datatables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/page/datatables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/principal/traducao.js'); ?>"></script>
  <?php } ?>

  <?php if(isset($plugin_calendar)){ ?>
			<script src="<?php echo base_url("assets/bundles/fullcalendar/fullcalendar.min.js"); ?>"></script>
			<script src="<?php echo base_url("assets/js/calendar/fullcalendar.js"); ?>"></script>
  <?php } ?>

  <?php if (isset($chart)) { ?>
    <script src="<?php echo base_url("assets/bundles/chartjs/Chart.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/page/chart-area-demo.js") ?>"></script>
  <?php } ?>

  <?php if (isset($modal)) { ?>
    <script src="<?php echo base_url("assets/bundles/prism/prism.js") ?>"></script>
  <?php } ?>

  <?php if (isset($plugin_editor)) { ?>
    <script src="<?php echo base_url("assets/bundles/summernote/summernote-bs4.js"); ?>"></script>
  <?php } ?>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
  
  <!-- Custom JS File -->
  <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
  
  <script>
    //Notificação
    $(document).ready(function(){
      atualizarTarefas();
      setInterval("atualizarTarefas()", 1000);
    });

    function atualizarTarefas() {
      var url="<?php echo base_url('/listar-notificacoes'); ?>";

      $.ajax({

        url: url,
        type: "GET"

      }).done((data) => {
        var qtd = 0;
        var item = $(data).html();
        
        $(item).each(function(){
          if($(this).hasClass("dropdown-item")){
            qtd++;
          }
        });

        if(qtd > 0){
          $(".dropdown-menu.dropdown-list .dropdown-list-body").html(data);
          $(".navbar .notification-toggle .feather-bell").addClass("bell");
          $(".navbar .notification-toggle .badge").html(qtd);
        }
        
      });

      
    }
  </script>
  
</body>

</html>
