<?php
class RabinKarp{
	function SearchString($A, $B)
	{
		$retVal = array();
		$siga = 0;
		$sigb = 0;
		$Q = 100007;
		$D = 256;
		$BLen = strlen($B);
		$ALen = strlen($A);

		for ($i = 0; $i < $BLen; $i++)
		{
			$siga = ($siga * $D + $A[$i]) % $Q;
			$sigb = ($sigb * $D + $B[$i]) % $Q;
		}

		if ($siga == $sigb)
			array_push($retVal, 0);

		$pow = 1;

		for ($k = 1; $k <= $BLen - 1; $k++)
			$pow = ($pow * $D) % $Q;

		for ($j = 1; $j <= $ALen - $BLen; $j++)
		{
			$siga = ($siga + $Q - $pow * $A[$j - 1] % $Q) % $Q;
			$siga = ($siga * $D + $A[$j + $BLen - 1]) % $Q;

			if ($siga == $sigb)
				if (substr($A, $j, $BLen) == $B)
					array_push($retVal, $j);
		}

		return $retVal;
	}	
}

?>