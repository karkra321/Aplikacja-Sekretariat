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
				
					$result = mysqli_query($polaczenie,"SELECT * FROM glowna WHERE Profil = 'Technik Informatyk' || Profil = 'Technik Elektronik' ORDER BY $wyb1 DESC, $wyb2 DESC, $wyb3 DESC, $wyb4 DESC" );
					$result_prf_infor=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Informatyk' " );
					$result_prf_elktr=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Elektronik'" );
					$ilosc_profi_info=mysqli_num_rows($result_prf_infor);
					$ilosc_profi_elktro=mysqli_num_rows($result_prf_elktr);
					
					$odpowiedzi[0]=dejnumer($ilosc_profi_info,$_SESSION['rozmiar']);
					$odp[0]=optymalizuj($odpowiedzi[0]);
					$odpowiedzi[1]=dejnumer($ilosc_profi_elktro,$_SESSION['rozmiar']);
					$odp[1]=optymalizuj($odpowiedzi[1]);
					$pro[0]="TI";
					$pro[1]="TE";
					$Tabelname=array('Imie', 'Nazwisko', 'Kod pocztowy miejsca zamieszkania','Miejsce zamieszkania','Ulica','Nr.Domu',
					'Kod pocztowy miejsca zameldownia','Nr.Domu zameldowania','Miejsce zamledowania','Ulica Zameldownia','Ocena Niemiecki','Ocena Angielski',
					'Profil');
					$grupa1=array("Grupa I");
					$grupa2=array("Grupa II");
					fputs($fp, $bom=(chr(0xef).chr(0xbb).chr(0xbf)));
								for($x=0;$x<2;$x++)
								{	
									$litera='A';
									
										
									
									for($y=0;$y<$odpowiedzi[$x][2];$y++,$litera++)
									{
										$rodzaj_prof1="1".$litera.$pro[$x];
										$rodzaj_prof2=array($rodzaj_prof1);
										fputcsv($fp,$rodzaj_prof2);
										fputcsv($fp, $Tabelname,";");
										fputcsv($fp, $grupa1);
										for ($z = 0; $z <= $odp[$x][$y]; $z++) 
										{
										if(round($odp[$x][$y]/2) == $z){
											fputcsv($fp,$grupa2);	
										}
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
							@mysql_close($polaczenie);
				}else{
						$_SESSION['errcatch']="Problem z otwarciem. Inny proces uzywa pliku csv";
				}			
			}catch(Exceptions $e){
				echo "cos sie jeblo";
				echo $e;
			}
			unset($_SESSION['wyb2']);
			unset($_SESSION['wyb3']);
			unset($_SESSION['wyb4']);
			unset($_SESSION['wyb5']);
			header('Location:index.php');
			
?>