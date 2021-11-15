<?php 
class RaviKoQr
{
  public $server = "localhost";
  public $user = "ubudsouv";
  public $pass = "d30n@U0MQP8hp-";
  public $dbname = "ubudsouv_ubudmarket_research";
	public $conn;
  public function __construct()
  {
  	$this->conn= new mysqli($this->server,$this->user,$this->pass,$this->dbname);
  	if($this->conn->connect_error)
  	{
  		die("connection failed");
  	}
  }
 	public function insertQr($idtoko,$qrUname,$final,$qrimage,$qrlink,$status)
 	{
 			$sql = "INSERT INTO qrcodes(id_toko,qrUsername,qrContent,qrImg,qrlink,status) VALUES('$idtoko','$qrUname','$final','$qrimage','$qrlink','$status')";
 			$query = $this->conn->query($sql);
 			return $query;

 	
 	}
 	public function displayImg()
 	{
 		$sql = "SELECT qrimg,qrlink from qrcodes where qrimg='$qrimage' AND id_toko'$idtoko'";

 	}
}
$meravi = new RaviKoQr();