<?php
require_once("../includes/initialize.php");
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
session_start();

// 2. Unset all the session variables
unset( $_SESSION['admin_id'] );
unset( $_SESSION['admin_name'] );
unset( $_SESSION['admin_username'] );
unset( $_SESSION['admin_password'] );
unset( $_SESSION['admin_role'] );

 	
// 4. Destroy the session
redirect(WEB_ROOT ."admin/index.php?logout=1");
?>