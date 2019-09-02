<?php

class baz {
    function foobar(): string {
        return '1.0'; // strictly type-checked return
    }
}


$baz = new baz();
echo $baz->foobar();
