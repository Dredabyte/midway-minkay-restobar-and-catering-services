<?php
if (isset($_POST['submit'])) {
	$arival   = $_SESSION['from'];
	$departure = $_SESSION['to'];
	$room_id = $_SESSION['room_id'];

	$_SESSION['name']   		= $_POST['name'];
	$_SESSION['last']   		= $_POST['last'];
	$_SESSION['email']   		= $_POST['email'];
	$_SESSION['dbirth']   		= $_POST['dbirth'];
	$_SESSION['nationality']   = $_POST['nationality'];
	$_SESSION['city']   		= $_POST['city'];
	$_SESSION['address'] 		= $_POST['address'];
	$_SESSION['zip']   		= $_POST['zip'];
	$_SESSION['phone']   		= $_POST['phone'];
	$_SESSION['username']		= $_POST['username'];
	$_SESSION['pass']  		= $_POST['pass'];
	$_SESSION['pending']  		= 'pending';

	redirect('index.php?view=payment');
}
?>


<?php //include'navigator.php';
?>



<?php
if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
	echo '<ul class="err">';
	foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<li>', $msg, '</li>';
	}
	echo '</ul>';
	unset($_SESSION['ERRMSG_ARR']);
}
?>

<form class="form-horizontal" action="index.php?view=logininfo" method="post" name="personal">
	<h2>Personal Details</h2>

	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="name">FIRST NAME:</label>

			<div class="col-md-8">
				<input name="" type="hidden" value="">
				<input name="name" type="text" class="form-control input-sm" id="name" />
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="last">LAST NAME:</label>

			<div class="col-md-8">
				<input name="last" type="text" class="form-control input-sm" id="last" />
			</div>
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="last">EMAIL:</label>

			<div class="col-md-8">
				<input name="email" type="email" class="form-control input-sm" id="email" />
			</div>
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="city">CITY:</label>

			<div class="col-md-8">
				<input name="city" type="text" class="form-control input-sm" id="city" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="address">ADDRESS:</label>

			<div class="col-md-8">
				<input name="address" type="text" class="form-control input-sm" id="address" />
			</div>
		</div>
	</div>

	<div class="form-group  ">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="dbirth">DATE OF BIRTH:</label>

			<div class="col-md-8 input-group">
				<input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd" name="dbirth" id="dbirth" value="" class="dbirth form-control  input-sm">
				<span class="input-group-btn">
					<i class="fa  fa-calendar"></i>
				</span>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="phone">PHONE:</label>

			<div class="col-md-8">
				<input name="phone" type="text" class="form-control input-sm" id="phone" />
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="nationality">NATIONALITY:</label>

			<div class="col-md-8">
				<input name="nationality" type="text" class="form-control input-sm" id="nationality" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="username">USERNAME:</label>

			<div class="col-md-8">
				<input name="username" type="text" class="form-control input-sm" id="username" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="password">PASSWORD:</label>

			<div class="col-md-8">
				<input name="pass" type="password" class="form-control input-sm" id="password" />
			</div>
		</div>
	</div>


	<div class="form-group">
		<div class="col-md-8">
			<label class="col-md-4 control-label" for="zip">ZIP CODE:</label>

			<div class="col-md-8">
				<input name="zip" type="text" class="form-control input-sm" id="zip" />
			</div>
		</div>
	</div>

	&nbsp; &nbsp;
	<div class="form-group">
		<div class="col-md-6">
			<p>
				I <input type="checkbox" name="condition" value="checkbox" />
				<small>Agree the <a class="toggle-modal" onclick="OpenPopupCenter('terms_condition.php','Terms And Codition','600','600')"><b>TERMS AND CONDITION</b></a> of this Hotel</small>

				<br>
				<!-- <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><a href='javascript: refreshCaptcha();'><img src="<?php echo WEB_ROOT; ?>images/refresh.png" alt="refresh" border="0" style="margin-top:5px; margin-left:5px;" /></a>
					<br /><small>If you are a Human Enter the code above here :</small><input id="6_letters_code" name="6_letters_code" type="text" class="form-control input-sm" width="20"></p><br/>
				-->
			<div class="col-md-4">
				<input name="submit" type="submit" value="Confirm" class="btn btn-primary" onclick="return personalInfo();" />
			</div>
		</div>
		<div class="col-md-6">
		<h5>NOTE:<br>
		We strongly recommend that your password be a minimum of 8 characters long and should not match your username.<br><br>

		Please ensure your email address is accurate and valid. We use email for essential communication such as order notifications. Providing a valid email address is crucial for using our services effectively.<br><br>

		Rest assured, all your private data is kept confidential. We have a strict policy against selling, exchanging, or marketing your personal information in any way. For more details on the responsibilities of both parties, please refer to our terms and conditions.<br>
		</h5>
		</div>	
	</div>

</form>