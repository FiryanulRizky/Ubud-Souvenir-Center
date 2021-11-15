<?php 
$currency_prefix = "Rp. ";
$currency_postfix = ",-";
function format_currency($v){
    global $currency_prefix,$currency_postfix;
    return $currency_prefix.number_format($v,0,"",".").$currency_postfix;
}

function is_active($v){
    global $_SERVER;
    $filename=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],"/")+1);
    if ($v==$filename) return ' class="aktif" ';
}?>