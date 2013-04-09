<?php
// Website Contact Form Generator 
// http://www.tele-pro.co.uk/scripts/contact_form/ 
// This script is free to use as long as you  
// retain the credit link  

// get posted data into local variables
$EmailFrom = Trim(stripslashes($_POST['EmailFrom'])); 
$EmailTo = "admin@infernophoenix.com";
$Subject = "Application";
$Name = Trim(stripslashes($_POST['Name'])); 
$Telephone = Trim(stripslashes($_POST['Telephone'])); 
$StreetAddress = Trim(stripslashes($_POST['StreetAddress'])); 
$City = Trim(stripslashes($_POST['City'])); 
$State = Trim(stripslashes($_POST['State'])); 
$Zip = Trim(stripslashes($_POST['Zip'])); 
$Experience = Trim(stripslashes($_POST['Experience']));
$Position = Trim(stripslashes($_POST['Position']));

// validation
$validationOK=true;
if (Trim($EmailFrom)=="") $validationOK=false;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Telephone: ";
$Body .= $Telephone;
$Body .= "\n";
$Body .= "E-Mail: ";
$Body .= $EmailFrom;
$Body .= "\n";
$Body .= "StreetAddress: ";
$Body .= $StreetAddress;
$Body .= "\n";
$Body .= "City: ";
$Body .= $City;
$Body .= "\n";
$Body .= "State: ";
$Body .= $State;
$Body .= "\n";
$Body .= "Zip: ";
$Body .= $Zip;
$Body .= "\n";
$Body .= "\n";
$Body .= "\n";
$Body .= "Position Wanted: ";
$Body .= $Position;
$Body .= "\n";
$Body .= "\n";
$Body .= "\n";
$Body .= "Experience: ";
$Body .= $Experience;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=http://infernophoenix.com\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>