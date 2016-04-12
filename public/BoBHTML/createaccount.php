<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Create Account</title>

<link href="_styles/main.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
			
			function Validate ()
			{
				var txtFirstName = document.getElementById("txtFirstName");
				var txtLastName = document.getElementById("txtLastName");
				var txtEmail = document.getElementById("txtEmail");
				var txtPhone = document.getElementById("txtPhone");
				var phoneRegex = /^\(\d{3}\)\d{3}-\d{4}&/;
				var txtAddress = document.getElementById("txtAddress");
				var txtCity = document.getElementById("txtCity");
				var lstState = document.getElementById("lstState");
				var txtZip = document.getElementById("txtZip");
				var txtPassword = document.getElementById("txtPassword");
				var txtPassword2 = document.getElementById("txtPassword2");
				// var NameCombine = txtFirstName.value + " " + txtLastName.value;
				// alert(NameCombine);

				if(txtFirstName.value=="")
				{
					alert("First Name is Required");
					txtFirstName.focus();
					return false;
				}
				
				if(txtLastName.value=="")
				{
					alert("Last Name is Required");
					txtLastName.focus();
					return false;
				}
				
				if(txtEmail.value.indexOf("@") == -1 || txtEmail.value.indexOf(".") == -1)
				{
					alert("Please Enter a Valid Email");
					txtEmail.focus();
					txtEmail.select();
					return false;
				}
				
				if(!phoneRegex.test(txtPhone.value))
				{
					alert("Please Enter a Valid Phone Number");
					txtPhone.focus();
					txtPhone.select();
					return false;
				}
				
				if(txtAddress.value=="")
				{
					alert("Address is Required");
					txtAddressfocus();
					return false;
				}
				
				if(txtCity.value=="")
				{
					alert("City is Required");
					txtCity.focus();
					return false;
				}
				
				
				if(txtZip.value.length!=5 || isNaN(txtZip.value))
				{
					alert("Please enter a valid Zip code");
					txtZip.focus();
					return false;
				}
				
				if(txtPassword.value!=txtPassword2.value)
				{
					alert("Your Passwords must match!");
					txtPassword.focus();
					return false;
				}
				return True;
			}
			
		</script>



</head>

<body>

  <div id="wrap">
  	<div id="header">
  		<div id="logo">
   			 <header>
				<img src="_images/BobLogo.png" alt="BoB Logo" />
      			<h1>Welcome to Battle on Bago</h1>
    		</header>
    	</div>
    </div>
 
      <div id="sign-in">
      	<?php
            if (isset($_COOKIE['FirstName'])) {
                echo ('<h2>Welcome, ' . $_COOKIE['FirstName'] . '</h2>');
                echo ('<h4><a href="_php/Logout.php">Not you? Sign-out</a></h4>');
            } else {
                echo ('
                    <div id="user_logIn">
                        <input type="submit" class="button" name="btnLogin" id="btnLogin" onclick="return" value="Login"/><br />
                        <input type="button" class="button" name="btnSignUp" id="btnSignUp" value="Sign Up" />
                    </div>

                    <div id="password_signup">
                        <input type="text" class="textbox" id="email" name="email" placeholder="email" /><br />
                        <input type="password" class="password" id="password" name="password" placeholder="password" />
                    </div>
                ');
            }
        ?>
     </div><br />
     
    <div id="nav">
   	 <nav>
    		<ul>
     			 <li><a href="/">Home</a></li>
     	 		<li><a href="account.php">My Account</a></li>
     			 <li><a href="createaccount.php">Create Account</a></li>
     			 <li><a href="prizes.php">Prizes</a></li>
     			 <li><a href="http://itweb.fvtc.edu/120297214/XML/BOB/final.html">Results</a></li>
     		 </ul>
   	 </nav> 
    </div>
   
    <div>
      <form name="PDS" id="PDS" action="http://battleonbago.azurewebsites.net/_php/newConst.php" method="post">
     		 <fieldset>
					<legend>Please Enter Your Infomation</legend>
					<br />
						<label for="txtFirstName">First Name:</label><input type="text" id="txtFirstName" name="txtFirstName" autofocus=""/>
							<br />
							<br />
						<label for="txtLastName">Last Name:</label><input type="text" id="txtLastName" name="txtLastName" />
							<br />
							<br />
						<label for="txtEmail">Email:</label><input type="email" id="txtEmail" name="txtEmail"/>
							<br />
							<br />
						<label for="txtPhone">Phone#:</label><input type="text" id="txtPhone" name="txtPhone" placeholder="(###)###-####"/>
							<br />
							<br />
						<label for="txtAddress">Address:</label><input type="text" id="txtAddress" name="txtAddress" />
							<br />
							<br />
						<label for="txtCity">City:</label><input type="text" id="txtCity" name="txtCity"/>
							<br />
							<br />
						<label for="lstState">State:</label><select id="lstState" name="lstState">
							<option value="select" selected="">Select</option>
							   <option value="AK">AK</option>
     							<option value="AL">AL</option>
    							 <option value="AR">AR</option>
    			 <option value="AZ">AZ</option>
     <option value="CA">CA</option>
     <option value="CO">CO</option>
     <option value="CT">CT</option>
     <option value="DC">DC</option>
     <option value="DE">DE</option>
     <option value="FL">FL</option>
     <option value="GA">GA</option>
     <option value="HI">HI</option>
     <option value="IA">IA</option>
     <option value="ID">ID</option>
     <option value="IL">IL</option>
     <option value="IN">IN</option>
     <option value="KS">KS</option>
     <option value="KY">KY</option>
     <option value="LA">LA</option>
     <option value="MA">MA</option>
     <option value="MD">MD</option>
     <option value="ME">ME</option>
     <option value="MI">MI</option>
     <option value="MN">MN</option>
     <option value="MO">MO</option>
     <option value="MS">MS</option>
     <option value="MT">MT</option>
     <option value="NC">NC</option>
     <option value="ND">ND</option>
     <option value="NE">NE</option>
     <option value="NH">NH</option>
     <option value="NJ">NJ</option>
     <option value="NM">NM</option>
     <option value="NV">NV</option>
     <option value="NY">NY</option>          
     <option value="OH">OH</option>
     <option value="OK">OK</option>
     <option value="OR">OR</option>
     <option value="PA">PA</option>
     <option value="RI">RI</option>
     <option value="SC">SC</option>
     <option value="SD">SD</option>
     <option value="TN">TN</option>
     <option value="TX">TX</option>
     <option value="UT">UT</option>
     <option value="VT">VT</option>
     <option value="VA">VA</option>
     <option value="WA">WA</option>
     <option value="WV">WV</option>
     <option value="WI">WI</option>
     <option value="WY">WY</option>
						</select>
							<br />
							<br />
						<label for="txtZip">Zip:</label><input type="text" id="txtZip" name="txtZip" placeholder="5 digit zip code" maxlength="5"/>
							<br />
							<br />
							
				
			
				<br />
				<br />
			
					<legend>Create a Password</legend>
					<br />
					<label for="txtPassword">Password:</label>
					<input type="password" id="txtPassword" name="txtPassword" />
					<br />
					<br />
					<label for="txtPassword2">Verify Password:</label>
					<input type="password" id="txtPassword2" name="txtPassword2" />

                    <br />
					<br />
						<input type="submit" value="Create Account" onclick="return"/>
						<br />
						<br />
					<input type="reset" value="Reset" onClick="window.location.reload()"/>
				</fieldset>
				<br />

	  </form>
				
    </div>

    <footer>
		<p>Agile Development 60515/60514, Group 2 (BoB)</p>
		<p>&copy; Copyright  by Ian Elliott</p>
		<p>All content is for Educational Use Only</p>
    </footer>
  </div>

</body>
</html>
