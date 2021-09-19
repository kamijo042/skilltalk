<?php

namespace App\Components;
use Google\Cloud\Storage\StorageClient;

class GcsUtils
{

    /*
     * $from: storageディレクトリ以下のファイルパス, datasource/exp1.jpg
     * $to: GCSへのアップロード先, lecture-pdf/1/exp1.jpg
     */
    public static function uploadGCS($from, $to)
    {
        $options = [
            'name' => $to
        ];

        $client = new StorageClient();
        $bucket = $client->bucket(env('GCS_BUCKET'));
        $bucket->upload(
            fopen(storage_path($from), 'r'), $options
        );

    }

    /*
     * $from: GCSのファイルパス, 'lecture-pdf/1/exp1.pdf'
     * $to: storage以下のファイル, 'tmp/exp1.pdf'
     */
    public static function downloadGCS($from, $to)
    {
        $client = new StorageClient();
        $bucket = $client->bucket(env('GCS_BUCKET'));
        $object = $bucket->object($from);
        $object->downloadToFile(storage_path($to));

    }

    /*
     * $to: GCSの取り消したいファイルのパス
     */
    public static function deleteGCS($to)
    {
        $client = new StorageClient();
        $bucket = $client->bucket(env('GCS_BUCKET'));
        $object = $bucket->object($to);
        $object->delete();

    }

    /*
     * $target_file: GCSにファイルが存在しているかチェック
     */
    public static function existsGCS($target_file): boolean
    {
        $client = new StorageClient();
        $bucket = $client->bucket(env('GCS_BUCKET'));
        $object = $bucket->object($target_file);
        if ($object->exists()) {
            return true;
        }
        return false;
    }

}
