<!--Modal Log-out -->

<div class="modal fade" id="logout" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<div class="modal-body">
				<div class="alert alert-info">Are you Sure you Want to <strong>Logout</strong>?</div>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
				<a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i> Logout</a>
			</div>
		</div>
	</div>
</div>

<!--Logout end -->

<!--Modal Reservation -->

<div class="modal fade" id="reservation" tabindex="-1">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<div class="modal-body">
				<div class="alert alert-info">Reservation Details</div>
				<form method="post" action="processreservation.php?action=delete">
					<p>
						<strong>Confirmation</strong>:<br />
						<strong>Name</strong><br />
						<strong>Arrival</strong><br />
						<strong>Departure</strong><br />
						<strong>Room</strong><br />
						<strong>Room Type</strong><br />
						<strong>Nights</strong><br />
						<strong>Status</strong><br />
						<strong>Option</strong><br />
					</p>



				</form>


			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
				<a href="<?php echo WEB_ROOT; ?>admin/logout.php" class="btn btn-info"><i class="icon-off"></i> Logout</a>
			</div>
		</div>
	</div>
</div>

<!--reseionrvat end -->

</tbody>
</table>

</form>