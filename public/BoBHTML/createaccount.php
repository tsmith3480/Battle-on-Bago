<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width">

  <title>Create Account</title>
  
  <link href="_styles/main.css" type="text/css" rel="stylesheet" />
  <link href="_styles/maxwidth767.css" rel="stylesheet" media="only screen and (max-width : 767px)"/>
  
    <script type="text/javascript">

   function Validate() {

        //alert(document.frmSignup.txtfirstName.value.length);
        if (document.PDS.txtFirstName.value.length == 0) {
             document.getElementById('errors').innerHTML = "Enter your first name please";
            //alert("Please enter your First Name!");
            document.PDS.txtFirstName.focus();
            return false;
        }
        if (document.PDS.txtLastName.value.length == 0) {
            document.getElementById('errors').innerHTML = "Enter your last name please";
           // alert("Please enter your Last Name!");
            document.PDS.txtLastName.focus();
            return false;
        }
        if (document.PDS.txtEmail.value.indexOf("@") == -1) {
            document.getElementById('errors').innerHTML = "Check email entry please";
           // alert("Please enter your email!");
            document.PDS.txtEmail.focus();
            return false;
        }
        var tPhone = /^[2-9]\d{2}-\d{3}-\d{4}$/;
        if (!tPhone.test(document.PDS.txtPhone.value)) {
            document.getElementById('errors').innerHTML = "Phone number format ###-###-####";
            //alert("Please enter your Phone 1st digit 2 to 9, ###-###-####!")
            document.PDS.txtPhone.focus();
            return false;
        }
        if (document.PDS.txtAddress.value.length == 0) {
            document.getElementById('errors').innerHTML = "Your address is required"
           // alert("Please enter your address!");
            document.PDS.txtAddress.focus();
            return false;
        }
        if (document.PDS.txtCity.value.length == 0 ) {
            document.getElementById('errors').innerHTML = "City field is required"
           // alert("Please enter your City!");
            document.PDS.txtCity.focus();
            return false;
        }
        if (document.PDS.lstState.selectedIndex == 0 || document.PDS.txtCity.value.length == "Select") {
            document.getElementById('errors').innerHTML = "Pick A state"
            //alert("Please select a State!");
            document.PDS.lstState.focus();
            return false;
        }

        var ZipEdit = /^\d{5}$|^\d{5}-\d{4}$/;
        if (!ZipEdit.test(document.PDS.txtZip.value)) {
            document.getElementById('errors').innerHTML = "Check Zip code entry"
            //alert("Please enter your 5 digit Zip code!")
            document.PDS.txtZip.focus();
            return false;
        }

        if (document.PDS.txtPassword.value.length == 0) {
            document.getElementById('errors').innerHTML = "Enter Password";
            // alert("Please enter your Last Name!");
            document.PDS.txtPassword.focus();
            return false;
        }

        if (document.PDS.txtPassword2.value.length == 0) {
            document.getElementById('errors').innerHTML = "Enter Verify Password";
            // alert("Please enter your Last Name!");
            document.PDS.txtPassword2.focus();
            return false;
        }
        var str1 = document.getElementById("txtPassword");
        var str2 = document.getElementById("txtPassword2");
        if (str1.value != str2.value) {
            document.getElementById('errors').innerHTML = "Passwords don't match";
            // alert("Please enter your Last Name!");
            document.PDS.txtPassword2.focus();
            return false;
        }
        return true;
    }

    </script>



</head>

<body>

  <div id="wrap">
  	<div id="header">
  		<div id="logo">
   			 <header>
				<img src="_images/Bob-Logo-Header.png" alt="BoB Logo" />
      			<!--<h1>Welcome to Battle on Bago</h1>-->
    		</header>
    	</div>
    </div>
 	<form action="http://battleonbago.azurewebsites.net/_php/LoginOut2.php" method="post">
      <div id="sign-in-block">
        <?php
            if (isset($_COOKIE['FirstName'])) {
                echo ('
                  <div id="sign-in">
                    <h2>Hello, ' . $_COOKIE['FirstName'] . '</h2>
                  </div><br /><!--end "sign-in"-->
                 ');
                echo ('
                  <div id="sign-in">
                    <h4><a href="_php/Logout.php">Sign-out</a></h4>
                  </div><br /><!--end "sign-in"-->
                ');
            } else {
                echo ('                  
                 <div id="sign-in">
                    <a href="account.php">Sign In</a>
                 </div><br /><!--end "sign-in"-->
                ');
            }
        ?>
     </div><br />
    </form> 
    <div id="nav">
   	 <nav>
    		<ul>
     			 <li><a href="/">Home</a></li>
     	 		 <li><a href="account.php">My Account</a></li>
     			 <li><a href="createaccount.php">Create Account</a></li>
     			 <li><a href="prizes.php">Prizes</a></li>
     			 <li><a href="liveResults.html">Results</a></li>
     		 </ul>
   	 </nav> 
    </div>
   
    <div id="PDS">
      <form name="PDS" id="PDS" action="http://battleonbago.azurewebsites.net/_php/newConst.php" method="post">
     		 <fieldset>
     		 	<br />
					<legend>Please Enter Your Infomation</legend>
					<hr />
					<br />
						<label for="txtFirstName">First Name:</label><input type="text" id="txtFirstName" name="txtFirstName" autofocus=""/>
							<br />
							<br />
						<label for="txtLastName">Last Name:</label><input type="text" id="txtLastName" name="txtLastName" />
							<br />
							<br />
						<label for="txtEmail">Email:</label><input type="text" id="txtEmail" name="txtEmail"/>
							<br />
							<br />
						<label for="txtPhone">Phone#:</label><input type="text" id="txtPhone" name="txtPhone" placeholder="###-###-####"/>
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
                  <h1 id="errors" style="text-align: center; color: red;"></h1>
					<br />
						<input type="submit" value="Create Account" onclick="return Validate()"/>
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
