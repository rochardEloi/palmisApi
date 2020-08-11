<?php 

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json");

include_once("../CORES/initialize.php");



if (isset($_GET['id'])) {
	$post = new Post($db);
	$post->id = $_GET['id'];
    $result = $post->read_single();
    $num = $result->rowCount();

	if($num > 0){

		while($row=$result->fetch(PDO::FETCH_ASSOC)){

			extract($row);
			$postItem = array(
		      'id' => $id,
		      'nom'=>$nom,
		      'prenom'=>$prenom,
		       'phone'=>$phone
			);

		}

		echo json_encode($postItem);
	}
}
	else{
       echo json_encode(array('message'=>'Erreur, Pas de reponse'));
	}

?>