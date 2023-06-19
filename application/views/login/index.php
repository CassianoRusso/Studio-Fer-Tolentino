

<div class="container h-100">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center h-100">

        <div class="col-xl-8 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Sessão expirada -->
                    <?php if($info = $this->session->flashdata('info')){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong><i class="fas fa-info-circle"></i> <?php echo $info; ?></strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Alerta de erro -->
                    <?php if($message = $this->session->flashdata('error')){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fas fa-exclamation-triangle"></i> <?php echo $message; ?></strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><strong>Seja Bem Vindo!</strong></h1>
                                </div>
                                <form class="user" name="form_acesso" method="POST" action="<?php echo base_url('login/acesso'); ?>">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control form-control-user" placeholder="E-mail de acesso">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control form-control-user" placeholder="Senha">
                                    </div>
                                    
                                    <button type="submit" id="btn-login" class="btn btn-primary btn-user btn-block"><strong>ENTRAR</strong></button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

</body>

</html> 