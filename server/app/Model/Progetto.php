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
      $this -> nome = $data['id'];
      $this -> nome = $data['nome'];
      $this -> descrizione = $data['descrizione'];
      $this -> extra = $data['extra'];

      $this -> dataManager = new DataManager();
      $this -> dataFile = 'progetti';
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

  public static function getAll() {
    return [
      ['id' => '0', 'nome' => 'DemoPr1'],
      ['id' => '1', 'nome' => 'DemoPr2'],
      ['id' => '2', 'nome' => 'DemoPr3'],
      ['id' => '3', 'nome' => 'DemoPr4']
    ];
  }
  public static function getById($id) {
    return [
      'id' => '0',
      'nome' => 'DemoPr1',
      'descrizione' => 'Bella descrizione piena di dettagli',
      'extra' => [
        ['chiave' => 'ChiaveDemo', 'valore' => 'ValoreDemo']
      ]
    ];
  }
}
