<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
              <a href="<?php echo base_url(); ?>"> 
                <img alt="image" src="<?php echo base_url('assets/img/logo-studio-fer-redondo.png'); ?>" class="header-logo pl-1 pr-1" /> 
                <span class="logo-name">Studio F.T.</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Gerenciamento</li>
            <li class="dropdown <?php echo ($this->router->fetch_class() == 'home' ? 'active': ''); ?>">
              <a href="<?php echo base_url('home'); ?>" class="nav-link"><i class="fas fa-home"></i><span>Painel</span></a>
            </li>
            <li class="dropdown <?php echo ($this->router->fetch_class() == 'Clientes' ? 'active': ''); ?>">
              <a href="clientes" class="menu-toggle nav-link has-dropdown"><i class="fas fa-user-tie"></i><span>Clientes</span></a>
              <ul class="dropdown-menu">
                <li class="<?php  if($pagina == "cadastrar-cliente"){ echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('cadastrar-cliente'); ?>">Cadastrar cliente</a></li>
                <li class="<?php  if($pagina == "listar-clientes"){ echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('listar-clientes'); ?>">Todos os clientes</a></li>
              </ul>
            </li>
            <li class="dropdown <?php echo ($this->router->fetch_class() == 'Servicos' ? 'active': ''); ?>">
              <a href="serviços" class="menu-toggle nav-link has-dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16" style="margin-right: 10px; margin-left: 4px; width: 28px;">
                  <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zm7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                </svg>
                <span>Serviços</span>
              </a>
              <ul class="dropdown-menu">
                <li class="<?php  if($pagina == "cadastrar-servico"){ echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('cadastrar-servico'); ?>">Cadastrar serviço</a></li>
                <li class="<?php  if($pagina == "listar-servicos"){ echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('listar-servicos'); ?>"> Todos os serviços</a></li>
              </ul>
            </li>
            <li class="dropdown <?php echo ($this->router->fetch_class() == 'Produtos' ? 'active': ''); ?>">
              <a href="serviços" class="menu-toggle nav-link has-dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16" style="margin-right: 10px; margin-left: 4px; width: 28px;">
                  <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
                </svg>
                <span>Produtos</span>
              </a>
              <ul class="dropdown-menu">
                <li class="<?php  if($pagina == "cadastrar-produto"){ echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('cadastrar-produto'); ?>">Cadastrar produto</a></li>
                <li class="<?php  if($pagina == "listar-produtos"){ echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('listar-produtos'); ?>"> Todos os produtos</a></li>
              </ul>
            </li>
            <li class="dropdown <?php if($pagina == "agendas"){ echo 'active'; } ?>">
              <a href="<?php echo base_url('listar-agendas'); ?>" class="nav-link"><i class="fas fa-calendar-alt"></i><span>Agendas</span></a>
            </li>
            <li class="menu-header">Financeiro</li>
            <li class="dropdown <?php echo ($this->router->fetch_class() == 'Caixa' ? 'active': ''); ?>">
              <a href="caixa" class="menu-toggle nav-link has-dropdown"><i class="far fa-credit-card"></i><span>Caixa</span></a>
              <ul class="dropdown-menu">
                <li class="<?php  if($pagina == "registrar-caixa"){ echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('registrar-caixa'); ?>">Registrar</a></li>
                <li class="<?php  if($pagina == "historico"){ echo 'active'; } ?>"><a class="nav-link" href="<?php echo base_url('historico'); ?>">Histórico</a></li>
              </ul>
            </li>
            </li>
            <li class="menu-header">Configurações</li>
            <li class="<?php echo ($this->router->fetch_class() == 'Usuarios' ? 'active': ''); ?>">
              <a class="nav-link" href="<?php echo base_url('usuarios'); ?>"><i class="fas fa-user-friends"></i><span>Usuários</span></a>
            </li>
          </ul>
        </aside>
      </div>
