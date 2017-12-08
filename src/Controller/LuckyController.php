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

    public function api(LoggerInterface $logger)
    {
        $logger->info('I just got the logger');
        $logger->error('An error occurred');

        $logger->critical('I left the oven on!', array(
            // include extra "context" info in your logs
            'cause' => 'in_hurry',
        ));

        $client   = new Client(['base_uri' => URL_API]);
        $response = $client->request('GET', self::api);
        return new Response($response->getBody());
    }

}