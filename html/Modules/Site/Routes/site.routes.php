<?php

return (object) array(


  '' => [
    'lang' => 'en',
    'module' => 'Site',
    'namespace' => 'Modules\Site\Controllers',
    'controller' => 'Home',
    'action' => 'index'
  ],

  '/' => [
    'lang' => 'en',
    'module' => 'Site',
    'namespace' => 'Modules\Site\Controllers',
    'controller' => 'Home',
    'action' => 'index'
  ],

  '/{lang}/home' => [
    'module' => 'Site',
    'namespace' => 'Modules\Site\Controllers',
    'controller' => 'Home',
    'action' => 'index'
  ],

  '/{lang}/about' => [
    'module' => 'Site',
    'namespace' => 'Modules\Site\Controllers',
    'controller' => 'About',
    'action' => 'index'
  ],

  '/{lang}/contact' => [
    'module' => 'Site',
    'namespace' => 'Modules\Site\Controllers',
    'controller' => 'Contact',
    'action' => 'index'
  ],

  '/{lang}/posts' => [
    'module' => 'Site',
    'namespace' => 'Modules\Site\Controllers',
    'controller' => 'Post',
    'action' => 'readAll'
  ],

  '/{lang}/article/{slug}' => [
    'module' => 'Site',
    'namespace' => 'Modules\Site\Controllers',
    'controller' => 'Post',
    'action' => 'readBySlug'
  ]



);