<?php
  include('add.php')  
 
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
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form class="" action="add.php" method="post" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header">Personal Details</div>
              <div class="card-body">
                <input type="text" class="form-control" name="empid"  placeholder="Enter empid" value="<?php echo  $empid;?>" readonly>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="auro_name"  placeholder="Enter Name" value="">
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="email" class="form-control" name="auro_email" placeholder="Enter Email" value="">
                </div>
                <div class="form-group">
                  <label for="email">Address</label>
                  <input type="text" class="form-control" name="auro_address" placeholder="Enter Email" value="">
                </div>
                <div class="form-group">
                  <label for="contact"> Phone</label>
                  <input type="text" class="form-control" name="auro_phone" placeholder="Enter Mobile Number" value="">
                </div>
                <div class="form-group">
                  <label for="image">Upload Image</label>
                  <input type="file" class="form-control" name="auro_image" value="">
                </div>
              </div>
              <div class="card-header">Education</div>
              <div class="card-body">
                <div class="form-group fieldGroup">
                  <div class="input-group">
                    <input type="text" name="auro_education[]" class="form-control" placeholder="Enter education" value=""/>
                    <input type="text" name="auro_institute[]" class="form-control" placeholder="Enter institute name" value=""/>
                    <input type="text" name="auro_pass[]" class="form-control" placeholder="Enter Year of Pass" value=""/>
                    <input type="text" name="auro_grade[]" class="form-control" placeholder="Enter grade" value=""/><div class="input-group-addon">
                      <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                </div>
              </div>
              </div>
            </form>
            <div class="form-group fieldGroupCopy" style="display: none;">
        <div class="input-group">
          <input type="text" name="auro_education[]" class="form-control" placeholder="Enter education" value=""/>
          <input type="text" name="auro_institute[]" class="form-control" placeholder="Enter institute name" value=""/>
          <input type="text" name="auro_pass[]" class="form-control" placeholder="Enter Year of Pass" value=""/>
          <input type="text" name="auro_grade[]" class="form-control" placeholder="Enter grade" value=""/>
          <div class="input-group-addon">
            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
          </div>
        </div>
      </div>
          </div>
          </div>
        </div> <!-- container -->
     

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function(){
    //group add limit
    var maxGroup = 10;
    
    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});
    </script>
  </body>
</html>
