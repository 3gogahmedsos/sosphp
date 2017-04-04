<?php

define('api','TOKIN'); 
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".api."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$textmsg = $message->text;

if($textmsg=="."){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"test",
]);
         }








?>
