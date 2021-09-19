<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Lectures;

class InsertLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Lectures::create([
            'category_large_id' => 1,
            'category_small_id' => 1,
            'title' => 'Laravelを使った予約管理画面の開発',
            'sub_title' => 'WEB/モバイル画面の管理画面の開発工程を講義します',
            'expected_skill' => 'WEB/モバイル画面の会員登録、ログイン、データベースのREAD/WRITE、セキュリティ対策など',
            'image_id' => 1,
            'unit_time' => 120,
            'unit' => '分',
            'price' => 15000,
            'user_id' => 1,
            'venue' => 'オンライン',
            'is_online' => 1,
            'is_man_to_man' => 1,
            'initial_discount' => 1,
            'student_discount' => 1,
            'difficulty' => 4,
            'status' => 1,
        ]) ;

        Lectures::create([
            'category_large_id' => 1,
            'category_small_id' => 1,
            'title' => 'WEB/モバイル画面UIの設計、コーディングの基礎',
            'sub_title' => 'WEB/モバイルの画面の開発手順、手法を講義します',
            'expected_skill' => 'WEBやモバイルの設計思想、組み込み方法を習得。IT企業の現場レベルのHTML, CSSを習得する',
            'image_id' => 2,
            'unit_time' => 60,
            'unit' => '分',
            'price' => 6000,
            'user_id' => 1,
            'venue' => 'オンライン',
            'is_online' => 1,
            'is_man_to_man' => 1,
            'initial_discount' => 1,
            'student_discount' => 1,
            'difficulty' => 2,
            'status' => 1,
        ]) ;

        Lectures::create([
            'category_large_id' => 1,
            'category_small_id' => 1,
            'title' => 'iphoneアプリで電卓を作ろう',
            'sub_title' => 'swiftを使った電卓アプリの設計開発を講義します',
            'expected_skill' => 'Swift言語を使い、iphoneアプリを制作します。Xcodeの使い方やswiftの基礎的な動きをレクチャーします',
            'image_id' => 3,
            'unit_time' => 120,
            'unit' => '分',
            'price' => 10000,
            'user_id' => 1,
            'venue' => 'オンライン',
            'is_online' => 1,
            'is_man_to_man' => 1,
            'initial_discount' => 1,
            'student_discount' => 1,
            'difficulty' => 3,
            'status' => 1,
        ]) ;

        Lectures::create([
            'category_large_id' => 1,
            'category_small_id' => 2,
            'title' => 'Cloud function, Storage, BigQueryを使ったデータ連携APIの構築',
            'sub_title' => 'GCPのバックエンドシステムの開発手順を講義します',
            'expected_skill' => 'Cloud function, Storage, BigQueryといったGCPの機能を理解することができる',
            'image_id' => 7,
            'unit_time' => 120,
            'unit' => '分',
            'price' => 12000,
            'user_id' => 1,
            'venue' => 'オンライン',
            'is_online' => 1,
            'is_man_to_man' => 1,
            'initial_discount' => 1,
            'student_discount' => 1,
            'difficulty' => 4,
            'status' => 1,
        ]) ;

        Lectures::create([
            'category_large_id' => 1,
            'category_small_id' => 2,
            'title' => 'Kubenetesを使ったWEBバランサーの構築',
            'sub_title' => 'WEBサーバーの負荷分散手法について解説します',
            'expected_skill' => 'Kubenetesの理解、実戦で利用するバランサー設定が理解できる',
            'image_id' => 8,
            'unit_time' => 120,
            'unit' => '分',
            'price' => 15000,
            'user_id' => 1,
            'venue' => 'オンライン',
            'is_online' => 1,
            'is_man_to_man' => 1,
            'initial_discount' => 1,
            'student_discount' => 1,
            'difficulty' => 4,
            'status' => 1,
        ]) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
