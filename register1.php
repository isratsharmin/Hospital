<?php 
     error_reporting(E_ALL ^ E_DEPRECATED);
	session_start();
	error_reporting( error_reporting() & ~E_NOTICE );
	$db = mysqli_connect("localhost", "root", "", "hospital");
	if (isset($_POST['register_btn'])) {
		require_once('phpmailer/PHPMailerAutoload.php');



//echo 'Message has been sent';
		$full_name = mysql_real_escape_string($_POST['full_name']);
		$username = mysql_real_escape_string($_POST['username']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$address = mysql_real_escape_string($_POST['address']);
		$birthdate =mysql_real_escape_string($_POST['birthdate']);
		$gender=mysql_real_escape_string($_POST['gender']);
		$email = mysql_real_escape_string($_POST['email']);
		
		$password = mysql_real_escape_string($_POST['password']);
		$confirmPassword = mysql_real_escape_string($_POST['confirmPassword']);
		if ($password == $confirmPassword) {
			$query = mysqli_query($db, "SELECT * From user WHERE username='$username'");
			if(mysqli_fetch_assoc($query)>0){
				$_SESSION['message'] = "User exist, Get another Username";
			}else{
		    $password = md5($password); 
			$sql = "INSERT INTO user(full_name, username, phone, address, birthdate, gender, email, password) VALUES
			          ('$full_name', '$username', '$phone', '$address', '$birthdate', '$gender', '$email', '$password')";
			mysqli_query($db, $sql);
			$mail = new PHPMailer();
//echo !extension_loaded('openssl')?"Not Available":"Available";
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML(true);
$mail->Username = 'samihaprvn@gmail.com';
$mail->Password = 'Samiha006';
$mail->SetFrom('hospital@org.com');
$mail->Subject = 'Registration Complete';
$mail->Body = '<h1>Thank you for registering, your profile has been created successfully</h1>';
$mail->AddAddress($_POST['email']);
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
			//$_SESSION['message'] = "You are now logged in";
			//$_SESSION['username'] = $username;
			header("location: login.php"); //redirect to home page
			} }else{
			//$_SESSION['message'] = "The two passwords do not match";
		}
	}
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css1.css">
<link type="text/css" rel="stylesheet" href="style.css"> 
  
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
    
<style>

    .container{
		text-align:center;
	 max-width: 60em;
  padding: 1em 3em 2em 3em;
  margin: 0em auto;
  background-color: lightgrey;
  border-radius: 4.2px;
  box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
	}
    
.select-boxes{height:800px;
	margin-left:80px;
	margin-right:80px;
	margin-top:20px;}
select {
    background-color: #F5F5F5;
    border: 1px double #15a6c7;
    color: #1d93d1;
    font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
}
select option{
    font-family: Georgia;
    font-size: 14px;
}
    
    
/* Basic reset */
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	
	/* Better text styling */
	font: bold 14px Arial, sans-serif;
}

/* Finally adding some IE9 fallbacks for gradients to finish things up */

/* A nice BG gradient */


/* Using box shadows to create 3D effects */
#calculator {
    width: 425px;
    height: auto;
    margin: 0px auto;
    padding: 20px 20px 9px;
    background: #9dd2ea;
    background: linear-gradient(rgba(171, 183, 241, 0.87), #8bceec);
    border-radius: 20px;
    box-shadow: 0px 4px rgba(0, 104, 136, 0.53), 0px 10px 15px rgba(0, 0, 0, 0.2);
}

/* Top portion */
.top span.clear {
	float: left;
}

/* Inset shadow on the screen to create indent */
.top .screen {
	height: 40px;
	width: 212px;
	
	float: right;
	
	padding: 0 10px;
	
	background: rgba(0, 0, 0, 0.2);
	border-radius: 3px;
	box-shadow: inset 0px 4px rgba(0, 0, 0, 0.2);
	
	/* Typography */
	font-size: 17px;
	line-height: 40px;
	color: white;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
	text-align: right;
	letter-spacing: 1px;
}

/* Clear floats */
.keys, .top {overflow: hidden;}

/* Applying same to the keys */
.keys span, .top span.clear {
	float: left;
	position: relative;
	top: 0;
	
	cursor: pointer;
	
	width: 66px;
	height: 36px;
	
	background: white;
	border-radius: 3px;
	box-shadow: 0px 4px rgba(0, 0, 0, 0.2);
	
	margin: 0 7px 11px 0;
	
	color: #888;
	line-height: 36px;
	text-align: center;
	
	/* prevent selection of text inside keys */
	user-select: none;
	
	/* Smoothing out hover and active states using css3 transitions */
	transition: all 0.2s ease;
}

/* Remove right margins from operator keys */
/* style different type of keys (operators/evaluate/clear) differently */
.keys span.operator {
	background: #FFF0F5;
	margin-right: 0;
}

.keys span.eval {
	background: #f1ff92;
	box-shadow: 0px 4px #9da853;
	color: #888e5f;
}

.top span.clear {
	background: #ff9fa8;
	box-shadow: 0px 4px #ff7c87;
	color: white;
}

/* Some hover effects */
.keys span:hover {
    background: #1d91d0;
    box-shadow: 0px 4px #0676b3;
    color: #f1f1f1;
}

.keys span.eval:hover {
	background: #abb850;
	box-shadow: 0px 4px #717a33;
	color: #ffffff;
}

.top span.clear:hover {
	background: #f68991;
	box-shadow: 0px 4px #d3545d;
	color: white;
}

/* Simulating "pressed" effect on active state of the keys by removing the box-shadow and moving the keys down a bit */
.keys span:active {
	box-shadow: 0px 0px #6b54d3;
	top: 4px;
}

.keys span.eval:active {
	box-shadow: 0px 0px  #254791;
	top: 4px;
}

.top span.clear:active {
	top: 4px;
	box-shadow: 0px 0px #d3545d;
}
input[type="radio"] + label,
select {
  display: inline-block;
  width:120px;
  height:50px;
  text-align: center;
  float: left;
  border-radius: 0;
   padding:16px;
  
}
input[type="radio"] + label:first-of-type {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
input[type="radio"] + label:last-of-type {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
input[type="radio"] + label i {
  padding-right: 0.4em;
}
input[type="radio"]:checked + label,
input:checked + label:before,
select:focus,
select:active {
  background-color: #254791;
  color: #fff;
  border-color: #254791;
}
input[type=radio] {
    display:none; 
    margin:10px;
	 text-align: center;
	
	 background-color:gray;
}


</style>
    
    
      
    
</head><body>

<?php include 'header.php';?>
  
  <!-- Image header -->

          <div class="select-boxes">
    
  <div class="container">
<div class="col-lg-9">
	       


  <form class="form-horizontal" action="register1.php " method="post"  id="reg_form">
    <fieldset>
      
      <!-- Form Name -->
      <legend> Personal Information </legend>
    
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Full Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="full_name" placeholder="Full Name" class="form-control"  type="text">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label" >User Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="username" placeholder="User Name" class="form-control"  type="text">
          </div>
        </div>
      </div>
      
    
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Phone</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="phone" placeholder="(000)000-0000" class="form-control" type="text">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Address</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="address" placeholder="Address" class="form-control" type="text">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Date Of Birth</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input name="birthdate" placeholder="city" class="form-control"  type="date">
          </div>
        </div>
      </div>
      
      <!-- Select Basic -->
      
      
   
      
      <div class="form-group">
        <label class="col-md-4 control-label">Gender </label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
         
			 <input type="radio" name="gender" value="male" id="gender-male"/>
          <label for="gender-male">Male</label>
          <input type="radio" name="gender" value="female" id="gender-female"/>
          <label for="gender-female">Female</label>
          </div>
        </div>
      </div>
      <br>
     
       </fieldset>
       	<legend> Account information </legend>
        <fieldset>
        <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label">E-Mail</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
          </div>
        </div>
      </div>
      
    
        <div class="form-group has-feedback">
            <label for="password"  class="col-md-4 control-label">
                    Password
                </label>
                <div class="col-md-6  inputGroupContainer">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input class="form-control" id="userPw" type="password" placeholder="password" 
                       name="password" data-minLength="5"
                       data-error="some error"
                       required/>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
                </div>
             </div>
        </div>
     
        <div class="form-group has-feedback">
            <label for="confirmPassword"  class="col-md-4 control-label">
                   Confirm Password
                </label>
                 <div class="col-md-6  inputGroupContainer">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input class="form-control {$borderColor}" id="password2" type="password" placeholder="Confirm password" 
                       name="confirmPassword" data-match="#confirmPassword" data-minLength="5"
                       data-match-error="some error 2"
                       required/>
                <span class="glyphicon form-control-feedback"></span>
                <span class="help-block with-errors"></span>
      			 </div>
             </div>
        </div>
     
  
      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
          <button name="register_btn" type="submit" class="btn btn-warning" onclick="myFunction()" >Send <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>
    </fieldset>
  </form>
</div>

</div>
<script>
function myFunction() {
    alert("You will get an email Shortly!");
}
</script>

<!-- PrefixFree -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

        <script src="js/index.js"></script>
<script type="text/javascript">
 
   $(document).ready(function() {
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your user name'
                    }
                }
            },
           
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
						
                        country: 'BD',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Please select your state'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
		comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description about yourself'
                    }
                    }
                 },	
	 email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
					
	password: {
            validators: {
                identical: {
                    field: 'confirmPassword',
                    message: 'Confirm your password below - type same password please'
                }
            }
        },
        confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'The password and its confirm are not the same'
                }
            }
         },
			
            
            }
        })
		
 	
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#reg_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});


 
 </script>
    
    </div>

          
            
      </div>
      
    </div>

  </div>

</div>
<?php include 'footer.php';?>
</body>
</html>