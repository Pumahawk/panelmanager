<?php

class TestController {
  function dataManagerAction() {
    $data = [
      'id' => '1',
      'nome' => 'Demo2',
      'descrizione' => "Descrizione favolosa",
      'extra' => []
    ];
    $pr = new Progetto($data);
    Progetto::save($pr);
  }
}
