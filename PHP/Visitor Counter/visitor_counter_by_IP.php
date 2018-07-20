<?php
$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
$http_proxy_check = $_SERVER['HTTP_X_FORWARDED_FOR'];
$remote_addr = $_SERVER['REMOTE_ADDR'];

if(!empty($http_client_ip))
    $ip_address = $http_client_ip;
elseif(!empty($http_proxy_check))
    $ip_address = $http_proxy_check;
else
    $ip_address = $remote_addr;

$ip_read = fopen('ip.txt' , 'r');
$visitors = file($ip_read);

foreach $visitors as $ip{
    if($ip == $ip_address):
        $exists = true;
        break;
    else:
        $exists = false
    endif;
}

if($exists == false){

    $count_read = fopen('count.txt' , 'r');
    $curr_count = fread('count.txt' , filesize('count.txt'));
    $new_count = $curr_count + 1;
    fclose($count_read);

    $count_write = fopen('count.txt' , 'w');
    fwrite($count_write , $new_count);
    fclose($count_write);

    $ip_append = fopen('ip.txt' , 'a');
    fwrite($ip_append , $ip_address);
    fclose($ip_append);

}

?>