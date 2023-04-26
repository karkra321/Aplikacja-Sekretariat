<?php
session_start();
$id = $_GET['id'];
try{
	require_once "connection.php";
	
		$polaczenie= new mysqli($host,$db_name,$db_password,$base);
		
		if($polaczenie->errno !=0) throw new Exception("Błąd przy połączeniu");
		else{
					mysqli_query($polaczenie,"DELETE FROM glowna WHERE id = $id");
					mysqli_close($polaczenie);
					header('Location:index.php');
					
				}
	}catch(Exception $e){
		echo "Problem polaczenia z baza danych<br/>";
		echo "Info developerskie ".$e;
	}
?>
