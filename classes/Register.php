<?php 
include_once'library/Database.php';

class Register{

public $db;

public function __construct()
{
 
 $this->db = new Database();  
 $this->db->dbConnect(); 
}
 //ADD STUDENT
public function addRegister ($data,$file){

$name =$data['name'];
$email =$data['email'];
$phone =$data['phone'];
$address =$data['address'];

$permited = array('jpg','jpeg','png','gif');
$file_name= $file['photo']['name'];
$file_size = $file ['photo']['size'];
$file_temp = $file ['photo']['tmp_name'];

$div = explode('.',$file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
$upload_image="upload/".$unique_image;

if(empty($name)||empty($email)||empty($phone)||empty($address)||empty($file_name)){

$msg ="Fields Must Not Be Empty";


return $msg;
}elseif($file_size> 1048567){
    $msg ="Fields size must be less then 1 MB";
    return $msg;
}elseif(in_array($file_ext,$permited)==false){
    $msg = "You can upload only" . implode(',' , $permited);
    return $msg;
}
move_uploaded_file($file_temp,$upload_image);
$query = "INSERT INTO `tbl_crud`(`name`, `email`, `phone`, `photo`, `address`) VALUES ('$name','$email','$phone','$upload_image','$address')";
$result = $this->db->insert($query);
if($result){
$msg = "Registration Successful";
return $msg;
}else{
    $msg = "Registrations Failed";
    return $msg;
}
}
    // VIEW ALL STUDENTS
public function allStudent(){
    $query = "SELECT * FROM tbl_crud ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;
}

    // GET STUDENT BY ID
public function getStdById($id){
 $query = "SELECT * FROM tbl_crud WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
}
//Update Student

public function updateStudent($data, $file, $id){
    
$name =$data['name'];
$email =$data['email'];
$phone =$data['phone'];
$address =$data['address'];
$permited = array('jpg','jpeg','png','gif');
$file_name= $file['photo']['name'];
$file_size = $file ['photo']['size'];
$file_temp = $file ['photo']['tmp_name'];
$div = explode('.',$file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
$upload_image="upload/".$unique_image;

if(empty($name)||empty($email)||empty($phone)||empty($address)||empty($email)){

$msg ="Fields Must Not Be Empty";

return $msg;

}if(!empty($file_name)){
if($file_size> 1048567){
    $msg ="Fields size must be less then 1 MB";
    return $msg;
}elseif(in_array($file_ext,$permited)==false){
    $msg = "You can upload only" . implode(',' , $permited);
    return $msg;
}else{
$img_query = "SELECT * FROM tbl_crud WHERE id = '$id'";
$img_res = $this->db->select($img_query);

if($img_res) {
    while ($row = mysqli_fetch_assoc($img_res)){
        $photo = $row ['photo'];
        unlink($photo);
    }
}



move_uploaded_file($file_temp,$upload_image);

$query = "UPDATE tbl_crud SET name = '$name', email = '$email', phone = '$phone', photo = '$upload_image', address = '$address' WHERE id ='$id'";
$result = $this->db->insert($query);
if($result){
$msg = "Student Update Successfully";
return $msg;
}else{
    $msg = "Update Failed";
    return $msg;
} 
}
}
else{
    $query = "UPDATE tbl_crud SET name ='$name', email = '$email', phone ='$phone', address = '$address' WHERE id = '$id'";
$result = $this->db->insert($query);
if($result){
$msg = "Update Student Successfully";
return $msg;
}else{
    $msg = "Update Failed";
    return $msg;

}}
}
//Delete Student

public function delStudent($id){

$img_query = "SELECT * FROM tbl_crud WHERE id = '$id'";
$img_res = $this->db->select($img_query);

if($img_res) {
    while ($row = mysqli_fetch_assoc($img_res)){
        $photo = $row ['photo'];
        unlink($photo);
    }
}
$del_query = "DELETE FROM tbl_crud WHERE id ='$id'";
$del = $this->db->delete($del_query);
if($del){
$msg = "Student Delete Successfully";
return $msg;
}else{
    $msg = "Delete Failed";
    return $msg;

}

}




}?>