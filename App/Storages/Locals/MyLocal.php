<?php

namespace App\Storages\Locals;

require_once(dirname(__FILE__).'/local.php');

use App\Storages\Locals\Local;

/**
 * ローカルへファイルを保存するクラス
 */
final class MyLocal extends Local {

    /**
     * 保存先のファイルを取得する
     *
     * @param [type] $prms
     * @return int true: ファイルに書き込まれたバイト数、false: 保存失敗 
     */
    public function put(array $prms): int {
        extract($prms);
        // TODO: すでにファイルが存在する場合、エラーを返す
        $dir = dirname(__FILE__). '../../../' . $full_path;
        
        // ディレクトリを作成する
        mkdir($dir, 0777, true);

        // ローカルに保存する
        return file_put_contents($dir.$file_name, $content);
    }


    /**
     * ファイルを取得する
     *
     * @param array $prms
     * @return mixed
     */
    public function get(array $prms) {
        extract($prms);

        return file_get_contents($full_path.$file_name, $content);
    }
}