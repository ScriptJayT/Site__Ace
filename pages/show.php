<?php defined("ACE_ROOT") or die();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php invoke("partials/head.php") ?>
    <title>Ace :: <?php echo $title; ?></title>
    
    <meta name=robots content="noindex, nofollow, nosnippet, noarchive, nocache" >

    <style>
        .wrapper {
            padding-inline: 1.25rem;
            max-width: calc(50ch + 2 * 1.25rem);
            margin-inline: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            <h1><?php echo $header; ?></h1>
        </header>
    </div>
</body>
</html>