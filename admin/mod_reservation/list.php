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
					$mydb->setQuery("SELECT  `firstname` ,  `lastname` ,  `address` ,  `trans_date` ,  `confirmation_code` ,  `p_qty` ,  `price` ,`status`
				FROM  `payment` p,  `guest` g
				WHERE p.`guest_id` = g.`guest_id`   
				ORDER BY p.`status`='pending' desc ");
					$cur = $mydb->loadResultList();
					foreach ($cur as $result) {
					?>
						<tr>
							<td width="5%" align="center"></td>
							<td><?php echo $result->firstname . " " . $result->lastname; ?></td>
							<td><?php echo date('F j, Y, g:i a', strtotime($result->trans_date)); ?></td>
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
								<?php if ($result->status == 'Confirmed') { ?>
									<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>View</a>
									<a href="controller.php?action=cancel&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>Cancel</a>
									<a href="controller.php?action=checkin&code=<?php echo $result->confirmation_code; ?>" class="btn btn-success btn-xs"><i class="icon-edit"></i>Check in</a>
								<?php } elseif ($result->status == 'Checkedin') { ?>
									<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>View</a>
									<a href="controller.php?action=checkout&code=<?php echo $result->confirmation_code; ?>" class="btn btn-danger btn-xs"><i class="icon-edit"></i>Check out</a>
								<?php } elseif ($result->status == 'Checkedout') { ?>
									<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>View</a>
								<?php } elseif ($result->status == 'Cancelled') { ?>
									<p  class="badge">Cancelled</p>
								<?php } else { ?>
									<a href="index.php?view=view&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>View</a>
									<a href="controller.php?action=cancel&code=<?php echo $result->confirmation_code; ?>" class="btn btn-primary btn-xs"><i class="icon-edit"></i>Cancel</a>
									<a href="controller.php?action=confirm&code=<?php echo $result->confirmation_code; ?>" class="btn btn-success btn-xs"><i class="icon-edit"></i>Confirm</a>
								<?php } ?>
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