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
    // TODO function deleteById
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
      $dataManager = new DataManager();
      $mediaDB = $mediaManager -> openFileJSON('MediaDB');
      $mediaList = $mediaDB -> media;
    } else {
      throw new Exception('Parametro media non e\' una istanza della classe Media', 1);

    }
  }

  public static function push($media) {
    // TODO function push
  }
}