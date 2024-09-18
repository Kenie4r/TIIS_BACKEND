<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
use Exception; 

class JsonCreationController extends AbstractController
{
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/JsonCreationController.php',
        ]);
    }
    public function createJSONWithData($data, $fechaActual){
        $result = false; 
        try{
            $documentoJson = new \Symfony\Component\Filesystem\Filesystem();
            $documentoJson->dumpFile(  $this->getParameter('app.docsurl') . "data_" . $fechaActual . ".json",
            $data); 
            $result = true; 
        }catch(Exception $ex){

            $result = false; 

        }


        return $result; 
    }
}
