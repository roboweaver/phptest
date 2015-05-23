<?php
@require_once 'lib/Pascal.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$pascal = new Pascal(5);
echo $pascal->output();
$pascal = new Pascal(10);
echo $pascal->output();