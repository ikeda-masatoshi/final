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
		<title>更新-output</title>
	</head>
	<body>
    <button onclick="location.href='top.php'">トップへ戻る</button>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update music set music_name=?, artist_nama=? where music_id=?');
    
    if (empty($_POST['music_name'])) {
        echo '曲名を入力してください。';
    } else
    if (empty($_POST['artist_name'])) {
        echo 'アーティスト名を入力してください。';
    } else

    if ($sql->execute([htmlspecialchars($_POST['music_name']),$_POST['artist_name'],$_POST['music_id']])) {
        echo '更新に成功しました。';
    } else {
        echo '更新に失敗しました。';
    }
    
?>
        <hr>
        <table>
        <tr><th>曲ID</th><th>曲名</th><th>アーティスト名</th></tr>

<?php
foreach ($pdo->query('select * from music') as $row) {
    echo '<tr>';
    echo '<td>', $row['music_id'], '</td>';
    echo '<td>', $row['music_name'], '</td>';
    echo '<td>', $row['artist_name'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
        </table>
        <button onclick="location.href='koshin.php'">更新画面へ戻る</button>
        

    </body>
</html>

