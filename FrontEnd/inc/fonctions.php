<?php

//include "inc/db.php";

$connect = mysqli_connect('localhost' , 'root', '', 'MyMarket');

//fonctions//

//**** get ip ****//

function getIp(){

    $ip = $_SERVER['REMOTE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){

        $ip = $_SERVER['HTTP_CLIENT_IP'];
    
    }elseif(!empty($SERVER['HTTP_X_FORWARDED_FOR'])){

        $ip = $SERVER['HTTP_X_FORWARDED_FOR'];

    }
    return $ip;

}


//**** get cart ****//

function cart(){
    
    global $connect;

    if(isset($_GET['add_cart'])){

        $ip = getIp();

        $pro_id = (int)$_GET['add_cart'];

        
        //$get_cart = "select * from cart where p_id = '$pro_id AND ip_add = '$ip'";

        //$run_cart = mysqli_query($connect,$get_cart);
        $result = mysqli_query($connect,"select * from cart where p_id = '$pro_id AND ip_add = '$ip'");

        if(mysqli_num_rows($result) > 0){
            echo '';
        }else{

            $insert_cart = "insert into cart(p_id,ip_add) values('$pro_id','$ip')";
            
            $run_i_cart = mysqli_query($connect,$insert_cart);

            if(isset($run_i_cart)){
                echo '<meta http-equiv="refresh" content="2; url=\'MarketPlace.php\' "/>';
                //header("Location: MarketPlace.php");
            }

        }

    }

}



//**** get category ****//

function get_cat(){

    global $connect;

    $get_cat = "select * from category";

    $run_cat = mysqli_query($connect, $get_cat);


    while($row_cat = mysqli_fetch_array($run_cat)){

        echo '<li><a href="MarketPlace.php?cat='.$row_cat['c_id'].'">'.$row_cat['c_name'].'</a></li>';

    }

}


//**** get pro ****//


function get_pro(){

    global $connect;

    if(!isset($_GET['cat'])){

        $get_pro = "select * from products";

        $run_pro = mysqli_query($connect, $get_pro);

        while($row_pro = mysqli_fetch_array($run_pro)){

            echo '
                <li>
                    <div class="product">
                        <div id="pro_img">
                        <a href="#"><img src="admin/img/'.$row_pro['p_img'].'"width="250" height="150" /></a>
                        </div>
                        <div id="pro_title">
                            <a href="#">'.$row_pro['p_title'].'</a>
                        </div>
                        <div id="pro_bay">
                            <a href="MarketPlace.php?add_cart='.$row_pro['p_id'].'"><button>acheter</button></a>
                        </div>
                    </div>
                </li>
            ';

        }

    }
}


//**** get products by category ****//

function get_pro_cat(){
    global $connect;

    if(isset($_GET['cat'])){

        $cat = (int)$_GET['cat'];

        $get_pro_cat = "select * from products where p_category = '$cat'";

        $run_pro_cat = mysqli_query($connect,$get_pro_cat);

        if(mysqli_num_rows($run_pro_cat) > 0){

            while($row_pro_cat = mysqli_fetch_array($run_pro_cat)){

                echo '
                    <li>
                        <div class="product">
                            <div id="pro_img">
                              <a href="#"><img src="admin/img/'.$row_pro_cat['p_img'].'"width="250" height="150" /></a>
                            </div>
                            <div id="pro_title">
                                <a href="#">'.$row_pro_cat['p_title'].'</a>
                            </div>
                            <div id="pro_bay">
                                <a href="#"><button>acheter</button></a>
                            </div>
                        </div>
                    </li>
                ';
        
            }

        }else{

            echo '<div class="vide"> Vide </div>';
        }

    }
}


//**** get products by search ****//

function get_pro_search(){

    global $connect;

    if(isset($_GET['search'])){

        $searchArea = $_GET['searchArea'];

        $get_pro_search = "select * from products where p_key_word like '%$searchArea%'";

        $run_pro_search = mysqli_query($connect,$get_pro_search);

        if(mysqli_num_rows($run_pro_search) > 0){

            while($row_pro_search = mysqli_fetch_array($run_pro_search)){

                echo '
                    <li>
                        <div class="product">
                        <div id="pro_img">
                            <a href="#"><img src="admin/img/'.$row_pro_search['p_img'].'"width="250" height="150" /></a>
                            </div>
                            <div id="pro_title">
                                <a href="#">'.$row_pro_search['p_title'].'</a>
                            </div>
                            <div id="pro_bay">
                                <a href="#"><button>acheter</button></a>
                            </div>
                        </div>
                    </li>
                ';
            }

        }else{

            echo '<div class="vide"> Vide </div>';
        }
    }
}




?>
