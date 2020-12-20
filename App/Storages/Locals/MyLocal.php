<?php

namespace App\Storages\Locals;

require_once(dirname(__FILE__).'/../../../env.php');

use App\Storages\Locals\Loval;

final class MyLocal extends Local {

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