<?php
if(isset($_POST['submit'])) {

$to = "paulchain87@gmail.com";
$subject = "Application";
$name_field = $_POST['name'];
$email_field = $_POST['email'];
$message = $_POST['experience'];
$phone = $_POST['phone'];
$streetaddress = $_POST['streetaddress'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
 
$body = "From: $name_field\nTelephone: $phone";
 
echo "Data has been submitted to $to!";
mail($to, $subject, $body);

} else {

echo "blarg!";

}
?> 