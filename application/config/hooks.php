<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$hook['pre_controller'] = array(
        'class'    => 'MyClass',
        'function' => 'Myfunction',
        'filename' => 'Myclass.php',
        'filepath' => 'hooks'
        //'params'   => array('beer', 'wine', 'snacks')
);
