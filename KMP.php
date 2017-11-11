<?php
// Knuth-Morris-Pratt Algorithm
class KMP{
  function KMPSearch($p,$t){
    $hasil = array();
 // pattern dan text dijadikan array
    $pattern = str_split($p); 
    $text    = str_split($t);
 
 // hitung tabel lompatan dengan preKMP()
    $lompat = $this->preKMP($pattern);
 print_r($lompat);
 
 // perhitungan KMP
 $i = $j = 0;
    $num=0;
    while($j<count($text)){
      while($i>-1 && $pattern[$i]!=$text[$j]){
     // jika tidak cocok, maka lompat sesuai tabel lompatan
        $i = $lompat[$i];
      }
      $i++;
      $j++;
      if($i>=count($pattern)){
     // jika cocok, tentukan posisi string yang cocok
  // kemudian lompat ke string berikutnya
        $hasil[$num++]=$j-count($pattern);
        $i = $lompat[$i];
      }
    }
 return $hasil;
  }
 
  // menetukan tabel lompatan dengan preKMP
  function preKMP($pattern){
    $i = 0;
    $j = $lompat[0] = -1;
    while($i<count($pattern)){
      while($j>-1 && $pattern[$i]!=$pattern[$j]){
        $j = $lompat[$j];
      }
      $i++;
      $j++;
      if($pattern[$i]==$pattern[$j]){
        $lompat[$i]=$lompat[$j];
      }else{
        $lompat[$i]=$j;
      }
    }
    return $lompat;
  }
}
?>