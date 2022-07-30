<?php

function count_usia($tgl_lahir_anak){
$tgl_lahir = strtotime($tgl_lahir_anak);
$tgl_sekarang = strtotime(date('Y-m-d'));
$diff = $tgl_sekarang - $tgl_lahir;

// jumlah detik 1 bulan
$bulan = 2419200;
//jumlah detik 1 tahun
$tahun = 31557600;

$count_tahun = 0;
$count_bulan = 0;
$total = $diff;
$result = '';

while ($total >= $tahun) {
	$total = $total-$tahun;
    $count_tahun+= 1;
}
$result.= $count_tahun > 0 ? $count_tahun.' Tahun ' : '';
while ($total > $bulan) {
	$total = $total-$bulan;
    $count_bulan+= 1;
}
$result.= $count_bulan > 0 ? $count_bulan.' Bulan' : '';

if ($count_bulan == 12) {
	$count_tahun+= 1;
    
    $result = $count_tahun.' Tahun';
}

return $result;
}
?>