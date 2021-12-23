<?php

if (!function_exists('getb4k26')) {
    function getb4k26($value){
        
        if (!function_exists('getCombination')) {
            function getCombination($valuesArray){
                $combi = array();
                $temp = array();
                $slent = pow(2, sizeof($valuesArray));
                for ($i=0; $i < $slent; $i++) { 
                    $temp = array();
                    for ($j=0; $j < sizeof($valuesArray); $j++) { 
                        if (($i & pow(2, $j))) {
                            array_push($temp, $valuesArray[$j]);
                        }
                    }
                    if (sizeof($temp) > 0) {
                        array_push($combi, $temp);
                    }
                }
                return $combi;
            }
        }
    
        if ($value=='0') {
            echo 'Tidak memiliki';
        } else {
            $array = array(1, 2, 4, 8, 16, 32, 64, 128, 256);
            $result = getCombination($array);
            for ($i=0; $i < sizeof($result); $i++) { 
                $sum = 0;
                for ($j=0; $j < sizeof($result[$i]); $j++) { 
                    $sum = $sum + $result[$i][$j];
                }
                if ($value == (string)$sum) {
                    for ($j=0; $j < sizeof($result[$i]); $j++) { 
                        if ($result[$i][$j]==1) { echo 'Kartu Keluarga Sejahtera (KKS)/Kartu Perlindungan Sosial (KPS),'; echo '<br>';}
                        if ($result[$i][$j]==2) { echo 'Kartu Indonesia Pintar (KIP)/Bantuan Siswa Miskin (BSM),'; echo '<br>';}
                        if ($result[$i][$j]==4) { echo 'Kartu Indonesia Sehat (KIS)/BPJS Kesehatan/Jamkesmas,'; echo '<br>';}
                        if ($result[$i][$j]==8) { echo 'BPJS Kesehatan peserta mandiri,'; echo '<br>';}
                        if ($result[$i][$j]==16) { echo 'Jaminan sosial tenaga kerja (Jamsostek)/BPJS ketenagakerjaan,'; echo '<br>';}
                        if ($result[$i][$j]==32) { echo 'Asuransi kesehatan lainnya,'; echo '<br>';}
                        if ($result[$i][$j]==64) { echo 'Program Keluarga Harapan (PKH),'; echo '<br>';}
                        if ($result[$i][$j]==128) { echo 'Bantuan Pangan Non Tunai (BPNT),'; echo '<br>';}
                        if ($result[$i][$j]==256) { echo 'Kredit Usaha Rakyat (KUR),'; echo '<br>';}
                    }
                    break;
                }
            }
        }
    }
}

?>