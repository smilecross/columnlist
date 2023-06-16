<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>コラム作成＆管理（入力画面）</title>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" type="text/css" href="reset.css"> 
  <link rel="stylesheet" type="text/css" href="style.css"> 

   
</head>

<body>
  <br>
  <h1>コラムリスト（入力画面）</h1>
  <form action="columnlist_create.php" method="POST">
    <fieldset>
      <legend> </legend>
      <div class="columnlist">
      <a href="columnlist_read.php">一覧画面</a>
      </div>
<!-- ここから追加 -->
         紙面掲載日 ： <input type="date" id="date" name="date2"  placeholder="掲載日">
        <div class="column_box">
        カテゴリー：<select type="text" name="category" id="category">
            <option value="basic">基本操作</option>
            <option value="charge">料金</option>
            <option value="admin">行政サービス</option>
            <option value="disaster">防災</option>
            <option value="security">セキュリティ</option>
            <option value="money">お金</option>
            <option value="life">暮らし</option>
            <option value="other">その他</option>
        </select>
        アプリやサービス名：<input type="text" id="app_name" name="app_name" placeholder="アプリやサービス名">
    </div>
    <div class="comment">
          機能や特徴：<input type="text" id="comment" name="comment"  placeholder="機能や特徴">
    </div>
<!-- ここまで追加 -->

      <div>
        <button>保存</button>
      </div>
    </fieldset>
  </form>

</body>

</html>