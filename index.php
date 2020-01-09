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

                    if(isset($_GET['sorting3'])){
                        if($_GET['sorting3'] == 'lt')
                            echo '<input type="radio" name="sorting3" value="lt" checked> &lt <br>
                            <input type="radio" name="sorting3" value="eq"> = <br>
                            <input type="radio" name="sorting3" value="gt"> &gt';
                        if($_GET['sorting3'] == 'eq')
                            echo '<input type="radio" name="sorting3" value="lt"> &lt <br>
                            <input type="radio" name="sorting3" value="eq" checked> = <br>
                            <input type="radio" name="sorting3" value="gt"> &gt';
                        if($_GET['sorting3'] == 'gt')
                            echo '<input type="radio" name="sorting3" value="lt"> &lt <br>
                            <input type="radio" name="sorting3" value="eq"> = <br>
                            <input type="radio" name="sorting3" value="gt" checked> &gt';
                    }
                    else
                        echo '<input type="radio" name="sorting3" value="lt"> &lt <br>
                                <input type="radio" name="sorting3" value="eq" checked> = <br>
                                <input type="radio" name="sorting3" value="gt"> &gt';

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
                        echo '<input type="number" min="0" value="'.$_GET['depth'].'" name="depth">';
                    }
                    else{
                        echo '<input type="number" min="0" value="1" name="depth">';
                    }

                    if(isset($_GET['sorting4'])){
                        if($_GET['sorting4'] == 'lt')
                            echo '<input type="radio" name="sorting4" value="lt" checked> &lt <br>
                                <input type="radio" name="sorting4" value="eq"> = <br>
                                <input type="radio" name="sorting4" value="gt"> &gt';
                        if($_GET['sorting4'] == 'eq')
                            echo '<input type="radio" name="sorting4" value="lt"> &lt <br>
                                <input type="radio" name="sorting4" value="eq" checked> = <br>
                                <input type="radio" name="sorting4" value="gt"> &gt';
                        if($_GET['sorting4'] == 'gt')
                            echo '<input type="radio" name="sorting4" value="lt"> &lt <br>
                                <input type="radio" name="sorting4" value="eq"> = <br>
                                <input type="radio" name="sorting4" value="gt" checked> &gt';
                    }
                    else
                        echo '<input type="radio" name="sorting4" value="lt"> &lt <br>
                            <input type="radio" name="sorting4" value="eq" checked> = <br>
                            <input type="radio" name="sorting4" value="gt"> &gt';

                 ?>
            </div>
            <input type="submit" value="Search">

        </form>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select document to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload XML" name="submit">
        </form>
        <?php
          if(isset($_GET['uploadResult']) && $_GET['uploadResult'] != '') {
            echo '<div class="uploadResult"> <p>'.$_GET['uploadResult'].'</p></div>';
        }?>
    </aside>
    <main>
        <?php
            if(search() == ''){
                echo '<p><font color="white">Nu exista rezultate</font></p>';
            }
            else{
                echo search();    
            }
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
