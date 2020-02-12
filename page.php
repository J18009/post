<?php

header('Content-Type: text/html; charset=UTF-8');

//データベース接続
$server = "localhost";
$userName = "root";
$password = "";
$dbName = "todolist";

$mysqli = new mysqli($server, $userName, $password,$dbName);

if ($mysqli->connect_error){
	echo $mysqli->connect_error;
	exit();
}

$sql = "SELECT * FROM list";
$result = $mysqli -> query($sql);

//クエリー失敗
if(!$result) {
	echo $mysqli->error;
	exit();
}
//レコード件数
$row_count = $result->num_rows;

//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$rows[] = $row;
}

//結果セットを解放
$result->free();

// データベース切断
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
<title>登録リスト</title>
<link rel="stylesheet" href="style.css">
<meta http-equiv="content-type"charset="utf-8">
</head>
<body>
    <center><h1>登録一覧</h1></center>

    <h5>登録された件数：<?php echo $row_count; ?>件</h5>
<table border='1'>
<tr><th>登録番号</th><th>タイトル</th></tr>

<?php
    
foreach($rows as $row){
?>

<tr>
	<td class="id"><?php echo $row['id']; ?></td>
	<td class="title"><?php echo htmlspecialchars($row['title'],ENT_QUOTES);'utf-8'?></td>
</tr>
<?php
}
?>

</table>
</body>
</html>