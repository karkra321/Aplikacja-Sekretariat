<?PHP
	session_start();
		if(!isset($_SESSION['wyb2'])){
			header('Location:index.php');
		}
	require_once "connection.php";
	require_once "funkcjeopty.php";
		
			$wyb1="Profil";
			$wyb2=$_SESSION['wyb2'];
			$wyb3=$_SESSION['wyb3'];
			$wyb4=$_SESSION['wyb4'];

			try{
				$polaczenie= new mysqli($host,$db_name,$db_password,$base);
				$polaczenie->query('SET NAMES utf8');
				if($fp = fopen('Uczniowie.csv', 'w')){
				
					$result = mysqli_query($polaczenie,"SELECT * FROM glowna WHERE Profil = 'Technik Informatyk' || Profil = 'Technik Elektronik' || Profil = 'Technik Programista' || Profil = 'Technik Automatyk' || Profil = 'Technik Grafiki'  ORDER BY $wyb1 DESC, $wyb2 DESC, $wyb3 DESC, $wyb4 DESC");
					$result_prf_infor= mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Informatyk' " );
					$result_prf_elktr=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Elektronik'" );
					$result_prf_prog=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Programista'" );
					$result_prf_auto=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Automatyk'" );
					$result_prf_graf=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Grafiki'" );
					$ilosc_profi_info=mysqli_num_rows($result_prf_infor);
					$ilosc_profi_elktro=mysqli_num_rows($result_prf_elktr);	
					$ilosc_profi_prog=mysqli_num_rows($result_prf_prog);	
					$ilosc_profi_auto=mysqli_num_rows($result_prf_auto);	
					$ilosc_profi_graf=mysqli_num_rows($result_prf_graf);
					
					$odpowiedzi[0]=dejnumer($ilosc_profi_info,$_SESSION['rozmiar']);		
					$odpowiedzi[1]=dejnumer($ilosc_profi_elktro,$_SESSION['rozmiar']);
					$odpowiedzi[2]=dejnumer($ilosc_profi_prog,$_SESSION['rozmiar']);
					$odpowiedzi[3]=dejnumer($ilosc_profi_auto,$_SESSION['rozmiar']);
					$odpowiedzi[4]=dejnumer($ilosc_profi_graf,$_SESSION['rozmiar']);
	
					$odp[0]=optymalizuj($odpowiedzi[0]);
					$odp[1]=optymalizuj($odpowiedzi[1]);
					$odp[2]=optymalizuj($odpowiedzi[2]);
					$odp[3]=optymalizuj($odpowiedzi[3]);
					$odp[4]=optymalizuj($odpowiedzi[4]);
		
					$pro[0]="TP";
					$pro[1]="TI";
					$pro[2]="TG";
					$pro[3]="TE";
					$pro[4]="TA";
					$Tabelname=array('Imie', 'Nazwisko', 'Kod pocztowy miejsca zamieszkania','Miejsce zamieszkania','Ulica','Nr.Domu',
					'Kod pocztowy miejsca zameldownia','Nr.Domu zameldowania','Miejsce zamledowania','Ulica Zameldownia','Ocena Niemiecki','Ocena Angielski',
					'Profil');
					$grupa1=array("Grupa I");
					$grupa2=array("Grupa II");
					fputs($fp, $bom=(chr(0xef).chr(0xbb).chr(0xbf)));
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
								$kalsa_iloscuczniow=array($litera.$pro[$x].' ( '.$odp[$x][$n].' )');
								fputcsv($fp,$kalsa_iloscuczniow);
								
							}
							fputcsv($fp, $Tabelname,";");
		 
							$kalsa_iloscuczniow=array($grupa.' ( '.$ileuczniow.' )');
							fputcsv($fp,$kalsa_iloscuczniow);
						}else {
							$nazwaSubTabeli = $litera.$pro[$x]."gr2";
							if($odp[$x][$n]<=20) {$checkbuf=-1;$litera++;continue;}
							$result=$polaczenie->query("SELECT * FROM $nazwaSubTabeli ORDER BY Nazwisko");
							if($result){
								$ileuczniow=mysqli_num_rows($result);
							$litera++; 
							$n++;
							$grupa="Grupa II";		
									$kalsa_iloscuczniow=array($grupa.' ( '.$ileuczniow.' )');
									fputcsv($fp,$kalsa_iloscuczniow);
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
												$uczen=array($imie,$nazwisko,$kod_pocztowy,$miejscowosc,$ulica,$nrdomu,$kod_pocztowy2,$nrdomu2,
															 $miejscowosc2,$ulica2,$ocena_n,$ocena_a,$profil);
												
												fputcsv($fp, $uczen,";");
				
								}
								
								
							
					}
		}		

				
							fclose($fp);
							//@mysql_close($polaczenie);
	
				}else{
						$_SESSION['errcatch']="Problem z otwarciem. Inny proces uzywa pliku csv";
				}			
			}catch(Exception $e){
				echo "Wystąpił błąd ";
				echo "Info developerskie ".$e;
			}
			unset($_SESSION['wyb2']);
			unset($_SESSION['wyb3']);
			unset($_SESSION['wyb4']);
			unset($_SESSION['wyb5']);
			header('Location:index.php');
			
?>