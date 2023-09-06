<?php

define('ACE_ROOT', 'my_string');
define('FIVE_ACE', true);

function pretty_print(mixed $_v){
    echo '<details open style="margin-bottom:2rem;padding-inline:3ch">';
    echo '<summary>Dev:</summary>';
    echo '<pre>';
    var_dump($_v);
    echo '</pre>';
    echo '</details>';
}
function dd(mixed $_v){
    pretty_print($_v);
    die();
}

function invoke(string $_path, array $_data = []){
    extract($_data, EXTR_SKIP);
    include path($_path);
}
function path(string $_path) {
    return $_SERVER['DOCUMENT_ROOT'] . "/" . $_path;
}

function exit_with_error($_code){
    include path("pages/errors/{$_code}.php");
    die();
}

class URI {

    private static function ex(){
        return explode('/', trim(self::path(), '/'));
    }

    static function query() {
        return $_SERVER['QUERY_STRING'];
    }

    static function last() {
        $x = self::ex();
        return "/". end($x);
    }
    static function first() {
        return "/". self::ex()[0];
    }

    static function has_length($_length) {
        return $_length === count(self::ex());
    }

    static function path(){
        return $_SERVER['PATH_INFO'] ?? "/";
    }

    static function full(){
        return $_SERVER['REQUEST_URI'];
    }
}

class HTMA {
    static function target(string $_link = "") {
        echo "
            target=_blank
            rel=noopener 
            href=/{$_link}
        ";
    }
}

class MDX {
    static function read_folders(){
        $path = path('mdx');
        return array_filter(scandir($path), function($_folder_item){
            return !in_array($_folder_item, ['.', '..']) && is_dir(path("mdx/{$_folder_item}"));
        });
    }

    static function read_files($_folder){
        $path = path("mdx/{$_folder}");
    }
}

class CLEAN {

    static function uri_to_readable(string $_str){
        return str_replace(["-", "_"], " ", $_str);
    }

    static function string_to_uri(string $_str) {
        return iconv("UTF-8", "ASCII", trim(str_replace([" "] , ["-"], $_str)));
    }

}