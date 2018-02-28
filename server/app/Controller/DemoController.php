<?php

use View\View;

class DemoController {
  function homeAction() {
    $progettiResp = PanelManager\Media::getAllProject();
    $data = [
      'project' => $progettiResp
    ];

    $demo = new View('pages.demo');
    $demo -> show($data);
  }
}
