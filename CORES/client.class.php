<?php 
/**
 * summary
 */
class Client
{
	public $id_product;
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function allProduct()
    {
    	$data = $this->conn->prepare("SELECT * FROM `produit`");
        $data->execute();
        return $data;
    }

    public function singleProduct()
    {
    	$data = $this->conn->prepare("SELECT * FROM `produit` where `id_produit` = ?");
        $data->execute(array($this->id_product));
        return $data;
    }
}


/**
 * Class Command
 */
class Command
{
    /**
     * summary
     */
    public $montant, $methode, $statut;
    public $id;
    public $id_produit,$id_command, $date, $service_livraison, $delai, $email, $telephone, $nom, $prenom, $nif, $adresse;
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createId($a){
    	$id =uniqid();
        $returned =0;
       $data = $this->conn->query("SELECT * FROM `identifiant`");
       while($row=$data->fetch(PDO::FETCH_ASSOC)){
        if(($id == $row['token']) AND $a<100){ 
            $returned = 1;
        }
       }
       if($a == 100){
        header("location:error.php");
        return false;
       }
       if($returned == 1){
            $a++;
            $this->createId($a);
        }else{
            $insertion = $this->conn->prepare("INSERT INTO `identifiant`(`token`) VALUES (?)");
            $insertion->execute(array($id));
            return $id;
        }
        	

    }

    public function getId()
    {
        $db = $this->conn;
        $data = $db->prepare("SELECT token FROM `identifiant`");
        $data->execute();
        $row = $data->rowCount();
        if($row > 0){
        $id = $data->fetch();  
        }else{
            $insert = $db->prepare("INSERT INTO `identifiant`(`token`) VALUES (?)");
            $insert->execute(array(1));
        }
        $update = $db->prepare("UPDATE `identifiant` SET `token`=?");
        $number=$id["token"]+1;
        $update->execute(array($number));
        return $id["token"];
    }

    public function createCommand(){
        $data = $this->conn->prepare("INSERT INTO `commande`(`id_produit`, `id_command`,`date`, `service_livraison`, `delai`, `email`, `telephone`, `nom`, `prenom`, `nif`, `adresse`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $this->id_produit= htmlspecialchars(strip_tags($this->id_produit));
        $this->id_command= $this->createId(0);
        $this->date= htmlspecialchars(strip_tags($this->date));
        $this->service_livraison= htmlspecialchars(strip_tags($this->service_livraison));
        $this->delai= htmlspecialchars(strip_tags($this->delai));
        $this->email= htmlspecialchars(strip_tags($this->email));
        $this->telephone= htmlspecialchars(strip_tags($this->telephone));
        $this->nom= htmlspecialchars(strip_tags($this->nom));
        $this->prenom= htmlspecialchars(strip_tags($this->prenom));
        $this->nif= htmlspecialchars(strip_tags($this->nif));
        $this->adresse= htmlspecialchars(strip_tags($this->adresse));
        $value1 = $data->execute(array(
        $this->id_produit,$this->id_command, $this->date, $this->service_livraison, $this->delai, $this->email, $this->telephone, $this->nom, $this->prenom, $this->nif, $this->adresse
        ));
       $id =$this->id_command;
        $payment = $this->conn->prepare("INSERT INTO `transaction`(`id_command`, `montant`, `methode`, `statut`) VALUES (?,?,?,?)");
        $value2=$payment->execute(array(
        $id, $this->montant, $this->methode, $this->statut
        ));

            
        if($value1 and $value2){
            return true;
        }
        else{
            echo $data->error;
            return false;
        }
    }
}

 ?>