<?php

return (object) array(


  '/{lang}/post/create' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Post',
    'action' => 'create'
  ],

  '/{lang}/post/readall' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Post',
    'action' => 'readAll'
  ],

  '/{lang}/post/read/{id:\d+}' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Post',
    'action' => 'readById'
  ],

  '/{lang}/post/update' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Post',
    'action' => 'update'
  ],

  '/{lang}/post/delete/{id:\d+}' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Post',
    'action' => 'delete'
  ]



);