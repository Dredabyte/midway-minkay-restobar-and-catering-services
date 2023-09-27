 <?php
	require_once("../includes/initialize.php");
	//echo date_format(date_create($_POST['dbirth']), 'Y-m-d');

	if (isset($_POST['submit'])) {
		$guest = new Guest();
		$guest->firstname          = $_POST['name'];
		$guest->lastname          = $_POST['last'];
		$guest->email          = $_POST['email'];
		$guest->city           = $_POST['city'];
		$guest->address        = $_POST['address'];
		$guest->birthdate           = date_format(date_create($_POST['dbirth']), 'Y-m-d');
		$guest->phone          = $_POST['phone'];
		$guest->nationality    = $_POST['nationality'];
		// $guest->G_UNAME          = $_POST['username'];    
		// $guest->G_PASS           = sha1($_POST['pass']);    
		$guest->zip_code              = $_POST['zip'];
		$guest->update($_SESSION['guest_id']);

	?>
 	<script type="text/javascript">
 		window.location = '<?php echo WEB_ROOT; ?>index.php';
 	</script>

 <?php  }

	if (isset($_POST['savephoto'])) {
		if (!isset($_FILES['image']['tmp_name'])) {
			message("No Image Selected!", "error");
			redirect(WEB_ROOT . "index.php");
		} else {
			$file = $_FILES['image']['tmp_name'];
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);

			if ($image_size == FALSE) {
				message("That's not an image!");
				redirect(WEB_ROOT . "index.php");
			} else {


				$photo = "guest/photos/" . $_FILES["image"]["name"];

				move_uploaded_file($_FILES["image"]["tmp_name"], "photos/" . $_FILES["image"]["name"]);

				$g = new Guest();

				$g->photo = $photo;
				$g->update($_SESSION['guest_id']);

				redirect(WEB_ROOT . "index.php");
			}
		}
	}

	?>