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
                        <h2>Items Form</h2>
                    </div>
                    <p>Record Items To The Database.</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                            <label>Description</label>
                            <input type="text" name="text" class="form-control">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Add Item">
                        </div><br>
                    </form>
                    <form action="" method="post">
                        <input type="text" name="_method" value="DELETE" hidden>
                        <?php
                        
                        ?>
                        <div><br>
                            <input type="submit" class="btn btn-primary" name="submitr" value="Remove Item">
                        </div>
                    </form><br>
                    <form action="" method="post">
                        <div>
                            <label>Update</label>
                            <?php
                            
                            ?>
                            <input type="text" name="name" value="" class="update">
                            <input type="hidden" name="_method" value="PUT" hidden>
                        </div><br>
                        <input type="submit" class="btn btn-primary" name="submitu" value="Update Item">
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