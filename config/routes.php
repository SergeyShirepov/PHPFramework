<?php

use wfm\Router;

Router::add('^admin/?$', ['controller' => 'Main', 'action' => 'index',
    'admin_prefix' => 'admin']);
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',
    ['admin_prefix' => 'admin']);

Router::add('^(?P<lang>[a-z]+)?/?product/(?P<slug>[a-z0-9-]+)/?$', ['controller' =>
    'Product', 'action' => 'view']);

Router::add('^(?P<lang>[a-z]+)?/?$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');