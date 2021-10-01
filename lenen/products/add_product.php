<?php
    
    // onderstaand bestand wordt ingeladen
    include('../core/header.php');
    include('../core/checklogin_admin.php');
    include('products-menu.php');

?>

<h1>Boek toevoegen</h1>

<?php
    if (isset($_POST['submit']) && $_POST['submit'] != "") {
        $title = $con->real_escape_string($_POST['title']);
        $author = $con->real_escape_string($_POST['author']);
        $pages = $con->real_escape_string($_POST['pages']);
        $overview = $con->real_escape_string($_POST['overview']);

        $liqry = $con->prepare("INSERT INTO boeken (title, author, pages, overview) VALUES (?, ?, ?, ?)");
        if($liqry === false) {
           echo mysqli_error($con);
        } else{
            $liqry->bind_param('sssssss',$name,$description,$category_id,$price,$color,$weight,$active);
            if($liqry->execute()){
                echo '<div style="border: 2px solid red">Product toegevoegd</div>';
            }
        }
        $liqry->close();

    }
?>

<form action="" method="POST">
title: <input type="text" name="title" value=""><br>
author: <input type="text" name="author" value=""><br>
pages: <input type="number" name="pages" value=""><br>
overview: <input type="text" name="overview" value=""><br><br>
<input type="submit" name="submit" value="Toevoegen">
</form>



<?php
    include('../core/footer.php');
?>
