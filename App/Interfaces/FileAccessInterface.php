<?php

namespace App\Interfaces;

Interface FileAccessInterface {

    public function save(string $where, $prms);
    public function get(string $where, $prms);

}