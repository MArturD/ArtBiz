<?php
 class Redirect{
     public static function to($location = null){
         if ($location){
             if (is_numeric($location)){
                 switch ($location){
                     case 404:
                         header('HTTPS/1.0 404 Not Found.');
                         include 'errors/404.php';
                         exit;
                     break;
                 }
             }
             header('Location:' . $location);
         }
     }
 }


