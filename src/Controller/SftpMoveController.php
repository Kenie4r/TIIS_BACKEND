<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
use Exception; 
use phpseclib3\Net\SFTP; 

class SftpMoveController extends AbstractController
{
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SftpMoveController.php',
        ]);
    }

    public function UploadToSFTPServer($fecha){
        try{
            $usuario =  $this->getParameter("app.sftpuser"); 
            $pass = $this->getParameter("app.sftppass"); 
            $url = $this->getParameter("app.sftpurl"); 
            $sftpController = new SFTP($url); 
            $login = $sftpController->login($usuario, $pass); 
            if($login){
                $urlPathJson = $this->getParameter("app.docsurl") . "/data_" . $fecha . ".json"; 
                $urlPathCsv = $this->getParameter("app.docsurl") . "/ETL_" . $fecha . ".csv"; 
                $urlPathCsvR = $this->getParameter("app.docsurl") . "/summary_" . $fecha . ".csv"; 
                $sftpController->put($this->getParameter("app.sftpdir"). "/data_" . $fecha . ".json", $urlPathJson, SFTP::SOURCE_LOCAL_FILE); 
                $sftpController->put($this->getParameter("app.sftpdir"). "/ETL_" . $fecha. ".csv", $urlPathCsv, SFTP::SOURCE_LOCAL_FILE); 
                $sftpController->put($this->getParameter("app.sftpdir"). "/summary_" . $fecha . ".csv", $urlPathCsvR, SFTP::SOURCE_LOCAL_FILE); 
                return true; 
            }else{
                return false; 
            }
        }catch(Exception $e){
            return false; 
        }
    }
}
