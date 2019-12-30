<!DOCTYPE html>
<html lang="en">
<?php require_once('search.php'); ?>
<head>
    <title>AdNote</title>
    <meta charset="utf-8">
    <link href="reset.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
    <aside>
        <form id="search-by-tag" method="GET" action="index.php">
            <div class="search-option">
                <input type="checkbox" id="f1" name="f1">
                <label for="f1" class="klaus">Search by tag</label>
                <div class=sep></div>
                <input type="text" placeholder=" <tag>" name="tag">
            </div>
            <div class="search-option">
                <input type="checkbox" id="f2" name="f2">
                <label for="f2" class="klaus">Search by inner tag</label>
                <div class=sep></div>
                <input type="text" placeholder=" <parent>" name="parent">
                <input type="text" placeholder=" <child>" name="child">
            </div>
            <div class="search-option">
                <input type="checkbox" id="f3" name="f3">
                <label for="f3" class="klaus">Search by element count</label>
                <div class=sep></div>
                <input type="number" min="1" max="1000" value="1" name="count">
            </div>
            <div class="search-option">
                <input type="checkbox" id="f4" name="f4">
                <label for="f4" class="klaus">Search by document depth</label>
                <div class=sep></div>
                <input type="number" min="1" value="1" name="depth">
            </div>
            <input type="submit" value="Search">
        </form>
    </aside>
    <main>
        <?php
            echo search();
        ?>
        <!-- Template
        <div class="result">
            <p>[file name goes here]</p>
        </div> 
        -->
    </main>
    <footer>
        <p>© AdNote 2019</p>
    </footer>
</body>

</html>