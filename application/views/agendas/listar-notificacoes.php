<div class="lista-notificacoes">
    <?php foreach($notificacoes as $notificacao){ ?>

        <?php 
            date_default_timezone_set('America/Sao_Paulo');

            if(empty($notificacao->agenda_notificacao)){ 
                $exibir_notificacao = true;
            }elseif($notificacao->agenda_notificacao == 1){
                
                $hora_atual = date('H:i');
            
                if($notificacao->agenda_horario_inicial >= $hora_atual){
                    $tempo = gmdate('H:i', strtotime( $notificacao->agenda_horario_inicial ) - strtotime( $hora_atual ) );
                    
                    if($tempo <= '00:30'){
                        $exibir_notificacao = true;
                    } elseif($tempo <= '00:15'){
                        $exibir_notificacao = true;
                    }else{
                        $exibir_notificacao = false;
                    }

                }else{
                    $exibir_notificacao = false;
                }

                
            } elseif($notificacao->agenda_notificacao == 2){
                $hora_atual = date('H:i');
            
                if($notificacao->agenda_horario_inicial >= $hora_atual){
                    $tempo = gmdate('H:i', strtotime( $notificacao->agenda_horario_inicial ) - strtotime( $hora_atual ) );
                    
                    if($tempo <= '00:15'){
                        $exibir_notificacao = true;
                    }else{
                        $exibir_notificacao = false;
                    }

                }else{
                    $exibir_notificacao = false;
                }
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