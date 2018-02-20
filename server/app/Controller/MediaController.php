<?php

class MediaController {
  public function getAllAction() {
    // TODO function getAll
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
    $resp = [
      'status' => 'OK',
      'message' => '',
      'data' => $progettiResp
    ];
    echo json_encode($resp);
  }

  public function getByIdProjectAction(){
    // TODO function getByIdProject
    return false;
  }

  public function getByIdAction() {
    // TODO function getById
    return false;
  }

  function deleteAction() {
    // TODO function deleteAction
    return false;
  }

  function uploadAction() {
    // TODO function uploadAction
    $resp = [
      'status' => 'OK',
      'message' => ''
    ];
    echo json_encode($resp);
  }
}
