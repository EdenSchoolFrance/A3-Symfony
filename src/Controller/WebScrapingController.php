<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;   
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\ScrapingService;

class WebScrapingController extends AbstractController
{
    public function index(ScrapingService $srapingService): Response
    {
        try {
           $results = $srapingService->scrapFromUrl("https://www.welcometothejungle.com/fr/jobs?refinementList%5Boffices.country_code%5D%5B%5D=FR&query=alternance%20developpeur%20web&page=1&aroundLatLng=48.85341%2C2.3488&aroundRadius=20&aroundQuery=Paris%2C%20Paris%2C%20%C3%8Ele-de-France%2C%20France", 'h4');
           //$data = json_encode($data);
           return new JsonResponse([
            'data' =>$results,
        ]);
        } catch(e) {
            return new JsonResponse([
                'status' => 500,
                'success' => false,
            ]);
        }
    }
}
