
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
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">

        <div class="card">
          <form method="POST">
            <div class="card-body">
                <input type="hidden" name="cliente_id" value="<?php echo $cliente->cliente_id; ?>">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label>Nome do cliente</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-user-tie"></i>
                                </div>
                            </div>
                            <input type="text" id="cliente_nome" name="cliente_nome" class="form-control" style="text-transform: capitalize;" value="<?php echo $cliente->cliente_nome; ?>">
                        </div>
                        <?php echo form_error('cliente_nome', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-6">
                        <label>Telefone para contato</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="text" id="cliente_telefone" name="cliente_telefone" class="form-control sp_celphones" value="<?php echo $cliente->cliente_telefone; ?>">
                        </div>
                        <?php echo form_error('cliente_telefone', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-6">
                        <label>E-mail</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="email" id="cliente_email" name="cliente_email" class="form-control" value="<?php echo $cliente->cliente_email; ?>">
                        </div>
                        <?php echo form_error('cliente_email', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-4">
                        <label>Data de aniversário</label>
                        <input type="date" id="cliente_aniversario" name="cliente_aniversario" class="form-control" value="<?php echo $cliente->cliente_aniversario; ?>">
                        <?php echo form_error('cliente_aniversario', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Cliente ativo</label>
                        <select id="cliente_ativo" name="cliente_ativo" class="form-control selectric">
                            <option <?php echo ($cliente->cliente_ativo == 0 ? 'selected' : '') ;?> value="0">Não</option>
                            <option <?php echo ($cliente->cliente_ativo == 1 ? 'selected' : '') ;?> value="1">Sim</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Outras informações</label>
                        <textarea name="cliente_informacao" class="summernote form-control"><?php echo $cliente->cliente_informacao; ?></textarea>
                    </div>
                </div>
            </div>
            
            <div class="card-footer text-left">
              <button type="submit" id="valida-cliente" class="btn btn-primary mr-1">Salvar</button>
              <a href="<?php echo base_url('listar-clientes'); ?>" class="btn btn-warning">Voltar</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

</div>
