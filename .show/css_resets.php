<!DOCTYPE html>
<html lang="en">
<head>
    <?php include( __DIR__ . "/../partials/head.php")?>
    <title>Ace:: CSS Resets</title>
</head>
<body>

<section>
    <header>
        <h2>Global</h2>
    </header>
    <details open>
        <summary>Code</summary>
        <code>
            * {
                margin: 0;
                padding: 0;
            }
            *, *::before, *::after{
                box-sizing: border-box;
            }
        </code>
    </details>
</section>

</body>
</html>