<?php
	if(isset($_GET['submit']))
	{
		$fullname 	= isset($_GET['fullname']) 	? $_GET['fullname'] : '';
		$mobno 		= isset($_GET['mobno']) 	? $_GET['mobno'] 	: 0;
		$email 		= isset($_GET['email']) 	? $_GET['email'] 	: '';
		$subject 	= isset($_GET['subject']) 	? $_GET['subject'] 	: '';
		$message 	= isset($_GET['message']) 	? $_GET['message'] 	: '';
		$ErrMsg 	= '';

		if($fullname == '')
		{
			$ErrMsg = "FullName Cannot Be Empty";
			header("Location: index.php?fullname=$fullname&mobno=$mobno&email=$email&subject=$subject&message=$message&ErrMsg=$ErrMsg");
		}
		else if(intval($mobno) == 0 || strlen($mobno) < 10) //Condition to check if mobile no is valid
		{
			$ErrMsg = "Invalid Phone Number";
			header("Location: index.php?fullname=$fullname&mobno=$mobno&email=$email&subject=$subject&message=$message&ErrMsg=$ErrMsg");
		}
		else if($mobno[0] < 6)
		{
			$ErrMsg = "Phone Number First Digit Cannot Be Less Than 6 According To Indian Format";
			header("Location: index.php?fullname=$fullname&mobno=$mobno&email=$email&subject=$subject&message=$message&ErrMsg=$ErrMsg");
		}
		else if($email == '')
		{
			$ErrMsg = "Invalid Email";
			header("Location: index.php?fullname=$fullname&mobno=$mobno&email=$email&subject=$subject&message=$message&ErrMsg=$ErrMsg");
		}
		else if(!strpos($email, '.') || !strpos($email, '@')) //condition to check if email id contains '@' and '.'
		{
			$ErrMsg = "Invalid Email Format";
			header("Location: index.php?fullname=$fullname&mobno=$mobno&email=$email&subject=$subject&message=$message&ErrMsg=$ErrMsg");
		}
		else if($subject == '')
		{
			$ErrMsg = "Subject Cannot Be Empty";
			header("Location: index.php?fullname=$fullname&mobno=$mobno&email=$email&subject=$subject&message=$message&ErrMsg=$ErrMsg");
		}
		else if($message == '')
		{
			$ErrMsg = "Message Cannot Be Empty";
			header("Location: index.php?fullname=$fullname&mobno=$mobno&email=$email&subject=$subject&message=$message&ErrMsg=$ErrMsg");
		}
		else
		{
			$conn = new mysqli('localhost', 'root', '', 'assessment'); //Username and password are default because there is some problem with my localhost, so I cannot set the password

			if($conn->connect_error == '')
			{
				$sql = "INSERT INTO contact_form(fullname, mobno, email, subject, message, date) VALUES('$fullname', $mobno, '$email', '$subject', '$message', date('Y-m-d H:i:s'));";
				$conn->query($sql);
				// ini_set('smtp_port', "25");
				// ini_set('sendmail_from', "aryanbajaj09309.com");
				// $adminmail = 'aryanbajaj880@gmail.com';
				// mail($adminmail, $subject, $message);
				echo "Your Request Is Successfully Submitted.";
			}
			else
			{
				$ErrMsg = "Database Connection failed";
				header("Location: index.php?fullname=$fullname&mobno=$mobno&email=$email&subject=$subject&message=$message&ErrMsg=$ErrMsg");
			}
		}
	}
	else
	{
		echo "Invalid Attempt";
	}
?>