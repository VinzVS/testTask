<?php


use core\Router;
Router::add('^material/?(?P<alias>[a-z0-9-]+)/?$',['controller'=>'Material','action'=>'view']);
Router::add('^page/?(?P<alias>[a-z0-9-]+)/?$',['controller'=>'Page','action'=>'view']);

// Значения routes по умолчанию для админ панели
//Router::add('^admin$', ['controller' => 'Main','action' => 'index', 'prefix' => 'admin']);
//Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

// Значения routes по умолчанию
Router::add('^$', ['controller' => 'Main','action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
