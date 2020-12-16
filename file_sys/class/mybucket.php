<?php

require_once(dirname(__FILE__).'/s3.php');
require_once(dirname(__FILE__). '/../../env.php');

use Aws\S3\S3Client;

final class Mybucket extends S3 {

    protected $access_key = ACCESS_KEY;
    protected $secret_key = SECRET_KEY;
    
    private const CONTENT_TYPE = [
        '0' => 'application/json',
    ];
    private const REGION = 'ap-northeast-1';

    public function __construct() {
        $this->s3 = new S3Client([
            'credentials' => [
                'key' => $this->access_key,
                'secret' => $this->secret_key,
            ],
            'version' => 'latest',
            'region'  => self::REGION
        ]);
    }

    public function save($where, $prms) {
        extract($prms);
        return $this->s3->putObject([
            'Bucket'       => $where,
            'Key'          => $file_name,
            'Body'         => $content,
            'ContentType'  => self::CONTENT_TYPE[$prm['content_type']]
        ]);
    }

    public function get($where, $prms) {
        return $this->s3->getObject([
            'Bucket' => $where,
            'Key'    => $prms['file_name']
        ]);
    }

    public function get_content($where, $prms) {
        $obj = $this->get($where, $prms);
        return $obj['Body'];
    }
}