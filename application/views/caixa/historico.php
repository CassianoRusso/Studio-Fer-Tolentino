
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
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped dataTable no-footer" id="dataTable" style="width:100%;">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Cliente</th>
                      <th>Produto / Serviço</th>
                      <th>Valor</th>
                      <th>Dia e Horário</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($caixa as $cx){ ?>
                      <tr href="<?php echo base_url(); ?>">
                        <td class="text-center col-1"><?php echo $cx->caixa_id; ?></td>
                        <td class="col-3">
                          <?php if(empty($cx->clientes_cliente_id)){ ?>
                            <span class="row justify-content-center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"></path>
                              </svg>
                            </span>
                          <?php }else{ ?>
                            <?php foreach($clientes as $cliente){ ?>
                              <?php if($cx->clientes_cliente_id == $cliente->cliente_id){ ?>
                                <div><?php echo $cliente->cliente_nome; ?></div>
                              <?php } ?>
                            <?php } ?>
                          <?php } ?>
                        </td>
                        <td class="col-3">
                          <?php if(empty($cx->servicos_servico_id) && empty($cx->produtos_produto_id)){ ?>
                            <span class="row justify-content-center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"></path>
                              </svg>
                            </span>
                          <?php }elseif($cx->servicos_servico_id > 0){ ?>
                            <small><strong>Serviço:</strong></small>
                            <?php foreach($servicos as $servico){ ?>
                              <?php if($cx->servicos_servico_id == $servico->servico_id){ ?>
                                <div><?php echo $servico->servico_nome; ?></div>
                              <?php } ?>
                            <?php } ?>
                          <?php }else{ ?>
                            <small><strong>Produto:</strong></small>
                            <?php foreach($produtos as $produto){ ?>
                              <?php if($cx->produtos_produto_id == $produto->produto_id){ ?>
                                <div><?php echo $produto->produto_nome; ?></div>
                              <?php } ?>
                            <?php } ?>
                          <?php } ?>
                        </td>
                        <td class="col-2">
                          <strong class="<?php echo $cx->caixa_status > 0 ? 'text-success' : 'text-danger' ; ?>">
                            <?php echo $cx->caixa_status > 0 ? 'R$ +'. $cx->caixa_valor : 'R$ '. $cx->caixa_valor ; ?>
                          </strong>
                        </td>
                        <td class="col-2"><?php echo formata_data_banco_com_hora($cx->caixa_data); ?></td>
                        <td class="col-2">
                          <a href="<?php echo base_url('detalhes-caixa/'.$cx->caixa_id); ?>" class="btn btn-warning user-img-radious-style" style="line-height: 1.5; letter-spacing: 0;" data-toggle="tooltip" data-original-title="+ informações">
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
