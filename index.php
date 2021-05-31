<?php
  include('db.php');
  $upload_dir = 'uploads/';

  if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql = "select * from auro_emp where auro_id ='$id'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$image = $row['auro_image'];
			unlink($upload_dir.$image);
			$sql = "delete from auro_emp where auro_id='$id'";
      $sql2 = "delete from auro_education where auro_emp_id='$id'";
			if(mysqli_query($conn, $sql) || mysqli_query($conn, $sql2)){
				header('location:index.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Auro Employee Management</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </head>
  <body>

      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
          <a class="navbar-brand" href="index.php">Auro Employee Management</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-primary" href="create.php"><i class="fa fa-user-plus"></i></a></li>
              </ul>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Student List</div>
                      <div class="card-body">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Address</th>
                                <th>Phone No:</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Address</th>
                            <th>Phone No:</th>
                            <th>Image</th>
                            <th></th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php
                          $j =1;
                            $sql = "select * from auro_emp";
                            
                            $result = mysqli_query($conn, $sql);
                            
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>
                            <td>
                              <?php echo $row['auro_id'].'<br/>'; ?>                              
                              <a href="edit.php?id=<?php echo $row['auro_id'] ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                              <a href="index.php?delete=<?php echo $row['auro_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a>
                            </td>
                            
                            <td><?php echo $row['auro_name'] ?></td>
                            <td><?php echo $row['auro_email'] ?></td>
                            <td><?php echo $row['auro_address'] ?></td>
                            <td><?php echo $row['auro_phone'] ?></td>                            
                            <td><img src="<?php echo $upload_dir.$row['auro_image'] ?>" height="40"></td>
                            <td class="text-center">
                              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $row["auro_id"]; ?>" aria-expanded="false" aria-controls="collapseExample">
                              <i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i>

                            </button>
                            <!--  -->
                            <table class="table table-hover collapse"  id="collapseExample<?php echo $row["auro_id"]; ?>">
                                <thead>
                                    <th>Education</th><th>Institute Name</th><th>Year of Pass</th><th>Grade / %</th>
                                </thead>
                                
                                <tbody>
                                  <?php 
                                  $id =$row['auro_id'];
                                  // echo $id;
                                  $sql2 = "select * from auro_education where auro_emp_id = '$id'";
                                  $result2 = mysqli_query($conn, $sql2);
                                  
                                  if(mysqli_num_rows($result2)){
                              while($row2 = mysqli_fetch_assoc($result2)){
                                // echo "<pre>";print_r($row2);
                                ?>
                                    <tr >
                                        <td><?php echo $row2['auro_education'] ?></td>
                                        <td><?php echo $row2['auro_institute'] ?></td>
                                        <td><?php echo $row2['auro_pass'] ?></td>
                                        <td><?php echo $row2['auro_grade'] ?></td>
                                    </tr>
                                   <?php
                                    }
                                 }?>
                                </tbody>
                            </table>
                            <!--  -->
                            <!-- <div class="collapse" id="collapseExample">
                              <div class="card card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                              </div>
                            </div> -->
                            </td>
                          </tr>
                          <?php
                              }
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
      </div>

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
  </body>
</html>
