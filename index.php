<?php require_once('core.php'); ?>

<?php

// Check against endpoints & Get Current Page View
$server_endpoints = [
    '/'=>[
       'view' => "home",
       'data' => "get_home",
    ],
    '/show'=> [
        'view' => "show",
        'data' => "check_next",
    ],
];

if(!in_array(URI::first(), array_keys($server_endpoints))) exit_with_error(404);
$current_page = $server_endpoints[URI::first()]['view'];
$current_data_get_function = $server_endpoints[URI::first()]['data'];

pretty_print( "Url Root: " . URI::first());

function get_home(){
    return [
        'navs' => for_inline(MDX::read_folders(), 
            fn($_, $_folder)=> [
                'name' => CLEAN::uri_to_readable($_folder),
                'url' => $_folder,
            ]
        ),
    ];
}
function check_next(){
    $folder = trim(URI::last(), '/');
    if(!URI::has_length(2)) throw new Error('Invalid URI Length for this route');
    if(!in_array($folder, MDX::read_folders())) throw new Error('Unknown URI destination --' . $folder);

    return [
        'header' => CLEAN::uri_to_readable($folder),
        'title' => "showcase " . CLEAN::uri_to_readable($folder),
        'items' => MDX::read_files($folder),
    ];
}

try {
    $current_data = call_user_func($current_data_get_function);
} catch (\Throwable $th) {
    if(FIVE_ACE) pretty_print($th);
    exit_with_error(404);
}

pretty_print( "Layout: " . $current_page);
pretty_print($current_data);
// render view with data
invoke("pages/{$current_page}.php", $current_data);

?>