<?php

namespace App\Traits;

/**
 * テキストを操作する関数群
 */
Trait TextFormatter {

    /** json_encode第2引数のオプション定数配列 */
    private $json_decode_options = [
        'JSON_THROW_ON_ERROR'    => 4194304,
        'JSON_PRETTY_PRINT'      => 128,
        'JSON_UNESCAPED_UNICODE' => 256
    ];

    /**
     * 配列のすべての要素に「/」を付与し、文字列結合し、パスを組み立てる
     * ex.［'hoge', 'fuga', '1'］ => 'hoge/fuga/1/'
     *
     * @param string|array $path
     * @return
     */
    protected function assemble_path($path) {
        if (is_array($path)) {
            // 配列の要素に「/」を付与
            $suffix_slash_name = array_map(function($name) {
                return sprintf('%s/', $name);
            }, $path);
            return implode('', $suffix_slash_name);
        }

        if (is_string($path)) return $path;
    }

    /**
     * 配列をJSONに変換し、返却する
     *
     * @param array $options json_encode第2引数のオプション
     * @return string 整形後のJSONを返却
     */
    protected function my_json_encode($arr, array $options = []): string {

        // オプションが指定されている場合、オプションを追加する
        if (!empty($options)) {
            foreach ($options as $option) {
                $sum[] = $this->json_decode_options[$option];
            }
            $options = array_sum($sum);
        } else {
            $options = 0;
        }
        return json_encode($arr, $options);
    }

    
    /**
     * JSONを配列またオブジェクトに変換し、返却する
     *
     * @param string $json
     * @param boolean $flg true: 配列, false: オブジェクト
     * @return array|string 配列またはオブジェクトを返却
     */
    protected function my_json_decode(string $json, $flg = true) {
        return json_decode($json, $flg);
    }
}
