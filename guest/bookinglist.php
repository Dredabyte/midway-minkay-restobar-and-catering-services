<?php
require_once("../includes/initialize.php");
if (!isset($_SESSION['guest_id'])) {
	redirect("index.php");
}

?>



<table>
	<tr>
		<td align="center">
			<img src="<?php echo WEB_ROOT;  ?>images/background.jpg" height="90px" alt="Image">
		</td>
		<td width="87%" align="center">
			<h3>Midway Minkay Restobar and Catering Services</h3>
				<h2>List Booked Rooms
				</h2>
		</td>
	</tr>
</table>


<?php


?>
<table id="table" class="fixnmix-table">
	<thead>
		<tr>
			<th align="center" width="120">Room</th>
			<th align="center" width="120">Check In</th>
			<th align="center" width="120">Check Out</th>
			<th width="120">Price</th>
			<th align="center" width="120">Nights</th>
			<th align="center" width="90">Amount</th>
		</tr>
	</thead>
	<tbody>

		<?php

		$query = "SELECT * 
				FROM  `reservation` r,   `room` rm, accomodation a
				WHERE r.`room_id` = rm.`room_id` 
				AND a.`accomodation_id` = rm.`accomodation_id`  
				AND  r.`guest_id` = " . $_SESSION['guest_id'];
		$mydb->setQuery($query);
		$res = $mydb->loadResultList();

		foreach ($res as $result) {
			$day = (dateDiff($result->arrival, $result->departure) > 0) ? dateDiff($result->arrival, $result->departure) : '1';

			echo '<tr>';
			echo '<td>' . $result->room . ' ' . $result->room_description . ' </td>';
			echo '<td>' . date_format(date_create($result->arrival), "m/d/Y") . '</td>';
			echo '<td>' . date_format(date_create($result->departure), "m/d/Y") . '</td>';
			echo '<td > &#8369 ' . $result->price . '</td>';
			echo '<td>' . $day . '</td>';
			echo '<td > &#8369 ' . $result->r_price . '</td>';

			echo '</tr>';
		}
		?>
	</tbody>

</table>