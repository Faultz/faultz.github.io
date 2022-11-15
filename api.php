<?php

//"a0.ww.np.dl.playstation.net/tpl/np/%s/%s-ver.xml"

$code = $_GET['code'];

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$response = file_get_contents("https://a0.ww.np.dl.playstation.net/tpl/np/".$code."/".$code."-ver.xml", false, stream_context_create($arrContextOptions));

$start_pos = strpos($response, "<TITLE>")+7;
$end_pos = strpos($response, "</TITLE>");

$output = substr($response, $start_pos, $end_pos - $start_pos);

$output = str_replace("Â", "", $output);

echo "|".$output;
?>