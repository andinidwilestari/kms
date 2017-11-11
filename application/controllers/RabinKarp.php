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
    public function __construct() 
    {
        $this->radix = 256;
        $this->prime = 100007;
        $this->previousHash = "";
        $this->position = 0;
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

    public function search($character,$pattern)
    {	
		$this->pattern = $pattern;
		$this->patternHash = generateHash($pattern);
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
                return -1;
            }
        }

    }

 }

?>