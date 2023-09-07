<?php defined("ACE_ROOT") or die();

class HTMA {
    static function target(string $_link = "") {
        echo "
            target=_blank
            rel=noopener 
            href=/{$_link}
        ";
    }
    static function external(string $_link = "") {
        if(!STR::starts_with($_link, 'http')) return;

        echo "
            target=_blank
            rel=noopener 
            href={$_link}
        ";
    }

    static function unsafe(string $_s){
        echo html_entity_decode($_s);
    }
}