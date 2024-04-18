<?php
include_once("admin_header.php");
$event_id = $_REQUEST['e_id'];
$_SESSION['view_event'] = $event_id;
$q = "select * from event_details where event_id=$event_id";
$result = mysqli_query($con, $q);
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Event Details</h2>
            <?php
            while ($res = mysqli_fetch_array($result)) {

                $extra = explode(",", $res[7]);
            ?>


                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Event ID</th>
                        <td><?= $res[0] ?> </td>
                    </tr>
                    <tr>
                        <th>Event Title</th>
                        <td><?= $res[1] ?> </td>
                    </tr>
                    <tr>
                        <th>Event Description</th>
                        <td><?= $res[2] ?> </td>
                    </tr>
                    <tr>
                        <th>Event Date</th>
                        <td><?= $res[3] ?> </td>
                    </tr>
                    <tr>
                        <th>Event Type</th>
                        <td><?= $res[4] ?> </td>
                    </tr>
                    <tr>
                        <th>Event Place</th>
                        <td><?= $res[5] ?> </td>
                    </tr>
                    <tr>
                        <th>Main Image</th>
                        <td>
                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 d-block mx-auto mx-md-0" style="height:200px">
                                <img src="images/events/<?php echo $res[6]; ?>" alt="err" class="img-fluid" style="height: 100%; width: 100%; object-fit: cover;" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Extra Images</th>
                        <td>
                            <div class="row"><?php
                                                foreach ($extra as $e) {
                                                ?>
                                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 d-block mx-auto mx-md-0" style="height:200px">
                                        <img src="images/events/<?php echo $e ?>" alt="err" class="img-fluid" style="height: 100%; width: auto; object-fit: cover;" />
                                    </div>
                                <?php
                                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= $res[8] ?> </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <a href="admin_edit_event.php?e_id=<?php echo $_SESSION['view_event']; ?>">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-square-pen fa-lg" style="color: #ffffff;"></i> Edit
                                </button>
                            </a>

                            <a href="admin_delete_event.php?e_id=<?php echo $_SESSION['view_event']; ?>">
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can fa-lg" style="color:white;"></i> Delete
                                </button>
                            </a>
                        </td>
                    </tr>


        </div>
        </table>
    <?php
            }
    ?>


    <br>

    <?php
    include_once("footer.php");
