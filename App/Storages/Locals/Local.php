<?php

namespace App\Storages\Locals;

use App\Interfaces\AccessStorageInterface;

/**
 * strategyパターンを利用
 */
abstract class Local implements AccessStorageInterface {

    abstract public function put($prms);
    abstract public function get($prms);

}