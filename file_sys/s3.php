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
            'region'  => 'ap-northeast-1'
        ]);
    }

    public function get($where) {
        return $this->s3->getObject([
            'Bucket' => $where,
            'Key' => 'my-object1',
        ]);

    }

    public function save($where) {
        return $this->s3->putObject([
            'Bucket' => $where,
            'Key' => 'my-object1',
            'Body' => 'aaaa',
        ]);
    }


}