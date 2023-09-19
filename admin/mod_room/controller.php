<?php 
require_once("../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;

	case 'editimage' :
	editImg();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=add");
		    	}else{

				$file=$_FILES['image']['tmp_name'];
				$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name= addslashes($_FILES['image']['name']);
				$image_size= getimagesize($_FILES['image']['tmp_name']);

				if ($image_size==FALSE) {
					message("That's not an image!", "error");
					redirect("index.php?view=add");
				}else{

			$location="rooms/".$_FILES["image"]["name"];

			// if(file_exists($location)){
			
		 //    	message("There is such an image. Please select another one!", "error");
			// 	redirect("index.php?view=add");	
			// }
			// else{
			move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
			
			if ($_POST['room'] == "" OR $_POST['room_num'] == "" OR $_POST['price'] == "") {
				$messageStats = false;
					message("All fields required!", "error");
					redirect("index.php?view=add");
				
			}else{
				$room = new Room();

					// $_POST['ROOM'];
				// 	// $_POST['ACCOMID']
				// 	// $_POST['ROOMNUM'];
				// 	// $_POST['ROOMDESC'];
				// 	// $_POST['NUMPERSON'];
				// 	// $_POST['PRICE'];
 

				$res = $room->find_all_room($_POST['room']);
				
				
				if ($res >=1) {
					message("Room name already exist!", "error");
					redirect("index.php?view=add");
				}else{
				
					 
				$room->room_num 		=	$_POST['room_num'];
				$room->room 		=	$_POST['room'];
				$room->accomodation_id 		=	$_POST['accomodation_id'];
				$room->room_description 	=	$_POST['room_description'];
				$room->num_person 	=	$_POST['num_person'];
				$room->price 		=	$_POST['price'];
 				$room->room_image    = $location;
 				$room->oroom_num 	=	$_POST['room_num'];
					
					 $istrue = $room->create(); 
					 if ($istrue == 1){
					 	message("New [". $_POST['room'] ."] created successfully!", "success");
					 	redirect('index.php');
					 	
					 }
				}	 

		
			}	



		}
	}
  }
// }
//function to modify rooms

 function doEdit(){


           		$room = new Room();
          			 
				$room->room_num 		=	$_POST['room_num'];
				$room->room 		=	$_POST['room'];
				$room->accomodation_id 		=	$_POST['accomodation_id'];
				$room->room_description 	=	$_POST['room_description'];
				$room->num_person 	=	$_POST['num_person'];
				$room->price 		=	$_POST['price'];
				$room->oroom_num 	=	$_POST['room_num'];
 				// $room->roomImage    = $location;
				
				$room->update($_POST['room_id']); 
				
			 	message($_POST['room'] ." Upadated successfully!", "success");
			 	unset($_SESSION['id']);
			 	redirect('index.php');
				 
}

function doDelete(){
@$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
	for($i=0;$i<$key;$i++){
	 
		$rm = new Room();
		$rm->delete($id[$i]);
	}

		message("Room already Deleted!","info");
		redirect('index.php');
 }
 
 //function to modify picture
 
function editImg (){
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect("index.php?view=list");
		}else{
			$file=$_FILES['image']['tmp_name'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			
			if ($image_size==FALSE) {
				message("That's not an image!");
				redirect("index.php?view=list");
		   }else{
			
		
				$location="rooms/".$_FILES["image"]["name"];
				

	 				$rm = new Room();
	          		$rm_id		= $_POST['id'];
				
			    	move_uploaded_file($_FILES["image"]["tmp_name"],"rooms/".$_FILES["image"]["name"]);
					
					$rm->room_image = $location;
					$rm->update($rm_id); 
					
				 	message("Room Image Upadated successfully!", "success");
				 	unset($_SESSION['id']);
				 	 redirect("index.php");
 			}
 		}
 }			 

function _deleteImage($catId)
{
    // we will return the status
    // whether the image deleted successfully
    $deleted = false;

	// get the image(s)
    $sql = "SELECT * 
            FROM room
            WHERE room_num ";
	
	if (is_array($catId)) {
		$sql .= " IN (" . implode(',', $catId) . ")";
	} else {
		$sql .= " = {$catId}";
	}	

    $result = dbQuery($sql);
    
    if (dbNumRows($result)) {
        while ($row = dbFetchAssoc($result)) {
		extract($row);
	        // delete the image file
    	    $deleted = @unlink($roomImage);
		}	
    }
    
return $deleted;
}
