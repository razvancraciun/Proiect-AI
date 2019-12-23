<!DOCTYPE html>

<?php
    
    
    function documente_in_functie_de_tag($tag)
    {
        /*
        $array = functie_jmechera();
        */
        $array = array(
         "bar",
         "foo",
        );
        $i = 0;
        $n = count($array);
        for ($i = 0; $i < $n; $i++) {
            echo "<tr><td>".$array[$i].'</td></tr>';
        } 
    }

    function documente_cu_proiect_sub_word()
    {
        /*
        $array = functie_jmechera();
        */
        $array = array(
         "bar2",
         "foo2",
        );
        $n = count($array);
        for ($i = 0; $i < $n; $i++) {
            echo "<tr><td>".$array[$i].'</td></tr>';
        } 
    }

    function documente_cu_n_elemente($nul)
    {
        /*
        $array = functie_jmechera();
        */
        $array = array(
         "bar1",
         "foo1",
        );
        $n = count($array);
        for ($i = 0; $i < $n; $i++) {
            echo "<tr><td>".$array[$i].'</td></tr>';
        } 
    }

    function documente_cu_adancime()
    {
        /*
        $array = functie_jmechera();
        */
        $array = array(
         "bar3",
         "foo3",
        );
        $n = count($array);
        for ($i = 0; $i < $n; $i++) {
            echo "<tr><td>".$array[$i].'</td></tr>';
        } 
    }
    
    function flow(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['DocumenteTag']))
        {
            documente_in_functie_de_tag($_POST['tag']);
        }
        
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['ProiectSubWord']))
        {
            documente_cu_proiect_sub_word();
        }
        
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['NElemente']))
        {
            documente_cu_n_elemente($_POST['nul']);
        }
        
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Adancime']))
        {
            documente_cu_adancime();
        }
        
        
    }



?>
<html>
<body>
    
    <form action="index.php" method="post">
        <p>Tag: <input type="text" name="tag" /></p>
        <input type="submit" name="DocumenteTag" value="Documente Tag" />
    </form>
    
    <form action="index.php" method="post">
        <input type="submit" name="ProiectSubWord" value="Proiect sub Word" />
    </form>
    
    <form action="index.php" method="post">
        <p>N: <input type="text" name="nul" /></p>
        <input type="submit" name="NElemente" value="N elemente" />
    </form>
    
    <form action="index.php" method="post">
        <input type="submit" name="Adancime" value="Adancime" />
    </form>
    
    
    
    <table style="width:100%">
        <tr><td>Nume</td></tr>
        <?php
            flow();
        ?>
    </table>

</body>
</html>
