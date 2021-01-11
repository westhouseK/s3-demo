<?php

namespace App\Interfaces;

/**
 * ストレージと接続するためのインターフェース
 */
Interface AccessStorageInterface {

    public function put(array $prms);
    public function get(array $prms);

}