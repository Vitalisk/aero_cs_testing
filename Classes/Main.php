<?php

class Main
{
    public function init_get_curl($curl,$url){
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    }

    public function init_post_curl($curl, $url){
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    }
    public function display_results($curl){

        $resp = json_decode((curl_exec($curl)));
        curl_close($curl);
        header('Content-Type: application/json; charset=utf-8');
        $array = json_encode($resp);
        echo $array;
        exit(0);


    }
    public function debug_curl($curl){
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    }


}