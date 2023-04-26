<?php

	function dejnumer($ileuczniow,$max_i=36){
		$klasy=0;
		$max=$max_i;	
		$temp=$ileuczniow;
		for($klasy=0;$temp>0;$klasy++)
		{
			$temp-=$max;
		}
		
		if ($temp == 0){
			$odpowiedz[0]=$max;
			$odpowiedz[1]=$temp;
			$odpowiedz[2]=$klasy;
			return $odpowiedz;
		}
		
		if($temp<0)
		{
			$temp+=$max;
			while($temp<$max)
			{
				$temp+=$klasy-1;
				$max--;
			}
			
			$odpowiedz[0]=$max;
			$odpowiedz[1]=$temp;
			$odpowiedz[2]=$klasy;
			return $odpowiedz;		
		}
	}
	
	

	function optymalizuj($tab,$max_i=36)
	{
		if($tab[1]!=0)
		{
			for($i=0;$i<$tab[2]-1;$i++)
			{
				$tabklas[$i]=$tab[0];
			}
			$tabklas[$tab[2]-1]=$tab[1];
			
			for($j=0;$tabklas[0]-$tab[1]>2;$j++)
			{
				$tabklas[$j]--;
				$tab[1]++;
				if($j==$tab[2]-1) $j=0;
			}
			if($tab[1]>$max_i)
			{
				$reszta=$tab[1]-$max_i;
				$tab[1]-=$reszta;
					
				for($i=0;$reszta>0;$i++)
				{
					$tabklas[$i]++;
					$reszta--;
				}
			}	
			$tabklas[$tab[2]-1]=$tab[1];
		}else{
			
			for($g=0;$g<$tab[2];$g++)
			{
				$tabklas[$g]=$tab[0];
			}
		}
		return $tabklas;
	}
	
	function rest($odp)
	{
		$sizeof = sizeof($odp);
		$min = $odp[0];
		$toadd = 0;
		
		for ( $i = 0 ; $i < $sizeof ; $i++)
		{
			if($odp[$i] < $min) 
				$min = $odp[$i];
		}
	
		for ( $i = 0 ; $i < $sizeof ; $i++)
		{
			if($odp[$i] > $min)
			{
				$toadd += $odp[$i] - $min;
				$odp[$i] = $min;
			}
		}

		for ( $i = 0 ; $toadd > 0 ; $i++)
		{
			$odp[$i]++;
			$toadd--;
			if($i == $sizeof-1) $i=0;
		}
		
		return $odp;
	}
	
	function simpleodp($ileuczniow,$max_i=36)
	{
		$odpowiedz[0] = ( $ileuczniow % $max_i ); // reszta
		$odpowiedz[1] = $max_i; // rozmiar klasy
		if($odpowiedz[0] > 0) $odpowiedz[2] = floor( $ileuczniow / $max_i ) +1; // ile klas
		else $odpowiedz[2] = round( $ileuczniow / $max_i ); // ile klas
		$i = 0;
		
		while($i < $odpowiedz[2] - 1)
		{
			$odp[$i] = $max_i; 
			$i++;
		}
		
		$odp[$i] = $odpowiedz[0];

		return $odp;
	}
	
	function simpleodpowiedzi($ileuczniow,$max_i=36)
	{
		$odpowiedz[0] = ( $ileuczniow % $max_i ); // reszta
		$odpowiedz[1] = $max_i; // rozmiar klasy
		if($odpowiedz[0] > 0) $odpowiedz[2] = floor( $ileuczniow / $max_i ) +1; // ile klas
		else $odpowiedz[2] = round( $ileuczniow / $max_i ); // ile klas
		
		return $odpowiedz;
	}
?>