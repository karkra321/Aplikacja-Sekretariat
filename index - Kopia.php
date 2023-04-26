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
					 
					$_SESSION['tab_w']=$tab_war;
					if($wyb2==$wyb3 ||$wyb2==$wyb4 ||$wyb3==$wyb4 ){
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
						$tab_war=array(
						"Ocena_Niemiecki",
						"Ocena_Angielski",
						"Miejscowosc");
						$_SESSION['tab_w']=$tab_war;
					}	
		if(!isset($_POST['roz_klasy'])){
			$_SESSION['rozmiar']=36;
		}else
			$_SESSION['rozmiar']=$_POST['roz_klasy'];

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
	
	$pro[0]="TI";
	$pro[1]="TE";
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
		
?>

<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
    <title>Rezultat zapytania</title>
	<link rel="Stylesheet" type="text/css" href="cssraport.css" />
	<script src="usuwanieall.js"></script>
	<script src="usuwaniejednego.js"></script>
	
	<script type="text/javascript">
		function FunWielkosc(obj){
			if(obj.value=="")
				obj.value=<?PHP echo $_SESSION['rozmiar']; ?>
		}
		
	</script>
	
</head>

<body>

<div class="caly">
	<div class="lacz">	

		
		<h1  style="font-size:300%"> Uczniowie</h1>
		<div class="scratch"></div> 
			<center>
			
			<a href="Dodawanie.php"><div class="dodaj">Dodaj ucznia</div></a>
			<a href="GenerujCsv.php"><div class="dodaj">Generuj plik</div></a>
			<div class="dodaj" onclick="usuwanieall()">Usun wszystkich</div>
			<a href="druk.php"><div class="dodaj">Drukuj</div></a>
			</center>
		
		
		<div id="sort">
			<form  method="POST" enctype="multipart/form-data">
			
			<select id="wyb1" name="wyb2" class="select_sort">
				<?PHP elo($_SESSION['tab_w'],0); ?>
			</select>
			
			<select id="wyb3" name="wyb3" class="select_sort">
				<?PHP elo($_SESSION['tab_w'],1); ?>
			</select>
			
			<select id="wyb4" name="wyb4" class="select_sort">
				<?PHP elo($_SESSION['tab_w'],2); ?>
			</select>
			
			<center>
				<div id="greentest">	
				
					<div id="allUcz">
						<label> <span><b>Liczba uczniów:</b></span>
							<input type="text" disabled="disabled"maxlength="4" size="4" value="<?PHP echo $allUcz;?>"/>
						</label>	
					</div>
				
					<label> <span><b>Wielkość klasy</b></span>
						<input type="text" class="input_w" maxlength="2" size="2" value="<?PHP echo $_SESSION['rozmiar']; ?>" name="roz_klasy" onblur="FunWielkosc(this)"/>
						<input id="button"  class="sortuj" type="submit" value="Sortuj" name="sorton"/>
					</label>	
					
				</div>	
			</center>
			

						
			</div>
							
				
		
			</form>
				
		</div>
	<div id="rozmiar_k">

	</div>
		<?php 
						if(isset($_SESSION['sort'])){
							echo '<div class="blad"> '.$_SESSION['sort'].'</div>'.'</br>';
							unset($_SESSION['sort']);
							}
						
?>
<table align="center" cellpadding="0" cellspacing="0" id="maintable">     
<tr>

<?PHP
require_once "funkcjeopty.php";
try{
								
					$wyb1="Profil";
					if(isset($_POST['wyb2'])){
						$wyb2=$_POST['wyb2']; $wyb2=str_replace(' ','_',$wyb2);$tab_war[0]=$wyb2;
						$wyb3=$_POST['wyb3']; $wyb3=str_replace(' ','_',$wyb3);$tab_war[1]=$wyb3;
						$wyb4=$_POST['wyb4']; $wyb4=str_replace(' ','_',$wyb4);$tab_war[2]=$wyb4;
						 
						$_SESSION['tab_w']=$tab_war;
						if($wyb2==$wyb3 ||$wyb2==$wyb4 || $wyb3==$wyb4 ){
							$_SESSION['sort']="Co najmniej dwa kryteria były takie same";
							unset($wyb2);
							unset($wyb3);
							unset($wyb4);
						header('Location:index.php');
						}
					}else {
						$wyb2="Ocena_Niemiecki";
						$wyb3="Ocena_Angielski";
						$wyb4="Miejscowosc";
						$tab_war=array(
						"Ocena_Niemiecki",
						"Ocena_Angielski",
						"Miejscowosc");
						$_SESSION['tab_w']=$tab_war;
					}
					
					$_SESSION['wyb2']=$wyb2;
					$_SESSION['wyb3']=$wyb3;
					$_SESSION['wyb4']=$wyb4;
					
					if($wyb2 == "Ocena_Niemiecki") $wyb2=$wyb2." DESC";
					if($wyb3 == "Ocena_Niemiecki") $wyb3=$wyb3." DESC";
					if($wyb4 == "Ocena_Niemiecki") $wyb4=$wyb4." DESC";
					if($wyb2 == "Ocena_Angielski") $wyb2=$wyb2." DESC";
					if($wyb3 == "Ocena_Angielski") $wyb3=$wyb3." DESC";
					if($wyb4 == "Ocena_Angielski") $wyb4=$wyb4." DESC";
					
					$result = mysqli_query($polaczenie,"SELECT * FROM glowna WHERE Profil = 'Technik Informatyk' || Profil = 'Technik Elektronik' ORDER BY $wyb1 DESC, $wyb2, $wyb3, $wyb4");
					$result_puste= mysqli_query($polaczenie,"SELECT * FROM glowna WHERE Profil IS NULL ORDER BY $wyb1 DESC, $wyb2, $wyb3, $wyb4");
					$result_prf_infor= mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Informatyk' " );
					$result_prf_elktr=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Elektronik'" );
					$ile = mysqli_num_rows($result);
					$ile2 = mysqli_num_rows($result_puste);
					$ilosc_profi_info=mysqli_num_rows($result_prf_infor);
					$ilosc_profi_elktro=mysqli_num_rows($result_prf_elktr);				
				
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
<tr><th colspan="12" id="prf-css"> Bez profilu</th></tr>
<th width="100" >Błąd</th>
<th width="100" >Lp.</th>
<th width="100"  >Imie</th>
<th width="100" >Nazwisko</th>
<th width="100"  >Kod pocztowy miejsca zamieszkania</th>
<th width="100" >Miejsce zamieszkania</th>
<th width="100" >Ulica</th>
<th width="100" >Nr.domu</th>
<!--<th width="100" >Kod pocztowy miejsca zameldowania</th>
<th width="100" >Nr.domu zameldowania</th>
<th width="100" >Miejsce zameldowania</th>
<th width="100" >Ulica</th>-->
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

<td align="center">$z</td>
<td align="center">$imie</td>
<td align="center">$nazwisko</td>
<td align="center">$kod_pocztowy</td>
<td align="center">$miejscowosc</td>
<td align="center">$ulica</td>
<td align="center">$nrdomu</td>
<!--<td align="center">$kod_pocztowy2</td>
<td align="center">$nrdomu2</td>
<td align="center">$miejscowosc2</td>
<td align="center">$ulica2</td>-->
<td align="center">$ocena_n</td>
<td align="center">$ocena_a</td>
<td align="center">$profil</td>
<td align="center"> <a href="uzupelnij.php?id=$row[id]"><img src="olowek.png" height="16px" /> <span>Edytuj</span></a>
<a onclick="usuwaniejednego($row[id])" id="usunjednego"><img src="usun.bmp" height="16px" /><span>Usuń</span></a>
</td>
</tr><tr>
END;
//<div onclick="usuwaniejednego($row[id])" id="usunjednego"><img src="usun.bmp" height="16px" /> <span>Usuń</span></div>
					}				
				}
	if ($ile>=1) 
	{					
						if($ilosc_profi_info>0){
							$odpowiedzi[0]=dejnumer($ilosc_profi_info,$_SESSION['rozmiar']);
							$odp[0]=optymalizuj($odpowiedzi[0],$_SESSION['rozmiar']);
							$odp[0]=rest($odp[0]);
						}else{
							$odpowiedzi[0]=array(0,0,0);
							$odp[0]=0;
						}
						if($ilosc_profi_elktro>0){
							$odpowiedzi[1]=dejnumer($ilosc_profi_elktro,$_SESSION['rozmiar']);
							$odp[1]=optymalizuj($odpowiedzi[1],$_SESSION['rozmiar']);
							$odp[1]=rest($odp[1]);
						}else{
							$odpowiedzi[1]=array(0,0,0);
							$odp[1]=0;
						}
						$checksum=0;
						for($i=0;$i<$odpowiedzi[0][2];$i++){
							$checksum+=$odp[0][$i];
						}	
						for($j=0;$j<$odpowiedzi[1][2];$j++){
							$checksum+=$odp[1][$j];
						}
			if($checksum==$ile)
			{
							for($x=0;$x<2;$x++){	
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
	for($x=0;$x<2;$x++){	
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
						echo'<tr><th colspan="12" id="wychowawca"> 1'.$litera.$pro[$x].' ( '.$odp[$x][$n].' )</th></tr>';
					}
echo<<<END
<th width="100" >Błąd</th>
<th width="100" >Lp.</th>
<th width="100"  >Imie</th>
<th width="100" >Nazwisko</th>
<th width="100"  >Kod pocztowy miejsca zamieszkania</th>
<th width="100" >Miejsce zamieszkania</th>
<th width="100" >Ulica</th>
<th width="100" >Nr.domu</th>
<!--<th width="100" >Kod pocztowy miejsca zameldowania</th>
<th width="100" >Nr.domu zameldowania</th>
<th width="100" >Miejsce zameldowania</th>
<th width="100" >Ulica</th>-->
<th width="50" >Ocena_niem</th>
<th width="50" >Ocena_angi</th>
<th width="50" >Profil</th>
<th width="70" >Działania</th>
</tr><tr>
END;
 
echo'<tr><th colspan="12" id="prf-css"> '.$grupa.' ( '.$ileuczniow.' )'.'</th></tr>';
					
				}else {
					$nazwaSubTabeli = $litera.$pro[$x]."gr2";
					$result=$polaczenie->query("SELECT * FROM $nazwaSubTabeli ORDER BY Nazwisko");
					if($result){
						$ileuczniow=mysqli_num_rows($result);
					$litera++; 
					$n++;
					$grupa="Grupa II";		
							echo'<tr><th colspan="12" id="prf-css">'.$grupa.' ( '.$ileuczniow.' )'.'</th></tr>';
					}							
				}
					$blad=false;
					
						for ($z = 1; $z <= $ileuczniow && $result; $z++) 
						{
								
							$row2 = mysqli_fetch_assoc($result);
									$imie = $row2['Imie'];
										if(strlen($imie)==0)$blad=true;
										
										
									$nazwisko = $row2['Nazwisko'];
										if(strlen($nazwisko)==0)$blad=true;
										
									$kod_pocztowy = $row2['Kod_pocztowy'];
										if(strlen($kod_pocztowy)==0)$blad=true;
				
									$miejscowosc = $row2['Miejscowosc'];
										if(strlen($miejscowosc)==0)$blad=true;
										
									$ulica = $row2['Ulica'];
										if(strlen($ulica)==0)$blad=true;
										
									$nrdomu = $row2['Nrdomu'];
										if(strlen($nrdomu)==0)$blad=true;
										
									$kod_pocztowy2 = $row2['Kod_pocztowy2'];
										if(strlen($kod_pocztowy2)==0)$blad=true;
										
									$nrdomu2=$row2['Nrdomu2'];
										if(strlen($nrdomu2)==0)$blad=true;
										
									$miejscowosc2 = $row2['Miejscowosc2'];	
										if(strlen($miejscowosc2)==0)$blad=true;
										
									$ulica2=$row2['Ulica2'];
										if(strlen($ulica2)==0)$blad=true;
										
									$ocena_n=$row2['Ocena_Niemiecki'];
										if(strlen($ocena_n)==0)$blad=true;
										
									$ocena_a=$row2['Ocena_Angielski'];
										if(strlen($ocena_a)==0)$blad=true;
										
									$profil=$row2['Profil'];
										if(strlen($profil)==0)$blad=true;
										
									if($blad==true){
										echo '<td align="center"><img height="30px" src="v.png"/></td>';
										$blad=false;
									}else 
										echo '<td align="center"><img height="30px" src="x.png"/></td>';
echo<<<END

<td align="center">$z</td>
<td align="center">$imie</td>
<td align="center">$nazwisko</td>
<td align="center">$kod_pocztowy</td>
<td align="center">$miejscowosc</td>
<td align="center">$ulica</td>
<td align="center">$nrdomu</td>
<!--<td align="center">$kod_pocztowy2</td>
<td align="center">$nrdomu2</td>
<td align="center">$miejscowosc2</td>
<td align="center">$ulica2</td>-->
<td align="center">$ocena_n</td>
<td align="center">$ocena_a</td>
<td align="center">$profil</td>
<td align="center"> <a href="uzupelnij.php?id=$row2[id]"><img src="olowek.png" height="16px" /> <span>Edytuj</span></a>
<a onclick="usuwaniejednego($row2[id])" id="usunjednego"><img src="usun.bmp" height="16px" /><span>Usuń</span></a></td>
</tr><tr>
END;
		
						}
						
							
						
				}
	}
}	
						@mysqli_close($polaczenie);
}catch(Exceptions $e){
echo "Error #42 72 6f 6b 65 6e 20 41 72 72 6f 77";
echo $e;
}

?>
</tr></table>
</div>
</body>
</html>

