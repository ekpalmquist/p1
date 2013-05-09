<?php
// INITIALIZE ERROR VARIABLES
$errorFound = false;
$generalErrorMessage = '';
$emailErrorMessage = '';
$subjectErrorMessage = '';
$messageErrorMessage = '';
$subject2 = '';
$message2 = '';
$email2 = '';
// CONTACT FORM
if (isset($_POST['submitContactForm'])) { 
	// GET FORM INFORMATION
    $to = 'ekpalmquist@gmail.com';
	$subject2 = $_POST['subject'];
	$message2 = $_POST['message'];
	$email2 = $_POST['emailContactForm'];
	$from = "from: $email2";

     // TEST FORM INFORMATION
     if (!isset($email2) || trim($email2) == '' || !preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email2)) {
          $errorFound = true;
          $generalErrorMessage = 'Please correct the following errors and re-submit.';
          $emailErrorMessage = 'Please enter your email.';
     }
	 
	 if (!isset($subject2) || trim($subject2) == '') {
          $errorFound = true;
	   $generalErrorMessage = 'Please correct the following errors and re-submit.';
          $subjectErrorMessage = 'Please enter a subject.';
     }
	 
	 if (!isset($message2) || trim($message2) == '') {
          $errorFound = true;
          $generalErrorMessage = 'Please correct the following errors and re-submit.';
          $messageErrorMessage = 'Please enter a message.';
     }
    
     // IF NO ERRORS WERE FOUND, CONTINUE PROCESSING
     if (!$errorFound) {
		$send_contact = mail($to, $subject2, $message2, $from);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Home</title>
	<link type="text/css" rel="stylesheet" href="style.css"/>
</head>

<body>
	
	<div id="navbar">
		<a href="index.php">Home</a><br />
		<a href="work.php">Work Experience</a><br />
		<a href="skills.php">Skills</a><br />
		<a href="portfolio.php">Portfolio</a><br />
		
		<form action="index.php" method="post">
			
			<p>
			<?php if ($generalErrorMessage != '') {
				echo "$generalErrorMessage<br />";
				} 
			?>
				Your email:<span class="emailError">
			<?php if ($emailErrorMessage != '') {
				echo "$emailErrorMessage";
				} ?></span></p>
			<p><input type="text" class="textBoxBorder" name="emailContactForm" size="20" value="<?php echo "$email2"; ?>" /></p>
			<p>Subject:<span class="subjectError">
			<?php if ($subjectErrorMessage != '') {
				echo "$subjectErrorMessage";
			} ?></span></p>
			<p><input type="text" class="textBoxBorder" name="subject" size="20" value="<?php echo "$subject2"; ?>" /></p>
			<p>Message:<span class="messageError">
				<?php if ($messageErrorMessage != '') {
					echo "$messageErrorMessage";
				} ?></span></p>
			<p><textarea name="message" rows="5" cols="30"><?php echo "$message2"; ?></textarea>
			<input type="submit" name="submitContactForm" value="Send" /></p>
		</form>
	</div>
	
	
	
	<div id="content">
		<div id="sidebar">
			<h2>Lizzy Palmquist</h2>
			<h4>College of Agriculture and Life Sciences, 2013 </h4>
			<h5>Communications major, concentration in Communications and Technology, potential Information Science minor</h5>
			<h6>ekp27@cornell.edu</h6>
		</div>
		<div id="text1">
			<p>I grew up in Texas, but I would not call myself a typical Texan. I hated country music, till I moved to Ithaca, NY for college. I did not own a pair of cowboy boots, till senior year of high school. Once I decided to go to college in the northeast, I was drawn to the culture I was surrounded by for 19 years, but never appreciated. I have always been interested in fashion and photography, but never knew how to include those interests in my studies. Browse my site to see how I have learned to combine both.</p>
		</div>	
	</div>
</body>

</html>