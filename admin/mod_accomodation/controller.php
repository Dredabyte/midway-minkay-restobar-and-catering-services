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
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
		
	if ($_POST['accomodation_name'] == "" OR $_POST['accomodation_description'] == "") {
		message("All fields required!", "error");
		redirect("index.php?view=add");

	}else{

		$accomodation = new Accomodation();
		$name	= $_POST['accomodation_name'];
		$desc    = $_POST['accomodation_description'];

		
		$accomodation->accomodation_name =$_POST['accomodation_name'];
		$accomodation->accomodation_description =  $_POST['accomodation_description'];
		
		
		 $istrue = $accomodation->create(); 
		 if ($istrue == 1){
		 	message("New [". $name ."] created successfully!", "success");
		 	redirect('index.php');
		 	
		 }


	}	
}
function doEdit(){
	if ($_POST['accomodation_name'] == "" OR $_POST['accomodation_description'] == "") {
			message("All fields required!", "error");
			redirect("index.php?view=edit");
		
	}else{

		$accomodation = new Accomodation();
		 
	
		$accomodation->accomodation_name =$_POST['accomodation_name'];
		$accomodation->accomodation_description =  $_POST['accomodation_description'];
			
			
			$accomodation->update($_POST['accomodation_id']); 
			
		 	message("New [". $_POST['accomodation_name'] ."] Updated successfully!", "success");
		 	redirect('index.php');
			 	
	
		
	}	
		
}

function doDelete(){
	 @$id=$_POST['selector'];
		  $key = count($id);
		//multi delete using checkbox as a selector
		
	for($i=0;$i<$key;$i++){
	 
		$accomodation = new Accomodation();
		$accomodation->delete($id[$i]);
	}

		message("Accomodation already Deleted!","info");
		redirect('index.php');

}
