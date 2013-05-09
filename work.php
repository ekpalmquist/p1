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
	<title>Work Experience</title>
	<link type="text/css" rel="stylesheet" href="style.css"/>
</head>

<body>
	
	<div id="navbar">
		<a href="index.php">Home</a><br />
		<a href="work.php">Work Experience</a><br />
		<a href="skills.php">Skills</a><br />
		<a href="portfolio.php">Portfolio</a><br />
		<form action="work.php" method="post">
			
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
			<h3>Intern</h3>
			<h4>College of Agriculture and Life Sciences Communications, spring 2012</h4>
			<p>Helped eight departments as the CALS Communications liaison take current information on each department website and edit to update. With each department, helped them edit current site maps to provide more relevant information as part of the CALS web site redesign.</p>
		</div>
		<div id="text2">
			<h3>Project Manager</h3>
			<h4>Ttweak, Houston, TX, summer 2010</h4>
			<p>Designed new web site for client, which helped company reach out to new potential clients. Served as a liaison between client and Ttweak, an advertising company based out of Houston by contacting the client in order to create website and new designs. Scheduled and assisted photo shoot of all employees. Helped write and edit a Request For Qualifications for the city of Houston to build the client base to the city of Houston.</p>
		</div>
		<div id="text3">
			<h3>Co-Philanthropy Chair</h3>
			<h4>Kappa Kappa Gamma, 2011</h4>
			<p>Coordinated Reading is Key events throughout the year. Planned a charity 	dinner for the Congo Leadership Initiative with three other greek houses on campus in the spring. Lead teams for Relay for Life for pledge classes. Coordinated Kappa Dogs in the fall, to raise money for national our philanthropy, Reading is Fundamental. Planned a charity dinner with six other greek houses on campus for Share Our Strength in the fall.</p>
		</div>
		<div id="text4">
			<h3>Standards Committee</h3>
			<h4>Kappa Kappa Gamma, 2012</h4>
			<p>As a member of the Standards committee (our judicial board), helped ensure that each member was representing the chapter in a rightful manner as well as the well being of each member through weekly meetings.</p>
		</div>
		<div id="text5">
			<h3>Assistant</h3>
			<h4>Mary Nichols, Houston, TX, summer 2010</h4>
			<p>Created Facebook fan page and edited Facebook group accordingly to help reach out to clients through other media besides her own website, <a href="http://www.shopmarynichols.com">shopmarynichols.com</a>.</p>
		</div>
		<div id="text6">
			<h3>Editor</h3>
			<h4>Quadrangle, St. John's School Yearbook, Houston, TX, fall 2007-spring 2009</h4>
			<p>Created templates and designed pages in InDesign. Edited pages created by staffers. Edited photos provided by photographers. Staff from Fall 2006 on, then became section editor in Fall 2007 and co-main editor Fall 2008. </p>
		</div>
	
	</div>
	
</body>

</html>