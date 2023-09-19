<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'modify' :
	dbMODIFY();
	break;
	
	case 'delete' :
	dbDELETE();
	break;
	
	case 'deleteOne' :
	dbDELETEONE();
	break;
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	case 'checkin' :
	doCheckin();
	break;
	case 'checkout' :
	doCheckout();
	break;
	case 'cancelroom' :
	doCancelRoom();
	break;
	}
function doCheckout(){
	global $mydb;

	// $id = $_GET['id'];

	// $res = new Reservation();
	// $res->STATUS = 'Checkedout';
	// $res->update($id); 
			$sql = "UPDATE `reservation` SET `status`='Checkedout' WHERE `confirmation_code` ='" . $_GET['code'] ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	$sql = "UPDATE `payment` SET `status`='Checkedout' WHERE `confirmation_code` ='" . $_GET['code'] ."'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();
					
	message("Reservation Upadated successfully!", "success");
	redirect('index.php');

}
function doCheckin(){
	global $mydb;
// $id = $_GET['id'];

// $res = new Reservation();
// $res->STATUS = 'Checkedin';
// $res->update($id); 
		$sql = "UPDATE `reservation` SET `status`='Checkedin' WHERE `confirmation_code` ='" . $_GET['code'] ."'";
$mydb->setQuery($sql);
$mydb->executeQuery();
 

$sql = "UPDATE `payment` SET `status`='Checkedin' WHERE `confirmation_code` ='" . $_GET['code'] ."'";
$mydb->setQuery($sql);
$mydb->executeQuery();


 // send e-mail to ...
$email="sample@gmail.com";
$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: your name <your email>";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.yourweb.com/confirmation.php?passkey=$confirm_code";

// send email
$sentmail = mail($to,$subject,$message,$header);
  

// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}
message("Reservation Upadated successfully!", "success");
redirect('index.php');



}


function doCancel(){
// $id = $_GET['id'];

// $res = new Reservation();
// $res->STATUS = 'Cancelled';
// $res->update($id);
$sql = "UPDATE `reservation` r,room rm SET room_num=room_num + 1 WHERE r.`room_id`=rm.`room_id` AND `confirmation_code` ='" . $_GET['code'] ."'";
mysql_query($sql) or die(mysql_error());	


$sql = "UPDATE `reservation` SET `status`='Cancelled' WHERE `confirmation_code` ='" . $_GET['code'] ."'";
mysql_query($sql) or die(mysql_error());


$sql = "UPDATE `payment` SET `status`='Cancelled' WHERE `confirmation_code` ='" . $_GET['code'] ."'";
mysql_query($sql) or die(mysql_error());

				
message("Reservation Upadated successfully!", "success");
redirect('index.php');

}
function doCancelRoom(){
// $id = $_GET['id'];

// $res = new Reservation();
// $res->STATUS = 'Cancelled';
// $res->update($id); 
	$mydb->setQuery("SELECT * FROM `reservation` WHERE  `reservation_id` ='" . $_GET['id'] ."'");
	$cur = $mydb->loadResultList(); 
	foreach ($cur as $result) {  

	$room = new Room(); 
	$room->room_num    = $room->room_num + 1; 
	$room->update($result->room_id); 

	}


$sql = "UPDATE `reservation` SET `status`='Cancelled' WHERE `reservation_id` ='" . $_GET['id'] ."'";
mysql_query($sql) or die(mysql_error());

				
message("Reservation Upadated successfully!", "success");
redirect('index.php');

}

function doConfirm(){
	global $mydb;
// $id = $_GET['id'];

// $res = new Reservation();
// $res->STATUS = 'Confirmed';
// $res->update($id);
 $sql = "UPDATE `reservation` r,room rm SET room_num=room_num - 1 WHERE r.`room_id`=rm.`room_id` AND  `confirmation_code` ='" . $_GET['code'] ."'";
 $mydb->setQuery($sql);
 $mydb->executeQuery();


$sql = "UPDATE `reservation` SET `status`='Confirmed' WHERE `confirmation_code` ='" . $_GET['code'] ."'";
$mydb->setQuery($sql);
$mydb->executeQuery();

$sql = "UPDATE `payment` SET `status`='Confirmed' WHERE `confirmation_code` ='" . $_GET['code'] ."'";
$mydb->setQuery($sql);
$mydb->executeQuery();


message("Reservation Upadated successfully!", "success");
redirect('index.php');

}	
/*function dbMODIFY(){
$id = $_GET['id'];
$arrival=$_POST['arrival'];
$departure=$_POST['departure'];
$adults=$_POST['adults'];
$child=$_POST['child'];
$sql="UPDATE reservation SET arrival='$arrival', departure='$departure',adults='$adults',child='$child' WHERE reservation_id=".$id;
$result = dbQuery($sql);
if(!$result)
{
  die('Could not modify record: ' . mysql_error());
} else {

header('Location:index_resv.php');}
}
*/
/*function dbDELETEONE(){
	$del_id = $_GET['id'];
	$sql = "DELETE FROM reservation  WHERE reservation_id={$del_id}";
	$result = dbQuery($sql)or die('Could not delete record: ' . mysql_error());
  header('Location:index_resv.php?view=list');
  }*/
