<!DOCTYPE html>
<html lang="en">
<head>

    <?php include( $_SERVER['DOCUMENT_ROOT'] . "partials/head.php"); ?>
    <title>Ace</title>

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

<?php
$navs = [
    [
        'name' => "CSS Resets",
        'url' => "css_resets",
    ],
    [
        'name' => "CSS Layouts",
        'url' => "css_layouts",
    ],
];
?>

<body>
    <div class="wrapper">
        <header>
            <h1>Ace Showcase</h1>
        </header>
        <nav>
            <ul>
                <?php foreach ($navs as $_link): ?>
                <li>
                    <a
                        target=_blank
                        rel=noopener 
                        href="/show/<?php echo $_link['url'].'.php' ?? '';?>"
                    >
                        <?php echo $_link['name'] ?? '' ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</body>
</html>