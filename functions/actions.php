<?php



include("functions.php");



                
                
         
    
    if ($_GET['action'] == "loginSignup") {
        
        $error = "";
        
        
        if ($_POST['loginActive'] == "0") {
                
              
                
                
        
                if (!$_POST['name']) {
                    
                    $error = "A Name is required!";
                    
                }else if(!$_POST['phone']){
                        
                     $error = "A Phone Number is required!";
                     
                }else if(!$_POST['password']){
                        
                     $error = "A Password is required!";
                }
        
                else if ($_POST['password'] != $_POST['conPassword'] ) {
             
                   $error ="password doesn't match";
            
                } else{
        
            
            $query = "SELECT * FROM users WHERE phoneno = '". mysqli_real_escape_string($link, $_POST['phone'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) $error = "That Phone Number is already taken.";
            else {
            
                if($_POST['reff']){
                            $query = "SELECT * FROM users WHERE referral = '".$_POST['reff']."' "; 
                            $result = mysqli_query($link,$query);
                            $row = mysqli_fetch_assoc($result);
                            $referredUser = $row['referredUser'] + 1;       
                            
                            $query1 = "UPDATE users SET referredUser = '$referredUser' WHERE id= '".$row['id']."' ";
                            $result1 = mysqli_query($link,$query1);
                
                }
                
                $query = "INSERT INTO users (`phoneno`, `password`,`name`) VALUES ('". mysqli_real_escape_string($link, $_POST['phone'])."', '". mysqli_real_escape_string($link, $_POST['password'])."','". mysqli_real_escape_string($link, $_POST['name'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    $_SESSION['id'] = mysqli_insert_id($link);
                    
                    $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                    mysqli_query($link, $query);
                    
                    echo 1;
                    
                    
                    
                } else {
                    
                    $error = "Couldn't create user - please try again later";
                    
                }
                
            }
            
           }
            
        } else {
        
            if(!$_POST['phone']){
                        
                     $error = "A Phone Number is required!";
                     
                }else if(!$_POST['password']){
                        
                     $error = "A Password is required!";
                }else{
            
                    $query = "SELECT * FROM users WHERE phoneno = '". mysqli_real_escape_string($link, $_POST['phone'])."' LIMIT 1";
                    
                    $result = mysqli_query($link, $query);
                    
                    $row = mysqli_fetch_assoc($result);
                        
                        if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                            
                            echo 1;
                            
                            $_SESSION['id'] = $row['id'];
                            
                        } else {
                            
                            $error = "Could not find that phone number/password combination. Please try again.";
                            
                        }

            }
        }
        
         if ($error != "") {
            
            echo $error;
            exit();
            
        }
           
    }
    
    
    if ($_GET['action'] == "generateLink") {
    
            $query = "SELECT * FROM users WHERE id='".$_SESSION['id']."' ";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
            if($row['state'] != 1)
            {
                    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                    $res = "";
                    for ($i = 0; $i < 10; $i++) {
                            
                         $ref .= $chars[mt_rand(0, strlen($chars)-1)];
                    }
                    
                    $ref=$ref.$_SESSION['id'];
                    $clickCount = mysqli_real_escape_string($link, $_POST['clickCount']);
                    
                    
                    $query = "UPDATE  users SET referral ='$ref',state='$clickCount' WHERE id='".$_SESSION['id']."' ";
                    $result = mysqli_query($link, $query);
                    echo 1;
            }
           
            
            
            
            
            
            
    }
 ?>