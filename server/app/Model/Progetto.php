<?php

class Progetto {

    public $id;
    public $nome;
    public $descrizione;
    public $extra;

    private $dataManager;
    private $dataFile;

  public function __construct($data) {
    if($data != null && isset($data['id'], $data['nome'], $data['descrizione'], $data['extra'])) {
      $this -> id = $data['id'];
      $this -> nome = $data['nome'];
      $this -> descrizione = $data['descrizione'];
      $this -> extra = $data['extra'];

      $this -> dataManager = new DataManager();
      $this -> dataFile = 'ProgettiDB';
    } else {
      throw new Exception("Parametro data non contiene le informazioni necessarie per istanziare Progetto.", 1);
    }
  }

  public function toArray() {
    $data['id'] = $this -> id;
    $data['nome'] = $this -> nome;
    $data['descrizione'] = $this -> descrizione;
    $data['extra'] = $this -> extra;
    return $data;
  }

  public static function push($progetto) {
    if($progetto instanceof Progetto) {
      $progettiDB = $progetto -> dataManager -> openFileJSON($progetto -> dataFile);
      $progetto -> id = $progettiDB -> contatore + 1;
      $progettiDB -> contatore += 1;
      $progettiDB -> progetti[] = $progetto -> toArray();
      $progetto -> dataManager -> saveFileJSON($progetto -> dataFile, $progettiDB);
      return true;
    } else {
      throw new Exception("Parametro progetto non e' una istanza di Progetto", 1);
      return false;
    }
  }

  public static function save($progetto) {
    if($progetto instanceof Progetto) {
      $progettiDB = $progetto -> dataManager -> openFileJSON($progetto -> dataFile);
      foreach ($progettiDB -> progetti as $pr) {
        if($pr -> id == $progetto -> id) {
          $pr -> nome = $progetto -> nome;
          $pr -> descrizione = $progetto -> descrizione;
          $pr -> extra = $progetto -> extra;
          break;
        }
      }
      $progetto -> dataManager -> saveFileJSON($progetto -> dataFile, $progettiDB);
      return true;
    } else {
      throw new Exception("Parametro progetto non e' una istanza di Progetto", 1);
      return false;
    }
  }

  public static function getAll() {
    $dataManager = new DataManager();
    $progettiDB = $dataManager -> openFileJSON('ProgettiDB');

    return $progettiDB -> progetti;
  }
  public static function getById($id) {
    $dataManager = new DataManager();
    $progettiDB = $dataManager -> openFileJSON('ProgettiDB');
    $progetti = $progettiDB -> progetti;
    foreach ($progetti as $progetto) {
      if($progetto -> id == $id)
        return $progetto;
    }
    return false;
  }

  public static function saveOption($opt) {
    if($opt != null && isset($opt['nome'], $opt['descrizione'], $opt['extra'])) {
      $dm = new DataManager();
      $dm -> saveFileJSON("ProgettoIMP", $opt);
      return true;
    } else {
      throw new Exception("Il parametro opt non contiene informazioni corrette", 1);
    }
  }

  public static function delete($id) {
    $dataManager = new DataManager();
    $progettiDB = $dataManager -> openFileJSON('ProgettiDB');
    $progetti = $progettiDB -> progetti;
    foreach ($progetti as $key => $progetto) {
      if($progetto -> id == $id) {
        array_splice($progettiDB -> progetti, $key, 1);
      }
    }
    $dataManager -> saveFileJSON('ProgettiDB', $progettiDB);
  }
}
