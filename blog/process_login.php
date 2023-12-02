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

    //아이디 비밀번호 입력 확인
    if(!$filtered['log_id']){
        echo("<script>
            alert('아이디를 입력하세요.')
            history.go(-1)
            </script>");
        exit;
    }elseif(!$filtered['pw']){
        echo("<script>
            alert('비밀번호를 입력하세요.')
            history.go(-1)
            </script>");
        exit;
    }
    
    //DB의 로그인 정보와 대조
    $sql = "SELECT * FROM writer WHERE log_id='{$filtered['log_id']}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $num_match = mysqli_num_rows($result);

    if(!$num_match){
        echo("<script>
            alert('등록되지 않은 아이디입니다.')
            history.go(-1)
            </script>");
        exit;
    }elseif ($filtered['pw'] != $row['pw']) {
        echo("<script>
            alert('잘못된 비밀번호입니다.');
            history.go(-1);
            </script>");
        exit;
    }else{
        $userid = $row['log_id'];
        $userpw = $row['pw'];
        $username = $row['name'];
        $userph = $row['ph'];

        $_SESSION['userid'] = $userid;
        $_SESSION['userpw'] = $userpw;
        $_SESSION['username'] = $username;
        $_SESSION['userph'] = $userph;

        echo("<script>
            alert('로그인 되었습니다.')
            location.href='index.php';
            </script>");
    }
    
?>