<?php
function getAI($aI){
    $ai=0;
    switch($aI){
        case $aI<25:{
            $ai=0.77;
            break;
        }
        case $aI>=25 && $aI<50:{
            $ai=0.85;
            break;
        }
        case $aI>=50 && $aI<75:{
            $ai=0.93;
            break;
        }
        case $aI>=75 && $aI<100:{
            $ai=1;
            break;
        }
        case $aI>=100 && $aI<125:{
            $ai=0.93;
            break;
        }
        case $aI>=125 && $aI<150:{
            $ai=0.85;
            break;
        }
        case $aI>=150 && $aI<175:{
            $ai=0.78;
            break;
        }
        case $aI>=175:{
            $ai=0;
            break;
        }
    }
    return $ai;
}
function getDV($dV){
    $dv=0;
    switch($dV){
        case $dV>=25 && $dV<30:{
            $dv=1;
            break;
        }
        case $dV>=30 && $dV<40:{
            $dv=0.97;
            break;
        }
        case $dV>=40 && $dV<50:{
            $dv=0.93;
            break;
        }
        case $dV>=50 && $dV<70:{
            $dv=0.91;
            break;
        }
        case $dV>=70 && $dV<100:{
            $dv=0.88;
            break;
        }
        case $dV>=100 && $dV<150:{
            $dv=0.87;
            break;
        }
        case $dV>=150 && $dV<175:{
            $dv=0.86;
            break;
        }
        case $dV>=175:{
            $dv=0;
            break;
        }
    }
    return $dv;
}
function getDO($dO){
    $do=0;
    switch($dO){
        case $dO>=25 && $dO<30:{
            $do=1;
            break;
        }
        case $dO>=30 && $dO<40:{
            $do=0.83;
            break;
        }
        case $dO>=40 && $dO<50:{
            $do=0.63;
            break;
        }
        case $dO>=50 && $dO<55:{
            $do=0.50;
            break;
        }
        case $dO>=55 && $dO<60:{
            $do=0.45;
            break;
        }
        case $dO>=60 && $dO<63:{
            $do=0.42;
            break;
        }
        case $dO>=63:{
            $do=0;
            break;
        }
    }
    return $do;
}
function getDA($dA){
    $da=0;
    switch($dA){
        case $dA<30:{
            $da=1;
            break;
        }
        case $dA>=30 && $dA<60:{
            $da=0.90;
            break;
        }
        case $dA>=60 && $dA<90:{
            $da=0.81;
            break;
        }
        case $dA>=90 && $dA<120:{
            $da=0.71;
            break;
        }
        case $dA>=120 && $dA<135:{
            $da=0.57;
            break;
        }
        case $dA>=135:{
            $da=0;
            break;
        }
    }
    return $da;
}
function getPC($pC){
    $pc=0;
    if($pC=="Buona"){
        $pc=1;
    }else{
        $pc=0.9;
    }
    return $pc;
}
function getFD($dr, $fr){
    $fr_dr=0;
    switch($dr){
        case $dr <= 1:
            switch($fr){
                case $fr <= 1:
                    $fr_dr = 1;
                    break;
                case $fr > 1 && $fr <= 4:
                    $fr_dr = 0.94;
                    break;
                case $fr > 4 && $fr <= 6:
                    $fr_dr = 0.84;
                    break;
                case $fr > 6 && $fr <= 9:
                    $fr_dr = 0.75;
                    break;
                case $fr > 9 && $fr <= 12:
                    $fr_dr = 0.52;
                    break;
                case $fr > 12 && $fr <= 15:
                    $fr_dr = 0.37;
                    break;
                case $fr > 15:
                    $fr_dr = 0;
                    break;
            }
            break;
        case $dr > 1 && $dr <= 2:
            switch(true){
                case $fr <= 1:
                    $fr_dr = 0.95;
                    break;
                case $fr > 1 && $fr <= 4:
                    $fr_dr = 0.88;
                    break;
                case $fr > 4 && $fr <= 6:
                    $fr_dr = 0.72;
                    break;
                case $fr > 6 && $fr <= 9:
                    $fr_dr = 0.50;
                    break;
                case $fr > 9 && $fr <= 12:
                    $fr_dr = 0.30;
                    break;
                case $fr > 12 && $fr <= 15:
                    $fr_dr = 0.21;
                    break;
                case $fr > 15:
                    $fr_dr = 0;
                    break;
            }
            break;
        case $dr > 2 && $dr <= 8:
            switch(true){
                case $fr <= 1:
                    $fr_dr = 08.95;
                    break;
                case $fr > 1 && $fr <= 4:
                    $fr_dr = 0.75;
                    break;
                case $fr > 4 && $fr <= 6:
                    $fr_dr = 0.45;
                    break;
                case $fr > 6 && $fr <= 9:
                    $fr_dr = 0.27;
                    break;
                case $fr > 9 && $fr <= 12:
                    $fr_dr = 0.15;
                    break;
                case $fr > 12:
                    $fr_dr = 0;
                    break;
            }
            break;
    }
    return $fr_dr;
}
function getSM($sM){
    $sm=0;
    if($sM==true){
        $sm=0.6;
    }else{
        $sm=1;
    }
    return $sm;
}
?>