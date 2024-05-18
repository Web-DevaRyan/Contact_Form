<?php
	$fullname 	= isset($_GET['fullname']) 	? $_GET['fullname'] : '';
	$mobno 		= isset($_GET['mobno']) 	? $_GET['mobno'] 	: 0;
	$email 		= isset($_GET['email']) 	? $_GET['email'] 	: '';
	$subject 	= isset($_GET['subject']) 	? $_GET['subject'] 	: '';
	$message 	= isset($_GET['message']) 	? $_GET['message'] 	: '';
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
			<label for="fullname" class="label">
				Full Name:
			</label>
			<input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" maxlength="30">
			<br>
			<br>
			<label for="mobno" class="label">
				Phone Number:
			</label>
			<input type="text" id="mobno" name="mobno" value="<?php echo $mobno; ?>" onkeypress="return IsMobNoVld(event, this.id, this.value);" maxlength="10">
			<br>
			<br>
			<label for="email" class="label">
				Email:
			</label>
			<input type="text" id="email" name="email" value="<?php echo $email; ?>" maxlength="20">
			<br>
			<br>
			<label for="subject" class="label">
				Subject:
			</label>
			<input type="text" id="subject" name="subject" value="<?php echo $subject; ?>" maxlength="15">
			<br>
			<br>
			<label for="message" class="label">
				Message:
			</label>
			<textarea type="text" id="message" name="message" value="<?php echo $message; ?>" maxlength="150"></textarea>
			<br>
			<br>
			<input type="submit" id="submit" name="submit" value="Submit">
		</form>
	</body>
	<script>
		function IsMobNoVld(event, Id, Val)
		{
			let keycode = event.keyCode;
			if((keycode < 48 || keycode > 57) || (Val.length > 9 && keycode != 8)) //Validation to prevent alphanumeric value or more than 10 digit input
			{
				return false;
			}
			return true;
		}
	</script>
</html>