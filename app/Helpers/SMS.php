<?php 

namespace App\Helpers;
use GuzzleHttp\Client;

class SMS{
    public static function send($phone, $message)
    {
        
        $url = 'https://smspoh.com/api/v2/send';
        // $token = 'ovkGVxtc-89FBitf2yukhtJcLZkSsEHwRGPvg04cG2GnXiJY5-_4i_3XzWlHlOuE'; // mozet89 token
        $token = 'NHEKajcv-lt0vXliuqMGGwbo93-DkVI8EOfxtRjKrtEKMn9stPWrOkvHtH728x4m';
        $body = [
            'to' => $phone,
            'message' => $message,
        ];

        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ];
        
        $client = new Client();

        $response = $client->post($url,['body'=>json_encode($body),'headers'=>$headers]);
        return $response->getBody();
       
        
    }
}

?>