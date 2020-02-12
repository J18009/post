<?php

header('Content-Type: text/html; charset=UTF-8');

class MySQL{
    private $host;
    private $user;
    private $pass;
    private $dbname;
    protected $mysqli;

    //コンストラクタ
    public function __construct(){
        date_default_timezone_set('Asia/Tokyo');
        $this->host="localhost";
        $this->user="root";
        $this->pass="";
        $this->dbname="todolist";

        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        $this->mysqli->set_charset("utf8");
        if($this->mysqli->connect_error){
            print("接続失敗：".$mysqli->connect_error);
            exit();
        }
    }

    function add($title){
        $stmt=$this->mysqli->prepare("INSERT INTO list(title)VALUES(?)");
        $stmt->bind_param('s',$title);
        $stmt->execute();
    }
}
?>
