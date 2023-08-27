<?php
include "connection.php";

if(isset($_POST['submit'])){ // Change 'update' to 'submit'
    $name = $_POST['sname']; // Change 'name' to 'sname'
    $marks = $_POST['marks'];
    $departments = $_POST['department']; // Change 'departments' to 'department'
    $result = $_POST['result'];
    $id = $_POST['edit_id'];

    $query = mysqli_query($con, "UPDATE students SET name='$name', marks='$marks', departments='$departments', resut='$result' WHERE id='$id'");
    
    if($query){
        header("location: index.php");
    } else {
        echo "<script>alert('ooops ! ! ! ');</script>";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 70px;">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">

<?php
if(isset($_GET['update_id'])):
    $id = $_GET['update_id'];
    $query = mysqli_query($con, "SELECT * FROM students WHERE id = '$id' ");
    $r = mysqli_fetch_array($query);
    $name = $r['name'];
    $marks = $r['marks'];
    $departments = $r['departments'];
    $result = $r['resut'];
?>

    <form method="POST" action="update.php">

        <div class="form-group">
            <input type="text" class="form-control" name="sname" placeholder="Name" required="" 
            value="<?php echo $name; ?>"/>
        </div><br>
        <div class="form-group">
            <input type="text" class="form-control" name="marks" placeholder="marks" 
            value="<?php echo $marks; ?>"/>
        </div><br>
        <div class="form-group">
            <input type="text" class="form-control" name="department" placeholder="department" 
            value="<?php echo $departments; ?>"/>
        </div><br>
        <div class="form-group">
            <input type="text" class="form-control" name="result" placeholder="result"
            value="<?php echo $result; ?>"/>
        </div>
        <br>
        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
        <div class="form-group">
            <input type="submit" class="btn btn-info " name="submit" value="Edit details"/> <!-- Change 'update' to 'submit' -->
        </div>
    </form>
<?php endif; ?>

            </div>
        </div>
    </div>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() { // Use the ready function for DataTable initialization
        $('#example').DataTable(); // Replace 'new DataTable' with $('#example').DataTable()
    });
</script>
</body>
</html>
