<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
  <div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
    </ul>
  </div>
  <ul class="navbar-nav navbar-right" style="align-items: center;">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
        class="nav-link notification-toggle nav-link-lg message-toggle"><i data-feather="bell" class=""></i>
        <span class="badge headerBadge1"> 0 </span>
      </a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
        <div class="dropdown-header">
          Notificações
        </div>
        <div class="dropdown-list-body dropdown-list-icons"></div>
        <div class="dropdown-footer text-center">
          <a href="<?php echo base_url('listar-agendas'); ?>"> Ver agendas <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="imagem perfil" src="<?php echo base_url('assets/img/logo-studio-fer-redondo.png'); ?>">
        <span class="d-sm-none d-lg-inline-block"></span>
      </a>

      <div class="dropdown-menu dropdown-menu-right pullDown">
        <div class="dropdown-title">Olá,
          <?php echo $usuario->first_name.' '.$usuario->last_name; ?>
        </div>
        <a href="perfil" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Perfil
        </a>
        <a href="atividades" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i>
          Atividades
        </a>
        <a href="configuracoes" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i>
          Configurações
        </a>
        <div class="dropdown-divider"></div>
        <a href="sair" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          Sair
        </a>

      </div>
    </li>
  </ul>
</nav>