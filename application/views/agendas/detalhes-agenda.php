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
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <i class="fas fa-calendar" style="font-size: 16px"></i> &nbsp;
                                <?php echo $agenda->agenda_assunto; ?>
                            </h4>
                            <div class="card-header-action">
                                <?php if(isset($servico->servico_id) && $agenda->agenda_status_servico == 1){ ?>
                                    <button class="btn btn-success" data-toggle="tooltip" data-original-title="Serviço Finalizado"> 
                                        <i class="fas fa-check"></i>
                                    </button>
                                <?php } ?>
                                <a href="<?php echo base_url("editar-agenda/".$agenda->agenda_id); ?>" class="btn btn-info"
                                    data-toggle="tooltip" data-original-title="Editar" >
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="excluir" class="btn btn-danger" data-toggle="modal"
                                    data-target="#agenda-<?php echo $agenda->agenda_id; ?>"
                                    data-original-title="Excluir">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="collapse show">
                            <?php if(isset($cliente->cliente_id)){ ?>
                                <div class="card-body pt-2 pb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <strong>Nome do cliente</strong>
                                            <p>
                                                <?php echo $cliente->cliente_nome; ?>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <strong>Telefone</strong>
                                            <p>
                                                <?php echo $cliente->cliente_telefone; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="card-body pt-2 pb-2">
                                <div class="row">
                                    <?php if(isset($servico->servico_id)){ ?>
                                        <div class="col-6">
                                            <strong>Serviço</strong>
                                            <p>
                                                <?php echo $servico->servico_nome; ?> - <strong>R$ <?php echo $servico->servico_valor; ?></strong>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    
                                    <div class="col-6 row">
                                        <div class="col-4">
                                            <strong>Dia</strong>
                                            <p>
                                                <?php echo formata_data_banco_sem_hora($agenda->agenda_data); ?>
                                            </p>
                                        </div>
                                        <div class="col-8">
                                            <strong>Horário</strong>
                                            <p>
                                                Das <strong><?php echo date('H:i', strtotime($agenda->agenda_horario_inicial)); ?></strong> 
                                                às <strong><?php echo date('H:i', strtotime($agenda->agenda_horario_final)); ?></strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if(!empty($agenda->agenda_descricao)){ ?>
                                <div class="card-body row pt-2 pb-2">
                                    <div class="col-6">
                                        <strong>Outras informações</strong>
                                        <p>
                                            <?php echo $agenda->agenda_descricao; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        
                        <?php if(isset($servico->servico_id) && $agenda->agenda_status_servico == 0){ ?>
                            <div class="card-footer">
                                <a href="<?php echo base_url("agenda-finalizar/".$agenda->agenda_id); ?>" class="btn btn-success float-right" data-toggle="tooltip" data-original-title="Finalizar" >
                                    <i class="fas fa-check"></i>
                                    Finalizar
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Vertically Center -->
    <div class="modal fade" id="agenda-<?php echo $agenda->agenda_id; ?>" tabindex="-1" role="dialog"
        aria-labelledby="agenda" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tem certeza que deseja excluir esse agendamento?
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Para excluir clique em "Confirmar".
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <a href="<?php echo base_url('deletar-agenda/'.$agenda->agenda_id); ?>"
                        class="btn btn-primary">Confirmar</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>