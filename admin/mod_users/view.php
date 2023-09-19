<?php

$id = $_GET['id'];
$user = new User();
$result = $user->single_user($id);

?>
<form class="form-horizontal well span6" action="newuser.php" method="POST">

	<fieldset>
		<legend>Account Details</legend>


		<div class="form-group">
			<div class="col-md-8">
				<label class="col-md-4 control-label" for="name">Name:</label>

				<div class="col-md-8">
					<input name="deptid" type="hidden" value="">
					<input class="form-control input-sm" id="name" name="name" placeholder="Account Name" type="text" value="<?php echo $result->name; ?>">
				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-8">
				<label class="col-md-4 control-label" for="username">Username:</label>

				<div class="col-md-8">
					<input name="deptid" type="hidden" value="">
					<input class="form-control input-sm" id="username" name="username" placeholder="Username" type="text" value="<?php echo $result->username; ?>">
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="col-md-8">
				<label class="col-md-4 control-label" for="role">Role:</label>

				<div class="col-md-8">
					<input class="form-control input-sm" id="role" name="role" placeholder="Role" type="text" value="<?php echo $result->role; ?>">
				</div>
			</div>
		</div>


		<div class="form-group">
			<div class="col-md-8">
				<label class="col-md-4 control-label" for="idno"></label>

				<div class="col-md-8">
					<input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'">
				</div>
			</div>
		</div>


	</fieldset>

	<div class="form-group">
		<div class="rows">
			<div class="col-md-6">
				<label class="col-md-6 control-label" for="otherperson"></label>

				<div class="col-md-6">

				</div>
			</div>

			<div class="col-md-6" align="right">


			</div>

		</div>
	</div>

</form>