<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>SCSVMV</title>
		<link rel="stylesheet" href="themes/Bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap2.css">
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.4.0.min.css" />
		<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
		<script src="js/jquery-1.8.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.0.min.js"></script>
	
<style type="text/css">

 .form-signin { max-width: 330px; padding: 15px; margin: 0 auto; }
  .form-signin .form-control { position: relative; font-size: 16px; height: auto; padding: 10px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; } 
  .form-signin .form-control:focus { z-index: 2; } 
  .form-signin input[type="text"] { margin-bottom: -1px; border-bottom-left-radius: 0; border-bottom-right-radius: 0; } 
  .form-signin input[type="password"] { margin-bottom: 10px; border-top-left-radius: 0; border-top-right-radius: 0; } 
  .account-wall { margin-top: 80px; padding: 40px 0px 20px 0px; background-color: #ffffff; box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16); }
   .login-title { color: #555; font-size: 22px; font-weight: 400; display: block; } 
   .profile-img { width: 96px; height: 96px; margin: 0 auto 10px; display: block; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; } 
    
     </style>
</head>
<body>
<div class="container">
 <div class="row"> 
 <div class="col-sm-6 col-md-4 col-md-offset-4">
  <div class="account-wall">
   <div id="my-tab-content" class="tab-content">
    <div class="tab-pane active" id="login">
     <img class="profile-img" src="img/scsvmv_large.png" alt=""> 
     <form class="form-signin" action="" method=""> 
     <input type="text" class="form-control" placeholder="Username" required autofocus>
      <input type="password" class="form-control" placeholder="Password" required>
       <input type="submit" class="btn btn-lg btn-default btn-block" value="Sign In" />
        </form> 
        <div id="tabs" data-tabs="tabs"> 
        <p class="text-center">
        <a href="#register" data-toggle="tab">Need an Account?</a>
        </p>
         
          </div>
           </div>
            <div class="tab-pane" id="register"> 
            <form class="form-signin" action="" method=""> 
            <input type="text" class="form-control" placeholder="User Name ..." required autofocus> 
            <input type="email" class="form-control" placeholder="Emaill Address ..." required> 
            <input type="password" class="form-control" placeholder="Password ..." required> 
            <input type="submit" class="btn btn-lg btn-default btn-block" value="Sign Up" />
             </form> 
             <div id="tabs" data-tabs="tabs"> 
             <p class="text-center">
             <a href="#login" data-toggle="tab">Have an Account?</a>
             </p>
              </div>
               </div>
               
                
       </body>
</html>