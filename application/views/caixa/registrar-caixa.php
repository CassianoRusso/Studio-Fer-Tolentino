
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
                  <div id="selecionar-produto-servico" class="form-group col-4">
                    <label>Registrar um Produto/Serviço <small>(opcional)</small></label>
                    <select class="form-control selectric" name="caixa_servico_produto" value="<?php echo set_value('caixa_servico_produto'); ?>">
                      <option value="0">Selecione uma opção</option>
                      <option value="1">Serviço</option>
                      <option value="2">Produto</option>
                    </select>
                  </div>

                  <div id="selecionar-servico" class="form-group col-4 flex-column justify-content-between d-none">
                    <label>Serviços</label>
                    
                    <select name="servicos_servico_id" class="form-control select2" value="<?php echo set_value('servicos_servico_id'); ?>">
                      <option value="0">Selecione um serviço</option>
                      <?php foreach($servicos as $servico){ ?>  
                        <option value="<?php echo $servico->servico_id; ?>" data-preco="<?php echo $servico->servico_valor; ?>"><?php echo $servico->servico_nome; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div id="selecionar-produto" class="form-group col-4 flex-column justify-content-between d-none">
                    <label>Produtos</label>
                    
                    <select name="produtos_produto_id" class="form-control select2" value="<?php echo set_value('produtos_produto_id'); ?>">
                      <option value="0">Selecione um produto</option>
                      <?php foreach($produtos as $produto){ ?>  
                        <option value="<?php echo $produto->produto_id; ?>" data-preco="<?php echo $produto->produto_valor; ?>"><?php echo $produto->produto_nome; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-4">
                    <label>* Valor</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="far fa-money-bill-alt"></i>
                          </div>
                        </div>
                        <input type="text" id="caixa_valor" name="caixa_valor" class="form-control money" value="<?php echo set_value('caixa_valor'); ?>">
                    </div>
                    <?php echo form_error('caixa_valor', '<div class="form-text text-danger">', '</div>'); ?>
                  </div>

                  <div class="form-group col-4">
                    <label>* Tipo de operação</label>
                    
                    <select id="caixa_status" name="caixa_status" class="form-control selectric">
                      <option value="1">Entrada</option>
                      <option value="0">Saída</option>
                    </select>
                  </div>

                  <div class="form-group col-4">
                    <label>Cliente <small>(opcional)</small></label>
                    
                    <select name="clientes_cliente_id" class="form-control select2" value="<?php echo set_value('clientes_cliente_id'); ?>">
                      <option value="0">Selecione um cliente</option>
                      <?php foreach($clientes as $cliente){ ?>  
                        <option value="<?php echo $cliente->cliente_id; ?>"><?php echo $cliente->cliente_nome; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Descrição</label>
                        <textarea name="caixa_descricao" class="summernote form-control"><?php echo set_value('caixa_descricao'); ?></textarea>
                    </div>
                </div>

                <input type="hidden" name="caixa_data" class="form-control" value="<?php echo (date('Y-m-d H:i')); ?>">
                    
            </div>

            <div class="card-footer text-left">
              <button type="submit" id="valida-registro-caixa" class="btn btn-primary mr-1">Salvar</button>
              <a href="<?php echo base_url(); ?>" class="btn btn-warning">Voltar</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

</div>
