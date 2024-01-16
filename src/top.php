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
    <meta http-equiv="Cache-Control" content="no-cache">
		<meta charset="UTF-8">
		<title>一覧</title>
	</head>
	<body>
        <h1>おすすめの曲一覧</h1>
        <hr>
        <button onclick="location.href='https://aso2201352.fem.jp/GitHub/teamC/final/src/toroku.php'">登録</button>
        <table>
    <tr><th>曲番号</th><th>曲名</th><th>アーティスト名</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from music') as $row) {
        echo '<tr>';
        echo '<td>', $row['music_id'], '</td>';
        echo '<td>', $row['music_name'], '</td>';
        echo '<td>', $row['artist_name'], '</td>';
        echo '<td>';

        echo '<form action="koshin.php" method="post">';
        echo '<input type="hidden" name="music_id" value="', $row['music_id'], '">';
        echo '<button type="submit">更新</button>';
        echo '</form>';

        echo '</td>';
        echo '<td>';

        echo '<form action="delete.php" method="post">';
        echo '<input type="hidden" name="music_id" value="', $row['music_id'], '">';
        echo '<button type="submit">削除</button>';
        echo '</form>';

        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    </body>
</html>
