<?php
include('functions/actions.php');




if($_SESSION['id']){
       
  
       
if($_GET['function2'] == "freewallet"){
            include('views/freewallet.php');
  }
  else{
          include('views/pricing.php');
  }
  
  }
  else {
        include('views/header.php');
        include('views/home.php');
}


include('views/footer.php');




?>