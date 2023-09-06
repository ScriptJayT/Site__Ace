<?php

define('ACE_ROOT', 'my_string');
define('FIVE_ACE', true);

function my_fetch(string $_path){
    return include($_SERVER['DOCUMENT_ROOT'] . "/" . $_path);
}