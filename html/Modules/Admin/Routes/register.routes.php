<?php

return (object) array(

  '/register' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Register',
    'action' => 'index'
  ],

  '/register/email/send' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Register',
    'action' => 'emailSend'
  ],

  '/register/email/validate' => [
    'lang' => 'en',
    'module' => 'Admin',
    'namespace' => 'Modules\Admin\Controllers',
    'controller' => 'Register',
    'action' => 'emailValidate'
  ]



);