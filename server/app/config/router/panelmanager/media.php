<?php

return [
  'group' => '/Media', 'middleware' => ['logged'],
  [
    'name' => 'allMedia', 'pattern' => '/get_all.json',
    'options' => [
      '_controller' => 'PanelManager\\Media', '_action' => 'getAll'
    ]
  ],
  [
    'name' => 'getByProject', 'pattern' => '/project',
    'options' => [
      '_controller' => 'PanelManager\\Media', '_action' => 'getByIdProject'
    ]
  ],
  [
    'name' => 'deleteMedia', 'pattern' => '/delete',
    'options' => [
      '_controller' => 'PanelManager\\Media', '_action' => 'delete'
    ]
  ],
  [
    'name' => 'uploadMedia', 'pattern' => '/upload',
    'options' => [
      '_controller' => 'PanelManager\\Media', '_action' => 'upload'
    ]
  ]
];
