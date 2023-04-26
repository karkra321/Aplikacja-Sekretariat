<?php
session_start();

?>
<html>

	<head>
		<title> Uzupelnij </title>
		<link rel="Stylesheet" type="text/css" href="nowycss.css" />
		<script type="text/javascript" src="Skrypty.js"></script>
	</head>
	<body>
	<div id="caly">
		<header>	
				<div>
					<h1 style="font-size:300%;">Edytuj dane</h1>
					<div class="scratch"></div>
				</div>
		 </header>

<?PHP
		$id1=$_GET['id'];
		$_SESSION['id_P']=$id1;
		require_once "connection.php";
		try{
			$polaczenie= new mysqli($host,$db_name,$db_password,$base);
			$polaczenie->query('SET NAMES utf8');
			$result=$polaczenie->query("SELECT * FROM glowna WHERE id = $id1");
			$row=mysqli_fetch_assoc($result);

			$imie = $row['Imie'];
			$nazwisko = $row['Nazwisko'];								
			$kod_pocztowy = $row['Kod_pocztowy'];
			if(strlen($kod_pocztowy)!=0){
				$kodP1=$kod_pocztowy[0].$kod_pocztowy[1];
				$kodP2=$kod_pocztowy[3].$kod_pocztowy[4].$kod_pocztowy[5];
			}else{
				$kodP1="";
				$kodP2="";
			}
			$miejscowosc = $row['Miejscowosc'];
			$ulica = $row['Ulica'];
			$nrdomu = $row['Nrdomu'];
			$kod_pocztowy2 = $row['Kod_pocztowy2'];	
			if(strlen($kod_pocztowy2)!=0){
				$kodP1_2=$kod_pocztowy2[0].$kod_pocztowy2[1];
				$kodP2_2=$kod_pocztowy2[3].$kod_pocztowy2[4].$kod_pocztowy2[5];
			}else{
				$kodP1_2="";
				$kodP2_2="";
				}
			$nrdomu2=$row['Nrdomu2'];
			$miejscowosc2 = $row['Miejscowosc2'];											
			$ulica2=$row['Ulica2'];										
			$ocena_n=$row['Ocena_Niemiecki'];	
				if($ocena_n==0)
					$ocena_n="";
			$ocena_a=$row['Ocena_Angielski'];
					if($ocena_a==0)
					$ocena_a="";
			$Profil=$row['Profil'];
			$Profil2="Technik Elektronik";
			$Profil3="Technik Programista";
			$Profil4="Technik Automatyk";
			$Profil5="Technik Grafiki";
			if($Profil==""){
			$Profil="Technik Informatyk";
			$Profil2="Technik Elektronik";
			$Profil3="Technik Programista";
			$Profil4="Technik Automatyk";
			$Profil5="Technik Grafiki";
			}
			else if($Profil=="Technik Informatyk")
				$Profil2="Technik Elektronik";
			else if($Profil=="Technik Elektronik")
				$Profil2="Technik Informatyk";
			else if($Profil=="Technik Programista")
				$Profil3="Technik Informatyk";
			else if($Profil=="Technik Automatyk")
				$Profil4="Technik Informatyk";
			else if($Profil=="Technik Grafiki")
				$Profil5="Technik Informatyk";

echo<<<END
	 
		<form id="Form_wpisywanie" method="post" action="management_uzupelnij.php">
			<div class="container">
				<div class="cal">
					<div class="dnap"> Imię: </div>
					<div class="for"> <input id="imie" type="text" name="name" value="$imie"/> </div>
				</div>

				<div class="cal">
					<div class="dnap"> Nazwisko: </div>

					<div class="for">	<input id="nazwisko" type="text" name="surname" value="$nazwisko"/> </div>
				</div>

				<div class="cal">
					<div class="dnap"> Adres zamieszkania: </div>
					<div class="for"> <input id="kod_p1" type="text" maxlength="2" placeholder="--" name="post_code1_1" value="$kodP1"/> - <input id="kod_p2" type="text" maxlength="3" placeholder="---"name="post_code1_2" value="$kodP2"/> 
					<input  id="Miejscowosc" type="text" name="City1" placeholder="Miejscowość" value="$miejscowosc"/> </div>
				</div>
				<div class="cal">
					<div class="dnap"></div>
					<div class="for"> <input id="ulica" type="text" name="street_1" placeholder="Ulica" value="$ulica"/> <input id="nr_dom" type="text" name="home_number_1" placeholder="Nr.dom" value="$nrdomu"/> </div>		 		
				</div>
				
				<div class="cal">
					<label>
						<div class="dnap"> <input id="checkbox" type="checkbox" onchange="copyForm(this);"/> </div>
						<div class="for"> Adres zamieszkania jest taki sam jak zameldowania </div>				
					</label>
				</div>	
		
				<div class="cal">
					<div class="dnap"> Adres zameldowania: </div>
					<div class="for"> <input id="kod_p12" type="text" maxlength="2" placeholder="--" name="post_code2_1" value="$kodP1_2"/> - <input id="kod_p22" type="text" maxlength="3" placeholder="---"name="post_code2_2" value="$kodP2_2"/> 
					<input id="Miejscowosc2" type="text" name="City2" placeholder="Miejscowość" value="$miejscowosc2"/> </div>
				</div>
				<div class="cal">
					<div class="dnap"> </div>
					<div class="for"> <input id="ulica2" type="text"name="street_2" placeholder="Ulica" value="$ulica2"/> <input id="nr_dom2" type="text"name="home_number_2" placeholder="Nr.dom" value="$nrdomu2"/> </div>		
				</div>			

				<div class="cal">
					<div class="dnap"> Oceny: </div>
					<div class="for"> <input id="ocena_niemiecki"  type="text" maxlength="1" name="Mark_D" placeholder="Niem" value="$ocena_n"/>	<input id="ocena_angielski"  type="text" maxlength="1" name="Mark_E" placeholder="Ang" value="$ocena_a"/> </div>
				</div>

				<div class="cal">
					<div class="dnap"> Profil: </div>
					<div class="for"> 
						<select class="select_anim" name ="sel" id="sel">
							<option>$Profil</option>
							<option>$Profil2</option>	
							<option>$Profil3</option>	
							<option>$Profil4</option>	
							<option>$Profil5</option>	
						</select>
					</div>
				</div>
				
				<div class="cal">
					<div class="dnap"> </div>
					<div class="for"> <input class="przycisk_dodaj" id="przycisk_dodaj" type="submit" value="ZATWIERDŹ"/> </div>
				</div>	
			</div>
		</form>
END;
		@mysqli_close($polaczenie);
		}catch(Exception $e){
		echo "Wystąpił błąd";
		echo "Info developerskie ".$e;
		}
							
?>		
	</div>			
	</body>
</html>