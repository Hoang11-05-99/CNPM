<?php
if(!defined('SECURITY')){
    die("ban khong co quyen truy cap");
}
$conn=mysqli_connect('localhost','root','','phpmyadmin');
if($conn){
   mysqli_query($conn,"SET NAMES 'utf8'");
}else{
    die('ket noi that bai');

}
?>