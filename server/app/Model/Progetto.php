<?php

class Progetto {
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
