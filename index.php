<?php
	$fullname 	= isset($_GET['fullname']) 	? $_GET['fullname'] : '';
	$mobno 		= isset($_GET['mobno']) 	? $_GET['mobno'] 	: '';
	$email 		= isset($_GET['email']) 	? $_GET['email'] 	: '';
	$subject 	= isset($_GET['subject']) 	? $_GET['subject'] 	: '';
	$message 	= isset($_GET['message']) 	? $_GET['message'] 	: '';
	$ErrMsg		= isset($_GET['ErrMsg']) 	? $_GET['ErrMsg'] 	: '';
?>
<html>
	<head>
		<title>Contact Form</title>
		<style>
			.label{
				margin-left: 3%;
			}
		</style>
	</head>
	<body>
		<form action="submitform.php" method="get">
			<center><h4 style="color:red;"><?php echo $ErrMsg; ?></h4></center>
			<label for="fullname" class="label">
				Full Name:
			</label>
			<input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required onkeypress='return isAlphaNumric(event, this.value, 31);' maxlength="30">
			<br>
			<br>
			<label for="mobno" class="label">
				Phone Number:
			</label>
			<input type="text" id="mobno" name="mobno" value="<?php echo $mobno; ?>" required onkeypress="return IsMobNoVld(event, this.id, this.value);" maxlength="10">
			<br>
			<br>
			<label for="email" class="label">
				Email:
			</label>
			<input type="text" id="email" name="email" value="<?php echo $email; ?>" required onkeypress="return isAlphaNumric(event, this.value, 21, '@', '.');" maxlength="20">
			<br>
			<br>
			<label for="subject" class="label">
				Subject:
			</label>
			<input type="text" id="subject" name="subject" value="<?php echo $subject; ?>" required onkeypress="return isAlphaNumric(event, this.value, 16);" maxlength="15">
			<br>
			<br>
			<label for="message" class="label">
				Message:
			</label>
			<textarea type="text" id="message" name="message" required onkeypress="return isAlphaNumric(event, this.value, 151);" maxlength="150"><?php echo $message; ?></textarea>
			<br>
			<br>
			<input type="submit" id="submit" name="submit" value="Submit">
		</form>
	</body>
	<script>
		function IsMobNoVld(event, Id, val)
		{
			let keycode = event.keyCode;
			if((keycode < 48 || keycode > 57) || (val.length > 9 && keycode != 8)) //Validation to prevent alphanumeric value or more than 10 digit input
			{
				return false;
			}
			return true;
		}

		function isAlphaNumric(event, val, len, AtVak = "", DotVal = "")
		{
			var keycode = (event.which) ? event.which : event.keyCode;
			if (!(keycode > 47 && keycode < 58) && // numeric (0-9)
		        !(keycode > 64 && keycode < 91) && // upper alpha (A-Z)
		        !(keycode > 96 && keycode < 123) && // lower alpha (a-z)
		        ChckSpclChrct(keycode, AtVak) == true && 
		        ChckSpclChrct(keycode, DotVal) == true && keycode != 32) { 
			console.log(keycode);
		      return false;
		    }
			else
			{
				if(val.length >= len)
				{
					return false
				}
				return true;	
			}
		}

		function ChckSpclChrct(keycode, SpclChrctr)
		{
			var bFlag = true;
			if(SpclChrctr == "@" && keycode == 64)
			{
				bFlag = false;	
			}
			else if(SpclChrctr == "." && keycode == 46)
			{
				bFlag = false;	
			}
			return bFlag;
		}
	</script>
</html>