<?php defined("ACE_ROOT") or die();

class PageController {

    public static function get_home(){
        return [
            'navs' => for_inline(MDX::read_folders(), 
                fn($_, $_folder)=> [
                    'name' => CLEAN::uri_to_readable($_folder),
                    'url' => $_folder,
                ]
            ),
        ];
    }

    public static function check_next(){
        $folder = trim(URI::last(), '/');
        if(!URI::has_length(2)) throw new Error('Invalid URI Length for this route');
        if(!in_array($folder, MDX::read_folders())) throw new Error('Unknown URI destination --' . $folder);
    
        return [
            'header' => CLEAN::uri_to_readable($folder),
            'title' => "Cases for " . CLEAN::uri_to_readable($folder),
            'items' => MDX::prepare_content($folder),
        ];
    }
}