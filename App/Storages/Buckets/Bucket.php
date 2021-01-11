<?php

namespace App\Storages\Buckets;

require_once(dirname(__FILE__). '/../../Interfaces/AccessStorageInterface.php');

use App\Interfaces\AccessStorageInterface;

/**
 * S3バケット抽象クラス
 */
abstract class Bucket implements AccessStorageInterface{

    abstract public function put(array $prms);
    abstract public function get(array $prms);
}