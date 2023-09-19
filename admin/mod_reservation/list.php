<div class="container">
	<!-- <div class="panel panel-primary"> -->
	<div class="panel-body">
		<form method="post" action="processreservation.php?action=delete">
			<table id="table" class="table table-striped" cellspacing="0">
				<thead>
					<tr>
						<td width="5%">#</td>

						<td width="90"><strong>Guest</strong></td>
						<!--<td width="10"><strong>Confirmation</strong></td>-->
						<td width="80"><strong>Transaction Date</strong></td>
						<td width="80"><strong>Confimation Code</strong></td>
						<td width="70"><strong>Total Rooms</strong></td>
						<td width="80"><strong>Total Price</strong></td>
						<!-- <td width="80"><strong>Nights</strong></td> -->
						<td width="80"><strong>Status</strong></td>
						<td width="100"><strong>Action</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php
					//$mydb->setQuery("SELECT *,roomName,firstname, lastname FROM reservation re,room ro,guest gu  WHERE re.roomNo = ro.roomNo AND re.guest_id=gu.guest_id");
					// $mydb->setQuery("SELECT * 
					// 				FROM  `tblreservation` r,  `tblguest` g,  `tblroom` rm, tblaccomodation a
					// 				WHERE r.`ROOMID` = rm.`ROOMID` 
					// 				And a.`ACCOMID` = rm.`ACCOMID` 
					// 				AND g.`GUESTID` = r.`GUESTID`  
					// 				ORDER BY r.`STATUS`='pending'");
					$mydb->setQuery("SELECT  `firstname` ,  `lastname` ,  `address` ,  `trans_date` ,  `confirmation_code` ,  `p_qty` ,  `price` ,`status`
				FROM  `payment` p,  `guest` g
				WHERE p.`guest_id` = g.`guest_id`   
				ORDER BY p.`status`='pending' desc ");
					$cur = $mydb->loadResultList();
					// `RESERVEID`, `TRANSNUM`, `TRANSDATE`, `ROOMID`, `ARRIVAL`, `DEPARTURE`, `RPRICE`, `GUESTID`, `PRORPOSE`, `STATUS`, `BOOKDATE`, `REMARKS`, `USERID`SELECT * FROM `tblreservation` WHERE 1
					foreach ($cur as $result) {
					?>
						<tr>
							<td width="5%" align="center"></td>
							<td><?php echo $result->firstname . " " . $result->lastname; ?></td>
							<td><?php echo $result->trans_date; ?></td>
							<!-- <td><?php echo date_format(date_create($result->arrival), 'm/d/Y'); ?></td>
							<td><?php echo date_format(date_create($result->departure), 'm/d/Y'); ?></td> -->
							<!--<td><?php echo $result->room; ?></td>-->
							<!-- <td><?php echo $result->accomodation_name; ?></td> -->
							<!-- <td><?php echo dateDiff($result->arrival, $result->departure); ?></td> -->
							<td><?php echo $result->confirmation_code; ?></td>
							<td><?php echo $result->p_qty; ?></td>
							<td><?php echo $result->price; ?></td>
							<td><?php echo $result->status; ?></td>
							<!--<td><a class="btn btn-default toggle-modal-reserve" href="#reservationr<?php echo $result->reservation_id; ?>" role="button" >View</a></td>-->
							<td>
								<?php
								if ($result->status == 'Confirmed') { ?>
									<!-- <a class="cls_btn" id="<?php echo $result->reservation_id; ?>" data-toggle='modal' href="#profile" title="Click here to Change Image." ><i class="icon-edit">test</a> -->
									<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit">View</a>
									<a href="controller.php?action=cancel&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit">Cancel</a>
									<a href="controller.php?action=checkin&code=<?php echo $result->confirmation_code; ?>" class="btn btn-success btn-xs"><i class="icon-edit">Check in</a>
								<?php
								} elseif ($result->status == 'Checkedin') {
								?>
									<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit">View</a>
									<a href="controller.php?action=checkout&code=<?php echo $result->confirmation_code; ?>" class="btn btn-danger btn-xs"><i class="icon-edit">Check out</a>
								<?php
								} elseif ($result->status == 'Checkedout') { ?>
									<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit">View</a>

								<?php } else {
								?>
									<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit">View</a>
									<a href="controller.php?action=cancel&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit">Cancel</a>
									<a href="controller.php?action=confirm&code=<?php echo $result->confirmation_code; ?>" class="btn btn-success btn-xs"><i class="icon-edit">Confirm</a>
								<?php
								}

								?>


							</td>

						<?php }
						?>

						<div class="modal fade" id="profile" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">


										<div class="alert alert-info">Profile:</div>
									</div>

									<form action="#" method="post">
										<div class="modal-body">


											<div id="display">

												<p>ID :
												<div id="infoid"></div>
												</p><br />
												Name : <div id="infoname"></div><br />
												Email Address : <div id="Email"></div><br />
												Gender : <div id="Gender"></div><br />
												Birthday : <div id="bday"></div>
												</p>

											</div>
										</div>

										<div class="modal-footer">
											<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
										</div>
									</form>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->

			</table>

		</form>
		<!-- </div> -->
	</div>