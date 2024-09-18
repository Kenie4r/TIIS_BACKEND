<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use DateTime;
use Exception; 

class ApiRequestController extends AbstractController
{
    //Inicializacion clase 
    public function __construct(private HttpClientInterface $client ) {
    }

    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiRequestController.php',
        ]);
    }
    public function requestApi(){
        $content= null; 
        try {
            
            $response = $this->client->request('GET', $this->getParameter('app.apiurl'));

            if(!$response->getStatusCode()==200)
                return null; 
            $content = $response->getContent(); 
        
        }catch(Exception $ex){

            $content = null; 
        }
        return $content; 

    }
}
