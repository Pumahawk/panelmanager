<?php

namespace PanelManager;

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
		$data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    Media::deleteById($id);
    $resp = [
      'status' => 'OK',
      'message' => ''
    ];
    echo json_encode($resp);
  }

  function uploadAction() {
    $file = $_FILES['file'];

    if($file['type'] == 'image/jpeg') {

      $mediaManager = new DataManager('media');

      if($mediaManager -> moveUploadedFile($file['tmp_name'], $file['name'], true)){
        $mediaData = [
          'id' => 0,
          'idProgetto' => $_POST['project'],
          'nome' => $file['name']
        ];
        $media = new Media($mediaData);
        Media::push($media);
        $resp = [
          'status' => 'OK',
          'message' => ''
        ];
      } else {
        $resp = [
          'status' => 'ERROR',
          'message' => 'File exist'
        ];
      }
    } else {
      $resp = [
        'status' => 'ERROR',
        'message' => 'Not valid upload'
      ];
    }
    echo json_encode($resp);
  }
}
