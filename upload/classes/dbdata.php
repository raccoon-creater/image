<?php
    class DbData{
        
        protected $pdo;

        public function __construct(){
            //PDOオブジェクトを生成する
            $dsn = 'mysql:host=localhost; dbname=image_test; charset=utf8';
            $user = 'image';
            $password = 'test';
            try{
                $this->pdo = new PDO($dsn,$user,$password);
            }catch(Exception $e){
                echo 'Error:' . $e->getMessage();
                die();
            }
        }

        protected function query($sql,$array_params){   //SELECT文実行用メソッド
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($array_params);
            return $stmt;   //PDOステートメントオブジェクトを返すのでfetch( )、fetchAll( )で結果セットを取得
        }

        protected function exec($sql,$array_params){    //INSERT、UPDATE、DELETE文実行用のメソッド
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($array_params);
        }
    }