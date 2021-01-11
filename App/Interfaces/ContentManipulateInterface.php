<?php

namespace App\Interfaces;

/**
 * ストレージのファイルを操作するためのインターフェイス
 */
Interface ContentManipulateInterface {

    public function save(array $prms);
    public function get(array $prms);

}