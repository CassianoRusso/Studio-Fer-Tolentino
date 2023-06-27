<?php $this->load->view('layout/navbar'); ?>
<?php $this->load->view('layout/sidebar', $pagina); ?>

<!-- Main Content -->
<div class="main-content">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" style="font-size: 18px;">
        <strong>
          <?php echo $titulo; ?>
        </strong>
      </li>
    </ol>
  </nav>
  <!-- Mensagem de SUCESSO -->
  <?php if($mensagem = $this->session->flashdata('sucesso')){ ?>
  <div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
      <?php echo $mensagem; ?>
    </div>
  </div>
  <?php } ?>
  <!-- Fim da Mensagem de SUCESSO -->

  <!-- Mensagem de ERRO -->
  <?php if($mensagem = $this->session->flashdata('erro')){ ?>
  <div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
      <?php echo $mensagem; ?>
    </div>
  </div>
  <?php } ?>
  <!-- Fim da Mensagem de ERRO -->
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header justify-content-end">
              <a href="<?php echo base_url('tabela-agendas'); ?>" class="btn btn-info mr-2">
                <i class="fa fa-table"></i>
                <strong>Tabela</strong>
              </a>
              <a href="<?php echo base_url('cadastrar-agenda'); ?>" class="btn btn-success">
                <i class="fa fa-plus"></i>
                <strong>Agendar</strong>
              </a>
            </div>

            <div class="card-body">
              <div id="calendar">
                <?php 
                  $eventos = "";
                  foreach ($agendas as $agenda) {

                    $assunto = str_replace("'", "&#39;",$agenda->agenda_assunto);
                    $assunto = str_replace('"', '\&#34;',$agenda->agenda_assunto);
                    
                    $eventos = $eventos.',{"id":"'.$agenda->agenda_id.'", "title":"'.$assunto.'", "start":"'.implode('-', array_reverse(explode('/', $agenda->agenda_data))).'T'.$agenda->agenda_horario_inicial.'", "end":"'.implode('-', array_reverse(explode('/', $agenda->agenda_data))).'T'.$agenda->agenda_horario_final.'", "url":"'.base_url("detalhes-agenda/" . $agenda->agenda_id).'", "backgroundColor": "#f76fbb", "borderColor": "#f76fbb", "textColor": "#fff"}';
                    
                  }

                  $eventos = substr($eventos, 1);
                  $eventos = "[".$eventos."]";
                ?>
                <input type="hidden" name="eventos" id="eventos" value='<?php echo $eventos; ?>'>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>