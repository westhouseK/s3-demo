<?php

namespace App\Storages\Buckets;

require_once(dirname(__FILE__). '/../../../env.php');
require_once(dirname(__FILE__). '/../../../vendor/autoload.php');
require_once(dirname(__FILE__). '/bucket.php');

use Aws\S3\S3Client;
use App\Storages\Buckets\Bucket;

final class MyBucket extends Bucket {

    protected $bucket_name = S3_BUCKET_NAME;
    protected $access_key  = ACCESS_KEY;
    protected $secret_key  = SECRET_KEY;
    
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
            'ContentType'  => self::CONTENT_TYPE[$prms['content_type']]
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