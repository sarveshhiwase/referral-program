     
    	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://www.pngitem.com/pimgs/m/78-786293_1240-x-1240-0-avatar-profile-icon-png.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form>
                                            <div><?php if($_GET['ref']){ ?>
                                            
                                                  <input type="hidden" name= "reff" value="<?php echo htmlspecialchars($_GET['ref']); ?>" id="reff">
                                                            
                                           <?php }?></div>
                                        
                                        
                                        
					    <div class="alert alert-danger" id="loginAlert"></div>
					     <input type="hidden" name= "loginActive" value="0" id="loginActive">
						<div class="input-group mt-2 mb-3" id="username">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="" class="form-control input_user" value="" placeholder="Name" id="name">
						</div>
                                                <div class="input-group mb-3" class="phoneno">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
							</div>
							<input type="number" name="" class="form-control input_user" value="" placeholder="Phone Number" id="phone" >
						</div>
                                                
						<div class="input-group mb-3" class="password">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="" class="form-control input_pass" value="" id="password" placeholder="Password">
						</div>
                                                <div class="input-group mb-3" id="confirmpassword">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="" class="form-control input_pass" value="" id="conPassword" placeholder="Confirm Password">
						</div>
					
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<a type="button" name="button" class="btn login_btn" id="registerbutton"><span>Register</span></a>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
					<span id="donthave">Already have an account? </span>	  <a href="#" class="ml-2" id="login">Login</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>