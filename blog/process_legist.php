<?
//DB 연결
    include '../db_config.php'; 
// 세션 시작
session_start();

    $filtered = array(
        'log_id'=>mysqli_real_escape_string($conn, $_POST['log_id']),
        'name'=>mysqli_real_escape_string($conn, $_POST['name']),
        'pw'=>mysqli_real_escape_string($conn, $_POST['pw']),
        'ph'=>mysqli_real_escape_string($conn, $_POST['ph'])
    );
    
    $sql = "
        INSERT INTO writer
            (log_id, name, pw, ph, reg_day)
            VALUES(
                '{$filtered['log_id']}',
                '{$filtered['name']}',
                '{$filtered['pw']}',
                '{$filtered['ph']}',
                NOW()
            )
    ";
    print_r($sql);

    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo '가입하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요.';
        error_log(mysqli_error($conn));
    } else {
        echo '가입에 성공했습니다. <a href="index.php">돌아가기</a>';
    }
?>