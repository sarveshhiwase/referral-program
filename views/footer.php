<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>  $("#login").click(function(){
       
       if($("#loginActive").val() == 0) {
       if($('#loginAlert').css('display') == "block"){
               $('#loginAlert').css('display','none');
           }
            $("#loginActive").val("1");
            $(this).text("Register");
            $("#registerbutton span").text("Login");
            $("#username").hide();
            $("#confirmpassword").hide();
            $("#donthave").html("Don't Have an Account?");
       } else {
       if($('#loginAlert').css('display') == "block"){
               $('#loginAlert').css('display','none');
           }
            $("#loginActive").val("0");
            $(this).text("Login");
            $("#registerbutton span").text("Register");
           $("#username").show();
            $("#confirmpassword").show();
            $("#donthave").html("Already Have an Account?");
       }
       
        });

  $("#registerbutton").click(function(){
       if($("#loginActive").val() == 1) {
    
        $.ajax({
            type: "POST",
            url: "../functions/actions.php?action=loginSignup",
            data: "phone=" + $("#phone").val() + "&password=" +$("#password").val() + "&loginActive=" + $("#loginActive").val(),
            success: function(result){
               if(result == "1"){
                   window.location.assign("http://referralgenerate.atwebpages.com/");
               } else {
                   
                   $("#loginAlert").html(result).show();
               }
            }
            
        });
        
       }else{
                $.ajax({
            type: "POST",
            url: "../functions/actions.php?action=loginSignup",
            data: "phone=" + $("#phone").val() +"&name=" +$("#name").val() +  "&password=" +$("#password").val() +  "&conPassword=" +$("#conPassword").val() + "&loginActive=" + $("#loginActive").val() + "&reff=" + $("#reff").val(),
            success: function(result){
               if(result == "1"){
                   window.location.assign("http://referralgenerate.atwebpages.com/");
               } else {
                   
                   $("#loginAlert").html(result).show();
               }
            }
            
        });
       
       }    
       
    });
    $("#generatelink").click(function(){
           
           if($("#clickCount").val() == 1){
           
                    $.ajax({
                            type: "POST",
                            url: "../functions/actions.php?action=generateLink",
                            data: "clickCount=" + $("#clickCount").val(),
                           
                            
                    });
                    $("#clickCount").val("0");
              
           }
           location.reload();
    
    });
    
    

    
  </script>
  </body>
</html>