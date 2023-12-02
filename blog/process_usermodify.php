<?
//DB 연결
    include '../db_config.php'; 
// 세션 시작
session_start();

$filtered = array(
    settype($_POST['num'], 'integer'), //num 값은 항상 정수여야함
    'id'=>mysqli_real_escape_string($conn, $_POST['id']), //id 값은 항상 정수여야함
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
    UPDATE notice
    SET
        title = '{$filtered['title']}',
        description = '{$filtered['description']}'
    WHERE
        id = '{$filtered['id']}'
";

$result = mysqli_query($conn, $sql);
if($result === false){
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.';
    error_log(mysqli_error($conn));
} else {
    echo '저장에 성공했습니다. <a href="index.php">돌아가기</a>';
}
?>