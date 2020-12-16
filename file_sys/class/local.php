<?php

require_once './interface/file_maniplate.php';

class Local implements file_maniplate {

    public function save(string $where, $prms) {
        echo 'save';
    }
    public function get(string $where, $prms) {
        echo 'get';
    }
}