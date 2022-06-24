<?php
$target_dir = "./";
$target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);

if(isset($_POST['convertButton']))
{
  $item = $_FILES["uploadFile"]["name"];
  $command = "python3 image.py $item";
  $output = shell_exec($command);
  echo "<img src='baw.jpg'>";
}

if(isset($_POST['uploadButton']))
{

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["uploadFile"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  }
  else 
  {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" )
  {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0)
  {
    echo "Sorry, your file was not uploaded.";
  }
  else 
  {
    if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file))
    {
      echo "<img src=".$_FILES["uploadFile"]["name"].">";
    }
    else
    {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>