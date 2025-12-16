<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "restaurant";

$connect = mysqli_connect($server, $username, $password, $database);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['fullName'])) {
    $Name = $_POST["fullName"];
    $email_id = $_POST["emailAddress"];
    $phone_no = $_POST["phoneNumber"];
    $date = $_POST["bookingDate"];
    $time = $_POST["bookingTime"];

    $query = "INSERT INTO `book` (`Name`, `email_id`, `phone_no`, `date`, `time`) VALUES ('$Name', '$email_id', '$phone_no', '$date', '$time');";

    if ($connect->query($query) == true) {
        // Successfully inserted into the database
        // Redirect to a success page or wherever you want
        header("Location: index.html");
        exit();
    } else {
        echo "ERROR: $query <br> $connect->error";
    }
    $connect->close();
}
// 
if (isset($_POST['send'])) {
    $Name=$_POST["Name"];
    $email_id=$_POST["email_id"];
    $phone_no=$_POST["phone_no"];
     $date=$_POST["date"];
     $time=$_POST["time"];
}
require 'vendor/autoload.php';  
$mail = new PHPMailer(true); 
  
try { 
    $mail->SMTPDebug = 0;                                        
    $mail->isSMTP();                                             
   $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = 'mayekarvidisha@gail.com.com';                  
    $mail->Password   = "jxauvywfnmadopdf";                          
    $mail->SMTPSecure = 'ssl';                               
    $mail->Port       = 465; 
  
    $mail->setFrom('mayekarvidisha@gail.com', 'Contact Form');            
    $mail->addAddress('mayekarvidisha@gail.com','Contact Form'); 
       
    $mail->isHTML(true);                                   
    $mail->Subject = "Contact Form";
    $mail->Body     ='Name : ' .$_POST['Name']."<br/><br/>"                 
                .'email_id : ' .$_POST['email_id'] ."<br/><br/>"
               .'phone_no : ' .$_POST['phone_no'] ."<br/><br/>"
               .'date : ' .$_POST['date'] ."<br/><br/>";
               .'time : ' .$_POST['time'] ."<br/><br/>";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $mail->send(); 
    if(!$mail) 
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
         header("Location:index.html");
       
    }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// }
// else
// {
//     echo "could not save data". $connect->error;
// }
      
   


?>





