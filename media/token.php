<?php
ini_set('display_errors', 1);
$output = exec("python ../EdgeAuth-Token-Python/cms_edgeauth.py -k 982923bc39808fc6112d654e9f7cfd5e4ff279886f77ad10bd3411bdb158e817 -w 5000 -u /hello/world -x");
echo $output;
?>