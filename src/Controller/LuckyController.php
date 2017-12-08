<?php

namespace App\Controller;

//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
class LuckyController extends Controller
{
    const api = "fee/getAll";

    public function api(){
        $client = new Client(['base_uri'=> URL_API]);
        $response = $client->request('GET', self::api);
        return new Response($response->getBody());
    }

}