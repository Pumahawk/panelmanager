<?php

class TestController {
  function dataManagerAction() {
    $data = [
      'id' => '0',
      'nome' => 'Demo',
      'descrizione' => "Descrizione favolosa",
      'extra' => []
    ];
    $pr = new Progetto($data);
    Progetto::push($pr);
  }
}
