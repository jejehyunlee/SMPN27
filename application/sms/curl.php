<?php

$kirim = sendsms()

function sendsms($to,$msg){
            //init SMS gateway, look at android SMS gateway
            $idmesin="1191";
            $pin="123";
            
            // create curl resource
            $ch = curl_init();
            
            // set url
            curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");
            
            //return the transfer as a string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


            curl_setopt($ch, CURLOPT_SSL_VERYFYHOST,0);
            curl_setopt($ch, CURLOPT_SSL_VERYFYHOST,0);

            // $output contains the output string
            $output = curl_exec($ch);
            
            // close curl resource to free up system resources
            curl_close($ch);

            return($output);
            }