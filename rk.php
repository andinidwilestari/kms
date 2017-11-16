<?php 
    // function rk ($text, $pattern)
    // {
    //     $nlen = strlen($text);
    //     $hlen = strlen($pattern);
    //     $nhash = 0;
    //     $hhash = 0;
    //     if ($nlen > $hlen) {
    //         return false;
    //     }
    //     if ($nlen == $hlen) {
    //         return ($text === $pattern);
    //     }

    //     for ($i = 0; $i < $nlen; ++$i) {
    //         $nhash += ord($text[$i]);
    //         $hhash += ord($pattern[$i]);
    //     }

    //     for ($i = 0, $c = $hlen - $nlen; $i <= $c; ++$i) {
    //         if ($nhash == $hhash && $text === substr($pattern, $i, $nlen)) {
    //             return $i;
    //         }
    //         if ($i == $c) {
    //             return false;
    //         }
    //         $hhash = ($hhash - ord($pattern[$i])) + ord($pattern[$i + $nlen]);
    //     }

    //     return false;
    // }

    function SearchString($A, $B)
    {
        $hasil = array();
        $hashpattern = 0;
        $hashtext = 0;
        $Q = 100007;
        $D = 256;
        $text = strlen($B);
        $pattern = strlen($A);

        for ($i = 0; $i < $text; $i++)
        {
            $hashpattern = ($hashpattern * $D + $A[$i]) % $Q;
            $hashtext = ($hashtext * $D + $B[$i]) % $Q;
        }

        // if ($hashpattern == $hashtext)
        //     return 1;

        $pow = 1;

        for ($k = 1; $k <= $text - 1; $k++)
            $pow = ($pow * $D) % $Q;

        for ($j = 1; $j <= $pattern - $text; $j++)
        {
            $hashpattern = ($hashpattern + $Q - $pow * $A[$j - 1] % $Q) % $Q;
            $hashpattern = ($hashpattern * $D + $A[$j + $text - 1]) % $Q;

            if ($hashpattern == $hashtext)
                if (substr($A, $j, $text) == $B)
                    return $j;
        }

        return -1;
    }

    $data = "disuatu hari ada seekor domba sedang memakan rumput di padang yang luas";
    $value = SearchString($data, "ada");
    print_r($value);
?>