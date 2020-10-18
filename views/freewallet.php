
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://img.icons8.com/clouds/2x/google-logo.png">

    <title>Pricing</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../styles/pricing.css" rel="stylesheet">
  </head>

  <body>

    
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Referrals</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-white btn btn-success" href="?function=logout">Logout</a>
      </nav>
     
    </div>



    <div class="container-fluid mt-2">
        <div class="row">
        <div class="col-8 " >
               <div class="newsletter-subscribe rounded mb-4">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><?php $query = "SELECT * FROM users WHERE id=".mysqli_real_escape_string($link,$_SESSION['id'])." LIMIT 1";
                $result=mysqli_query($link,$query);
                $row = mysqli_fetch_assoc($result); 
                echo $row['name'];
                ?></h2>
                <h1 class="text-center"><?php $query = "SELECT * FROM users WHERE id=".mysqli_real_escape_string($link,$_SESSION['id'])." LIMIT 1";
                $result=mysqli_query($link,$query);
                $row = mysqli_fetch_assoc($result); 
                echo $row['phoneno'];
                ?></h1>
                
                <br>
            </div>
            
        </div>
    </div>
            
          </div>
        <div class="col-4"><div class="newsletter-subscribe rounded">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Balance</h2>
                <h1 class="text-center">
                <?php 
                        $query = "SELECT * FROM users WHERE id=".mysqli_real_escape_string($link,$_SESSION['id'])." LIMIT 1";
                        $result = mysqli_query($link,$query);
                        $row = mysqli_fetch_assoc($result);
                        echo "₹ ". intdiv($row['referredUser'],10);
                ?>
                </h1>
                <p class="text-center">Your wallet Balance shows up here.</p>
            </div>
            
        </div>
    </div></div>
        </div>
      <div class="row px-3"> 
          
          <div class="newsletter-subscribe bg-white rounded" style="width: 100%;">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Referral Program</h2>
                <p class="text-center">Generate a Link to invite your friends here to get money in your wallet. </p>
            </div>
            <form class="form-inline" >
                 <input type="hidden" name= "clickCount" value="1" id="clickCount">
                <div class="form-group"><button class="btn btn-primary" id="generatelink" type="button">Generate Link </button></div>
            </form>
            <!-- The text field -->

                <form class="form-inline mt-4">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Email</label>
   <?php 
   $query = "SELECT * FROM users WHERE id=".mysqli_real_escape_string($link,$_SESSION['id'])." LIMIT 1";
                $result=mysqli_query($link,$query);
                $row = mysqli_fetch_assoc($result);
                $referrallink = 'http://referralgenerate.atwebpages.com/?ref='.$row['referral'];
                if($row['state']==1){
  echo  "<input type='text' readonly class='form-control' id='myInput' value='$referrallink'>"; } ?>
  </div>
  <?php 
          $query = "SELECT * FROM users WHERE id=".mysqli_real_escape_string($link,$_SESSION['id'])." LIMIT 1";
          $result=mysqli_query($link,$query);
          $row = mysqli_fetch_assoc($result);
          if($row['state']==1){
          echo "<button type='button' class='btn btn-primary mb-2' data-toggle='tooltip' data-placement='top' title='Copy' onclick='myFunction()'>Copy</button>";
  }?>
</form>


        </div>
            
        </div>
        
     
    </div>
      
      </div>
      
     
  


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
       bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
       
    
 function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}

    </script>
  </body>
</html>
