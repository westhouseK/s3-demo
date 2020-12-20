<?php

namespace App\Storages\Locals;

use App\Interfaces\FileAccessInterface;

/**
 * strategyパターンを利用
 */
abstract class Local implements FileAccessInterface {

    public function save(string $where, $prms) {
        echo 'save';
    }
    public function get(string $where, $prms) {
        echo 'get';
    }
}