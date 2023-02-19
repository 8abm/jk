<?php 
ob_start(); 

$ar = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J","k","K","l",'L','m','M','n',"N",'o','O','p','P','q','Q','r','R','S','s','t','T','_');

$rand1 = array_rand($ar, 1);
$rand2 = array_rand($ar, 1);
$rand3 = array_rand($ar, 1);
$rand4 = array_rand($ar, 1);
$rand5 = array_rand($ar, 1);
$rand6 = array_rand($ar, 1);
$rand7 = array_rand($ar, 1);
$rand8 = array_rand($ar, 1);
$rand9 = array_rand($ar, 1);
$rand10 = array_rand($ar, 1);
$rand11 = array_rand($ar, 1);
$a1 = $ar[$rand1];
$a2 = $ar[$rand2];
$a3 = $ar[$rand3];
$a4 = $ar[$rand4];
$a5 = $ar[$rand5];
$a6 = $ar[$rand6];
$a7 = $ar[$rand7];
$a8 = $ar[$rand8];

$API_KEY = '2007239629:AAE6giqboLt0ScMl6wbTTONPhI2k1jsD8m8
';

define('API_KEY',$API_KEY); 
function bot($method,$datas=[]){ 
    $dev_a = http_build_query($datas); 
    $url = "https://api.telegram.org/bot".API_KEY."/".$method."?$dev_a"; 
    $syr = file_get_contents($url); 
    return json_decode($syr); 
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$id = $message->form->id;

if($text == "/start"){
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"welcome"
]);
}

while(true){
    $user = $a1.$a2.$a3.$a4;
    $api = 'https://ip-info.aliasd5.repl.co/?user='.$user;
    $ded = file_get_contents($api); 

    if ($ded != "False"){
        bot('editemessage',[
        'chat_id'=>$chat_id,
        'text'=>"Good user ☞ $user"
]);
    }else{
        bot('editemessage',[
        'chat_id'=>$chat_id,
        'text'=>"Bad user ☞ $user"
]);
}
}