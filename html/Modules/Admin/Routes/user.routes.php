<?php

return (object) array(


  '/{lang}/user/create' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'User',
    'action' => 'create'
  ],

  '/{lang}/user/readall' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'User',
    'action' => 'readAll'
  ],

  '/{lang}/user/read/{id:\d+}' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'User',
    'action' => 'readById'
  ],

  '/{lang}/user/update' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'User',
    'action' => 'update'
  ],

  '/{lang}/user/delete/{id:\d+}' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'User',
    'action' => 'delete'
  ],

  '/{lang}/user/register' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'User',
    'action' => 'register'
  ]



);