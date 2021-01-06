<?php 

//Include Library File
require_once 'VerifyEmail.class.php';

//Intialize library class
$mail = new VerifyEmail();

//Set the timeout value on stream
$mail->setStreamTimeoutWait(20);

//Set debug outputmode

$mail->Debug=FALSE;
$mail->Debugoutput='html';

//set the email address for SMTP request
$mail->setEmailFrom('2018cs147@stu.ucsc.cmb.ac.lk');

//Email to check
$email='2018cs147@stu.ucsc.cmb.ac.lk';

//check if email is valid and exist
if($mail->check($email)){
    echo 'Email &lt;'.$email.'&gt; is exist!';
}
elseif(verifyEmail::validate($email)){
    echo 'Email &lt;'.$email.'&gt; is valid but not exist!';
}
else{
    echo 'Email &lt;'.$email.'&gt; is not valid and not exist!';

}


?>