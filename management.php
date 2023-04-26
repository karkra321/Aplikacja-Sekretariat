<?php
	session_start();
		
	
	if(!isset($_POST['name'])&&!isset($_POST['surname'])){
		exit();
		header('Location:Dodawanie.php');
	}
	$wszystko_ok=true;				//Ustawenie zmiennej sprawdzajacej czy wszystko ok

	$name=$_POST['name'];			//Sprawdzenie pola imie i ustawienie zmiennej
	if(strlen($name)==0){
		$wszystko_ok=false;
		$_SESSION['e_name']="Pole imie nie moze być puste";
	}else $name[0]=strtoupper($name[0]);
	
	
	$surname=$_POST['surname'];			//Sprawdzenie pola Nazwisko i ustawienie zmiennej
	if(strlen($surname)==0){
		$wszystko_ok=false;
		$_SESSION['e_surname']="Pole nazwisko nie moze być puste";
	}else $surname[0]=strtoupper($surname[0]);
	
		
	$post_c1=$_POST['post_code1_1'];						//Dodanie kodu pocztoewgo i sprawdzenie
	$post_c2=$_POST['post_code1_2'];

	if(strlen($post_c1)!=2 ||strlen($post_c2)!=3 || !is_numeric($post_c1) || !is_numeric($post_c2)){
			$wszystko_ok=false;
			$_SESSION['e_adres']="Nieporawny kod pocztowy";
	}
	
	$city=$_POST['City1'];			//ustaweinei miasta 
	if(strlen($city)==0){
		$wszystko_ok=false;
		$_SESSION['e_adres']="Pole miasto nie moze być puste";
	}else $city[0]=strtoupper($city[0]); 	
	
	$street=$_POST['street_1'];		//Ustawienei Ulicy
	if(strlen($street)==0){
		$wszystko_ok=false;
		$_SESSION['e_adres']="Pole Ulica nie moze być puste";
	}else $street[0]=strtoupper($street[0]); 
	
	$home_number=$_POST['home_number_1'];		//numer domu
	if(strlen($home_number)==0 || !is_numeric($home_number)){
		$wszystko_ok=false;
		$_SESSION['e_adres']="Niepoprawny wpis w polu nr domu";
	}
										
	if(!isset($_POST['check_b'])){								//Sprawdzenie czy chceckbox jest zanzaczony
		$post_c2_1=$_POST['post_code2_1'];						//Dodanie kodu pocztoewgo i sprawdzenie
		$post_c2_2=$_POST['post_code2_2'];
		if(strlen($post_c2_1)!=2 ||strlen($post_c2_2)!=3 || !is_numeric($post_c2_1) || !is_numeric($post_c2_2)){
				$wszystko_ok=false;
				$_SESSION['e_adres2']="Nieporawny kod pocztowy";
		}
		
		$city2=$_POST['City2'];			//ustaweinei miasta 
		if(strlen($city2)==0){
			$wszystko_ok=false;
			$_SESSION['e_adres2']="Pole miasto nie moze być puste";
		}else $city2[0]=strtoupper($city2[0]); 	
		
		$street2=$_POST['street_2'];		//Ustawienei Ulicy
		if(strlen($street2)==0){
			$wszystko_ok=false;
			$_SESSION['e_adres2']="Pole Ulica nie moze być puste";
		}else $street2[0]=strtoupper($street2[0]); 
		$home_number2=$_POST['home_number_2'];		//numer domu
		if(strlen($home_number2)==0 || !is_numeric($home_number2)){
			$wszystko_ok=false;
			$_SESSION['e_adres2']="Niepoprawne pole nr domu";
		}
	}
	$Ocena_Niemiecki=$_POST['Mark_D']; 		//sprawdznie oceny
	$Ocena_Angielski=$_POST['Mark_E'];
	if (strlen($Ocena_Niemiecki)==0 ) $Ocena_Niemiecki=0;
	else if(strlen($Ocena_Angielski)==0 )$Ocena_Angielski=0;
		if( !is_numeric($Ocena_Niemiecki) ||$Ocena_Niemiecki>6||$Ocena_Niemiecki<1||!is_numeric($Ocena_Angielski)||$Ocena_Angielski>6||$Ocena_Angielski<1){
						
			$wszystko_ok=false;
			$_SESSION['e_ocena']="Niepoprawny wpis w polu ocena";
		}
	$profil=$_POST['sel'];
				
	if($wszystko_ok){			//Jesli wszystko ok to dodaj uzytkownika
	mysqli_report(MYSQLI_REPORT_STRICT);
	try{
	require_once "connection.php";
		$polaczenie= new mysqli($host,$db_name,$db_password,$base);
		$polaczenie->query('SET NAMES utf8');

		if($polaczenie->errno !=0) throw new Exception("Błąd przy połączeniu");
		else{
								$glowna="CREATE TABLE IF NOT EXISTS glowna (
					id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					Imie VARCHAR(30) NOT NULL,
					Nazwisko VARCHAR(30) NOT NULL,
					Kod_pocztowy VARCHAR(6),
					Miejscowosc VARCHAR(50),
					Ulica VARCHAR(50),
					Nrdomu VARCHAR(50),
					Kod_pocztowy2 VARCHAR(6),
					Miejscowosc2 VARCHAR(50),
					Ulica2 VARCHAR(50),
					Nrdomu2 VARCHAR(50),
					Ocena_Niemiecki INT (1),
					Ocena_Angielski INT(1),
					Profil VARCHAR(30)
					)";
				$post_code_sized=$post_c1."-".$post_c2;
				$post_code_sized2=$post_c2_1."-".$post_c2_2;
				$polaczenie->query($glowna);
				if($polaczenie->query("INSERT INTO glowna VALUES (NULL,'$name','$surname','$post_code_sized','$city','$street','$home_number','$post_code_sized2','$city2',
				'$street2','$home_number2','$Ocena_Niemiecki','$Ocena_Angielski','$profil')")){
				
					//	$polaczenie->query("CREATE TABLE temp LIKE glowna");
					//	$polaczenie->query("INSERT INTO temp VALUES ");
					//	$polaczenie->query("DROP TABLE glowna");
					//	$polaczenie->query("RENAME TABLE temp TO glowna");

					$_SESSION['Gotowe']="Poprawnie dodano $name $surname";
				
			mysqli_close($polaczenie);
			
				}else echo "zawiodles";
			
			}
		}catch(Exception $e){
			echo "Problem polaczenia z baza danych<br/>";
			echo "Info developerskie ".$e;
		}
	}
		
		header('Location:Dodawanie.php');
	
?>