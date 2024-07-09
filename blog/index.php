<?
//DB 연결
    include '../db_config.php'; 
// 세션 시작
session_start();

// 게시판 목록 : 표에 게시판 데이터 불러오기
    $sql = "SELECT * FROM notice LEFT JOIN writer ON notice.writer = writer.log_id ORDER BY notice.id DESC";
    $result = mysqli_query($conn, $sql);
    $list = '';
    while ($row = mysqli_fetch_array($result)){
        $escape_title = htmlspecialchars($row['title']); //html 특성을 이용한 공격을 차단하는 escaping
        $escape_writer = htmlspecialchars($row['writer']);
        $format_date = date('m.d', strtotime($row['created']));
        $list = $list."<tr>
            <td class='list_article' id='li_no'>{$row['id']}</td>
            <td class='list_article' id='li_title'><a href=\"index.php?id={$row['id']}\"> {$escape_title} </a></td>
            <td class='list_article' id='li_writer'>{$escape_writer}</td>
            <td class='list_article' id='li_day'>{$format_date}</td>
            </tr>";
    } 

// 선택한 게시물 보기
    $posting= '';
    if(!isset($_GET['id'])){
        $posting = "";
    }else{
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); //SQL을 주입하는 공격(sql injection)과 관련된 여러가지 기호를 문자로 바꿈
        $sql = "SELECT * FROM notice LEFT JOIN writer ON notice.writer = writer.log_id WHERE notice.id={$filtered_id}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $article = array(
            'notice_id'=> $row['notice.id'],
            'title'=> htmlspecialchars($row['title']),
            'description'=> htmlspecialchars($row['description']),
            'writer'=> htmlspecialchars($row['writer'])
        );
        echo $article['id'];
        $posting = "<table id='posting_tb'>
            <tr>
                <th>{$article['title']}</th>
                <td class='post_de'>{$row['created']}</td> 
                <td class='post_de'>작성자 : ".$article['writer']."</td>                               
            </tr>
            <tr height='100'><td colspan='3' id='description'>{$article['description']}</td></tr>
            </table>
            <div class='list_hdnav'>
                <a href='index.php' class='buttons'>목록</a>
                <a href=update.php?id={$filtered_id} class='buttons'>수정</a>
                <form action='process_delete.php' method='post'>
                    <input type='hidden' name='id' value='{$filtered_id}' class='buttons'>
                    <input type='submit' value='삭제' class='buttons'>
                </form>
            </div>"; //삭제의 경우 링크를 통한 데이터가 삭제되면 안되기 때문에, 링크처리가 아닌 폼으로 처리해야 한다. (GET방식X POST방식O)
    } 
    
//로그인 유무 / 로그인 헤더
$login_h = "";
if(!$_SESSION['userid']) {
    $login_h = '<li><a href="login.php" class="hd_bt">로그인</a></li>
        <li><a href="legist.php" class="hd_bt">회원가입</a></li>';
} else {
    '<li><div class="hd_bt">'. $login_h = $_SESSION['userid'] . '</div></li>
        <li><a href="process_logout.php" class="hd_bt">로그아웃</a></li>
        <li><a href="user_modify.php" class="hd_bt">정보수정</a></li>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notice</title>
    <link rel="stylesheet" type="text/css" href="CSS/index.css">
</head>
<body>
    <header> <!--로그인 헤더-->
        <ul class='list_hdnav'><?=$login_h?></ul> <!--로그인/회원가입-->
        <h1><a href="index.php">자유게시판</a></h1>
        <div class='list_hdnav'><a href="create.php" class="buttons">글쓰기</a></div>
    </header>

    <article>
        <?=$posting?> <!--선택한 게시글-->
    </article>

    <main>
        <table id="list_tb"><tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>날짜</th>
        </tr><?=$list?></table> <!--게시판 목록-->
        <br>
    </main>

</body>
</html>