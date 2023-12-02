<?
//DB 연결
    include '../db_config.php'; 
// 세션 시작
session_start();

// 선택한 게시물 보기 (index.php 복사)
$posting= '';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); //SQL을 주입하는 공격(sql injection)과 관련된 여러가지 기호를 문자로 바꿈
    $sql = "SELECT * FROM notice WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article = array(
        'id'=> $row['id'],
        'title'=> htmlspecialchars($row['title']),
        'description'=> htmlspecialchars($row['description'])
    );
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notice</title>
    <link rel="stylesheet" type="text/css" href="CSS/create.css">
</head>
<body>
    <h1><a href="index.php">게시판</a></h1>
    <h3>수정</h3>
    <form action="process_update.php" method="POST">
        <input type="hidden" name="id" value="<?=$filtered_id?>"> <!--왜필요하지?-->
        <table>
            <tr>               
                <p><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
            </tr>
            <tr>
                <textarea name="description" id="description" placeholder="description"><?=$article['description']?></textarea>
            </tr>
            <p><input type="submit" value="수정완료"></p>
        </table>
    </form>
</body>
</html>