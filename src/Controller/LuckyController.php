<?php

namespace App\Controller;

//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
//use GuzzleHttp\Psr7\Request;
class LuckyController extends Controller
{
    const api = "fee/getAll";
    const ENDPOINT_NAME = 'WEB_BACKEND';
    const ENDPOINT_USER = 'admin';
    const ENDPOINT_PASS = 'namviet@2017';
    const ENDPOINT_KEY = 'ssd23ey8fdkjf@63293';
    const LANGCODE = 'vi'; //'en'

    public function api()
    {
        $data = json_encode(array(
            'id' => 1,
        ));
        $params = array(
            'serviceEndpointName' => self::ENDPOINT_NAME,
            'data' => $data,
            'checksum' => md5(self::ENDPOINT_NAME . $data . self::ENDPOINT_KEY),
            'langCode' => self::LANGCODE,
        );
        $client   = new Client(['base_uri' => URL_API]);
        $response = $client->request('POST', self::api,['json' => $params]);
        return new Response($response->getBody());
    }


}