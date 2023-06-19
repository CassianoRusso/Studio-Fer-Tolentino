
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
                <div class="form-row">
                    <div class="form-group col-6">
                        <label>Nome do serviço</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
                                    <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zm7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                                  </svg>
                                </div>
                            </div>
                            <input type="text" id="servico_nome" name="servico_nome" class="form-control" value="<?php echo ucwords(set_value('servico_nome')); ?>">
                        </div>
                        <?php echo form_error('servico_nome', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-4">
                        <label>Valor em R$</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="far fa-money-bill-alt"></i>
                              </div>
                            </div>
                            <input type="text" id="servico_valor" name="servico_valor" class="form-control money" value="<?php echo set_value('servico_valor'); ?>">
                        </div>
                        <?php echo form_error('servico_valor', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Serviço ativo</label>
                        <select name="servico_ativo" class="form-control selectric" value="<?php echo set_value('servico_ativo'); ?>">
                          <option value="0">Não</option>
                          <option selected value="1">Sim</option>  
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Descrição do serviço</label>
                        <textarea name="servico_descricao" class="summernote form-control"><?php echo set_value('servico_descricao'); ?></textarea>
                    </div>
                    <?php echo form_error('servico_descricao', '<div class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="card-footer text-left">
              <button type="submit" id="valida-servico" class="btn btn-primary mr-1">Salvar</button>
              <a href="<?php echo base_url('listar-servicos'); ?>" class="btn btn-warning">Voltar</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

</div>
