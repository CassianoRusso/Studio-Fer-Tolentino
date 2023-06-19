
<?php $this->load->view('layout/navbar'); ?>
<?php $this->load->view('layout/sidebar', $pagina); ?>

<!-- Main Content -->
<div class="main-content">

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
    <!-- Cards Painel -->
    <div class="row ">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h2 class="text-info font-14">SERVIÇOS</h2>
                    <h3 class="font-14">Caixa do Dia</h3>
                    <h4 class="mb-3 font-16">R$ 
                      <?php 
                        $total_dia_servico = 0; 
                        foreach($caixa_dia_servico as $dia_servico){ 
                          $total_dia_servico += floatval(str_replace(",",".", str_replace(".","",$dia_servico->caixa_valor))); 
                        } 
                        
                        echo number_format($total_dia_servico, 2, ',', '.'); 
                      ?>
                    </h4>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/1.png" alt="" width="128px">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h2 class="text-info font-14">SERVIÇOS</h2>
                    <h3 class="font-14"> Caixa Mensal</h3>
                    <h4 class="mb-3 font-16">R$ 
                      <?php 
                        $total_mes_servico = 0; 
                        foreach($caixa_mes_servico as $mes_servico){ 
                          $total_mes_servico += floatval(str_replace(",",".", str_replace(".","",$mes_servico->caixa_valor))); 
                        } 
                        
                        echo number_format($total_mes_servico, 2, ',', '.'); 
                      ?>
                    </h4>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/2.png" alt="" width="128px">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h2 class="text-success font-14">PRODUTOS</h2>
                    <h3 class="font-14">Caixa do Dia</h3>
                    <h4 class="mb-3 font-16">R$ 
                      <?php 
                        $total_dia_produto = 0; 
                        foreach($caixa_dia_produto as $dia_produto){ 
                          $total_dia_produto += floatval(str_replace(",",".", str_replace(".","",$dia_produto->caixa_valor))); 
                        } 
                        
                        echo number_format($total_dia_produto, 2, ',', '.'); 
                      ?>
                    </h4>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/3.png" alt="" width="128px">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h2 class="text-success font-14">PRODUTOS</h2>
                    <h3 class="font-14"> Caixa Mensal </h3>
                    <h4 class="mb-3 font-16">R$ 
                      <?php 
                        $total_mes_produto = 0; 
                        foreach($caixa_mes_produto as $mes_produto){ 
                          $total_mes_produto += floatval(str_replace(",",".", str_replace(".","",$mes_produto->caixa_valor))); 
                        } 
                        
                        echo number_format($total_mes_produto, 2, ',', '.'); 
                      ?>
                    </h4>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/4.png" alt="" width="128px">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fim dos Cards Painel -->

    <!-- Gráfico -->
    <?php
      //Busca os 6 últimos meses
      $mes_atual = date('m');
      $meses[0] = $mes_atual;
      for($i=1; $i < 6; $i++){
          if($mes_atual == 1){
              $mes_anterior = 12;
              $meses[$i] = $mes_anterior;
          }else{
              $mes_anterior = $mes_atual-1;
              $meses[$i] = $mes_anterior;
          }
          $mes_atual = $mes_anterior;
      } 
    ?> 
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header">
                    <h4>Estatística Financeira (últimos 6 meses)</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area" style="height: 250px;">
                        <canvas id="myAreaChart"></canvas>
                        <!-- Soma os preços de cada um dos meses -->
                        <?php for($i=0, $cont=1, $total=0; $i < 6; $i++, $cont++, $total=0){ ?>
                            
                          <?php foreach($rendimento as $renda){  ?>
                            <?php if($renda->mes == $meses[$i]){ ?>
                                <?php $total += floatval(str_replace(",",".", str_replace(".","",$renda->preco))); ?>
                            <?php } ?>
                          <?php } ?>
                            <input type="hidden" id="preco<?php echo $cont; ?>" value="<?php echo $total; ?>">

                        <?php } ?>
                        <!-- Informa o nome do mês -->      
                        <?php 
                            for($i = 0; $i < 6; $i++){
                                switch($meses[$i]){
                                    case 1 : $meses[$i] = "Janeiro";   break;
                                    case 2 : $meses[$i] = "Fevereiro"; break;
                                    case 3 : $meses[$i] = "Março";     break;
                                    case 4 : $meses[$i] = "Abril";     break;
                                    case 5 : $meses[$i] = "Maio";      break;
                                    case 6 : $meses[$i] = "Junho";     break;
                                    case 7 : $meses[$i] = "Julho";     break;
                                    case 8 : $meses[$i] = "Agosto";    break;
                                    case 9 : $meses[$i] = "Setembro";  break;
                                    case 10: $meses[$i] = "Outubro";   break;
                                    case 11: $meses[$i] = "Novembro";  break;
                                    case 12: $meses[$i] = "Dezembro";  break;
                                }
                            }
                        ?>
                        <?php $cont=0; foreach($meses as $mes){ $cont++; ?>
                          <?php if($cont == 1){ ?>
                            <input type="hidden" id="mes<?php echo $cont; ?>" value="<?php echo $mes." - Atual"; ?>">
                          <?php } ?>
                            <input type="hidden" id="mes<?php echo $cont; ?>" value="<?php echo $mes; ?>">
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Gráfico -->
    
  </section>

</div>




