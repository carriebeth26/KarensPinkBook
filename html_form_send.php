<?php
if(isset($_POST['email'])) {

	// CHANGE THE TWO LINES BELOW
	$email_to = "carrie.cocklin@gmail.com";
	$email_subject = "form submissions";
	
	
	function died($error) {
		// your error code can go here
		echo "We're sorry, but there are errors found with the form you submitted.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	
	$name = $_POST['name']; // required
	$email_from = $_POST['email']; // required
	$comments = $_POST['comments']; // required
	
	
$email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

$email_message .= "Name: ".clean_string($name)."\n";
$email_message .= "Email: ".clean_string($email_from)."\n";
$email_message .= "Comments: ".clean_string($comments)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- place your own success html below -->
<p>Thank you for contacting us. We will be in touch with you very soon.</p>

<?php
}
die();
?>