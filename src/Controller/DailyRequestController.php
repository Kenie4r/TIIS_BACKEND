<?php

namespace App\Controller;

use App\Entity\Summary;
use App\Entity\UserData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
use Exception; 
use phpseclib3\Net\SFTP; 
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\ORM\EntityManagerInterface;

class DailyRequestController extends AbstractController
{
    
   
    //Inicializacion clase 
    public function __construct(private HttpClientInterface $client,
    private ApiRequestController $apiController,
    private JsonCreationController $jsonController, 
    private CSVController $csvController,
    private SftpMoveController $sftpMoveController ) {
    
    }




    #[Route('/daily/request', name: 'app_daily_request')]
    public function index(EntityManagerInterface $em): JsonResponse
    {   $gotResponse = false; 
        $createJSON = false; 
        $createCSV = false; 
        $uploadFTP = false; 
        try{
           /*
            $response = $this->client->request('GET',
            $this->getParameter('app.apiurl'));

            if($response->getStatusCode()==200){
                $gotResponse=true; 
            }*/ 
            //Hacemos la request a la api 
            $response = $this->apiController->requestApi(); 
            $gotResponse = ($response!=null); 
            //Comenzamos a crear el archivo JSON
            //obtenemos la fecha 
            $fechaActual = new \DateTime();
            $fechaFormateada = date_format($fechaActual, 'Ymd'); 
            $createJSON = $this->jsonController->createJSONWithData($response, $fechaFormateada); 
            $createCSV =  $this->csvController->createCSVAndSummary($response, $em, $fechaFormateada); 
            $uploadFTP = $this->sftpMoveController->UploadToSFTPServer($fechaFormateada); 
        }catch(Exception $ex){

            echo($ex); 
        }

        return $this->json([
          "process_status"=>($gotResponse && $createJSON && $createCSV && !$uploadFTP)? "success": "error", 
          "got_api_response"=> (($gotResponse)? "OK": "NO"),
          "create_json"=>  (($createJSON)? "OK": "NO") ,
          "create_csv" => (($createCSV)? "OK": "NO") ,
          "upload_sftp"=> ((!$uploadFTP)? "OK": "NO")
          
        ]); 
          
    }    
  
}



