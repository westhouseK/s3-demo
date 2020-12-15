<?php

require_once './env.php';
require_once './file_sys/s3.php';

$s3 = new S3(ACCESS_KEY, SECRET_KEY);

$arr = [
    ['id' => '001', 'name' => 'taro'],
    ['id' => '002', 'name' => 'jiro'],
];

$args = [
    'file_name' => 'aaa/bbb/ddd.json',
    'content'   => json_encode($arr)
];

$s3->put(S3_BUCKET_NAME, $args);
var_dump($s3->get(S3_BUCKET_NAME, $args));