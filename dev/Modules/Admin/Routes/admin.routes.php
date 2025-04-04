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

  '/{lang}/about' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'About',
    'action' => 'index'
  ],

  '/{lang}/contact' => [
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Contact',
    'action' => 'index'
  ]



);