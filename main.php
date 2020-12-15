<?php

require_once './env.php';
require_once './file_sys/s3.php';

$s3 = new S3(ACCESS_KEY, SECRET_KEY);

$s3->save(BUCKET_NAME);
$s3->get(BUCKET_NAME);