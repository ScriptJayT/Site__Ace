<?php defined("ACE_ROOT") or die();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php invoke("partials/head.php") ?>
    <title>Ace</title>
    
    <style>
        .wrapper {
            padding-inline: 1.25rem;
            max-width: calc(50ch + 2 * 1.25rem);
            margin-inline: auto;
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
            border-radius: 0.25em;
        }
    </style>
</head>

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
                        href="show/<?php echo$_link['url']?>"
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