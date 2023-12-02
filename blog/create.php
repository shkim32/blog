<?
//DB 연결
    include '../db_config.php'; 
// 세션 시작
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noice</title>
    <link rel="stylesheet" type="text/css" href="CSS/create.css">
</head>
<body>
    <h1><a href="index.php">게시판</a></h1>
    <h3>글쓰기</h3>
    <form action="process_create.php" method="POST">
        <table>
            <tr>               
                <p><input type="text" name="title" placeholder="title"></p>
            </tr>
            <tr>
                <textarea name="description" id="description" placeholder="description"></textarea>
            </tr>
            <p><input type="submit" value="작성완료"></p>
        </table>
    </form>
</body>
</html>