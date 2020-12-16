<?php

require_once(dirname(__FILE__).'/../../vendor/autoload.php');
require_once(dirname(__FILE__).'/../interface/file_manipulate.php');

use Aws\S3\S3Client;

abstract class S3 implements manipulate{

    protected $access_key;
    protected $secret_key;

    abstract public function save(string $where, $prms);
    abstract public function get(string $where, $prms);
}