<?php defined("ACE_ROOT") or die();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php invoke("partials/head.php") ?>
    <title>Ace :: <?php echo $title; ?></title>
    
    <style>
        .wrapper {
            padding-inline: 1.25rem;
            max-width: calc(50ch + 2 * 1.25rem);
            margin-inline: auto;
        }

        header {
            text-align: center;
            font-size: 1.75em;
            margin-bottom: 1em;
        }

        nav {
            margin-bottom: 1.25em;
        }

        nav ul {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        nav a {
            display: block;
            height: 100%;
            padding: 1rem;
            border: 1px solid;
            border-radius: 0.25em;
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