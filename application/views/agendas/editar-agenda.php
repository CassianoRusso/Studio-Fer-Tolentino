
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
                    <div class="form-group col-12">
                        <label>Assunto</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input type="text" id="agenda_assunto" name="agenda_assunto" class="form-control" value="<?php echo $agendas->agenda_assunto; ?>">
                        </div>
                        <?php echo form_error('agenda_assunto', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-6">
                        <label>Cliente</label>
                        <select name="clientes_cliente_id" class="form-control selectric" value="<?php echo set_value('clientes_cliente_id'); ?>">
                          <option value="0">Selecione um cliente</option>
                          <?php foreach($clientes as $cliente){ ?>  
                            <option <?php echo $agendas->clientes_cliente_id == $cliente->cliente_id ? 'selected' : ''; ?> value="<?php echo $cliente->cliente_id; ?>"><?php echo $cliente->cliente_nome; ?></option>
                          <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label>Serviço</label>
                        <select name="servicos_servico_id" class="form-control selectric" value="<?php echo set_value('servicos_servico_id'); ?>">
                          <option value="0">Selecione um serviço</option>
                          <?php foreach($servicos as $servico){ ?>  
                            <option <?php echo $agendas->servicos_servico_id == $servico->servico_id ? 'selected' : ''; ?> value="<?php echo $servico->servico_id; ?>"><?php echo $servico->servico_nome; ?></option>
                          <?php } ?>
                        </select>
                        <input type="hidden" name="agenda_status_servico" value="<?php echo $agendas->agenda_status_servico; ?>">
                    </div>

                    <div class="form-group col-4">
                        <label>Data marcada</label>
                        <input type="date" name="agenda_data" class="form-control" value="<?php echo $agendas->agenda_data; ?>">
                        <?php echo form_error('agenda_data', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-4">
                        <label>Horário para iniciar</label>
                        <input type="time" name="agenda_horario_inicial" class="form-control" value="<?php echo $agendas->agenda_horario_inicial; ?>">
                        <?php echo form_error('agenda_horario_inicial', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group col-4">
                        <label>Horário para terminar</label>
                        <input type="time" name="agenda_horario_final" class="form-control" value="<?php echo $agendas->agenda_horario_final; ?>">
                        <?php echo form_error('agenda_horario_final', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Descrição do serviço</label>
                        <textarea id="agenda_descricao" name="agenda_descricao" class="summernote form-control"><?php echo $agendas->agenda_descricao; ?></textarea>
                    </div>
                </div>
                
            </div>

            <div class="card-footer text-left">
              <button type="submit" id="valida-agenda" class="btn btn-primary mr-1">Salvar</button>
              <a href="<?php echo base_url('listar-agendas'); ?>" class="btn btn-warning">Voltar</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

</div>
