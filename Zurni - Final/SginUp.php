<?php
$hn='localhost';
$username='root';
$password='';
$db='zurni';
  $conn = new mysqli($hn, $username, $password, $db);
  if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
$un=$pw=$n=$e=$age=$ssn=$ad=$dpn='';
	$unr=$pwr=$nr=$er=$ssnr=$adr=$dpnr='';
	
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty(trim($_POST['username'])))
	$unr = "Please enter a username";
	else{ 
	if ($stmt=$conn->prepare("SELECT DonatorID FROM donator WHERE username = ?")){
		$stmt->bind_param('s',$param_un);
		$param_un=trim($_POST['username']);
		if ($stmt->execute()){
			$stmt->store_result();
			if ($stmt->num_rows ==1)
				$unr="This username already taken";
			else
				$un=trim($_POST['username']);
			
		}else
			echo"sth went wrong sorry";
	
	$stmt->close();
}}
	if (empty(trim($_POST['password'])))
	$pwr="please enter a password";
elseif (strlen(trim($_POST['password']))<6)
	$pwr="please enter a longer password";
else
	$pw = trim($_POST['password']);

if (empty(trim($_POST['name'])))
	$nr='Please enter a name';
else
	$n=trim($_POST['name']);

if (empty(trim($_POST['email'])))
	$er="please enter an email";
else
	$e = trim($_POST['email']);


if (empty(($_POST['ssn'])))
	$ssnr="Please enter an SSN.";
else
	$ssn = trim($_POST['ssn']);

if (empty(trim($_POST['address'])))
	$adr="please enter an address";
else
	$ad= trim($_POST['address']);

if (empty(($_POST['donatorphonenumber'])))
	$dpnr="please enter your phone number";
else
	$dpn = trim($_POST['donatorphonenumber']);

$age = ($_POST['age']);

if(empty($unr) && empty($pwr) &&empty($nr)&&empty($er) && empty($ssnr) &&empty($adr)&&empty($dpnr)){
		if($stmt = $conn->prepare("INSERT INTO donator (username,password,email,Name,Age,SSN,Address,DonatorPhoneNumber) VALUES (?,?,?,?,?,?,?,?)")){
				$stmt->bind_param("ssssddsd",$param_username,$param_password,$param_email,$param_name,$param_age,$param_ssn,$param_address,$param_DPN );
				$param_username = $un;
				$param_email =$e;
				$param_password =$pw; 
				$param_name=$n;
				$param_age=$age;
				$param_ssn=$ssn;
				$param_address=$ad;
				$param_DPN=$dpn;
				
				if($stmt->execute()){
					echo "Record has been added!";
				} else{
					echo "Something went wrong. Please try again later.";
				}
			}
			 
			
			$stmt->close();
}
 $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
    <style type="text/css">
        body{ font: 14px sans-serif; background-color:#F1FFF5; color:#43C36A;}
        .wrapper{ width: 800px; padding: 20px; }
	 </style>
</head>
<body>
			
    <div class="well wrapper" style="margin:auto; border: solid 1px #43C36A;">
       
        <h3>Sign Up</h3>
		<p>please fill the Form:</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
			<div class="form-group <?php echo empty($unr)?'':'has-error'; ?>">
                <label>Username</label>
                <input type="text" style = "width:400px;"name="username" class="form-control" value ="<?php echo$un ;?>">
                <span class="help-block"><?php echo $unr; ?></span>
            </div>     
			
			<div class="form-group <?php echo (empty($pwr)) ? '' : 'has-error' ; ?>">
                <label>Password</label>
                <input type="password" name="password"  class="form-control" value="<?php echo $pw; ?>">
                <span class="help-block"><?php echo $pwr; ?></span>
            </div>
			
            <div class="form-group <?php echo (empty($nr)) ? '' : 'has-error' ; ?>">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $n; ?>" required>
                <span class="help-block"> <?php echo $nr; ?></span>
            </div> 
			
			
				<div class="form-group <?php echo (empty($er)) ? '' : 'has-error' ; ?>">
				<label>Email</label>
				<input type="email" name="email" placeholder = "name@domain.com" class="form-control"  value="<?php echo $e; ?>" required >
				<span class="help-block"><?php echo $er; ?></span>
			</div>
			<br><br>
			
			<div class="form-group">
				<label>Age</label>
				<input type="number" name="age"min="1" max='120'class="form-control"  value="<?php echo $age; ?>" required >
			</div>
			<div class="form-group <?php echo (empty($ssnr)) ? '' : 'has-error' ; ?>">
                <label>SSN</label>
                <input type="text" name="ssn" placeholder = "###-###-###" class="form-control" value="<?php echo $ssn; ?>">
                <span class="help-block"><?php echo $ssnr; ?></span>
            </div>
			
			 <div class="form-group <?php echo (empty($adr)) ? '' : 'has-error' ; ?>">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $ad; ?>" required >
                <span class="help-block"><?php echo $adr; ?></span>
            </div> 
			
			<div class="form-group <?php echo (empty($dpnr)) ? '' : 'has-error' ; ?>">
			<label>DonatorPhoneNumber </label>
               <input name = "donatorphonenumber"type = "text" placeholder = "(###)###-####" required class="form-control" value="<?php echo $dpn; ?>"> 
               <span class="help-block"><?php echo $dpnr; ?></span>
			</div>
			<div style="width:250px" class="container">
				<button type="submit" class="btn btn-success btn-block">Submit</button>
			</div>
			
	</form>
	</div></div>
	</body>
	</html>
		