<?php defined("ACE_ROOT") or die();

class HTMA {
    static function target(string $_link = "") {
        echo "
            target=_blank
            rel=noopener 
            href=/{$_link}
        ";
    }
}