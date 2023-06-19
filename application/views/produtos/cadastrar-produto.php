
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
                        <label>Nome do produto</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
                                    </svg>
                                </div>
                            </div>
                            <input type="text" id="produto_nome" name="produto_nome" class="form-control" value="<?php echo ucwords(set_value('produto_nome')); ?>">
                        </div>
                        <?php echo form_error('produto_nome', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-4">
                        <label>Valor em R$</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="far fa-money-bill-alt"></i>
                              </div>
                            </div>
                            <input type="text" id="produto_valor" name="produto_valor" class="form-control money" value="<?php echo set_value('produto_valor'); ?>">
                        </div>
                        <?php echo form_error('produto_valor', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Produto ativo</label>
                        <select name="produto_ativo" class="form-control selectric" value="<?php echo set_value('produto_ativo'); ?>">
                          <option value="0">Não</option>
                          <option selected value="1">Sim</option>  
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Descrição do produto</label>
                        <textarea name="produto_descricao" class="summernote form-control"><?php echo set_value('produto_descricao'); ?></textarea>
                    </div>
                    <?php echo form_error('produto_descricao', '<div class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="card-footer text-left">
              <button type="submit" id="valida-produto" class="btn btn-primary mr-1">Salvar</button>
              <a href="<?php echo base_url('cadastrar-produto'); ?>" class="btn btn-warning">Voltar</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>


  <?php $this->load->view('layout/setting') ?>

</div>
