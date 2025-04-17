<?php

return (object) array(



  '/user/login' => [
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'User',
    'action' => 'login'
  ],

  '/user/create' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'User',
    'action' => 'create'
  ],

  '/user/readall' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'User',
    'action' => 'readAll'
  ],

  '/user/read/{id:\d+}' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'User',
    'action' => 'readById'
  ],

  '/user/update' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'User',
    'action' => 'update'
  ],

  '/user/delete/{id:\d+}' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'User',
    'action' => 'delete'
  ],


);