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
        <title>登録-output</title>
    </head>
    <body>
    <table>
            <tr><th>曲名</th><th>アーティスト名</th></tr>
        <?php
            foreach($pdo->query('select * from music') as $row) {
                echo '<tr>';
                echo '<td>',$row['music_mei'], '</td>';
                echo '<td>',$row['artist_mei'], '</td>';
                echo '</tr>';
                echo "\n";
            }
        ?>
        </table>
        <form action="toroku.php"method="post">
            <button type="submit">追加画面へ戻る</button>
        </form>
    </body>
</html>