<?
//db 연결 시작
$host = 'kisehe9107.cafe24.com';
$user = 'kisehe9107';
$pw = 'tjgml0302!';
$dbName = 'kisehe9107';
$mysql_port = '3306';

$conn = new mysqli( $host, $user, $pw ,$dbName); 
$conn -> set_charset("utf8"); 

// Check connection
if($conn->connect_errno){
  echo '[연결실패] : '.$conn->connect_error.'';
}

// $sql = "
// INSERT INTO notice
//   (title, description, created)
//   VALUES(
//     'MySQL',
//     'MySQL is ...',
//     NOW()
//   ) ";
//   echo $sql;
//   $result = $conn->query($sql);
  
//   if ($result) {
//       echo 'INSERT 성공';
//   } else {
//       echo 'INSERT 실패: ' . $conn->error;
//   }
  
//   $conn->close();

?>
