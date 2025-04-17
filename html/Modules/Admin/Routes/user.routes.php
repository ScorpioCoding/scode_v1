<?php

return (object) array(

  '/{lang}/user/login' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'UserLogin',
    'action' => 'index'
  ],

  '/{lang}/user/login/hash' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'UserLogin',
    'action' => 'hash'
  ],

  '/{lang}/user/logout' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'UserLogout',
    'action' => 'index'
  ],

  '/{lang}/user/create' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'UserCreate',
    'action' => 'index'
  ],

  '/{lang}/user/readall' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'UserReadAll',
    'action' => 'index'
  ],

  '/{lang}/user/read/{id:\d+}' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'UserReadById',
    'action' => 'index'
  ],

  '/{lang}/user/update' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'UserUpdate',
    'action' => 'index'
  ],

  '/{lang}/user/delete/{id:\d+}' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'UserDelete',
    'action' => 'index'
  ]



);