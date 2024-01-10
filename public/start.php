<?php

require __DIR__.'/../vendor/autoload.php';

use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();

$debugbar["messages"]->addMessage("hello world!");
?>
<html>
    <head>
        <?php echo $debugbarRenderer->renderHead() ?>
    </head>
    <body>
        hey
        <?php echo $debugbarRenderer->render() ?>
    </body>
</html>
