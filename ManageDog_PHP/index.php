<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>”キョロ”の健康管理表</title>
</head>
<body>
  <h1>一覧</h1>
  <a href="form.html">記録作成</a>
<?php
$user = 'hmki';
$pass = 'hmki1331';
try {
$dbh = new PDO('mysql:host=localhost;dbname=managedog;charset=utf8', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM dogmng';
$stmt = $dbh->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<table border=1>' . PHP_EOL;
echo '<tr>' . PHP_EOL;
echo '<th>日付</th><th>時間</th><th>量</th>' . PHP_EOL;
echo '</tr>' . PHP_EOL;
foreach ($result as $row) {
  echo '<tr>' . PHP_EOL;
  echo '<td>' . htmlspecialchars($row['date'], ENT_QUOTES) . '</td>' . PHP_EOL;
  echo '<td>' . htmlspecialchars($row['time'], ENT_QUOTES)  . '</td>' . PHP_EOL;
  echo '<td>' . htmlspecialchars($row['amount'], ENT_QUOTES)  . '</td>' . PHP_EOL;
  echo '<td>' . PHP_EOL;
  echo '<a href="detail.php?id=' . htmlspecialchars($row['id'], ENT_QUOTES) . '">詳細</a>' . PHP_EOL;
  echo '<a href="edit.php?id=' . htmlspecialchars($row['id'], ENT_QUOTES) . '">変更</a>' . PHP_EOL;
  echo '<a href="delete.php?id=' . htmlspecialchars($row['id'], ENT_QUOTES) . '">削除</a>' . PHP_EOL;
  echo '</td>' . PHP_EOL;
  echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;
$dbh = null;
} catch (PDOException $e) {
  echo 'エラー発生： ' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
  exit;
}
?>
</body>
</html>