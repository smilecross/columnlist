<?php
// データまとめ用の空配列
$data = [];

// ファイルを開く（読み取り専用）
$file = fopen('data/columnlist.txt', 'r');
// ファイルをロック
flock($file, LOCK_SH);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
  while ($line = fgets($file)) {
    // 行をタブ（\t）で区切り、配列に変換する
    $columns = explode("\t", $line);
    // 列ごとにデータを配置して$dataに追加する
    $item = array(
      'date' => trim($columns[0]),
      'category' => trim($columns[1]),
      'app_name' => trim($columns[2]),
      'comment' => trim($columns[3])
    );
    $data[] = $item;
  }
  fclose($file);
}

// JSONデータを生成する
$jsonData = json_encode($data, JSON_UNESCAPED_UNICODE);
 
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>コラムリスト（一覧画面）</title>
  <link rel="stylesheet" type="text/css" href="reset.css"> 
  <link rel="stylesheet" type="text/css" href="style.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
 <script>
    // PHPで生成したJSONデータをJavaScriptに渡す
    var jsonData = <?php echo $jsonData; ?>;
    console.log(jsonData);
    
    // ページがロードされた後に実行する処理
    window.onload = function() {
      // JSONデータをテーブルに表示する処理

    // JSONデータを取得
    const documents = <?php echo $jsonData; ?>;

    // 以下のコードでコンソールログにデータを表示する
    console.log(documents);

    const htmlElements = [];
    documents.forEach(function (document) {
      htmlElements.push(`
        <tr>
          <td class="date">${document['date']}</td>
          <td class="category">${document['category']}</td>
          <td class="app_name">${document['app_name']}</td>
          <td class="comment">${document['comment']}</td>
        </tr>
      `);
    });

    document.getElementById('tableBody').innerHTML = htmlElements.join('');

    } 
    
  // テーブルを生成
    const tableBody = documents.map(doc => {
        return `
        <tr>
            <td class="date">${doc.data.date}</td>
            <td class="category">${doc.data.category}</td>
            <td class="app_name">${doc.data.app_name}</td>
            <td class="comment">${doc.data.comment}</td>
        </tr>
    `;
    });

    $("table tbody").html(tableBody.join(''));

  </script>

</head>

<body>
  <br>
  <h1>コラムリスト（一覧画面）</h1>
  <fieldset>
    <legend></legend>
    <div class="columnlist">
      <a href="columnlist_input.php">一覧画面</a>
      </div>
      <p>出稿済みコラムリスト</p>
    <table>
      <thead>
        <tr>
          <th>紙面掲載日</th>
          <th>カテゴリー</th>
          <th>アプリやサービス名</th>
          <th>コメント</th>
        </tr>
      </thead>
      <tbody  id="tableBody">
      </tbody>
    </table>
  </fieldset>
  <!-- <div id="graphContainer">
    <img src="jpgraph/jpgraph.php" alt="Graph">
  </div> -->
</body>

</html>

