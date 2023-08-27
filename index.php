

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel ="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container" style="margin-top : 70px;">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">

<?php

// $con = mysqli_connect("localhost:3310","root","","php_crud");
include "connection.php";
// require "connection.php";

if(isset($_POST['submit'])){
  $student_name        = $_POST['sname'];
  $student_marks       = $_POST['marks'];
  $student_department  = $_POST['department'];
  $student_result      = $_POST['result'];


  $Query = mysqli_query($con, "INSERT INTO students (name, marks, departments, resut) VALUES('$student_name','$student_marks','$student_department','$student_result')");

  if($Query){
    echo "<script>alert('Student record is successfully inserted')</script>";
  }else{
    echo "<script>alert('You are fucked up!')</script>";
  }
}
?>

<br>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Record
</button>
<br/><br/>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" >

              <div class="form-group">
                <input type="text" class="form-control" name="sname" placeholder="Name" required/>
              </div><br>
              <div class="form-group">
                <input type="text" class="form-control" name="marks" placeholder="marks" >
              </div><br>
              <div class="form-group">
                <input type="text" class="form-control" name="department" placeholder="department" >
              </div><br>
              <div class="form-group">
                <input type="text" class="form-control" name="result" placeholder="restult" >
              </div>
              <br>
              <div class="form-group">
                <input type="submit" class="btn btn-info " name="submit" value="Add student" >
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- update model -->
<!-- Button trigger modal -->


<!-- Modal -->

<!-- close update model -->
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead> 
            <tr>
            <th>Name</th>
                <th>Marks</th>
                <th>departments</th>
                <th>Result</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody> 
        <?php
$show =mysqli_query($con, "SELECT * FROM students");
while($r = mysqli_fetch_array($show)) : 
?>
        <tr>
          <td><?php echo $r['name']; ?></td>
          <td><?php echo $r['marks']; ?></td>
          <td><?php echo $r['departments']; ?></td>
          <td><?php echo $r['resut']; ?></td>
          
          <td><a href="update.php?update_id=<?php echo $r['id']; ?>" class="btn btn-warning" >
 Update
</a></td>
          <td><a href="delete.php?delete_id=<?php echo $r['id']; ?>" 
          class="btn btn-danger" >
 Delete
</a>
<a href="delete.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger" 
onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>


</td>
        </tr>
<?php
endwhile;
?>
            
        </tbody>
</table>
            </div>
        </div>
    </div>
  <script src ="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script type="text/javascript">
    new DataTable('#example');
  </script>
  </body>
  
</html>