<?php

$optionLoader = new Option\Option();

return [
  'group' => '/REST.php',

  $optionLoader -> readOptions('router/panelmanager/app'),
  $optionLoader -> readOptions('router/panelmanager/user'),
  $optionLoader -> readOptions('router/panelmanager/project'),
  $optionLoader -> readOptions('router/panelmanager/media'),
  $optionLoader -> readOptions('router/panelmanager/fattura')
];
