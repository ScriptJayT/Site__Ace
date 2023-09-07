<?php require_once('app/core.php'); ?>

<?php
// Check against endpoints & Get Current Page View
$server_endpoints = [
    '/'=>[
       'view' => "home",
       'data_method' => "get_home",
    ],
    '/show'=> [
        'view' => "show",
        'data_method' => "check_next",
    ],
];

if(!in_array(URI::first(), array_keys($server_endpoints))) exit_with_error(404);
$current_page = $server_endpoints[URI::first()]['view'];
$current_data_get_function = $server_endpoints[URI::first()]['data_method'];

// pretty_print( "Url Root: " . URI::first());
// pretty_print( "Layout: " . $current_page);

// render view with data or throw 404 if that fails
try {
    $current_data = call_user_func(['PageController', $current_data_get_function]);
    pretty_print($current_data);

    invoke("pages/{$current_page}.php", $current_data);
} catch (\Throwable $th) {
    if(FIVE_ACE) pretty_print($th);
    exit_with_error(404);
}


?>