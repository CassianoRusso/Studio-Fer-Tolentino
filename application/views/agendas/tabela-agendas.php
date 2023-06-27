
<?php $this->load->view('layout/navbar'); ?>
<?php $this->load->view('layout/sidebar', $pagina); ?>

<!-- Main Content -->
<div class="main-content">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" style="font-size: 18px;">
          <strong><?php echo $titulo; ?></strong>
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

  <section class="section caixa-historico">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header justify-content-end">
              <a href="<?php echo base_url('listar-agendas'); ?>" class="btn btn-info mr-2">
                <i class="fa fa-calendar"></i>
                <strong>Calendário</strong>
              </a>
              <a href="<?php echo base_url('cadastrar-agenda'); ?>" class="btn btn-success">
                <i class="fa fa-plus"></i>
                <strong>Agendar</strong>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped dataTable no-footer" id="dataTable" style="width:100%;">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Assunto</th>
                      <th>Cliente</th>
                      <th>Serviço</th>
                      <th>Dia e Horário</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($agendas as $agenda) { ?>
                      <tr href="<?php echo base_url(); ?>">
                        <td class="text-center col-1"><?php echo $agenda->agenda_id; ?></td>
                        <td class="col-3"><?php echo $agenda->agenda_assunto; ?></td>
                        <td class="col-3">
                          <?php if(empty($agenda->clientes_cliente_id)){ ?>
                            <span class="row justify-content-center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"></path>
                              </svg>
                            </span>
                          <?php }else{ ?>
                            <?php foreach($clientes as $cliente){ ?>
                              <?php if($agenda->clientes_cliente_id == $cliente->cliente_id){ ?>
                                <div><?php echo $cliente->cliente_nome; ?></div>
                              <?php } ?>
                            <?php } ?>
                          <?php } ?>
                        </td>
                        <td class="col-3">
                        <?php if(empty($agenda->servicos_servico_id)){ ?>
                            <span class="row justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"></path>
                                </svg>
                            </span>
                        <?php }else{ ?>
                            <small><strong>Serviço:</strong></small>
                            <?php foreach($servicos as $servico){ ?>
                                <?php if($agenda->servicos_servico_id == $servico->servico_id){ ?>
                                <div><?php echo $servico->servico_nome; ?></div>
                                <?php } ?>
                            <?php } ?>  
                        <?php } ?>  
                        </td>
                        <td class="col-2">
                            <?php echo formata_data_banco_sem_hora($agenda->agenda_data); ?><br>
                            Das <strong><?php echo date('H:i', strtotime($agenda->agenda_horario_inicial)); ?></strong> 
                            às <strong><?php echo date('H:i', strtotime($agenda->agenda_horario_final)); ?></strong>
                        </td>
                        <td class="col-2">
                          <a href="<?php echo base_url('detalhes-agenda/'.$agenda->agenda_id); ?>" class="btn btn-warning user-img-radious-style" style="line-height: 1.5; letter-spacing: 0;" data-toggle="tooltip" data-original-title="+ informações">
                            <i class="fas fa-info"></i>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
