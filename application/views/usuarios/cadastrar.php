
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
          <div class="card-header">
          </div>
          <form method="POST">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label>Nome</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" style="text-transform: capitalize;" value="<?php echo ucwords(set_value('first_name')); ?>">
                    </div>
                    <div class="form-group col-6">
                        <label>Sobrenome</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" style="text-transform: capitalize;" value="<?php echo ucwords(set_value('last_name')); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-5">
                        <label>E-mail</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                              </div>
                            </div>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo ucwords(set_value('email')); ?>">
                        </div>
                        <?php echo form_error('email', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-5">
                        <label>Usuário</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-user-alt"></i>
                              </div>
                            </div>
                            <input type="text" id="username" name="username" class="form-control" value="<?php echo ucwords(set_value('username')); ?>">
                        </div>
                        <?php echo form_error('username', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Usuário ativo</label>
                        <select id="active" name="active" class="form-control selectric" value="<?php echo set_value('active'); ?>">
                            <option value="0">Não</option>
                            <option selected value="1">Sim</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label>Senha</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-lock"></i>
                            </div>
                          </div>
                          <input type="password" id="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
                        </div>
                        <?php echo form_error('password', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-6">
                        <label>Confirmar senha</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-lock"></i>
                            </div>
                          </div>
                          <input type="password" id="confirma" name="confirma" class="form-control" value="<?php echo set_value('confirma'); ?>">
                        </div>
                        <?php echo form_error('confirma', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                </div>
            </div>

            <div class="card-footer text-left">
              <button type="submit" id="valida-usuario" class="btn btn-primary mr-1">Salvar cadastro</button>
              <a href="<?php echo base_url('usuarios'); ?>" class="btn btn-warning">Voltar</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

</div>
