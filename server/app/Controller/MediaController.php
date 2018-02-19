<?php

class MediaController {
  public function getAllAction() {
    // TODO function getAll
    $resp = [
      'status' => 'OK',
      'message' => '',
      'data' => [
        [
          'project' => 'ProgettoDemo',
          'media' => [
            [
              'id' => 0,
              'path' => 'path/to/image',
              'name' => 'namefile.ext'
            ]
          ]
        ],
        [
          'project' => 'ProgettoDemo2',
          'media' => [
            [
              'id' => 0,
              'path' => 'path/to/image2',
              'name' => 'namefile2.ext'
            ]
          ]
        ]
      ]
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
}
