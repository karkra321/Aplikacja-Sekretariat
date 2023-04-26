<?PHP
function elo($arr,$ktory){
	$wartosci_sort=Array(
		"Ocena_Niemiecki",
		"Ocena_Angielski",
		"Miejscowosc",
	);
		for($j=0;$j<3;$j++){
			if($arr[$ktory]==$wartosci_sort[$j]){
echo<<<END
				
				<option selected>$wartosci_sort[$j] </option>

END;
			}else{
echo<<<END
				<option >$wartosci_sort[$j] </option>
END;
			}
		}
}
?>