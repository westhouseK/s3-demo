<?php

use Aws\S3\Exception\S3Exception;

require_once(dirname(__FILE__).'/file_sys/class/mybucket.php');

$s3 = new Mybucket();

$arr = [
    ['id' => '001', 'name' => 'taro'],
    ['id' => '002', 'name' => 'jiro'],
];

$prms = [
    'file_name'    => 'aaa/bbb/ddd.json',
    'content'      => json_encode($arr),
    'content_type' => '0'
];

try{
    $s3->save(S3_BUCKET_NAME, $prms);
    $res = $s3->get(S3_BUCKET_NAME, $prms);
} catch (S3Exception $e) {
    echo $e->getMessage();
}

var_dump($res);