<?php

return (object) array(

  '' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Setup',
    'action' => 'index'
  ],

  '/' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Setup',
    'action' => 'index'
  ],

  '/setup/register' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Setup',
    'action' => 'register'
  ],

  '/setup/email/send' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Setup',
    'action' => 'emailSend'
  ],

  '/setup/email/validate/{token:#\d*[ctYymd]+|\$\d+|[^#\$]+}' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Setup',
    'action' => 'emailValidate'
  ]



);