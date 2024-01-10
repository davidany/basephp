<?php

require __DIR__.'/vendor/autoload.php';

// create a variable, which could be anything!
$someVar = 'dave';
dump($someVar);

class SomeClass
{
    public function someMethod()
    {
        return 'hello world';
    }
}


$someObject = new SomeClass();
dd($someObject->someMethod());
