<?php

namespace App\Storages\Buckets;

require_once (dirname(__FILE__). '/../../../env.php');
require_once (dirname(__FILE__). '/../../../vendor/autoload.php');
require_once (dirname(__FILE__). '/bucket.php');

use Aws\S3\S3Client;
use App\Storages\Buckets\Bucket;

/**
 * AWS SDK S3の具象クラス
 */
class MyBucket extends Bucket {

    /** S3インスタンス */
    private $s3;

    private $access_key  = ACCESS_KEY;
    private $secret_key  = SECRET_KEY;
    private $bucket_name = S3_BUCKET_NAME;
    private const REGION = 'ap-northeast-1';

    /**
     * S3インスタンスを初期化する
     */
    public function __construct() {
        $this->s3 = new S3Client([
            'credentials' => [
                'key'    => $this->access_key,
                'secret' => $this->secret_key,
            ],
            'version' => 'latest',
            'region'  => self::REGION
        ]);
    }

    /**
     * S3にオブジェクトを保存する
     *
     * @param array $prms
     * @return object
     */
    public function put(array $prms): object {
        extract($prms);
        return $this->s3->putObject([
            'Bucket'      => S3_BUCKET_NAME,
            'Key'         => $full_path.$file_name,
            'Body'        => $content,
            'ContentType' => $content_type
        ]);
    }

    /**
     * S3にオブジェクトを取得する
     *
     * @param array $prms
     * @return object
     */
    public function get(array  $prms): object {
        extract($prms);
        return $this->s3->getObject([
            'Bucket' => S3_BUCKET_NAME,
            'Key'    => $full_path.$file_name
        ]);
    }

    /**
     * S3からオブジェクトを取得し、その中身だけ抽出する
     *
     * @param [type] $prms
     * @return any
     */
    public function get_contents($prms) {
        $obj = $this->get($prms);
        return $obj->get('Body');
    }
}