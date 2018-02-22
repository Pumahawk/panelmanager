<?php

class Media {

  public $id;
  public $idProgetto;
  public $nome;

  function __construct($data) {
    if ($data != null && isset($data['id'], $data['idProgetto'], $data['nome'])) {
      $this->id = $data['id'];
      $this->idProgetto = $data['idProgetto'];
      $this->nome = $data['nome'];

    } else {
      throw new Exception("Paramentro data non contine tutte le informazioni per l'istanza di Media", 1);
    }
  }

  public static function getById($id) {
    // TODO function getById
  }

  public static function deleteById($id) {
    $mediaManager = new DataManager();
    $mediaDB = $mediaManager -> openFileJSON('MediaDB');
    $media = $mediaDB -> media;

    foreach ($media as $key => $m) {
      if($m -> id == $id) {
        array_splice($mediaDB -> media, $key, 1);
        break;
      }
    }

    $mediaManager -> saveFileJSON('MediaDB', $mediaDB);
  }

  public static function getAll() {
    $dataManager = new DataManager();
    $mediaDB = $dataManager -> openFileJSON('MediaDB', true);
    $mediaList = $mediaDB['media'];

    return $mediaList;
  }

  public static function getByIdProject($id) {
    // TODO function getByIdProject
  }

  public static function save($media) {
    // TODO function save
    return;
    if($media instanceof Media) {
      $mediaManager = new DataManager();
      $mediaDB = $mediaManager -> openFileJSON('MediaDB');
      $mediaList = $mediaDB -> media;
    } else {
      throw new Exception('Parametro media non e\' una istanza della classe Media', 1);

    }
  }

  public function toArray() {
    $data['id'] = $this -> id;
    $data['idProgetto'] = $this -> idProgetto;
    $data['nome'] = $this -> nome;
    return $data;
  }

  public static function push($media) {
    if($media instanceof Media) {
      $mediaManager = new DataManager();
      $mediaDB = $mediaManager -> openFileJSON('MediaDB');

      $media -> id = $mediaDB -> contatore + 1;
      $mediaDB -> contatore += 1;
      $mediaDB -> media[] = $media -> toArray();

      $mediaManager -> saveFileJSON('MediaDB', $mediaDB);
      return true;
    } else {
      throw new Exception('Parametro media non e\' una istanza della classe Media', 1);

    }
  }

  public static function getAllProject() {
    $progetti = Progetto::getAll();
    $media =  Media::getAll();
    $progettiResp = array();

    foreach ($progetti as $key => $progetto) {
      $mediaProgetto = array();
      foreach ($media as $key2 => $m) {
        if($progetto -> id == $m['idProgetto']) {
          $mediaProgetto[] = $m;
        }
      }
      $progettiResp[] = [
        'info' => $progetto,
        'media' => $mediaProgetto
      ];
    }

    return $progettiResp;
  }
}
