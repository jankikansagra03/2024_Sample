<?php
include_once('admin_header.php');
$event_id = $_REQUEST['e_id'];
$q = "select * from event_details where event_id=$event_id";
$result = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($result)) {
    $extra = explode(",", $row[7]);
    $old_profile_pic = "images/profile_pictures/" . $row[6];
    setcookie("profile_pic", $old_profile_pic);
?>
    <div class="container">
        <div class="row">
            <div class=col-1></div>
            <div class=col-lg-9>
                <h2>Edit Event Details</h2>
                <form action="admin_update_event.php" method="post" enctype="multipart/form-data" id="form1">
                    <div class="form-group">
                        <label for="eid1">Event ID:</label>
                        <input type="text" class="form-control" id="eid1" placeholder="Enter Event ID" name="eid" value="<?= $row[0] ?>" readonly>
                        <span id=" et_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="et1">Event Title:</label>
                        <input type="text" class="form-control" id="et1" placeholder="Enter Event Title" name="et" value="<?= $row[1] ?>">
                        <span id=" et_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="ed1">Event Title:</label>
                        <textarea class="form-control" id="ed1" placeholder="Enter Event Description" name="ed" rows="5">
                             <?= $row[2] ?>
                        </textarea>

                        <span id="ed_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="edt1">Event Date:</label>
                        <input type="date" class="form-control" id="edt1" placeholder="Enter Event Date" name="edt" value="<?= $row[3] ?>">
                        <span id="edt_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="e_type1">Event Type:</label>
                        <select name="e_type" id="e_type1" class="form-control">
                            <option value="Industrial Visit" <?php if ($row[4] == "Industrial Visit") {
                                                                    echo "selected";
                                                                } ?>>Industrial Visit</option>
                            <option value="Seminar" <?php if ($row[4] == "Seminar") {
                                                        echo "selected";
                                                    } ?>>Seminar</option>
                            <option value="Workshop" <?php if ($row[4] == "Workshop") {
                                                            echo "selected";
                                                        } ?>>Workshop</option>
                            <option value="Conference" <?php if ($row[4] == "Conference") {
                                                            echo "selected";
                                                        } ?>>Conference</option>
                            <option value="Event" <?php if ($row[4] == "Event") {
                                                        echo "selected";
                                                    } ?>>Event</option>
                            <option value="FDP" <?php if ($row[4] == "FDP") {
                                                    echo "selected";
                                                } ?>>FDP</option>
                            <option value="STTP" <?php if ($row[4] == "STTP") {
                                                        echo "selected";
                                                    } ?>>STTP</option>
                        </select>
                        <span id="e_type_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="ep1">Event Place :</label>
                        <input type="text" class="form-control" id="ep1" placeholder="Enter Event Place" name="ep" value="<?= $row[5] ?>">
                        <span id="ep_err"></span>
                    </div>
                    <div class="form-group">
                        <img src="images/events/<?php echo $row[6]; ?>" class="img-fluid" alt="">
                    </div>
                    <div class="form-group">
                        <label for="e_main1">Event Main Image:</label>
                        <input type="file" class="form-control" id="e_main1" name="e_main_updt">
                        <span id="e_main_err_updt"></span>
                    </div>
                    <div class="form-group">
                        <div class="row"><?php
                                            foreach ($extra as $e) {
                                            ?>
                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 d-block mx-auto mx-md-0" style="height:100px">
                                    <img src="images/events/<?php echo $e ?>" alt="err" class="img-fluid" style="height: 100%; width: auto; object-fit: cover;" />
                                </div>
                            <?php
                                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="e_extra1">Event Extra Images:</label>
                        <input type="file" class="form-control" id="e_extra1" placeholder="Enter Event Title" name="e_extra_updt[]" multiple>
                        <span id="e_extra_err_updt"></span>
                    </div>
                    <div class="form-group">
                        <label for="status1">Select Status:</label>
                        <select name="status" id="status1" class="form-control">
                            <option value="Active" <?php if ($row[8] == "Active") {
                                                        echo "selected";
                                                    } ?>>Active</option>
                            <option value="Inactive" <?php if ($row[7] == "Inactive") {
                                                            echo "selected";
                                                        } ?>>Inactive</option>
                            <option value="Deleted" <?php if ($row[7] == "Deleted") {
                                                        echo "Deleted";
                                                    } ?>>Deleted</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-dark" value="Update Event" name="btn">

                </form>
            </div>

        </div>
    </div>
    <br>
<?php
}
include_once("footer.php");

?>