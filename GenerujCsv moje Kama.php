<?PHP
	session_start();
		if(!isset($_SESSION['wyb2'])){
			header('Location:index.php');
		}
	require_once "connection.php";
	require_once "funkcjeopty.php";
		
			$wyb1="Profil";
			$wyb2=$_SESSION['wyb2']; /*ocena niemiecki*/
			$wyb3=$_SESSION['wyb3']; /*ocena angielski*/
			$wyb4=$_SESSION['wyb4']; /*miejscowosc*/

			try{
				$polaczenie= new mysqli($host,$db_name,$db_password,$base);
				$polaczenie->query('SET NAMES utf8');
				if($fp = fopen('Uczniowie.csv', 'w')){
				
					$result = mysqli_query($polaczenie,"SELECT * FROM glowna WHERE Profil = 'Technik Informatyk' || Profil = 'Technik Elektronik' ORDER BY $wyb1 DESC, $wyb2 DESC, $wyb3 DESC, $wyb4 DESC");
					/*echo "SELECT * FROM glowna WHERE Profil = 'Technik Informatyk' || Profil = 'Technik Elektronik' ORDER BY $wyb1 DESC, $wyb2 DESC, $wyb3 DESC, $wyb4 DESC";*/
					$result_prf_infor=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Informatyk' " );
					$result_prf_elktr=mysqli_query($polaczenie,"SELECT id FROM glowna WHERE Profil = 'Technik Elektronik'" );
					$ilosc_profi_info=mysqli_num_rows($result_prf_infor);
					$ilosc_profi_elktro=mysqli_num_rows($result_prf_elktr);
					
					$ke=0; /*dla klas elektronicznych*/
					$ki=0; /*dla klas informatycznych*/
					$klasy_e=0;
					$klasy_i=0;
					$il_e=$ilosc_profi_elktro; /*53*/
					$il_i=$ilosc_profi_info; 
					$max_kl=$_SESSION['rozmiar']; /*36*/
					$lk=$max_kl;
					
					if($il_e>0)
					{
						for($ke=0;$il_e>0;$ke++,$klasy_e++)
						{	
							if($il_e>0){$li_kl_e[$ke]=$lk;}
							$il_e-=$max_kl;  
							$lk=$il_e;
						}
						echo 'element tablicy'.$li_kl_e[0].'<br>element tablicy'.$li_kl_e[1].'<br>';
					}		
					else
					{
						echo '<script language="javascript">';
						echo 'alert("brak elektroników")';
						echo '</script>';
					}
					if($il_i>0)
					{
						for($ki=0;$il_i>0;$ki++,$klasy_i++)
						{	
							if($il_i>0){$li_kl_i[$ki]=$lk;}
							$il_i-=$max_kl;  
							$lk=$il_i;
						}
						echo 'element tablicy'.$li_kl_i[0].'<br>element tablicy'.$li_kl_i[1].'<br>';
					}		
					else
					{
						echo '<script language="javascript">';
						echo 'alert("brak informatyków")';
						echo '</script>';
					}
					$pro[0]="TI";
					$pro[1]="TE";
					$Tabelname=array('Imie', 'Nazwisko', 'Kod pocztowy miejsca zamieszkania','Miejsce zamieszkania','Ulica','Nr.Domu','Ocena Niemiecki','Ocena Angielski','Profil');
					$grupa1=array("Grupa I");
					$grupa2=array("Grupa II");
					fputs($fp, $bom=(chr(0xef).chr(0xbb).chr(0xbf)));
					for($x=0;$x<2;$x++)
					{	
						$litera='A';
						for($y=0;$y<$klasy_e;$y++,$litera++)
						{
							$rodzaj_prof1="1".$litera.$pro[$x];
							$rodzaj_prof2=array($rodzaj_prof1);
							fputcsv($fp,$rodzaj_prof2);
							fputcsv($fp, $Tabelname,";");
							fputcsv($fp, $grupa1);
							for ($z = 0; $z <= $li_kl_e[$y]; $z++) 
							{
								if(round($li_kl_e[$y]/2) == $z)
								{
									fputcsv($fp,$grupa2);	
								}
								/*echo round($odp[$x][$y]/2);*/
								$row = mysqli_fetch_assoc($result);
								$imie = $row['Imie'];	
								$nazwisko = $row['Nazwisko'];
								$kod_pocztowy = $row['Kod_pocztowy'];
								$miejscowosc = $row['Miejscowosc'];									
								$ulica = $row['Ulica'];										
								$nrdomu = $row['Nrdomu'];										
																
								$ocena_n=$row['Ocena_Niemiecki'];											
								$ocena_a=$row['Ocena_Angielski'];											
								$profil=$row['Profil'];	
								$uczen=array($imie,$nazwisko,$kod_pocztowy,$miejscowosc,$ulica,$nrdomu,$ocena_n,$ocena_a,$profil);
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
			/*header('Location:index.php');*/
			
?>