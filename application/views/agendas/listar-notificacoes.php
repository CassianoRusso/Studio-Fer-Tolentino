<div class="lista-notificacoes">
    <?php foreach($notificacoes as $notificacao){ ?>

        <?php 
            if(empty($notificacao->agenda_notificacao)){ 
                $exibir_notificacao = true;

            } elseif($notificacao->agenda_notificacao < 3){
                $exibir_notificacao = true;
            } else { 
                $exibir_notificacao = false; 
            } 
        ?>

        <?php if($exibir_notificacao){ ?>
        <a href="<?php echo base_url('detalhes-agenda/'.$notificacao->agenda_id); ?>" class="dropdown-item dropdown-item-unread">
            <span class="dropdown-item-icon bg-primary text-white">
                <i class="fas fa-calendar"></i>
            </span>
            <span class="dropdown-item-desc">
                <?php echo $notificacao->agenda_assunto; ?>
                <span class="time">
                    <?php echo formata_data_banco_sem_hora($notificacao->agenda_data); ?>
                    Das <strong><?php echo date('H:i', strtotime($notificacao->agenda_horario_inicial)); ?></strong> 
                    às <strong><?php echo date('H:i', strtotime($notificacao->agenda_horario_final)); ?></strong>
                </span>
            </span>
        </a> 
        <?php } ?>
    <?php } ?>
</div>