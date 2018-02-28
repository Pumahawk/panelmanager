<?php

$optionLoader = new Option\Option();

$routeList = [
  $optionLoader->readOptions('router/demo'),
  $optionLoader->readOptions('router/panelmanager'),
];

return $routeList;
