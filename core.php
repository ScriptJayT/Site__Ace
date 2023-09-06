<?php

define('ACE_ROOT', 'my_string');

function my_fetch(string $_path){
    return include($_SERVER['DOCUMENT_ROOT'] . "/" . $_path);
}