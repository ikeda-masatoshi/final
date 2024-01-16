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
		<title>更新</title>
	</head>
	<body>
    <table>
    <tr><th>曲番号</th><th>曲名</th><th>アーティスト名</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from music where music_id=?');
	$sql->execute([$_POST['music_id']]);


	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="koshin-output.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="music_id" value="', $row['music_id'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="music_name" value="', $row['music_name'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="artist_name" value="', $row['artist_name'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>

