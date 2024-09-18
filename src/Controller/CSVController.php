<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Summary;
use App\Entity\UserData;
use DateTime;
use Exception; 

class CSVController extends AbstractController
{
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CSVController.php',
        ]);
    }

    public function createCSVAndSummary($content, $em, $fechaActual){
        $cRegistros = 0; 
        $cMale = 0; 
        $cFemale = 0; 
        $cOther = 0; 
        $cDeCeroADiez = 0; 
        $cDeOnceAVeinte = 0; 
        $cDeVeintiUnoATreinta = 0; 
        $cTreintaACuarenta = 0; 
        $cCuarentaA50 =0; 
        $cCincuentaA60 = 0; 
        $cSesentaA70 = 0; 
        $cSetentaA80 = 0; 
        $cOchentaA90 = 0; 
        $cMayorANoventa = 0; 
        $cDeCeroADiezF = 0; 
        $cDeOnceAVeinteF = 0; 
        $cDeVeintiUnoATreintaF = 0; 
        $cTreintaACuarentaF = 0; 
        $cCuarentaA50F =0; 
        $cCincuentaA60F = 0; 
        $cSesentaA70F = 0; 
        $cSetentaA80F = 0; 
        $cOchentaA90F = 0; 
        $cMayorANoventaF = 0; 

        $cDeCeroADiezO = 0; 
        $cDeOnceAVeinteO = 0; 
        $cDeVeintiUnoATreintaO = 0; 
        $cTreintaACuarentaO = 0; 
        $cCuarentaA50O =0; 
        $cCincuentaA60O = 0; 
        $cSesentaA70O = 0; 
        $cSetentaA80O = 0; 
        $cOchentaA90O = 0; 
        $cMayorANoventaO = 0; 
        $cSOWindows =0; 
        $cSOApple =0; 
        $cSOLinux = 0; 
        $cWashintong = 0; 
        $cAnchore =0; 
        try{
         
            $archivoCSV = new \Symfony\Component\Filesystem\Filesystem();
            $archivoCSVR = new \Symfony\Component\Filesystem\Filesystem();
            $csvText = "id,firstName,lastName,age,gender,email,phone,username,birthDate,ip,university,role\n "; 
            $data = json_decode($content, true); 
          foreach($data["users"] as $usuario){
            $csvText.=$usuario["id"] . ", " . $usuario["firstName"] . "," . $usuario["lastName"]. "," .$usuario["age"] . "," . $usuario["gender"] . ", " . $usuario["email"] . ", " . $usuario["phone"] .  ", " . $usuario["username"] .  ", " . $usuario["birthDate"] .  ", " . $usuario["ip"] .  ", " . $usuario["university"] . ", " . $usuario["role"] ."\n"; 
            $cRegistros++; 
            if($usuario["age"]>=0 && $usuario["age"]<11){
                switch($usuario["gender"]){
                    case "male": 
                        $cDeCeroADiez++; 
                        break; 
                    case "female": 
                        $cDeCeroADiezF++; 
                        break; 
                    default: 
                    $cDeCeroADiezO++; 
                }
               
            }else if($usuario["age"]>=11 && $usuario["age"]<21){
                switch($usuario["gender"]){
                    case "male": 
                        $cDeOnceAVeinte++; 
                        break; 
                    case "female": 
                        $cDeOnceAVeinteF++; 
                        break; 
                    default: 
                    $cDeOnceAVeinteO++; 
                }
            }else if($usuario["age"]>=21 && $usuario["age"]<31){
                
                switch($usuario["gender"]){
                    case "male": 
                        $cDeVeintiUnoATreinta++; 
                        break; 
                    case "female": 
                        $cDeVeintiUnoATreintaF++; 
                        break; 
                    default: 
                    $cDeVeintiUnoATreintaO++; 
                }
            }else if($usuario["age"]>=31 && $usuario["age"]<41){
                 
                switch($usuario["gender"]){
                    case "male": 
                        $cTreintaACuarenta++; 
                        break; 
                    case "female": 
                        $cTreintaACuarentaF++; 
                        break; 
                    default: 
                    $cTreintaACuarentaO++; 
                }
            }else if($usuario["age"]>=41 && $usuario["age"]<51){
                 
                switch($usuario["gender"]){
                    case "male": 
                        $cCuarentaA50++; 
                        break; 
                    case "female": 
                        $cCuarentaA50F++; 
                        break; 
                    default: 
                    $cCuarentaA50O++; 
                }
            }else if($usuario["age"]>=51 && $usuario["age"]<61){
                switch($usuario["gender"]){
                    case "male": 
                        $cCincuentaA60++; 
                        break; 
                    case "female": 
                        $cCincuentaA60F++; 
                        break; 
                    default: 
                    $cCincuentaA60O++; 
                }
            }else if($usuario["age"]>=61 && $usuario["age"]<71){
                
               
                switch($usuario["gender"]){
                    case "male": 
                        $cSesentaA70++; 
                        break; 
                    case "female": 
                        $cSesentaA70F++; 
                        break; 
                    default: 
                    $cSesentaA70O++; 
                }
            }else if($usuario["age"]>=71 && $usuario["age"]<81){
                
                switch($usuario["gender"]){
                    case "male": 
                        $cSetentaA80++; 
                        break; 
                    case "female": 
                        $cSetentaA80F++; 
                        break; 
                    default: 
                    $cSetentaA80O++; 
                }
            }else if($usuario["age"]>=81 && $usuario["age"]<91){   
                switch($usuario["gender"]){
                    case "male": 
                        $cOchentaA90++; 
                        break; 
                    case "female": 
                        $cOchentaA90F++; 
                        break; 
                    default: 
                    $cOchentaA90O++; 
                }
            }else if($usuario["age"]>0 && $usuario["age"]>91){
               
                switch($usuario["gender"]){
                    case "male": 
                        $cMayorANoventa++; 
                        break; 
                    case "female": 
                        $cMayorANoventaF++; 
                        break; 
                    default: 
                    $cMayorANoventaO++; 
                }
            }

            switch($usuario["gender"]){
                case "male": 
                   $cMale++; 
                    break; 
                case "female": 
                    $cFemale++; 
                    break; 
                default: 
                    $cOther++; 
            }




          }
          
          //vamos a crear el archivo csv 
          $archivoCSV->dumpFile($this->getParameter('app.docsurl') ."ETL_" .  $fechaActual. ".csv",
          $csvText); 

          //Creamos el archivo de resumen 
          $csvRText = "registre,".$cRegistros . "\n";
          $csvRText .= "gender,total\n";
          $csvRText .= "male," . $cMale . "\n";
          $csvRText .= "female," . $cFemale . "\n";
          $csvRText .= "other," . $cOther . "\n";
          $csvRText .= " , \n";
          $csvRText .= "age,male,female,other\n";
          $csvRText .= "0-10," . $cDeCeroADiez .",".$cDeCeroADiezF.",".$cDeCeroADiezO . "\n";
          $csvRText .= "11-20," . $cDeOnceAVeinte .",".$cDeOnceAVeinteF.",".$cDeOnceAVeinteO . "\n";
          $csvRText .= "21-30," . $cDeVeintiUnoATreinta .",".$cDeVeintiUnoATreintaF.",".$cDeVeintiUnoATreintaO . "\n";
          $csvRText .= "31-40," . $cTreintaACuarenta .",".$cTreintaACuarentaF.",".$cTreintaACuarentaO . "\n";
          
          $csvRText .= "41-50," . $cCuarentaA50 .",".$cCuarentaA50F.",".$cCuarentaA50O . "\n";
          
          $csvRText .= "51-60," . $cCincuentaA60 .",".$cCincuentaA60F.",".$cCincuentaA60O . "\n";
          
          $csvRText .= "61-70," . $cSesentaA70 .",".$cSesentaA70F.",".$cSesentaA70O . "\n";
          
          $csvRText .= "71-80," . $cSetentaA80O .",".$cSetentaA80F.",".$cSetentaA80O . "\n";
          
          $csvRText .= "81-90," . $cOchentaA90 .",".$cOchentaA90F.",".$cOchentaA90O . "\n";
          
          $csvRText .= "91+," . $cMayorANoventa .",".$cMayorANoventaF.",".$cMayorANoventaO . "\n";
          $archivoCSVR->dumpFile($this->getParameter('app.docsurl') ."summary_" .  $fechaActual . ".csv",$csvRText); 

          //subimos a la base de datos 
          
          $summary = new Summary(); 
          $summary->setCreatedAt(new DateTime($fechaActual)); 
          $summary->setFileName("summary_" .  $fechaActual. ".csv"); 
          $summary->setRowsNum($cRegistros); 
          $summary->setFemalePeople($cFemale); 
          $summary->setMalePeople($cMale); 
          $summary->setOthersPeople($cOther); 
          $em->persist($summary); 
          $em->flush(); 
         // $stmt = $em->getCurrentConnection()->fetchAssoc("select max(id_summary) as lastid from summary");

          $idSummary =1; 
          if($idSummary==null)
          {
            return false; 

          }
          foreach($data["users"] as $usuario){

            $userData = new UserData(); 
            $userData->setFirstName($usuario["firstName"]); 
            $userData->setLastName($usuario["lastName"]); 
            $userData->setAge($usuario["age"]);
            $userData->setGender($usuario["gender"]);  
            $userData->setEmail($usuario["email"]); 
            $userData->setPhone($usuario["phone"]); 
            $userData->setUsername($usuario["username"]); 
            $userData->setBirthdate(new DateTime($usuario["birthDate"]));
            $userData->setRole($usuario["role"]);
            $UserSummary = new Summary();
            $UserSummary->setSummaryId($idSummary); 
            $userData->setSummary($summary);    

            $em->persist($userData); 
            $em->flush(); 
          }
          return true; 

        }catch(Exception $ex){
           
            echo($ex);  
            return false; 
        }
    }
}
