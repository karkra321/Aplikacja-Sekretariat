<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
<?php
session_start();
require_once "fun_sort_tab.php";	
require_once "connection.php";	
error_reporting(-1);
header('Content-Type: text/html; charset=UTF-8');
$conn = new mysqli($host, $db_name, $db_password);
mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS baza_szkola DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci");
mysqli_query($conn,'SET NAMES utf8');
mysqli_query ($conn,'SET CHARACTER_SET utf8_unicode_ci');

	if(isset($_SESSION['errcatch'])){
							echo '<script language="javascript">';
							echo 'alert("Problem z otwarciem. Inny proces uzywa pliku csv")';
							echo '</script>';
							unset($_SESSION['errcatch']);
							}
							
								if(isset($_POST['wyb2'])){
					$wyb2=$_POST['wyb2']; $wyb2=str_replace(' ','_',$wyb2);$tab_war[0]=$wyb2;
					$wyb3=$_POST['wyb3']; $wyb3=str_replace(' ','_',$wyb3);$tab_war[1]=$wyb3;
					$wyb4=$_POST['wyb4']; $wyb4=str_replace(' ','_',$wyb4);$tab_war[2]=$wyb4;
					$wyb5=$_POST['wyb5']; $wyb5=str_replace(' ','_',$wyb5);$tab_war[3]=$wyb5;
					 
					$_SESSION['tab_w']=$tab_war;
					if($wyb2==$wyb3 ||$wyb2==$wyb4 ||$wyb2==$wyb5 ||$wyb3==$wyb4 ||$wyb3==$wyb5 ||$wyb4==$wyb5 ){
						$_SESSION['sort']="Co najmniej dwa kryteria były takie same";
						unset($wyb2);
						unset($wyb3);
						unset($wyb4);
						unset($wyb5);
						header('Location:index.php');
					}
					}else {

						$wyb2="Ocena_Niemiecki";
						$wyb3="Ocena_Angielski";
						$wyb4="Miejscowosc";
						$wyb5="Nazwisko";
						$tab_war=array(
						"Ocena_Niemiecki",
						"Ocena_Angielski",
						"Miejscowosc",
						"Nazwisko");
						$_SESSION['tab_w']=$tab_war;
					}	
	

$polaczenie= new mysqli($host,$db_name,$db_password,$base);
$polaczenie->query('SET NAMES utf8');
	 mysqli_query($polaczenie,"CREATE TABLE IF NOT EXISTS glowna (
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
									)");
						
	$allUcz = 	mysqli_query($polaczenie,"SELECT * FROM glowna");			
	$allUcz = mysqli_num_rows($allUcz);
	
	$pro[0]="TP";
	$pro[1]="TI";
	$pro[2]="TG";
	$pro[3]="TE";
	$pro[4]="TA";
		for($letter='a';$letter != 'z';$letter++)
		{
			$nazwaSubTabeli1 = $letter.$pro[0];
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr1");
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr2");
		}
		for($letter='a';$letter != 'z';$letter++)
		{
			$nazwaSubTabeli1 = $letter.$pro[1];
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr1");
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr2");
		}
		for($letter='a';$letter != 'z';$letter++)
		{
			$nazwaSubTabeli1 = $letter.$pro[2];
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr1");
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr2");
		}
		for($letter='a';$letter != 'z';$letter++)
		{
			$nazwaSubTabeli1 = $letter.$pro[3];
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr1");
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr2");
		}
		for($letter='a';$letter != 'z';$letter++)
		{
			$nazwaSubTabeli1 = $letter.$pro[4];
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr1");
			mysqli_query($polaczenie,"DROP TABLE ".$nazwaSubTabeli1."gr2");
		}
?>

    <title>Rezultat zapytania</title>
	<link rel="Stylesheet" type="text/css" href="cssdruk.css" />
	<script src="usuwanieall.js"></script>
	<script src="usuwaniejednego.js"></script>
	

	
</head>

<body>
		<?php 
						if(isset($_SESSION['sort'])){
							echo '<div class="blad"> '.$_SESSION['sort'].'</div>'.'</br>';
							unset($_SESSION['sort']);
							}
						
?>
<table align="center" cellpadding="0" cellspacing="0" >     
<tr>

<?PHP
require_once "funkcjeopty.php";
try{
								
					$wyb1="Profil";
					if(isset($_POST['wyb2'])){
						$wyb2=$_POST['wyb2']; $wyb2=str_replace(' ','_',$wyb2);$tab_war[0]=$wyb2;
						$wyb3=$_POST['wyb3']; $wyb3=str_replace(' ','_',$wyb3);$tab_war[1]=$wyb3;
						$wyb4=$_POST['wyb4']; $wyb4=str_replace(' ','_',$wyb4);$tab_war[2]=$wyb4;
						$wyb5=$_POST['wyb5']; $wyb5=str_replace(' ','_',$wyb5);$tab_war[3]=$wyb5;
						 
						$_SESSION['tab_w']=$tab_war;
						if($wyb2==$wyb3 ||$wyb2==$wyb4 ||$wyb2==$wyb5 ||$wyb3==$wyb4 ||$wyb3==$wyb5 ||$wyb4==$wyb5 ){
							$_SESSION['sort']="Co najmniej dwa kryteria były takie same";
							unset($wyb2);
							unset($wyb3);
							unset($wyb4);
							unset($wyb5);
						header('Location:index.php');
						}
					}else {

						$wyb2="Ocena_Niemiecki";
						$wyb3="Ocena_Angielski";
						$wyb4="Miejscowosc";
						$wyb5="Nazwisko";
						$tab_war=array(
						"Ocena_Niemiecki",
						"Ocena_Angielski",
						"Miejscowosc",
						"Nazwisko");
						$_SESSION['tab_w']=$tab_war;
					}
					
					$_SESSION['wyb2']=$wyb2;
					$_SESSION['wyb3']=$wyb3;
					$_SESSION['wyb4']=$wyb4;
					$_SESSION['wyb5']=$wyb5;
					if($wyb2=="Nazwisko")$wyb2=$wyb2." ASC";else$wyb2=$wyb2." DESC";
					if($wyb3=="Nazwisko")$wyb3=$wyb3." ASC";else$wyb3=$wyb3." DESC";
					if($wyb4=="Nazwisko")$wyb4=$wyb4." ASC";else$wyb4=$wyb4." DESC";
					if($wyb5=="Nazwisko")$wyb5=$wyb5." ASC";else$wyb5=$wyb5." DESC";
					$result = mysqli_query($polaczenie,"SELECT * FROM glowna WHERE Profil = 'Technik Informatyk' || Profil = 'Technik Elektronik' || Profil = 'Technik Programista' || Profil = 'Technik Automatyk' || Profil = 'Technik Grafiki'  ORDER BY $wyb1 DESC, $wyb2, $wyb3, $wyb4, $wyb5");
					$result_puste= mysqli_query($polaczenie,"SELECT * FROM glowna WHERE Profil IS NULL ORDER BY $wyb1 DESC, $wyb2, $wyb3, $wyb4, $wyb5");
					$result_prf_infor= mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Informatyk' " );
					$result_prf_elktr=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Elektronik'" );
					$result_prf_prog=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Programista'" );
					$result_prf_auto=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Automatyk'" );
					$result_prf_graf=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Grafiki'" );
					$ile = mysqli_num_rows($result);
					$ile2 = mysqli_num_rows($result_puste);
					$ilosc_profi_info=mysqli_num_rows($result_prf_infor);
					$ilosc_profi_elktro=mysqli_num_rows($result_prf_elktr);		
					$ilosc_profi_prog=mysqli_num_rows($result_prf_prog);	
					$ilosc_profi_auto=mysqli_num_rows($result_prf_auto);	
					$ilosc_profi_graf=mysqli_num_rows($result_prf_graf);			
				
if($ile2>0){
	
	mysqli_query($polaczenie,"CREATE TABLE IF NOT EXISTS pusteprofile (
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
									)");
									
									
					
echo<<<END
<tr><th colspan="15" id="prf-css"> Bez profilu</th></tr>
<th width="100" >Błąd</th>
<th width="100"  >Imie</th>
<th width="100" >Nazwisko</th>
<th width="100"  >Kod pocztowy miejsca zamieszkania</th>
<th width="100" >Miejsce zamieszkania</th>
<th width="100" >Ulica</th>
<th width="100" >Nr.domu</th>
<th width="100" >Kod pocztowy miejsca zameldowania</th>
<th width="100" >Nr.domu zameldowania</th>
<th width="100" >Miejsce zameldowania</th>
<th width="100" >Ulica</th>
<th width="50" >Ocena_niem</th>
<th width="50" >Ocena_angi</th>
<th width="50" >Profil</th>
<th width="70" >Działania</th>
</tr><tr>
END;
			$blad=false;
						for ($z = 1; $z <= $ile2; $z++) 
						{
							
							$row = mysqli_fetch_assoc($result_puste);
									$imie = $row['Imie'];
										if(strlen($imie)==0)$blad=true;
										
									$nazwisko = $row['Nazwisko'];
										if(strlen($nazwisko)==0)$blad=true;
										
									$kod_pocztowy = $row['Kod_pocztowy'];
										if(strlen($kod_pocztowy)==0)$blad=true;
										
									$miejscowosc = $row['Miejscowosc'];
										if(strlen($miejscowosc)==0)$blad=true;
										
									$ulica = $row['Ulica'];
										if(strlen($ulica)==0)$blad=true;
										
									$nrdomu = $row['Nrdomu'];
										if(strlen($ulica)==0)$blad=true;
										
									$kod_pocztowy2 = $row['Kod_pocztowy2'];
										if(strlen($kod_pocztowy2)==0)$blad=true;
										
									$nrdomu2=$row['Nrdomu2'];
										if(strlen($nrdomu2)==0)$blad=true;
										
									$miejscowosc2 = $row['Miejscowosc2'];	
										if(strlen($miejscowosc2)==0)$blad=true;
										
									$ulica2=$row['Ulica2'];
										if(strlen($ulica2)==0)$blad=true;
										
									$ocena_n=$row['Ocena_Niemiecki'];
										if(strlen($ocena_n)==0)$blad=true;
										
									$ocena_a=$row['Ocena_Angielski'];
										if(strlen($ocena_a)==0)$blad=true;
										
									$profil=$row['Profil'];
										if(strlen($profil)==0)$blad=true;
										
									if($blad==true){
										echo '<td align="center"><img height="30px" src="v.png"/></td>';
										$blad=false;
									}else 
										echo '<td align="center"><img height="30px" src="x.png"/></td>';
								
							
							
							
								
echo<<<END

<td align="center">$imie</td>
<td align="center">$nazwisko</td>
<td align="center">$kod_pocztowy</td>
<td align="center">$miejscowosc</td>
<td align="center">$ulica</td>
<td align="center">$nrdomu</td>
<td align="center">$kod_pocztowy2</td>
<td align="center">$nrdomu2</td>
<td align="center">$miejscowosc2</td>
<td align="center">$ulica2</td>
<td align="center">$ocena_n</td>
<td align="center">$ocena_a</td>
<td align="center">$profil</td>
<td align="center"> <a href="uzupelnij.php?id=$row[id]"><img src="olowek.png" height="16px" /> <span>Edytuj</span></a>
<div onclick="usuwaniejednego($row[id])" id="usunjednego"><img src="usun.bmp" height="16px" /> <span>Usuń</span></div>
</td>
</tr><tr>
END;

					}				
				}
	if ($ile>=1) 
	{					
						if($ilosc_profi_info>0){
							$odpowiedzi[0]=dejnumer($ilosc_profi_info,$_SESSION['rozmiar']);
							$odp[0]=optymalizuj($odpowiedzi[0],$_SESSION['rozmiar']);
						}else{
							$odpowiedzi[0]=array(0,0,0);
							$odp[0]=0;
						}
						if($ilosc_profi_elktro>0){
							$odpowiedzi[1]=dejnumer($ilosc_profi_elktro,$_SESSION['rozmiar']);
							$odp[1]=optymalizuj($odpowiedzi[1],$_SESSION['rozmiar']);
						}else{
							$odpowiedzi[1]=array(0,0,0);
							$odp[1]=0;
						}

						if($ilosc_profi_prog>0){
							$odpowiedzi[2]=dejnumer($ilosc_profi_prog,$_SESSION['rozmiar']);
							$odp[2]=optymalizuj($odpowiedzi[2],$_SESSION['rozmiar']);
						}else{
							$odpowiedzi[2]=array(0,0,0);
							$odp[2]=0;
						}

						if($ilosc_profi_auto>0){
							$odpowiedzi[3]=dejnumer($ilosc_profi_auto,$_SESSION['rozmiar']);
							$odp[3]=optymalizuj($odpowiedzi[3],$_SESSION['rozmiar']);
						}else{
							$odpowiedzi[3]=array(0,0,0);
							$odp[3]=0;
						}

						if($ilosc_profi_graf>0){
							$odpowiedzi[4]=dejnumer($ilosc_profi_graf,$_SESSION['rozmiar']);
							$odp[4]=optymalizuj($odpowiedzi[4],$_SESSION['rozmiar']);
						}else{
							$odpowiedzi[4]=array(0,0,0);
							$odp[4]=0;
						}


						$checksum=0;
						for($i=0;$i<$odpowiedzi[0][2];$i++){
							$checksum+=$odp[0][$i];
						}	
						for($j=0;$j<$odpowiedzi[1][2];$j++){
							$checksum+=$odp[1][$j];
						}	
						for($j=0;$j<$odpowiedzi[2][2];$j++){
							$checksum+=$odp[2][$j];
						}	
						for($j=0;$j<$odpowiedzi[3][2];$j++){
							$checksum+=$odp[3][$j];
						}	
						for($j=0;$j<$odpowiedzi[4][2];$j++){
							$checksum+=$odp[4][$j];
						}
			if($checksum==$ile)
			{
							for($x=0;$x<5;$x++){	
								$litera='A';
								for($y=0;$y<$odpowiedzi[$x][2];$y++,$litera++){
									$grupa='Grupa I';

					$blad=false;
					
						for ($z = 1; $z <= $odp[$x][$y]; $z++) 
						{
							if(round($odp[$x][$y]/2) == $z-1){
								$grupa="Grupa II";		
								
								}
							$row = mysqli_fetch_assoc($result);
									$idrow = $row['id'];
									$imie = $row['Imie'];
									$nazwisko = $row['Nazwisko'];
									$kod_pocztowy = $row['Kod_pocztowy'];				
									$miejscowosc = $row['Miejscowosc'];										
									$ulica = $row['Ulica'];										
									$nrdomu = $row['Nrdomu'];										
									$kod_pocztowy2 = $row['Kod_pocztowy2'];										
									$nrdomu2=$row['Nrdomu2'];										
									$miejscowosc2 = $row['Miejscowosc2'];											
									$ulica2=$row['Ulica2'];								
									$ocena_n=$row['Ocena_Niemiecki'];										
									$ocena_a=$row['Ocena_Angielski'];										
									$profil=$row['Profil'];
																							
								if($grupa=="Grupa II")$nazwaSubTabeli = $litera.$pro[$x]."gr2";
								if($grupa=="Grupa I")$nazwaSubTabeli = $litera.$pro[$x]."gr1";
									
								mysqli_query($polaczenie,"CREATE TABLE IF NOT EXISTS $nazwaSubTabeli (
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
											) CHARACTER SET=utf8");
											
									
							$newtableRows = mysqli_query($polaczenie,"SELECT * FROM $nazwaSubTabeli");
							$newtableRows = mysqli_num_rows($newtableRows);
									
									
							if(( $newtableRows < $odp[$x][$y] ) && $allUcz)
							{
									mysqli_query($polaczenie,"INSERT INTO $nazwaSubTabeli (id, Imie, Nazwisko, Kod_pocztowy, Miejscowosc, Ulica, Nrdomu, Kod_pocztowy2, Miejscowosc2, Ulica2, Nrdomu2, Ocena_Niemiecki, Ocena_Angielski, Profil) 
									VALUES ('$idrow','$imie','$nazwisko','$kod_pocztowy','$miejscowosc','$ulica','$nrdomu','$kod_pocztowy2','$miejscowosc2','$ulica2','$nrdomu2','$ocena_n','$ocena_a','$profil')");
							}
						}
					}
				}
				

			}else{
					echo '<script language="javascript">';
					echo 'alert("Niezgodna ilosc uczniów")';
					echo '</script>';
			}
			
	}
if ($ile>=1) {
	for($x=0;$x<5;$x++){	
								$checkbuf=0;
								$litera='a';
								for($y=0,$n=0;$y<$odpowiedzi[$x][2]*2;$y++,$checkbuf++){
									$grupa='Grupa I';
									
				if($checkbuf%2==0)
				{
					
					$nazwaSubTabeli = $litera.$pro[$x]."gr1";
					$result=$polaczenie->query("SELECT * FROM $nazwaSubTabeli ORDER BY Nazwisko");
					if($result){
						$ileuczniow=mysqli_num_rows($result);
						echo'<tr><th colspan="15" id="wychowawcadruk"> 1'.$litera.$pro[$x].' ( '.$odp[$x][$n].' ) &nbsp&nbsp Wychowawca: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</th></tr>';		
						$Overflow=$ileuczniow;
					}
echo<<<END

<th width="100"  >Imie</th>
<th width="100" >Nazwisko</th>
<th width="100"  >Kod pocztowy miejsca zamieszkania</th>
<th width="100" >Miejsce zamieszkania</th>
<th width="100" >Ulica</th>
<th width="100" >Nr.domu</th>
<th width="100" >Kod pocztowy miejsca zameldowania</th>
<th width="100" >Nr.domu zameldowania</th>
<th width="100" >Miejsce zameldowania</th>
<th width="100" >Ulica</th>
<th width="50" >Ocena_niem</th>
<th width="50" >Ocena_angi</th>
<th width="50" >Profil</th>
</tr><tr>
END;
 
echo'<tr><th colspan="15" id="prf-css"> '.$grupa.' ( '.$ileuczniow.' )'.'</th></tr>';
					
				}else {
					$nazwaSubTabeli = $litera.$pro[$x]."gr2";
					$result=$polaczenie->query("SELECT * FROM $nazwaSubTabeli ORDER BY Nazwisko");
					if($result){
						$ileuczniow=mysqli_num_rows($result);
						$litera++; 
						$n++;
						$grupa="Grupa II";		
							echo'<tr><th colspan="15" id="prf-css">'.$grupa.' ( '.$ileuczniow.' )'.'</th></tr>';
							$Overflow+=$ileuczniow;
					}							
				}
					$blad=false;
					
						for ($z = 1; $z <= $ileuczniow && $result; $z++) 
						{
								
							$row = mysqli_fetch_assoc($result);
									$imie = $row['Imie'];
									$nazwisko = $row['Nazwisko'];
									$kod_pocztowy = $row['Kod_pocztowy'];				
									$miejscowosc = $row['Miejscowosc'];										
									$ulica = $row['Ulica'];										
									$nrdomu = $row['Nrdomu'];										
									$kod_pocztowy2 = $row['Kod_pocztowy2'];										
									$nrdomu2=$row['Nrdomu2'];										
									$miejscowosc2 = $row['Miejscowosc2'];											
									$ulica2=$row['Ulica2'];								
									$ocena_n=$row['Ocena_Niemiecki'];										
									$ocena_a=$row['Ocena_Angielski'];										
									$profil=$row['Profil'];
										
										
							
echo<<<END

<td align="center">$imie</td>
<td align="center">$nazwisko</td>
<td align="center">$kod_pocztowy</td>
<td align="center">$miejscowosc</td>
<td align="center">$ulica</td>
<td align="center">$nrdomu</td>
<td align="center">$kod_pocztowy2</td>
<td align="center">$nrdomu2</td>
<td align="center">$miejscowosc2</td>
<td align="center">$ulica2</td>
<td align="center">$ocena_n</td>
<td align="center">$ocena_a</td>
<td align="center">$profil</td>
</tr><tr>
END;
		
						}
				}		
	}
}
						@mysqli_close($polaczenie);
}catch(Exception $e){
echo "Wystąpił błąd";
echo "Info developerskie ".$e;
}

?>
<script>
	window.print();
</script>
</tr></table>
<div>
</body>
</html>

