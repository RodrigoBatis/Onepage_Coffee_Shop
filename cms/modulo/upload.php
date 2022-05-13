<?php
/***************************************************************************
* Objetivo: arquivo responsável em realizar uploaads de arquivos 
* Autor: Rodrigo
* Data: 13/05/2022
* Versão: 1.0  
**************************************************************************/

function uploadFile($arrayFile){

    require_once("modulo/config.php");

    $arquivo = $arrayFile;
    $sizeFile = (int) 0;
    $typeFile = (string) null;
    $nameFile = (string) null;

    if($arquivo['size'] > 0 && $arquivo['type'] != ""){
      
      $sizeFile = $arquivo['size']/1024;

      $typeFile = $arquivo['type'];

      $nameFile = $arquivo['name'];

      $tempFile = $arquivo['tmp_name'];

      if($sizeFile <= MAX_FILE_UPLOAD){

        if(in_array($typeFile, EXT_FILE_UPLOAD)){
         
          $nome = pathinfo($nameFile, PATHINFO_FILENAME);
          
          $extensao = pathinfo($nameFile, PATHINFO_EXTENSION);

          $nomeCripty = md5($nome.uniqid(time()));
          
          $foto = $nomeCripty . '.' . $extensao;

          if(move_uploaded_file($tempFile, DIRETORIO_FILE_UPLOAD.$foto)){
            return $foto;
          }else{
            return array(
              "idErro" => 13,
              "message" => "Não foi possível mover o arquivo para o servidor"
            );
          }

        }else{
          return array(
            "idErro" => 12,
            "mesage" => "A extensão do arquivo selecionado não é permitida"
          );
        }
      }else{
        return array(
          "idErro" => 10,
          "message" => "tamanho de arquivo inválido no upload"
        );
      }
    }else{
      return array(
        "idErro" => 11,
        "message" => "Não é possível realizar um upload sem um arquivo selecionado"
      );
    }

  }

?>