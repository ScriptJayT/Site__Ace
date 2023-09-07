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
        <style>
            .showcase {
                <?php foreach ($items as $_showcase):?>
                    <?php if($_showcase['type'] !== "css") continue;?>                
                    & <?php echo $_showcase['show']; ?>
                <?php endforeach; ?>
            }
        </style>

        <?php foreach ($items as $_showcase): ?>
            <section>
                <header>
                    <h2>
                        <?php echo $_showcase['title']; ?>
                    </h2>
                    <?php if($_showcase['source'] ?? false):?>
                        <a 
                        <?php HTMA::external($_showcase['source']); ?>
                        >Src</a>
                    <?php endif;?>
                    <?php if($_showcase['description'] ?? false):?>
                        <?php echo $_showcase['description']; ?>
                    <?php endif;?>
                </header>

                <content>
                    <?php if($_showcase['emmet'] ?? false):?>
                        <?php HTMA::unsafe($_showcase['emmet']); ?>
                    <?php endif;?>
                </content>

                <details>
                    <summary>Code</summary>
                    <code class="showcase"><?php echo $_showcase['show']; ?></code>
                </details>
            </section>
        <?php endforeach ?>

    </div>
</body>
</html>