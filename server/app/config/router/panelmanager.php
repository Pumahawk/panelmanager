<?php

$optionLoader = new Option\Option();

return [
  'group' => '/REST.php',

  $optionLoader -> readOptions('router/app'),
  $optionLoader -> readOptions('router/user'),
  $optionLoader -> readOptions('router/project'),
  $optionLoader -> readOptions('router/media'),
  $optionLoader -> readOptions('router/fattura')
];
