<?php

namespace App\Directors;

require_once (dirname(__FILE__).'/../Traits/TextFormatter.php');

use App\Traits\TextFormatter;

/**
 * ローカルのファイルに指示を出すクラス
 * 保存先ストレージと呼び出し元を中継を行う
 * GoFデザインパターンのBuilderパターンのDirectorクラスを参考
 */
class LocalDirector {

    use TextFormatter;

    private $builder;
    protected $content;
    private $content_type;
    private $dir;
    private $file_name;

    /**
     * 操作したいクラスと配列等の保存したいデータを受け取る
     *
     * @param $builder 保存先のインスタンス
     * @return void
     */
    public function __construct($builder) {
        $this->builder = $builder;
    }

    /**
     * プロパティに値をセットする
     *
     * @param array $prms
     * @return void
     */
    public function set_prms(array $prms): void {
        foreach ($prms as $key => $prm) {
            $this->{$key} = $prm;
        }
    }

    /**
     * 保存先にコンテンツを保存する
     *
     * @return void
     */
    public function save(): void {

        $prms = [
            'content'      => $this->content,
            'content_type' => $this->content_type,
            'full_path'    => $this->assemble_path($this->dir),
            'file_name'    => $this->file_name,
        ];
        $this->builder->put($prms);
    }

    /**
     * 保存先からコンテンツを取得する
     *
     * @return mixed コンテンツの中身を返却
     */
    public function get() {
        $prms = [
            'full_path' => $this->assemble_path($this->dir),
            'file_name' => $this->file_name,
        ];
        $this->content = $this->builder->get_contents($prms);
        return $this->content;
    }

    /**
     * プロパティcontentをJSONからオブジェクトに変換する
     *
     * @return void
     */
    public function convert_json_to_array(): void {
        var_dump($this->content);
        exit;
        $this->content = $this->my_json_decode($this->content);
    }


    /**
     * プロパティcontentをJSONから配列に変換する
     *
     * @return void
     */
    public function convert_json_to_object(): void {
        $this->content = $this->my_json_decode($this->content, true);
    }
}