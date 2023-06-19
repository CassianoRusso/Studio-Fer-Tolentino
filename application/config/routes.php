<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Home/index';

// Clientes - Gerenciamento
$route['listar-clientes'] = 'Clientes/index';
$route['cadastrar-cliente'] = 'Clientes/cadastrar';
$route['editar-cliente/(:num)'] = 'Clientes/editar/$1';
$route['deletar-cliente/(:num)'] = 'Clientes/deletar/$1';

// Serviços - Gerenciamento
$route['listar-servicos'] = 'Servicos/index';
$route['cadastrar-servico'] = 'Servicos/cadastrar';
$route['editar-servico/(:num)'] = 'Servicos/editar/$1';
$route['deletar-servico/(:num)'] = 'Servicos/deletar/$1';

// Produtos - Gerenciamento
$route['listar-produtos'] = 'Produtos/index';
$route['cadastrar-produto'] = 'Produtos/cadastrar';
$route['editar-produto/(:num)'] = 'Produtos/editar/$1';
$route['deletar-produto/(:num)'] = 'Produtos/deletar/$1';

// Agendas - Gerenciamento
$route['listar-agendas'] = 'Agendas/index';
$route['cadastrar-agenda'] = 'Agendas/cadastrar';
$route['editar-agenda/(:num)'] = 'Agendas/editar/$1';
$route['detalhes-agenda/(:num)'] = 'Agendas/detalhes/$1';
$route['deletar-agenda/(:num)'] = 'Agendas/deletar/$1';
$route['listar-notificacoes'] = 'Agendas/notificacoes';
$route['agenda-finalizar/(:num)'] = 'Agendas/registrar/$1';

// Caixa - Financeiro
$route['historico'] = 'Caixa/index';
$route['registrar-caixa'] = 'Caixa/registrar';

// Usuarios - Configurações
$route['usuarios'] = 'Usuarios/index';
$route['cadastrar-usuario'] = 'Usuarios/cadastrar';
$route['editar-usuario/(:num)'] = 'Usuarios/editar/$1'; 
$route['deletar-usuario/(:num)'] = 'Usuarios/deletar/$1';

// Erro 404
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
