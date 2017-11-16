<?php
 class RabinKarp
 {
    /** 
    * @var String
    */ 
    private $pattern ;
    private $patternHash ;
    private $text ;
    private $previousHash ;

    /** 
    * @var Integer
    */ 
    private $radix ;
    private $prime ;
    private $position ;

    /** 
    * Constructor 
    *
    * @param String $pattern - The pattern
    *
    */ 
    public function __construct($pattern) 
    {
        $this->pattern = $pattern;
        $this->radix = 256;
        $this->prime = 100007;
        $this->previousHash = "";
        $this->position = 0;
        $this->patternHash = $this->generateHash($pattern);
    }

    private function generateHash($key)
    {
        $charArray = str_split($key);
        $hash = 0;
        foreach($charArray as $char)
        {
             $hash = ($this->radix * $hash + ord($char)) % $this->prime;
        }

        return $hash;
    }

    public function searchRabin($character)
    {
        $this->text .= $character;
        if(strlen($this->text) < strlen($this->pattern))
        {
            return false;
        }
        else
        {
            $txtHash = 0;
            echo $this->previousHash . "<br/>";
            if(empty($this->previousHash))
            {
                $txtHash = $this->generateHash($this->text);
                $this->previousHash = $txtHash;
                $this->position = 0;
            }
            else
            {
                // The issue is here 
                $charArray = str_split($this->text);
                $txtHash = (($txtHash  + $this->prime) - $this->radix * strlen($this->pattern) * ord($charArray[$this->position]) % $this->prime) % $this->prime;
                $txtHash = ($txtHash * $this->radix + ord($character)) % $this->prime; 

                $this->previousHash = $txtHash;
            }

            if($txtHash == $this->patternHash)
            {
                echo "Hash Match found" . $this->pattern;
            }
        }

    }

    public function KMPSearch($t){
        $hasil = array();
        // pattern dan text dijadikan array
        $pattern = $this->patternHash; 
        $text    = $this->generateHash($t);
        echo $pattern .'  -- '.$text;exit;
        // hitung tabel lompatan dengan preKMP()
        $lompat = $this->preKMP($this->patternHash);
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
    public function preKMP($p){
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

$x = new RabinKarp("kita pergi kemana");
//$x->search("Z");
echo($x->KMPSearch("kita"));
?>