<?
//DB 연결
    include '../db_config.php'; 
// 세션 시작
session_start(); 

unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['userph']);

echo("<script>
    alert('로그아웃 되었습니다.')
    location.href='index.php';
    </script>");
?>