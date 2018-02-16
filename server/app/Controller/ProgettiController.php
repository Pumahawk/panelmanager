<?php

class ProgettiController {
  public function getAllAction() {
    $resp['status'] = 'OK';
    $resp['data'] = Progetto::getAll();

    echo json_encode($resp);
  }
}
