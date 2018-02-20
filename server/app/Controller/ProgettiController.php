<?php

class ProgettiController {
  public function getAllAction() {
    $resp['status'] = 'OK';
    $resp['data'] = Progetto::getAll();

    echo json_encode($resp);
  }
  public function getOptionAction() {
    $resp = [
      'status' => 'OK',
      'data' => [
        'nome' => 'DefaultName',
        'descrizione' => 'DefaultDescription',
        'extra' => [
          ['chiave' => 'ChiaveExemple', 'valore' => 'ValoreExemple'],
          ['chiave' => 'ChiaveExemple2', 'valore' => 'ValoreExemple2']
        ]
      ]
  ];

    echo json_encode($resp);
  }

  public function saveOptionAction() {
    $resp = [
      'status' => 'ERROR',
      'message' => 'Functionality not supported yet'
    ];

    echo json_encode($resp);
  }
  public function saveAction() {
		$data = json_decode(file_get_contents('php://input'));
    $data = $data -> options;
    $progetto = [
      'id' => 0,
      'nome' => $data -> nome,
      'descrizione' => $data -> descrizione,
      'extra' => $data -> extra
    ];

    try {
      $progetto = new Progetto($progetto);
      Progetto::push($progetto);
      $resp = [
        'status' => 'OK',
        'message' => ''
      ];
    } catch(Exception $e){
      $resp = [
        'status' => 'ERROR',
        'message' => 'Functionality not supported yet'
      ];
    }

    echo json_encode($resp);
  }
  public function openAction($params) {
    $id = $params['id'];
    $data = Progetto::getById($id);
    if($data){
      $resp = [
        'status' => 'OK',
        'message' => '',
        'data' => $data
      ];
    } else {
      $resp = [
        'status' => 'ERROR',
        'message' => 'Invalid id argument'
      ];
    }

    echo json_encode($resp);
  }
}
