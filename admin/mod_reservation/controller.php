<?php
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	//case 'modify':
	//	dbMODIFY();
	//	break;

	case 'delete':
		dbDELETE();
		break;

	case 'deleteOne':
		dbDELETEONE();
		break;
	case 'confirm':
		doConfirm();
		break;
	case 'cancel':
		doCancelRoom();
		break;
	case 'checkin':
		doCheckin();
		break;
	case 'checkout':
		doCheckout();
		break;
}
function doCheckout()
{
    global $mydb;

    if (isset($_GET['code'])) {
        $confirmationCode = $_GET['code'];

        // Fetch the room_id associated with this reservation
        $roomQuery = "SELECT room_id FROM `reservation` WHERE `confirmation_code`='$confirmationCode'";
        $mydb->setQuery($roomQuery);
        $roomResult = $mydb->loadResultList();

        if (count($roomResult) > 0) {
            // Extract the room_id
            $roomId = $roomResult[0]->room_id;

            // Update the reservation status to 'Checkedout'
            $reservationUpdateSql = "UPDATE `reservation` SET `status`='Checkedout' WHERE `confirmation_code`='$confirmationCode'";
            $mydb->setQuery($reservationUpdateSql);
            $reservationUpdateResult = $mydb->executeQuery();

            // Update the payment status to 'Checkedout'
            $paymentUpdateSql = "UPDATE `payment` SET `status`='Checkedout' WHERE `confirmation_code`='$confirmationCode'";
            $mydb->setQuery($paymentUpdateSql);
            $paymentUpdateResult = $mydb->executeQuery();

            if ($reservationUpdateResult && $paymentUpdateResult) {
                // Update the room availability (assuming your room table has a room_num column)
                $roomUpdateSql = "UPDATE `room` SET `room_num` = `room_num` + 1 WHERE `room_id` = '$roomId'";
                $mydb->setQuery($roomUpdateSql);
                $roomUpdateResult = $mydb->executeQuery();

                if ($roomUpdateResult) {
                    message("Reservation Updated successfully!", "success");
                } else {
                    message("Failed to update room availability.", "error");
                }
            } else {
                message("Failed to update reservation.", "error");
            }
        } else {
            message("Invalid confirmation code or room not found.", "error");
        }

        redirect('index.php');
    } else {
        message("Invalid confirmation code.", "error");
        redirect('index.php');
    }
}


function doCheckin()
{
	global $mydb;

	if (isset($_GET['code'])) {
		$confirmationCode = $_GET['code'];

		// Update the reservation status to 'Checkedin'
		$reservationUpdateSql = "UPDATE `reservation` SET `status`='Checkedin' WHERE `confirmation_code`='$confirmationCode'";
		$mydb->setQuery($reservationUpdateSql);
		$reservationUpdateResult = $mydb->executeQuery();

		// Update the payment status to 'Checkedin'
		$paymentUpdateSql = "UPDATE `payment` SET `status`='Checkedin' WHERE `confirmation_code`='$confirmationCode'";
		$mydb->setQuery($paymentUpdateSql);
		$paymentUpdateResult = $mydb->executeQuery();

		// You can add email sending logic here if needed

		if ($reservationUpdateResult && $paymentUpdateResult) {
			message("Reservation Updated successfully!", "success");
		} else {
			message("Failed to update reservation.", "error");
		}

		redirect('index.php');
	} else {
		message("Invalid confirmation code.", "error");
		redirect('index.php');
	}
}



function doCancelRoom()
{
	global $mydb;

	if (isset($_GET['code'])) {
		$confirmationCode = $_GET['code'];

		$reservationUpdateSql = "UPDATE `reservation` SET `status`='Cancelled' WHERE `confirmation_code`='$confirmationCode'";
		$mydb->setQuery($reservationUpdateSql);
		$reservationUpdateResult = $mydb->executeQuery();

		$paymentUpdateSql = "UPDATE `payment` SET `status`='Cancelled' WHERE `confirmation_code`='$confirmationCode'";
		$mydb->setQuery($paymentUpdateSql);
		$paymentUpdateResult = $mydb->executeQuery();


		if ($reservationUpdateResult && $paymentUpdateResult) {
			message("Reservation Updated successfully!", "success");
		} else {
			message("Failed to update reservation.", "error");
		}

		redirect('index.php');
	} else {
		message("Invalid confirmation code.", "error");
		redirect('index.php');
	}
}

function doConfirm()
{
	global $mydb;

	$sql = "UPDATE `reservation` r,room rm SET room_num=room_num - 1 WHERE r.`room_id`=rm.`room_id` AND  `confirmation_code` ='" . $_GET['code'] . "'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();


	$sql = "UPDATE `reservation` SET `status`='Confirmed' WHERE `confirmation_code` ='" . $_GET['code'] . "'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();

	$sql = "UPDATE `payment` SET `status`='Confirmed' WHERE `confirmation_code` ='" . $_GET['code'] . "'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();


	message("Reservation Upadated successfully!", "success");
	redirect('index.php');
}
