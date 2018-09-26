<?php

include("dbconn.php");


if(isset($_POST['add']))
{
	$bname= $_POST['btitle'];
	$bauthor= $_POST['baut'];
	$bgenre= $_POST['bgen'];
	$bprice= $_POST['bpri'];
	$path="assets/No_Image_Available.png";
	
	$filename= $_FILES['bcvr']['name'];	
	$filetempName= $_FILES['bcvr']['tmp_name'];
	
		if($filename != NULL)
		{
			$ext=explode(".",$filename);
		$extension=end($ext);
		$extension = strtolower($extension);
		
		$allowedExt=array("jpg","png","jpeg","gif","bmp");
		
		if(in_array($extension,$allowedExt))
		{
			$newfilename= rand(123456789,999999999)."_".rand(12345,99999).".".$extension;
			$check=move_uploaded_file($filetempName,"assets/".$newfilename);
			$path="assets/".$newfilename;
		}
		else
		{
				echo "<script> alert('File type is not supported');</script>";
		}
		}


$chk= mysqli_query($conn,"insert into books values('','$bname','$bauthor','$bgenre','$bprice','$path')");

if($chk)
{
	echo "<script> alert('Book Added');</script>";
}
else
{
	die (mysqli_error($conn));
}
	
	
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="800" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td colspan="2"><h1 align="center">Add Books </h1></td>
    </tr>
    <tr>
      <td width="195"><strong>Book Title:</strong></td>
      <td width="570"><label for="btitle"></label>
      <input type="text" name="btitle" id="btitle" /></td>
    </tr>
    <tr>
      <td><strong>Book Author:</strong></td>
      <td><label for="baut"></label>
      <input type="text" name="baut" id="baut" /></td>
    </tr>
    <tr>
      <td><strong>Book Genre:</strong></td>
      <td><label for="bgen"></label>
        <select name="bgen" id="bgen">
          <option selected="selected">Choose</option>
          <option value="Historical">Historical</option>
          <option value="Literature">Literature</option>
          <option value="Suspense">Suspense</option>
          <option value="Thriller">Thriller</option>
      </select></td>
    </tr>
    <tr>
      <td><strong>Book Price:</strong></td>
      <td><label for="bpri"></label>
      <input type="text" name="bpri" id="bpri" /></td>
    </tr>
    <tr>
      <td><strong>Book Cover:</strong></td>
      <td><label for="bcvr"></label>
      <input type="file" name="bcvr" id="bcvr" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="add" id="add" value="Add Book" /></td>
    </tr>
  </table>
</form>
</body>
</html>