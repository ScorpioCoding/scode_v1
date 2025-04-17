<?php

return (object) array(


  '' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Home',
    'action' => 'index'
  ],

  '/' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Home',
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