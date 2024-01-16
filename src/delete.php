<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1517362-final';
    const USER = 'LAA1517362';
    const PASS = 'Pass1121';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>削除</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from music where music_id=?');
    if ($sql->execute([$_POST['music_id']])) {
        echo '削除に成功しました。';
    } else {
        echo '削除に失敗しました。';
    }

?>
    <br><hr><br>
	<table>
		<tr><th>曲番号</th><th>曲名</th><th>アーティスト名</th></tr>
<?php
    foreach ($pdo->query('select * from music') as $row) {
        echo '<tr>';
        echo '<td>',$row['music_id'], '</td>';
        echo '<td>',$row['music_name'], '</td>';
        echo '<td>',$row['artist_name'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>

