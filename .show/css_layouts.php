<!DOCTYPE html>
<html lang="en">
<head>
    <?php include( __DIR__ . "/../partials/head.php")?>
    <title>Ace:: CSS Layouts</title>
</head>
<body>

<section>
    <header>
        <h2>Pancake Layout</h2>
        <a rel="noopener noreferrer" target=_blank href="https://www.youtube.com/shorts/3JHBYawkwqU">Src</a>
    </header>
    <div class="pancake">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>
    <details>
        <summary>Code</summary>
        <code>
            .pancake {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem; /* adjustable */

                & > * {
                    width: 100%;
                    max-width: 300px; /* adjustable */
                }
            }
        </code>
    </details>
</section>

<section>
    <header>
        <h2>Split Screen</h2>
        <a rel="noopener noreferrer" target=_blank href="https://www.youtube.com/watch?v=Ivk8Blw2VTI&t=3s">Src</a>
    </header>
    <details>
        <summary>Code</summary>
        <code></code>
    </details>
</section>

<section>
    <header>
        <h2>Sidebar Split</h2>
    </header>
    <details>
        <summary>Code</summary>
        <code></code>
    </details>
</section>

<section>
    <header>
        <h2>Holy Grail</h2>
        <a rel="noopener noreferrer" target=_blank href="https://www.youtube.com/shorts/IgofJWjnS1w">Src</a>
    </header>
    <details>
        <summary>Code</summary>
        <code></code>
    </details>
</section>

</body>
</html>