<?php 
$status=$statusMsg='';

if(isset($_POST['submit'])){
    if(!empty($_POST['email'])){
        //Include Library File
        require_once 'VerifyEmail.class.php';

        //Intialize library class
        $mail = new VerifyEmail();

        //Set the timeout value on stream
        $mail->setStreamTimeoutWait(20);

        //Set email address for SMTP request
        $mail->setEmailFrom('2018cs147@stu.ucsc.cmb.ac.lk');

        //Email to check
        $email=$_POST['email'];

    //check if email is valid and exist
        if($mail->check($email)){
            $status='succ';
            $statusMsg='Given email &lt; '.$email.'&gt;  is exist!';

        }
        elseif(verifyEmail::validate($email)){
            $status='err';
            $statusMsg='Given email &lt; '.$email.'&gt; is valid but not exist!';

        }
        else{
            $status='err';
            $statusMsg='Given email &lt; '.$email.'&gt; is not valid and not exist!';

        }

        }
    
else{
    $status='err';
    $statusMsg='Enter the email address that wants to verify.';

}
} 

?>


<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Verify Email address in real domain</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
body{
    font-family: 'Poppins', sans-serif;
}
.container{
    padding:20px;
}
.frmWrap{
    color:#000;
    width:350px;
    background-color:black;
    margin:0 auto;
    padding:20px;
    margin-top:60px;
    text-align:center;
}
.frmWrap input{
    width:300px;
    border:1px solid dodgerblue;
    border-radius:2px;
    color:#4C4B4B;
    outline:none;
    padding:10px 10px 10px 10px;
    margin-bottom:10px;
}
.frmWrap input[type="submit"]{
    width:90px;
    color:white;
    padding:10px 5px 10px 5px;
    background-color:dodgerblue;
    font-size:15px;
    font-weight:700;
    cursor:pointer;
}
.frmWrap input[type="submit"]:hover{  
    color:white;
    background-color:#5DADE2;
}
.statusMsg{
    text-align:center;
    font-size:16px;
}
.statusMsg.succ{
    color:#03821D;
}
.statusMsg.err{
    color:#EC7063;
}
</style>
</head>

<body>
    <div class="container">
        <div class="frmWrap">
            <p class="statusMsg <?php echo $status; ?>"> <?php echo $statusMsg?></p>
            <form method="post" action="">
                <input type="text" name="email" placeholder="Enter your email address" value="">
                <input type="submit" name="submit" value="VERIFY">
            </form>
        </div>
    </div>
</body>

</html>