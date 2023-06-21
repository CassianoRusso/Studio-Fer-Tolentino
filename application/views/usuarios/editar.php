
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
                    <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">

                    <div class="form-group col-6">
                        <label>Nome</label>
                        <input type="text" id="first_name" name="first_name" class="form-control" style="text-transform: capitalize;" value="<?php echo $usuario->first_name; ?>">
                    </div>
                    <div class="form-group col-6">
                        <label>Sobrenome</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" style="text-transform: capitalize;" value="<?php echo $usuario->last_name; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-5">
                        <label>E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $usuario->email; ?>">
                        <?php echo form_error('email', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-5">
                        <label>Usuário</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $usuario->username; ?>">
                        <?php echo form_error('username', '<div class="form-text text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-2">
                        <label>Usuário ativo</label>
                        <select id="active" name="active" class="form-control selectric">
                            <option <?php if($usuario->active == 0){ echo 'selected'; } ?> value="0">Não</option>
                            <option <?php if($usuario->active == 1){ echo 'selected'; } ?> value="1">Sim</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label>Senha</label>
                        <input type="password" id="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
                    </div>
                    <div class="form-group col-6">
                        <label>Confirmar senha</label>
                        <input type="password" id="confirma" name="confirma" class="form-control" value="<?php echo set_value('confirma'); ?>">
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
