<?php
	$db = new PDO("mysql:host=localhost;dbname=fietsenmaken",
	              "root", "");
	
	
	
	function getFietsen():array
	{
		try{
			Global $db;
			$db = new PDO("mysql:host=localhost;dbname=fietsenmaken",
		              "root", "");
			$query = $db->prepare("SELECT * FROM `fietsen`");
			$query->execute();
			$fietsen = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fietsen;
			
			
			} catch (\PDOException $e) {
			 return  ($e->getMessage());
		}
	}
	
	
	function getFiets($id){
		try{
			Global $db;
			$query = $db->prepare("SELECT * FROM `fietsen` WHERE `id` = :id");
			$query->bindValue(":id", $id);
			$query->execute();
			$fiets = $query->fetch();
			return $fiets;
		} catch (\PDOException $e) {
			return ($e->getMessage());
		}
	
	}
	
	function deleteFiets($id):void{
		try{
			Global $db;
			$query = $db->prepare("DELETE FROM `fietsen` WHERE `id` = :id");
			$query->bindValue(":id", $id);
			$query->execute();
		} catch (\PDOException $e) {
			echo ($e->getMessage());
		}
	
	}
	
	
	function insertFiets($merk = "test",$type = "test ", $prijs = 100, $voorraad= 10 ):void{
		try{
			
			$db = new PDO("mysql:host=localhost;dbname=fietsenmaken",
			              "root", "");
			$query = $db->prepare("INSERT INTO `fietsen`(`merk`, `type`, `prijs`, `voorraad`) VALUES (:merk,:type,:prijs,:voorraad)");
			$query->bindValue(":merk", $merk);
			$query->bindValue(":type", $type);
			$query->bindValue(":prijs", $prijs);
			$query->bindValue(":voorraad", $voorraad);
			 $query->execute();
		} catch (\PDOException $e) {
			 echo ($e->getMessage());
		}
	
	}
	
	function updateFiets(int $id,$merk,$type,int $prijs, int $voorraad ):void{
		try{
			Global $db;
			
			$query = $db->prepare("UPDATE `fietsen` SET `merk`=:merk,`type`=:type,`prijs`=:prijs,`voorraad`=:voorraad WHERE `id` = :id");
			$query->bindValue(":id", $id);
			$query->bindValue(":merk", $merk);
			$query->bindValue(":type", $type);
			$query->bindValue(":prijs", $prijs);
			$query->bindValue(":voorraad", $voorraad);
			$query->execute();
		} catch (\PDOException $e) {
			echo ($e->getMessage());
		}
	}
	
	
	