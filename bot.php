<?php 

ob_start(); 

flush();

ob_start();

set_time_limit(0);

error_reporting(0);

ob_implicit_flush(1);

$token = "6127627928:AAFUVniJndXKzQnSeIXbrIGFg49j0B9ZaaM";# توكنك تمام

define('API_KEY',$token);

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

    $ar = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J","k","K","l",'L','m','M','n',"N",'o','O','p','P','q','Q','r','R','S','s','t','T','_');

    $rand1 = array_rand($ar, 1);

    $rand2 = array_rand($ar, 1);

    $rand3 = array_rand($ar, 1);

    $rand4 = array_rand($ar, 1);

    $rand5 = array_rand($ar, 1);

    $a1 = $ar[$rand1];

    $a2 = $ar[$rand2];

    $a3 = $ar[$rand3];

    $a4 = $ar[$rand4];

    $user = $a1.$a2.$a3.$a4;

    $api = 'https://ip-info.aliasd5.repl.co/?user='.$user;

    $ded = file_get_contents($api); 

    if ($ded != "False"){

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
