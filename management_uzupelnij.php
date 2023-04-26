<?PHP
session_start();
if(!isset($_POST['name'])&&!isset($_POST['surname'])){
		exit();
		header('Location:uzupelnij.php');
	}
mysqli_report(MYSQLI_REPORT_STRICT);
try{
	require_once "connection.php";
		$polaczenie= new mysqli($host,$db_name,$db_password,$base);
		$polaczenie->query('SET NAMES utf8');
		if($polaczenie->errno !=0) throw new Exception("Błąd przy połączeniu");
		else{
				$id_P=$_SESSION['id_P'];
				$name=$_POST['name'];	
				$surname=$_POST['surname'];	
				$post_c1=$_POST['post_code1_1'];						//Dodanie kodu pocztoewgo i sprawdzenie
				$post_c2=$_POST['post_code1_2'];	
				$city=$_POST['City1'];			//ustaweinei miasta 
				$street=$_POST['street_1'];		//Ustawienei Ulicy
				$home_number=$_POST['home_number_1'];
				$post_c2_1=$_POST['post_code2_1'];						//Dodanie kodu pocztoewgo i sprawdzenie
				$post_c2_2=$_POST['post_code2_2'];
				$city2=$_POST['City2'];
				$street2=$_POST['street_2'];
				$home_number2=$_POST['home_number_2'];
				$Ocena_Niemiecki=$_POST['Mark_D']; 		//sprawdznie oceny
				$Ocena_Angielski=$_POST['Mark_E'];
				$profil=$_POST['sel'];
				if(strlen($post_c2))
					$post_code_sized=$post_c1."-".$post_c2;
				else 
					$post_code_sized="";
				if(strlen($post_c2_2))
				$post_code_sized2=$post_c2_1."-".$post_c2_2;
				else 
					$post_code_sized2="";
	
				if($polaczenie->query("UPDATE glowna SET `Imie`='$name',`Nazwisko`= '$surname',`Kod_pocztowy`='$post_code_sized',`Miejscowosc`='$city', `Ulica`='$street', `Nrdomu`='$home_number',`Kod_pocztowy2`='$post_code_sized2',`Miejscowosc2`='$city2',
				`Ulica2`='$street2',`Nrdomu2`='$home_number2',`Ocena_Niemiecki`='$Ocena_Niemiecki',`Ocena_Angielski`='$Ocena_Angielski',`Profil`='$profil' WHERE `id`='$id_P'")){
				
				
			mysqli_close($polaczenie);
			header('Location:index.php');
				}else echo "zawiodles";
			
			}
	}catch(Exception $e){
		echo "Problem polaczenia z baza danych<br/>";
		echo "Info developerskie ".$e;
	}
?>