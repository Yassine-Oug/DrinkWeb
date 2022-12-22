<?php include "inc/header.php"; ?>

<?php

// post value


$p_title = @$_POST['p_title'];
$p_category = @$_POST['p_category'];
$p_img = @$_FILES['p_img']['name'];
$p_img_tmp = @$_FILES['p_img']['tmp_name'];
$p_price = @$_POST['p_price'];
$p_desc = @$_POST['p_desc'];
$p_key_word = @$_POST['p_key_word'];

//move upload img

    //terminal code permission :  sudo chmod -R 777 img

    if (isset($_FILES['p_img'])) {

        $local_image= "img/";
        move_uploaded_file($p_img_tmp,$local_image.$p_img);
        chmod($local_image.$p_img, 0666);
        echo $p_img;
    }


// insert pro

    if(isset($_POST['addpro'])){

        if(empty($p_title) || empty($p_category) || empty($p_img) || empty($p_price) || empty($p_desc) || empty($p_key_word)){
            echo '<script> alert(" Veuillez remplir les informations "); </script>';
        }else{
            $insert_pro = "insert into products(p_title,p_category,p_img,p_price,p_desc,p_key_word) values
            (
                '$p_title',
                '$p_category',
                '$p_img',
                '$p_price',
                '$p_desc',
                '$p_key_word'
                )
            ";

            $run_pro = mysqli_query($db,$insert_pro);

            if(isset($run_pro)){

                header("Location: addpro.php");

            }
        }

    }

?>

<div class="adminBody">
    <form action="addpro.php" method="post" enctype="multipart/form-data">

    <label> Nom du produit </label>
    <input type="text" name="p_title"/>
    <label> Type du produit </label>
    <br/>
    <select name="p_category" style="margin-top:5px;">
        <?php
            $get_c = "select * from category";
            $run_c = mysqli_query($db,$get_c);
            while($row_c = mysqli_fetch_array($run_c)){
                echo '<option value="'.$row_c['c_id'].'">'.$row_c['c_name'].'</option> ';
            }
        ?>
    </select>
    <br/>
    <br/>
    <label> Image du produit </label>
    <input type="file" name="p_img"/>
    <br/>
    <label> Prix du produit </label>
    <input type="text" name="p_price"/>
    <br/>
    <label> Description du produit </label>
    <textarea name="p_desc"></textarea>
        <script>
                CKEDITOR.replace( 'p_desc' );
        </script>
    <br/>
    <label> Mots clés </label>
    <input type="text" name="p_key_word"/>
    <br/>
    <input type="submit" name="addpro" value="Ajouter un produit"/>


    </form>
</div>


<?php include "inc/footer.php";?>
