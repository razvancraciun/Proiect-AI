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
                <?php 
                    if(isset($_GET['f1']) && $_GET['f1']){
                        echo '<input type="checkbox" id="f1" name="f1" checked>';    
                    }
                    else{
                        echo '<input type="checkbox" id="f1" name="f1">';
                    }
                ?>
                <label for="f1" class="klaus">Search by tag</label>
                <div class=sep></div>
                <?php 
                    if(isset($_GET['f1']) && $_GET['f1']){
                        echo '<input type="text" placeholder=" <tag>" name="tag" value = "'.$_GET['tag'].'">';    
                    }
                    else{
                        echo '<input type="text" placeholder=" <tag>" name="tag">';
                    }
                ?>
            </div>
            <div class="search-option">
                <?php 
                    if(isset($_GET['f2']) && $_GET['f2']){
                        echo '<input type="checkbox" id="f2" name="f2" checked>';    
                    }
                    else{
                        echo '<input type="checkbox" id="f2" name="f2">';
                    }
                ?>
                
                <label for="f2" class="klaus">Search by inner tag</label>
                <div class=sep></div>
                <?php 
                    if(isset($_GET['f2']) && $_GET['f2']){
                        echo '<input type="text" placeholder=" <parent>" name="parent" value = "'.$_GET['parent'].'"><input type="text" placeholder=" <child>" name="child" value = "'.$_GET['child'].'">';    
                    }
                    else{
                        echo '<input type="text" placeholder=" <parent>" name="parent"> <input type="text" placeholder=" <child>" name="child">';
                    }
                ?>

            </div>
            <div class="search-option">
                <?php
                    if(isset($_GET['f3']) && $_GET['f3']){
                        echo '<input type="checkbox" id="f3" name="f3" checked>';
                    }
                    else{
                        echo '<input type="checkbox" id="f3" name="f3">';
                    }
                ?>
                <label for="f3" class="klaus">Search by element count</label>
                <div class=sep></div>
                <?php
                    if(isset($_GET['f3']) && $_GET['f3']){
                        echo '<input type="number" min="1" max="1000" value="'.$_GET['count'].'" name="count">';
                    }
                    else{
                        echo '<input type="number" min="1" max="1000" value="1" name="count">';
                    }
                
                    if(isset($_GET['sorting'])){
                        if($_GET['sorting'] == 'lt1')
                            echo '<input type="radio" name="sorting" value="lt1" checked> &lt <br>
                            <input type="radio" name="sorting" value="eq1"> = <br>
                            <input type="radio" name="sorting" value="gt1"> &gt';
                        if($_GET['sorting'] == 'eq1')
                            echo '<input type="radio" name="sorting" value="lt1"> &lt <br>
                            <input type="radio" name="sorting" value="eq1" checked> = <br>
                            <input type="radio" name="sorting" value="gt1"> &gt';
                        if($_GET['sorting'] == 'gt1')
                            echo '<input type="radio" name="sorting" value="lt1"> &lt <br>
                            <input type="radio" name="sorting" value="eq1"> = <br>
                            <input type="radio" name="sorting" value="gt1" checked> &gt';
                    }
                    else
                        echo '<input type="radio" name="sorting" value="lt1"> &lt <br>
                                <input type="radio" name="sorting" value="eq1" checked> = <br>
                                <input type="radio" name="sorting" value="gt1"> &gt';

                ?>
            </div>
            <div class="search-option">
                <?php
                    if(isset($_GET['f4']) && $_GET['f4']){
                        echo '<input type="checkbox" id="f4" name="f4" checked>';
                    }
                    else{
                        echo '<input type="checkbox" id="f4" name="f4">';
                    }
                ?>
                <label for="f4" class="klaus">Search by document depth</label>
                <div class=sep></div>
                <?php
                    if(isset($_GET['f4']) && $_GET['f4']){
                        echo '<input type="number" min="1" value="'.$_GET['depth'].'" name="depth">';
                    }
                    else{
                        echo '<input type="number" min="1" value="1" name="depth">';
                    }
                
                    if(isset($_GET['sorting'])){
                        if($_GET['sorting1'] == 'lt2')
                            echo '<input type="radio" name="sorting1" value="lt2" checked> &lt <br>
                                <input type="radio" name="sorting1" value="eq2"> = <br>
                                <input type="radio" name="sorting1" value="gt2"> &gt';
                        if($_GET['sorting1'] == 'eq2')
                            echo '<input type="radio" name="sorting1" value="lt2"> &lt <br>
                                <input type="radio" name="sorting1" value="eq2" checked> = <br>
                                <input type="radio" name="sorting1" value="gt2"> &gt';
                        if($_GET['sorting1'] == 'gt2')
                            echo '<input type="radio" name="sorting1" value="lt2"> &lt <br>
                                <input type="radio" name="sorting1" value="eq2"> = <br>
                                <input type="radio" name="sorting1" value="gt2" checked> &gt';
                    }
                    else
                        echo '<input type="radio" name="sorting1" value="lt2"> &lt <br>
                            <input type="radio" name="sorting1" value="eq2" checked> = <br>
                            <input type="radio" name="sorting1" value="gt2"> &gt';

                 ?>
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