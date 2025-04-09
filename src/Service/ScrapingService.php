<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;   

class ScrapingService
{
    public function scrapFromUrl($url, $selector): Array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', $url);
        $html = $response->getContent();
        $crawler = new Crawler($html);

        // Extract titles using the appropriate CSS selector
        $nodes = $crawler->filter($selector)->each(function (Crawler $node) {
            return $node->text();
        });

        
        $results = array_map(function ($node) {
            return ($node);
        }, $nodes);
        

        return $results ;
    }
}