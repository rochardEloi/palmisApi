<?php 
/**
 * summary
 */
class Post 
{
    /**
     * summary
     */

    private $conn;
    private $table = "posts";

    //Public 
    public $id;
    public $nom;
    public $prenom;
    public $phone;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
    	$data = $this->conn->prepare("SELECT * FROM `info`");
        $data->execute();
        return $data;
    }

    public function read_single()
    {
        $data = $this->conn->prepare("SELECT * FROM `info` where `id` = ?");
        $data->execute(array(
        $this->id
        ));
        return $data;
    }

    public function create(){
        $data = $this->conn->prepare("INSERT INTO `info`(`nom`, `prenom`, `phone`) VALUES (?,?,?)");
        $this->nom= htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $data->execute(array(
        $this->nom,$this->prenom,$this->phone
        ));

        if($data->execute()){
            return true;
        }
        else{
            echo $data->error;
            return false;
        }
    }

    public function update(){
        $data = $this->conn->prepare("UPDATE `info` SET `nom`=?,`prenom`=?,`phone`=? WHERE `id` = ?");
        $this->nom= htmlspecialchars(strip_tags($this->nom));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $data->execute(array(
        $this->nom,$this->prenom,$this->phone, $this->id
        ));

        if($data->execute()){
            return true;
        }
        else{
            echo $data->error;
            return false;
        }
    }
}

 ?>