<?php
  require_once('db.php');
  $upload_dir = 'uploads/';
$sql = "select auro_id from auro_emp order by auro_id  desc ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$lastid = $row['auro_id'];
// echo $lastid;
if ($lastid == '') {
 	$empid = "STDAA001";
}else{
	// $empid = substr($lastid, 7);
	// $empid = intval($empid);
	
	// if ($empid < 10) {
	// 	$empid = "STDAA00".($empid+1);
	// }else{
	// 	$empid = "STDAA".($empid+1);
	// }
	$idd = str_replace("STDAA", "", $lastid);
	$id = str_pad($idd+1, 3,0,STR_PAD_LEFT);
	
	$empid = "STDAA".$id;
	
}

  if (isset($_POST['Submit'])) {
  	// echo '<pre>';print_r($_POST);echo count($_POST['auro_education']);exit();
  	$auro_id = $_POST['empid'];
  	$auro_ed_count = count($_POST['auro_education']);
  	
  	
    
    $auro_name = $_POST['auro_name'];
    $auro_email = $_POST['auro_email'];
    $auro_phone = $_POST['auro_phone'];
    $auro_address = $_POST['auro_address'];

    $imgName = $_FILES['auro_image']['name'];
		$imgTmp = $_FILES['auro_image']['tmp_name'];
		$imgSize = $_FILES['auro_image']['size'];

    if(empty($auro_name)){
			$errorMsg = 'Please input name';
		}elseif(empty($auro_phone)){
			$errorMsg = 'Please input contact';
		}elseif(empty($auro_email)){
			$errorMsg = 'Please input email';
		}else{

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				// if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				// }else{
				// 	$errorMsg = 'Image too large';
				// }
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}


		if(!isset($errorMsg)){
			// echo '<pre>';print_r($_POST);exit();
		// echo $userPic;exit();
			$sql = "insert into auro_emp(auro_id ,auro_name,auro_email ,auro_address,auro_phone, auro_image)
					values('".$auro_id."','".$auro_name."', '".$auro_email."', '".$auro_address."','".$auro_phone."', '".$userPic."')";
					// echo $sql;exit();
			$result = mysqli_query($conn, $sql);
			
			if($auro_ed_count > 0 ){
				// echo '<pre>';print_r($_POST);exit();
		        for($i = 0; $i < $auro_ed_count; $i++){
		            if(trim($_POST['auro_education'] != '') && trim($_POST['auro_institute'] != '') && trim($_POST['auro_pass'] != '') && trim($_POST['auro_grade'] != '')){
		                $auro_education = $_POST['auro_education'][$i];
					    $auro_institute = $_POST['auro_institute'][$i];
					    $auro_pass = $_POST['auro_pass'][$i];
					    $auro_grade = $_POST['auro_grade'][$i];
							               
		                
		                
		                $query  = "INSERT INTO auro_education (auro_emp_id,auro_education,auro_institute,auro_pass,auro_grade) VALUES ('$auro_id','$auro_education','$auro_institute','$auro_pass','$auro_grade')";
		                // echo $query;
						$result2 = mysqli_query($conn, $query);
		            }
		        }
	    	}

			if($result || $result2){
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>
