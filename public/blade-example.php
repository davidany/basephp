<?php
require __DIR__.'/../vendor/autoload.php';

use Jenssegers\Blade\Blade;

$views = __DIR__.'/../views'; // the path to your Blade views
$cache = __DIR__.'/../cache'; // the path to where Blade should cache views

$blade = new Blade($views, $cache);

echo $blade->make('view-name', ['name' => 'dave'])->render();
