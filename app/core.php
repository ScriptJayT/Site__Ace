<?php

define('ACE_ROOT', 'my_string');
define('FIVE_ACE', true); #five server extension for VS-Code

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

function to_asso_array($_array, $_fn){
    $x = [];
    foreach (array_filter($_array) as $_v) {
        $res = $_fn($_v);
        if(!$res || !$res['key']) continue;
        $x[$res['key']] = $res['value'] ?? '';
    }
    return $x;
}

function for_inline($_array, $_fn){
    $x = [];
    foreach ($_array as $_key => $_value) {
        array_push($x, $_fn($_key, $_value));
    }
    return $x;
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

class MDX {

    static $allowed_matter = ['title', 'source', 'emmet'];

    static function read_folders(){
        $path = path('mdx');
        return array_values(array_filter(scandir($path), function($_folder_item){
            return !in_array($_folder_item, ['.', '..']) && is_dir(path("mdx/{$_folder_item}"));
        }));
    }

    private static function read_files($_folder){
        $path = path("mdx/{$_folder}");
        return array_values(array_filter(scandir($path), function($_folder_item) use($path) {
            return !in_array($_folder_item, ['.', '..']) && is_file("{$path}/{$_folder_item}") && STR::ends_with($_folder_item, "\.md");
        }));
    }
    private static function file_content(string $_file_path){
        if(!is_file($_file_path)) return;

        try {
            $handle = fopen($_file_path, "rb");
            $contents = fread($handle, filesize($_file_path));
            fclose($handle);
        } catch (\Throwable) {
            return;
        }

        $split = array_filter(explode("---",$contents));

        if(count($split) !== 2) return; #missing frontmatter or content;

        $front_matter = to_asso_array(explode(PHP_EOL, $split[0]), function($_matter){
            $_matter = trim($_matter);

            $x = explode(": ", $_matter)[0];
            $y = str_replace("{$x}: ", "", $_matter);
            if($y === $x) {
                $x = trim($x, ':');
                $y = "";
            } 

            if(!in_array($x, self::$allowed_matter)) return;
            
            return [
                'key' => $x,
                'value' => $y,
            ];
        });
        $content = trim($split[1]);

        return [
            ...$front_matter,
            'show' => $content,
            'type' => 'css',
        ];
    }

    public static function prepare_content($_folder) {
       return array_filter(array_map(function($_file)use($_folder){
            $c = self::file_content(path( "mdx/". $_folder . "/" . $_file));

            if(!$c['title'] ?? false) return;
            if(!$c['show']) return;

            $c['emmet'] = PARSER::emmet_to_html($c['emmet'] ?? '');

            return $c;
       }, self::read_files($_folder)));
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

class STR {
    // escape characters with funcion in RegEx fe \.md
    static function ends_with(string $_str, string $_sub){
        return preg_match("/.*".$_sub."$/", $_str) === 1;
    }
    static function starts_with(string $_str, string $_sub){
        return preg_match("/^".$_sub."/", $_str) === 1;
    }
}

Class PARSER {
    public static function emmet_to_html($emmet) {
        if(!$emmet) return '';

        $string = "";
        $close = 0;
        $layers = explode(">",$emmet);
        
        foreach ($layers as $_layer) {
            $_layer = trim($_layer, '.');

            $items = explode("+", $_layer);
            $has_siblings = count($items)>1;
            $multi = explode("*", $_layer);
            $has_clones = count($multi) === 2;

            if(!$has_siblings && !$has_clones) {
                $string .= "<div class={$_layer}>";
                $close++;
            }
            elseif(!$has_siblings && $has_clones) {
                $count = $multi[1];
                $_layer = trim($multi[0], );
                for ($i=0; $i < $count; $i++) { 
                    $string .= "<div class={$_layer}></div>";
                }
            }
            elseif($has_siblings) {
                foreach($items as $_item) {
                    $_item = trim($_item, '.');
                    $string .= "<div class={$_item}>";
                    $close++;
                }
            }
        }
        
        for ($i=0; $i < $close; $i++) { 
            $string .= "</div>";
        }

        return htmlentities($string);
    }
}

include(path("app/controller.php"));
include(path("app/directives.php"));