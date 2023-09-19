<?php

// $_SESSION['id']=$_GET['id'];
$rm = new Room();
$result = $rm->single_room($_GET['id']);
?>
<form class="form-horizontal well span6" action="controller.php?action=edit" enctype="multipart/form-data" method="POST">

  <fieldset>
    <legend>Edit Room</legend>

    <!--           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "ROOMNUM">Room #:</label>

              <div class="col-md-8">
                <input name="ROOMID" type="hidden" value="<?php echo $result->ROOMID; ?>">
                 <input class="form-control input-sm" id="ROOMNUM" name="ROOMNUM" placeholder=
                    "Room #" type="text" value="<?php echo $result->ROOMNUM; ?>">
              </div>
            </div>
          </div> -->

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="room">Name:</label>

        <div class="col-md-8">
          <input name="" type="hidden" value="">
          <input name="room_id" type="hidden" value="<?php echo $result->room_id; ?>">
          <input class="form-control input-sm" id="room" name="room" placeholder="Room Name" type="text" value="<?php echo $result->room; ?>">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accomodation_id">Accomodation:</label>

        <div class="col-md-8">
          <select class="form-control input-sm" name="accomodation_id" id="accomodation_id">
            <?php
            $rm = new Accomodation();
            $res =  $rm->single_accomodation($result->accomodation_id);
            ?>

            <option selected="TRUE" value="<?php echo $res->accomodation_id; ?>"><?php echo $res->accomodation_name; ?></option>
            <?php

            $cur = $rm->listOfaccomodationNotIn($res->accomodation_id);
            foreach ($cur  as $accom) {
              echo '<option  value=' . $accom->accomodation_id . '>' . $accom->accomodation_name . '</OPTION>';
            }

            ?>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="room_description">Description:</label>

        <div class="col-md-8">
          <input name="" type="hidden" value="">
          <input class="form-control input-sm" id="room_description" name="room_description" placeholder="Description" type="text" value="<?php echo $result->room_description; ?>">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="num_person">Number of Person:</label>

        <div class="col-md-8">
          <input class="form-control input-sm" id="num_person" name="num_person" placeholder="Number of Person" type="text" value="<?php echo $result->num_person; ?>" onkeyup="javascript:checkNumber(this);">
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="price">Price:</label>

        <div class="col-md-8">
          <input class="form-control input-sm" id="price" name="price" placeholder="Price" type="text" value="<?php echo $result->price; ?>" onkeyup="javascript:checkNumber(this);">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="room_num">No. of Rooms:</label>

        <div class="col-md-8">
          <input name="" type="hidden" value="">
          <input class="form-control input-sm" id="room_num" name="room_num" placeholder="Room #" type="text" value="<?php echo $result->room_num; ?>">
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="idno"></label>

        <div class="col-md-8">
          <button class="btn btn-primary" name="save" type="submit">Save</button>
        </div>
      </div>
    </div>


  </fieldset>

</form>


</div><!--End of container-->