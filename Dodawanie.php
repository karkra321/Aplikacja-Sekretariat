<?php
session_start();

?>
<html>

	<head>
		<title> Formularz rekrutacyjny </title>
		<link rel="Stylesheet" type="text/css" href="nowycss.css" />
		<script type="text/javascript" src="Skrypty.js"></script>
	</head>
	<body>
	<div id="caly">
		<header>	
				<div>
					<h1 style="font-size:300%;">Formularz rekrutacyjny</h1>
					<div class="scratch"></div>
				</div>
		 </header>

		 
		<form id="Form_wpisywanie" method="post" action="management.php">
			<div class="container">
				<div class="cal">
					<div class="dnap"> Imię: </div>
					<div class="for"> <input id="imie" type="text" name="name"/> </div>
				</div>
<?php 
						if(isset($_SESSION['e_name'])){
							echo '<span class="blad"> '.$_SESSION['e_name'].'</span>';
							unset($_SESSION['e_name']);
							}
?>				
				<div class="cal">
					<div class="dnap"> Nazwisko: </div>

					<div class="for">	<input id="nazwisko" type="text" name="surname"/> </div>
				</div>
<?php 
							if(isset($_SESSION['e_surname'])){
							echo '<span class="blad"> '.$_SESSION['e_surname'].'</span>';
							unset($_SESSION['e_surname']);
							}
?>				
				<div class="cal">
					<div class="dnap"> Adres zamieszkania: </div>
					<div class="for"> <input id="kod_p1" type="text" maxlength="2" placeholder="--" name="post_code1_1"/> - <input id="kod_p2" type="text" maxlength="3" placeholder="---"name="post_code1_2"/> 
					<input  id="Miejscowosc" type="text" name="City1" placeholder="Miejscowość"/> </div>
				</div>
				<div class="cal">
					<div class="dnap"></div>
					<div class="for"> <input id="ulica" type="text" name="street_1" placeholder="Ulica"/> <input id="nr_dom" type="text" name="home_number_1" placeholder="Nr.dom"/> </div>		 		
				</div>
<?PHP
							if(isset($_SESSION['e_adres'])){
								echo '<span class="blad"> '.$_SESSION['e_adres'].'</span>';
								unset($_SESSION['e_adres']);
							}
?>
				<div class="cal">
					<label>
					<div class="dnap"> <input id="checkbox" type="checkbox" onchange="copyForm(this);"/> </div>
					<div class="for"> Adres zamieszkania jest taki sam jak zameldowania </div>				
					</label>
				</div>			
				
				
				<div class="cal">
					<div class="dnap"> Adres zameldowania: </div>
					<div class="for"> <input id="kod_p12" type="text" maxlength="2" placeholder="--" name="post_code2_1"/> - <input id="kod_p22" type="text" maxlength="3" placeholder="---"name="post_code2_2"/> 
					<input id="Miejscowosc2" type="text" name="City2" placeholder="Miejscowość"/> </div>
				</div>
				<div class="cal">
					<div class="dnap"> </div>
					<div class="for"> <input id="ulica2" type="text"name="street_2" placeholder="Ulica"/> <input id="nr_dom2" type="text"name="home_number_2" placeholder="Nr.dom"/> </div>		
				</div>			
<?php 
							if(isset($_SESSION['e_adres2'])){
								echo '<span class="blad"> '.$_SESSION['e_adres2'].'</span>';
								unset($_SESSION['e_adres2']);
							}					
?>	
			
				
				<div class="cal">
					<div class="dnap"> Oceny: </div>
					<div class="for"> <input id="ocena_niemiecki"  type="text" maxlength="1" name="Mark_D" placeholder="Niem"/>	<input id="ocena_angielski"  type="text" maxlength="1" name="Mark_E" placeholder="Ang"/> </div>
				</div>
<?php 
							if(isset($_SESSION['e_ocena'])){
								echo '<span class="blad"> '.$_SESSION['e_ocena'].'</span>';
								unset($_SESSION['e_ocena']);
							}							
?>	
				<div class="cal">
					<div class="dnap"> Profil: </div>
					<div class="for"> 
						<select class="select_anim" name ="sel">
							<option>Technik Informatyk</option>
							<option>Technik Elektronik</option>	
							<option>Technik Programista</option>	
							<option>Technik Automatyk</option>	
							<option>Technik Grafiki</option>	
						</select>
					</div>
				</div>
				
				<div class="cal">
					<div class="dnap"></div>
					<div class="for" id="div_import"> <input class="przycisk_dodaj" id="przycisk_dodaj" type="submit" value="ZATWIERDŹ"/>
					<a href="index.php"> <div class="przycisk_raport"> POKAŻ WYNIKI</div></a></div></div></form>					
				<div class="cal">
				<div class="dnap"></div>				
				<div class="for" id="przyciski_dodawanie">
					<p id="napis_w_imporcie">Import pliku</p>
					<form  method="POST" enctype="multipart/form-data" action="Wczytywaniecsvphp.php">	
					<div class="przycisk_import"> WYBIERZ PLIK <input class="import" type="file" name="plik"/></div>
					<input class="przycisk_wyslij" type="submit" value="WYŚLIJ PLIK"/>
					</form></div>
				</div>
	
<?php 
							if(isset($_SESSION['Gotowe'])){
								echo '<span class="succes"> '.$_SESSION['Gotowe'].'</span>';
								unset($_SESSION['Gotowe']);
							}						
?>		


		
<?php 
							if(isset($_SESSION['e_wybor'])){
								echo '<span id="blad"> '.$_SESSION['e_wybor'].'</span>';			
								unset($_SESSION['e_wybor']);
							}
							echo'</br>';
?>	
<?php 
							if(isset($_SESSION['Gotowe'])){
								echo '<span class="succes"> '.$_SESSION['Gotowe'].'</span>';
								unset($_SESSION['Gotowe']);
							}
							echo'</br>';
?>	
			</footer>
	</div>			
	</body>
</html>