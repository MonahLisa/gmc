<?php
require '../../vendor/composer/autoload_files.php';

require_once('aws/aws-autoloader.php');
//require_once('vendor/composer/aws-autoloader.php');
$sharedConfig = [
    'credentials' => [
        'key'      => 'ajekevh4p1bkeb8e6joh',
        'secret'   => 'AQVN1HfiTIV0ctDjTxHpo7ozjByLYPE9gqRlyxZZ',
    ],
    'region'   => 'us-east-1',
    'endpoint' => 'https://storage.yandexcloud.net',
    'version'  => 'latest',
];

$sdk = new Aws\Sdk($sharedConfig);
$s3Client = $sdk->createS3();

try {
    $s3Client->putObject([
        'Bucket' => 'gmcrosstata',
        'Key'    => 'image_new.jpg',
        'Body'   => fopen('gmc_rosstat_logo.png', 'r')
    ]);
} catch (Aws\S3\Exception\S3Exception $e) {
    echo "There was an error uploading the file.\n";
}
?>
<h1>Документы</h1>
