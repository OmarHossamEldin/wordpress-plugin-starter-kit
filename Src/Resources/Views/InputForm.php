<?php

use Wordpress\Resources\Views\DataSelector;

$dataselect = DataSelector::selectdata();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <center>
                            <h1>To Do List</h1>
                        </center>
                    </div>
                    <center>
                        <h3>Insert Tasks</h3>
                    </center>
                    <center>
                        <? if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) : ?>
                            <div class="alert alert-danger">
                                
                            </div>
                        <? endif; ?>
                    </center>
                    <form action="admin.php?page=taskscreate" method="POST">
                        <div class="form-group">
                            <h4>Task Name</h4>
                            <input type="text" name="task" class="form-control">
                            <h4>Task Duration</h4>
                            <label>From :</label>
                            <input type="date" name="fromdate" class="form-control">
                            <label>To :</label>
                            <input type="date" name="todate" class="form-control">
                        </div>
                        <div>
                            <center><input style="width:150px;" type="submit" class="btn btn-primary" name="submit" value="Add Task"></center>
                            <hr>
                        </div><br>
                    </form>
                    <form action="" method="GET">
                        <input type="text" name="page" value="to-do-list" hidden>
                        <input type="text" name="_method" value="DELETE" hidden>
                        <center><?= $dataselect ?></center>

                        <div><br>
                            <center><input style="width:150px;" type="submit" class="btn btn-primary" name="submit" value="Remove Task"></center>
                            <hr>
                        </div>
                    </form><br>
                    <form action="" method="PUT">
                        <div>
                            <label>Update</label>
                            <input type="hidden" name="_method" hidden>
                            <?= $dataselect ?>
                            <input type="text" name="name" value="" class="update">

                        </div><br>
                        <center><input style="width:150px;" type="submit" class="btn btn-primary" name="submitu" value="Update Task"></center>
                        <hr>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<script type="text/javascript">
    $(".chosen").chosen();
</script>

</html>