<?php
	//mail('gyroballtrunks@gmail.com', 'Testing', 'This is just a test to check localhost email', 'From: gyroballtrunks@gmail.com');

	$emailTo = "$emailAddress";
	$subject = "Confirmation mail";
	$body = "Your referral link is http://localhost/?$referCode";
	$headers = "From: EbuCodes Referral Management System";

	if(mail($emailTo, $subject, $body, $headers)){
		echo "";
	} else {
		echo "Mail not sent!";
	}
?>