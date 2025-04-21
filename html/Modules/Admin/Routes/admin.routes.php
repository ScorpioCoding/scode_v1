<?php

return (object) array(

  '*' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'BadUri',
    'action' => 'index'
  ],

  '/{lang}/home' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Home',
    'action' => 'index'
  ],

  '/{lang}/dashboard' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Dashboard',
    'action' => 'index'
  ]



);