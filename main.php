<?php

require_once (dirname(__FILE__).'/App/Storages/Buckets/MyBucket.php');
require_once (dirname(__FILE__).'/App/Storages/Locals/MyLocal.php');
require_once (dirname(__FILE__).'/App/Directors/BucketDirector.php');
require_once (dirname(__FILE__).'/App/Directors/LocalDirector.php');

use Aws\S3\Exception\S3Exception;
use App\Storages\Buckets\MyBucket;
use App\Storages\Locals\MyLocal;
use App\Directors\BucketDirector;
use App\Directors\LocalDirector;

$content = [
    ['id' => '001', 'name' => '太郎'],
    ['id' => '002', 'name' => 'jiro'],
];

// 【Bucket】保存したい時 ------------------
// $prms_to_put = [
//     'content'      => $content,
//     'content_type' => 'application/json',
//     'dir'          => ['0001', '0002'],
//     'file_name'    => 'test.json'
// ];
// $bucket   = new MyBucket();
// $director = new BucketDirector($bucket);
// $director->set_prms($prms_to_get);
// $director->convert_array_to_json(['JSON_PRETTY_PRINT', 'JSON_UNESCAPED_UNICODE']);

// 【Bucket】取得したい時 ------------------
// $prms_to_get = [
//     'dir'       => ['0001', '0002'],
//     'file_name' => 'test.json'
// ];
// $bucket   = new MyBucket();
// $director = new BucketDirector($bucket);
// $director->set_prms($prms_to_get);


// 【Local】保存したい時 ------------------
// $prms_to_put = [
//     'content'      => $content,
//     'dir'          => ['0001', '0002'],
//     'file_name'    => 'test.json'
// ];
// $bucket   = new MyLocal();
// $director = new LocalDirector($bucket);
// $director->set_prms($prms_to_put);
// $director->convert_array_to_json(['JSON_PRETTY_PRINT', 'JSON_UNESCAPED_UNICODE']);

// 【Local】取得したい時 ------------------
// $prms_to_get = [
//     'dir'       => ['0001', '0002'],
//     'file_name' => 'test.json'
// ];
// $bucket   = new MyBucket();
// $director = new BucketDirector($bucket);
// $director->set_prms($prms_to_get);

try{
    // $director->save();
    // echo $director->get();
} catch (S3Exception $e) {
    echo $e->getMessage();
}
