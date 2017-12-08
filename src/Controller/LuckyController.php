<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

//use GuzzleHttp\Psr7\Request;
class LuckyController extends Controller
{
    const ENDPOINT_NAME = 'WEB_BACKEND';
    const ENDPOINT_USER = 'admin';
    const ENDPOINT_PASS = 'namviet@2017';
    const ENDPOINT_KEY = 'ssd23ey8fdkjf@63293';
    const LANGCODE = 'vi'; //'en'

    protected function getDataApi($api, $data = null)
    {
        if ($data && !empty($data)) {
            $params = array(
                'serviceEndpointName' => self::ENDPOINT_NAME,
                'data'                => $data,
                'checksum'            => md5(self::ENDPOINT_NAME . $data . self::ENDPOINT_KEY),
                'langCode'            => self::LANGCODE,
            );
        } else {
            $params = array(
                'serviceEndpointName' => self::ENDPOINT_NAME,
                'checksum'            => md5(self::ENDPOINT_NAME . self::ENDPOINT_KEY),
                'langCode'            => self::LANGCODE,
            );
        }
        $client   = new Client(['base_uri' => URL_API]);
        $response = $client->request('POST', $api, ['json' => $params]);
        return $response->getBody();
    }
    public function getFeeAll()
    {
        $api    = 'fee/getAll';
        $result = $this->getDataApi($api);
        return new Response($result);
    }
    public function getFeeId(Request $request)
    {
        $api    = 'fee/getAll';
        $result = $this->getDataApi($api);
        return new Response($request->all());
    }


}

?>