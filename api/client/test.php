<?php 
include_once("../../CORES/initialize.php");
$data = $db->prepare("SELECT token FROM `identifiant`");
$data->execute();
$row = $data->rowCount();
if($row > 0){
$id = $data->fetch();
echo $id["token"];	
}else{
	$insert = $db->prepare("INSERT INTO `identifiant`(`token`) VALUES (?)");
	$insert->execute(array(1));
}
$update = $db->prepare("UPDATE `identifiant` SET `token`=?");
$number=$id["token"]+1;
$update->execute(array($number));
echo $number;

?>