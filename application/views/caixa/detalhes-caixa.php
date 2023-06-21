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
                        <div class="collapse show">
                            
                            <?php if(!empty($caixa->caixa_descricao)){ ?>
                                <div class="card-body row pt-2 pb-2">
                                    <div class="col-12">
                                        <?php echo $caixa->caixa_descricao; ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="card-body row pt-2 pb-2">
                                    <div class="col-12 text-center">
                                        <strong>Não possui mais informações</strong>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>