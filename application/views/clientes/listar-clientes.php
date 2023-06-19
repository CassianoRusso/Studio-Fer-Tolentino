
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
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header justify-content-end">
            <a href="<?php echo base_url('cadastrar-cliente'); ?>" class="btn btn-success">
                <i class="fa fa-plus"></i>
                <strong>Novo Cliente</strong>
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered dataTable no-footer" id="dataTable" style="width:100%;">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Nome do cliente</th>
                    <th>Telefone</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($clientes as $cliente){ ?>
                    <tr>
                      <td class="text-center"><?php echo $cliente->cliente_id; ?></td>
                      <td><?php echo $cliente->cliente_nome; ?></td>
                      <td><?php echo $cliente->cliente_telefone; ?></td>
                      <td class="text-center">
                        <?php if($cliente->cliente_ativo == 1){ ?>
                          <div class="badge badge-success badge-shadow">Ativo</div>
                        <?php }else{ ?>
                          <div class="badge badge-warning badge-shadow">Inativo</div>
                        <?php } ?>
                      </td>
                      <td class="text-center">
                        <a href="<?php echo base_url('editar-cliente/'.$cliente->cliente_id); ?>" class="btn btn-info btn-action mr-1" data-toggle="tooltip" data-original-title="Editar">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="excluir" class="btn btn-danger btn-action mr-1" data-toggle="modal" data-target="#cliente-<?php echo $cliente->cliente_id; ?>" data-original-title="Excluir">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <!-- Vertically Center -->
                    <div class="modal fade" id="cliente-<?php echo $cliente->cliente_id; ?>" tabindex="-1" role="dialog"
                      aria-labelledby="cliented" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tem certeza que deseja excluir esse cliente?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Para excluir esse cliente clique em "Confirmar".
                          </div>
                          <div class="modal-footer bg-whitesmoke br">
                            <a href="<?php echo base_url('deletar-cliente/'.$cliente->cliente_id); ?>" class="btn btn-primary">Confirmar</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
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
