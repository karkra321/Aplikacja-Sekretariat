<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
	</head>
	</html>
<?php
session_start();
ini_set('max_execution_time', 1000);

function csv_search($handle,$rownumber,$wanted)
{
	rewind($handle); //resetuje wskaznik w pliku
	$licznik=0;
	$csv=fgetcsv($handle,0,";"); // przypisanie do tablicy $csv zawartosci pierwszego row'a, (wszystkich kolumn)
	//print_r($csv);
	$srow=array_search($wanted,$csv); // szukanie kolumny ktorej nazwa siedzi w $wanted i przypisanie jej indexu do $srow
	//echo "<br/><br/>";
	while($licznik < $rownumber) // petla ktora wykona sie tyle razy ile jest row'ow
	{
		$csv=fgetcsv($handle,0,";"); // przy kazdym wywolaniu petli przestawia wskaznik pliku na kolejnego rowa w dol i przepisuje wynik do $csv 
		//print_r($csv);
		//echo "<br/><br/>";
		//echo $srow;
		//echo "<br/><br/>";
		//echo $csv[$srow];
		$dane[$licznik]=$csv[$srow]; // wpisywanie danych z kolumny o nazwie $wanted do tablicy ktora zwraca funkcja
		$licznik++;
	}
	return $dane;
}
$filebase=$_FILES['plik']['tmp_name'];
 function licz_rzedy(){
$filebase=$_FILES['plik']['tmp_name'];
$row = 1;
if (($handle = fopen( $filebase, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
        $num = count($data);
        $row++;
    }
    fclose($handle);
 }
	return $row-2;
 }



require_once "connection.php";
try{
	

		$polaczenie = new mysqli($host, $db_name, $db_password,$base);
		$polaczenie->query('SET NAMES utf8');
		

		
		if($polaczenie->errno !=0) throw new Exception($polaczenie);
		else{
					
					
															
							$row = 1;
							$final="CREATE TABLE IF NOT EXISTS glowna(id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, "; // sklejanie zmiennej posiadajacej strukture kwerendy
							$znaki=["-", " "];
							if (($handle = fopen($filebase, "r")) !== FALSE) {  // sprawdzanie czy plik sie otwiera + otwieranie pliku
								while (($data = fgetcsv($handle, 0,";")) !== FALSE) { 		//przypisanie pierwszej kolumny excela do $data
									$num =140; //stala do petli, liczba row'ow
									$num_2= count($znaki);
									for ($z=0; $z < $num_2; $z++) // petla do podmiany znakow
										$data=str_replace($znaki[$z], "_", $data); // podmiana znakow z polskimi ogonkami na bez bo php nie umie czytac czasem tych z ogonkami, faza idzie
								}
								
								$wantedtable[0]="Imie";
								$wantedtable[1]="Nazwisko";
								$wantedtable[2]="Kod pocztowy";
								$wantedtable[3]="Miejscowosc";					//Tworzenie stalej tablicy z szukanymi kolumnami 
								$wantedtable[4]="Ulica";
								$wantedtable[5]="Nr budynku";
								$wantedtable[6]="Nr mieszkania";
								$wantedtable[7]="angielski";
								$wantedtable[8]="niemiecki";
								$ilerazy=9;
								$dane=array();
				
								for($col=0;$col<$ilerazy;$col++){
										$dane[$col]=csv_search($handle, licz_rzedy(),$wantedtable[$col]);
									}
									
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
									
									
									$polaczenie->query($glowna);
									
										if(!$_POST['checkBoxElektronik'] && !$_POST['checkBoxInformatyk'])
										{
											for($col=0;$col<licz_rzedy();$col++)
											{
												$name=$dane[0][$col];
												$surname=$dane[1][$col];
												$post_code_sized=$dane[2][$col];
												$city=$dane[3][$col];
												$street=$dane[4][$col];
												$home_number=$dane[5][$col];
												$Ocena_Niemiecki=$dane[8][$col];
												$Angol=$dane[7][$col];
												$polaczenie->query("INSERT INTO glowna VALUES (NULL,'$name','$surname','$post_code_sized','$city','$street','$home_number',NULL,NULL,
												NULL,NULL,'$Ocena_Niemiecki','$Angol',NULL)");	
											}
										}else
											
										if($_POST['checkBoxElektronik'] && $_POST['checkBoxInformatyk'])
										{
											for($col=0;$col<licz_rzedy();$col++)
												{
													$name=$dane[0][$col];
													$surname=$dane[1][$col];
													$post_code_sized=$dane[2][$col];
													$city=$dane[3][$col];
													$street=$dane[4][$col];
													$home_number=$dane[5][$col];
													$Ocena_Niemiecki=$dane[8][$col];
													$Angol=$dane[7][$col];
													$polaczenie->query("INSERT INTO glowna VALUES (NULL,'$name','$surname','$post_code_sized','$city','$street','$home_number',NULL,NULL,
													NULL,NULL,'$Ocena_Niemiecki','$Angol',NULL)");	
												}
											}else
											
										if($_POST['checkBoxElektronik'] && !$_POST['checkBoxInformatyk'])
										{
												for($col=0;$col<licz_rzedy();$col++)
												{
													$name=$dane[0][$col];
													$surname=$dane[1][$col];
													$post_code_sized=$dane[2][$col];
													$city=$dane[3][$col];
													$street=$dane[4][$col];
													$home_number=$dane[5][$col];
													$Ocena_Niemiecki=$dane[8][$col];
													$Angol=$dane[7][$col];
													$polaczenie->query("INSERT INTO glowna VALUES (NULL,'$name','$surname','$post_code_sized','$city','$street','$home_number',NULL,NULL,
													NULL,NULL,'$Ocena_Niemiecki','$Angol','Tech. Elektronik')");	
												}
											}else
											
										if(!$_POST['checkBoxElektronik'] && $_POST['checkBoxInformatyk'])
										{
												for($col=0;$col<licz_rzedy();$col++)
												{
													$name=$dane[0][$col];
													$surname=$dane[1][$col];
													$post_code_sized=$dane[2][$col];
													$city=$dane[3][$col];
													$street=$dane[4][$col];
													$home_number=$dane[5][$col];
													$Ocena_Niemiecki=$dane[8][$col];
													$Angol=$dane[7][$col];
													
													$polaczenie->query("INSERT INTO glowna VALUES (NULL,'$name','$surname','$post_code_sized','$city','$street','$home_number',NULL,NULL,
													NULL,NULL,'$Ocena_Niemiecki','$Angol','Tech. Informatyk')");	
												}		
										}
								fclose($handle);
							}
		
				}
						
		
				
				
				
			mysqli_close($polaczenie);
			header('Location:index.php');
		}catch(Exception $e){
			echo "Problem polaczenia z baza danych<br/>";
			echo "Info developerskie ".$e;
		}

?>