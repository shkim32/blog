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
    <title>회원가입</title>
</head>
<body>
    <form action="process_legist.php" method="POST">
    <div>
        
        <ul>
            <li>아이디<input type="text" name="log_id" id="log_id"></li>
            <li>비밀번호<input type="password" name="pw" id="pw"></li>
            <li>비밀번호 확인<input type="password" name="pw_con" id="pw_con"></li>
            <li>이름<input type="text" name="name" id="name"></li>
            <li>핸드폰번호<input type="text" name="ph" id="ph"></li>
        </ul>
        <p><input type="submit" value="회원가입"></p>        
    </div>
    </form>
</body>
</html>