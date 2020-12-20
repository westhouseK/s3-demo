<?php

namespace App\Storages\Buckets;

require_once(dirname(__FILE__). '/../../Interfaces/FileAccessInterface.php');


use App\Interfaces\FileAccessInterface;

abstract class Bucket implements FileAccessInterface{

    protected $access_key;
    protected $secret_key;

    abstract public function save(string $where, $prms);
    abstract public function get(string $where, $prms);
}