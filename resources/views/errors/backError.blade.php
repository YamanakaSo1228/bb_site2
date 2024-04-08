<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>不正なリクエスト</title>
    <style>
        body {
            background-color: #e0f2f1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .container {
            text-align: center;
        }
        h1 {
            color: #00bcd4;
        }
        p {
            color: #333;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #00bcd4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0097a7;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>エラー</h1>
        <p>申し訳ありませんが、リクエストの処理中にエラーが発生しました。</p>
        <a href="#" class="btn" onclick="history.back()">戻る</a>
    </div>
</body>
</html>
