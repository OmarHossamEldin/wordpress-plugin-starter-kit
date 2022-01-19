<link rel="stylesheet" href="<?= __DIR__ ?>/../css/jquery-ui.css">
<link rel="stylesheet" href="<?= __DIR__ ?>/../css/chosen.min.css" />
<link rel="stylesheet" href="<?= __DIR__ ?>/../css/style.css">

<main>
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
                        <center><?= $test ?></center>

                        <div><br>
                            <center><input style="width:150px;" type="submit" class="btn btn-primary" name="submit" value="Remove Task"></center>
                            <hr>
                        </div>
                    </form><br>
                    <form action="" method="PUT">
                        <div>
                            <label>Update</label>
                            <input type="hidden" name="_method" hidden>
                            <?= $test ?>
                            <input type="text" name="name" value="" class="update">

                        </div><br>
                        <center><input style="width:150px;" type="submit" class="btn btn-primary" name="submitu" value="Update Task"></center>
                        <hr>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="<?= __DIR__ ?>/.."></script>
<script src="<?= __DIR__ ?>/../js/jquery-ui.min.js"></script>
<script src="<?= __DIR__ ?>/../js/chosen.jquery.min.js"></script>

<script type="text/javascript" defer>
    $(".chosen").chosen();
</script>