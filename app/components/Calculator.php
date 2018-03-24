<?php
/**
 * Created by PhpStorm.
 * User: kossworth
 * Date: 22.01.17
 * Time: 21:00
 */

namespace app\components;
use Yii;
use yii\base\Component;

class Calculator extends Component
{

    public function calculate($kw, $kh, $kl, $sh_type, $pw, $pl)
    {
        if(is_numeric($kw) 
                && is_numeric($kh) 
                && is_numeric($kl) 
                && is_numeric($sh_type) 
                && is_numeric($pw)
                && is_numeric($pl)
        ) {
          
            $kvad = (($kw * $kl) + ($kl * $kh * 2) + ($kw * $kh * 2)) - 4.6;

            switch ($sh_type) {
                case 1:
                    $polki = $pw * 18;
                    break;
                case 2:
                    $polki = (($pw - 0.6) * 18) + ($pl * 18);
                    break;
                case 3:
                    $polki = (($pw - 1.2) * 18) + ($pl * 30);
                    break;
            }

            $p30  = floor($kvad/30)+1;
            $p35  = floor($kvad/35)+1;
            $p40  = floor($kvad/40)+1;
            $p25  = floor($kvad/25)+1;
            $p5   = floor($kvad/5)+1;
            $p10  = floor($kvad/10)+1;
            $pl1  = floor($polki/40)+1;
            $pl2  = floor($polki/10)+1;
            $pn15 = floor($kvad/7)+1;
            $pn5  = (floor($kvad/5)+1)*2;
            $pn12 = floor($kvad/12)+1;

            if($kvad <= 25) {
                $aba = 2; $svet = 3; $pod = 1;
            }
            else
            {
                $aba = 3; $svet = 4; $pod = 2;
            }

            return [
                'kvad'   => $kvad,
                'polki'  => $polki,
                'p30'    => $p30,
                'p35'    => $p35,
                'p25'    => $p25,
                'p40'    => $p40,
                'p5'     => $p5,
                'kvad44' => $kvad*4.4,
                'kvad3'  => $kvad*3,
                'aba'    => $aba,
                'svet'   => $svet,
                'pod'    => $pod,
                'pn15'   => $pn15,
                'kh2'    => $kh*2,
                'pn5'    => $pn5,
                'pn12'   => $pn12,
                'pl1'    => $pl1,
                'pl2'    => $pl2,
                'p10'    => $p10,
            ];
        } else {
            return false;
        }
    }

}