<?php 
include_once'library/Database.php';

class Register{

public $db;

public function __construct()
{
 
 $this->db = new Database();  
 $this->db->dbConnect(); 
}
 
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
}else{
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



}




}





?>