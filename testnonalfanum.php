<?php
function random($keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-=_+[]{};,./<>?~')
{
    $str = "";
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < 10; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

$wachtwoord = random();
print($wachtwoord);
?>
