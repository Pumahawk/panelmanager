<?php

class DataManager
{
  public $basePath = __DIR__.'/../data';

  function __construct($basePath = '') {
    if($basePath != ''){
      $this -> basePath .= '/'.$basePath;
    }
  }

  function openFileJSON($file = null, $bool = false) {
    if($file == null) {
      throw new Exception("L'argomento file non e' stato specificato.", 1);
    } else if (!file_exists($this -> basePath . "/" . $file . '.json')){
      throw new Exception("File " . $this -> basePath . "/" . $file . ".json non trovato", 1);
    } else {
      return json_decode(file_get_contents($this -> basePath . "/" . $file . '.json'), $bool);
    }
  }

  function saveFileJSON($file = null, $data = null) {
    if($file == null) {
      throw new Exception("L'argomento file non e' stato specificato.", 1);
    } else if (!file_exists($this -> basePath . "/" . $file . '.json')){
      throw new Exception("File " . $this -> basePath . "/" . $file . ".json non trovato", 1);
    } else if ($data == null){
      throw new Exception("L'argomento data e' nullo", 1);
    } else {
      return file_put_contents($this -> basePath . "/" . $file . '.json', json_encode($data));
    }
  }

  function moveUploadedFile($path, $name, $sovrascrivi = false) {
    if(!file_exists($this->basePath.'/'.$name) || $sovrascrivi) {
      return move_uploaded_file($path, $this->basePath.'/'.$name);
    } else {
      return false;
    }
  }
}
