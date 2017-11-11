
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign In</title>
        <link rel="icon" href="<?php echo base_url();?>asset/img/favicon.png" type="image/png" sizes="16x16">
        <!-- CSS -->
        <link href="<?php echo base_url();?>asset/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>asset/css/form-elements.css" rel="stylesheet">
        <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Knowledge Management System</strong> Pengadilan Agama Baturaja</h1>
                            <div class="description">
                            	<p>
	                            	Sharing Your Knowledge Here 
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Sign In </h3>
                            		<p>Masukkan NIP dan Password untuk Sign In</p>
                        		</div>
                        		<div class="form-top-right">
                        			<img src="<?php echo base_url();?>asset/img/logobaru.jpg" class="img-responsive" alt="Responsive image">
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" method="POST" action="<?php echo base_url('signin/signinAction');?>" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="nip" placeholder="NIP" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password">
										 <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
			                        </div>
			                       
			                        <button type="submit" class="btn">Click Here</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/jquery-1.11.1.js"></script>
        <script src="<?php echo base_url();?>asset/js/jquery.backstretch.js"></script>
        <script src="<?php echo base_url();?>asset/js/scripts.js"></script>

    </body>

</html>