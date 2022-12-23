<?php
//connect db
$don = mysqli_connect('localhost' , 'root', '', 'DrinkWeb');

    // post value
    $a_name = @$_POST['a_name'];
    $a_pass = @$_POST['a_pass'];

    if(isset($_POST['login'])){
        if(empty($a_name) OR empty($a_pass)){
            echo '<script> alert(" Veuillez remplir les informations ") </script>';

        }else{
            //get admin name and pass
            $get_admin = "select * from admin where a_name='$a_name' AND a_pass='$a_pass'";

            //run query
            $run_admin = mysqli_query($con, $get_admin);

            //admin isset
            if(mysqli_num_rows($run_admin) == 1){

                $row_admin = mysqli_fetch_array($run_admin);

                //admin value isset
                $aname = $row_admin['a_name'];

                //cookie here
                setcookie("aname",$aname,time()+60*60*24);
                setcookie("adminlogin",1,time()+60*60*24);

                echo '<script> alert(" bienvenue admin ") </script>';

                header("Location: ok.php");

            }else{

                echo '<script> alert(" Les informations saisies sont incorrectes ") </script>';

            }

        }

    }


?>

<!DOCTYPE html>

<html>

    <head>
        <title> Login </title>
        <meta charset = "utf-8">
        <link rel="stylesheet" type="text/css" href="cssLogin/style.css" />
    <head>

    <body>
        <div class="loginAll">
            <form action="login.php" method="post">

                <input type="text" name="mail" placeholder=" Mail d'utilisateur " />
                <br/>
                <input type="password" name="mail" placeholder=" Mot de passe " />
                <br/>
                <input type="submit" name="login" placeholder=" Connexion " />

            </form>
        </div>

    </body>

</html>
