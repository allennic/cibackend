<?php
/**
 * Created by PhpStorm.
 * User: erb398wei
 * Date: 16/9/27
 * Time: 13:44
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
class CI_PEAR{
    function __construct($class = NULL){
        ini_set('include_path',
        ini_get('include_path') . PATH_SEPARATOR . APPPATH . 'libraries/PEAR');

        if ($class){
            require_once (string) $class . EXT;
            log_message('debug', "PEAR Class $class Loaded");
        }
        else{
            log_message('debug', "PEAR Class Initialized");
        }
    }
    function load($class){
        require_once (string) $class . EXT;
        log_message('debug', "PEAR Class $class Loaded");
    }
}