<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>コラム作成＆管理（入力画面）</title>
</head>

<body>
  <form action="columnlist_create.php" method="POST">
    <fieldset>
      <legend>コラムリスト（入力画面）</legend>
      <a href="columnlist_read.php">一覧画面</a>
  
<!-- ここから追加 -->
        掲載日：<input type="date" id="date" name="date2"  placeholder="掲載日">
        <select type="text" name="category" id="category">
            <option value="basic">基本操作</option>
            <option value="charge">料金</option>
            <option value="admin">行政サービス</option>
            <option value="disaster">防災</option>
            <option value="security">セキュリティ</option>
            <option value="money">お金</option>
            <option value="life">暮らし</option>
            <option value="other">その他</option>
        </select>
        <input type="text" id="app_name" name="app_name" placeholder="アプリやサービス名">
        <input type="text" id="comment" name="comment"  placeholder="機能や特徴">

<!-- ここまで追加 -->

      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>