<?php 

ob_start(); 

$ar = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J","k","K","l",'L','m','M','n',"N",'o','O','p','P','q','Q','r','R','S','s','t','T','_');

flush();

ob_start();

set_time_limit(0);

error_reporting(0);

ob_implicit_flush(1);

$token = "";# توكنك تمام

define('API_KEY',$token);

echo "setWebhook ~> <a href=\"https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."\">https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."</a>";

function bot($method,$datas=[]){

$url = "https://api.telegram.org/bot".API_KEY."/".$method;

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);

$res = curl_exec($ch);

if(curl_error($ch)){

var_dump(curl_error($ch));

}else{

return json_decode($res);

}}

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

	$rand1 = array_rand($ar, 1);    $rand2 = array_rand($ar, 1);

    $rand3 = array_rand($ar, 1);

    $rand4 = array_rand($ar, 1);

    $a1 = $ar[$rand1];

    $a2 = $ar[$rand2];

    $a3 = $ar[$rand3];

    $a4 = $ar[$rand4];

    $user = $a1.$a2.$a3.$a4;

    $api = 'https://ip-info.aliasd5.repl.co/?user='.$user;

    $ded = file_get_contents($api); 

    if ($ded != "True"){

        bot('sendmessage',[

        'chat_id'=>$chat_id,

        'text'=>"Good user ☞ $user"

]);

    }else{

        bot('Editmessagetext',[

        'chat_id'=>$chat_id,

        'text'=>"Bad user ☞ $user"

]);

}

}
