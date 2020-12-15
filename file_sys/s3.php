<?php

require_once './vendor/autoload.php';
require_once './file_sys/file_manipulate.php';

use Aws\S3\S3Client;

Class S3 implements file_manipulate {

    private $s3;

    public function __construct(string $access_key, string $secret_key) {
        
        $this->s3 = new S3Client([
            'credentials' => [
                'key' => $access_key,
                'secret' => $secret_key,
            ],
            'version' => 'latest',
            'region'  => 'ap-northeast-1' // 定数化
        ]);
    }

    // try-catchしたい
    public function put($where, $args) {
        extract($args);
        return $this->s3->putObject([
            'Bucket'       => $where,
            'Key'          => $file_name,
            'Body'         => $content,
            'ContentType'  => 'application/json' // 使う側がセットしたい
        ]);

    }

    // try-catchしたい
    public function get($where, $args) {
        return $this->s3->getObject([
            'Bucket' => $where,
            'Key'    => $args['file_name']
        ]);
    }


}