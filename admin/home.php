<div class="container">
  <h3>Administrator Panel:Welcome <?php echo $_SESSION['admin_name']; ?></h3>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            Rooms
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
          The guest house has got various rooms that are categorised accordion to types.
          Each room is of particular category and have a maximum number of Adults and Children that can be accomodated. Click<a href="mod_room/index.php"> HERE.</a>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            Accomodation
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
          This consists of the categories of rooms that in this Hotel. Each Category of rooms Has got unique features different form the other. For view all of the categories of all types of rooms Click <a href="mod_roomtype/index.php">HERE.</a> </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            Reservation
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
          In this area, you can view all the reservation transaction of all guest. And this area allow the the receptionist confirm the request of guest or either to cancel the reservation. Click <a href="mod_reservation/index.php">HERE.</a>
        </div>
      </div>
    </div>

    <?php if ($_SESSION['admin_role'] == "Administrator") { ?>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapsesix">
              Users
            </a>
          </h4>
        </div>
        <div id="collapsesix" class="panel-collapse collapse">
          <div class="panel-body">
            The system displays the list of all people that have been registered in to the system.If a particular user is logged in the system the, such as users record is does not appear in the list of records. To view all the registered other than the logged in user Click <a href="mod_users/index.php">HERE.</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<hr>
<div class="container">
  <h3>Feedbacks</h3>
  <div class="panel-body">
    <table id="table" class="table table-bordered table-striped" cellspacing="0">
      <thead>
        <tr>
          <td><strong>Name</strong></td>
          <td><strong>Email</strong></td>
          <td><strong>Message(s)</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php 
          $mydb->setQuery("SELECT `name`, `email`, `message` FROM `message_us`");
          $cur = $mydb->loadResultList();
          foreach ($cur as $result) {
          ?>
            <tr>
              <td><?php echo $result->name; ?></td>
              <td><?php echo $result->email; ?></td>
              <td><?php echo $result->message; ?></td>
            </tr>
          <?php }
          ?>
      </tbody>
    </table>
  </div>
</div>