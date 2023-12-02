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
    <title>로그인</title>
</head>
<body>
    <form action="process_login.php" method="POST">
    <div>
        
        <ul>
            <li>아이디<input type="text" name="log_id" id="log_id"></li>
            <li>비밀번호<input type="password" name="pw" id="pw"></li>
        </ul>
        <p><input type="submit" value="로그인"></p>        
    </div>
    </form>
</body>
</html>