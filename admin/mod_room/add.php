<form class="form-horizontal well span6" action="controller.php?action=add" enctype="multipart/form-data" method="POST">

  <fieldset>
    <legend>New Room</legend>




    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="room">Name:</label>

        <div class="col-md-8">
          <input name="" type="hidden" value="">
          <input class="form-control input-sm" id="room" name="room" placeholder="Room Name" type="text" value="">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accomodation_id">Accomodation:</label>

        <div class="col-md-8">
          <select class="form-control input-sm" name="accomodation_id" id="accomodation_id">
            <option value="None">None</option>
            <?php
            $rm = new Accomodation();
            $cur = $rm->listOfaccomodation();
            foreach ($cur  as $accom) {
              echo '<option value=' . $accom->accomodation_id . '>' . $accom->accomodation_name . ' (' . $accom->accomodation_description . ')</OPTION>';
            }

            ?>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accomodation_description">Description:</label>

        <div class="col-md-8">
          <input name="" type="hidden" value="">
          <input class="form-control input-sm" id="accomodation_description" name="accomodation_description" placeholder="Description" type="text" value="">
        </div>
      </div>
    </div>





    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="num_person">Number of Person:</label>

        <div class="col-md-8">
          <input class="form-control input-sm" id="num_person" name="num_person" placeholder="Number of Person" type="text" value="" onkeyup="javascript:checkNumber(this);">
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="price">Price:</label>

        <div class="col-md-8">
          <input class="form-control input-sm" id="price" name="price" placeholder="Price" type="text" value="" onkeyup="javascript:checkNumber(this);">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="room_num">No. of Rooms:</label>

        <div class="col-md-8">
          <input name="" type="hidden" value="">
          <input class="form-control input-sm" id="room_num" name="room_num" placeholder="Room #" type="text" value="">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="image">Upload Image:</label>

        <div class="col-md-8">
          <input type="file" name="image" value="" id="image">
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