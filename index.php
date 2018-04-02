<?php
session_start();
if(isset($_GET['language'])){
    $_SESSION['language'] = $_GET['language'];
}else{
    $_SESSION['language'] = "ENGLISH";
}
$servername="localhost";
$username="pedramamirirad";
$password="***********";
$dbname="pedramamirirad";
$conn =new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("FEL:".$conn->connect_error);
}
$conn->set_charset("utf8")
?>
<!DOCTYPE html>
<html>
<head>
<title>FILM REVIEW</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta charset="UTF-8">
<style>
body{
    font-family:"Courier New", Courier, monospace;
    margin:0;
    width:100%;
}
.language{
    float:right;
    margin-right:30px;
    padding:5px;
    font-family:"Courier New", Courier, monospace;
    line-height:1;
    border:2px solid black;
    border-radius:5px;
}
.header{
    margin-top:30px;
    margin-left:30px;
    margin-bottom:30px;
}
a{
    text-decoration: none;
    color:black;
}
.trailer iframe{
    margin: 0 auto;
    display: block;
    width: 50%;
    height: 350px;    
}
.description{
    margin:50px;
    font-family:"Times New Roman", Times, serif;
    line-height:25px;
}
</style>
</head>
<body>
<form  action="index.php" method="GET">
    <select name="language"  class="language">
    <?php if(isset($_GET['language'])){if($_GET['language'] == "SWEDISH"){?>
      <option value="SWEDISH" selected>SVENSKA</option>
      <option value="ENGLISH">ENGELSKA</option>
    <?php }elseif($_GET['language'] == "ENGLISH"){?>
      <option value="SWEDISH" >SWEDISH</option>
      <option value="ENGLISH" selected>ENGLISH</option>
    <?php }}else{?>
      <option value="SWEDISH" >SWEDISH</option>
      <option value="ENGLISH" selected>ENGLISH</option>
    <?php } ?>
    </select>
</form>

<div class="header">
  <h1><?php $sql="SELECT";
      $sql.=" {$_SESSION["language"]}";
      $sql.=" FROM `film-translate` WHERE section='first-title'; ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo $row[$_SESSION['language']];
      ?></h1>
  <a href="#" > <?php $sql="SELECT";
      $sql.=" {$_SESSION["language"]}";
      $sql.=" FROM `film-translate` WHERE section='link1'; ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo $row[$_SESSION['language']];
      ?> | </a>
  <a href="#"><?php $sql="SELECT";
      $sql.=" {$_SESSION["language"]}";
      $sql.=" FROM `film-translate` WHERE section='link2'; ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo $row[$_SESSION['language']];
      ?> | </a>
  <a href="#"><?php $sql="SELECT";
      $sql.=" {$_SESSION["language"]}";
      $sql.=" FROM `film-translate` WHERE section='link3'; ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo $row[$_SESSION['language']];
      ?></a>
</div>
<div class="trailer">
<iframe src="https://www.youtube.com/embed/dPoaN2XROk8?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>
<div class="description">
<p><?php $sql="SELECT";
      $sql.=" {$_SESSION["language"]}";
      $sql.=" FROM `film-translate` WHERE section='first-decription'; ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      echo $row[$_SESSION['language']];
      ?></p>
</div>

<script>
$(document).ready(function(){
    $( ".language" ).change(function() {
        $(this).closest("form").submit();
});
});
</script>
<?php $conn->close(); ?>
</body>
</html>
