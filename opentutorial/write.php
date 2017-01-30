<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
</head>
<body id="target">
    <header>
    <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩">
        <h1><a href="http://localhost/index.php">JavaScript</a></h1>
  </header>
   
   
   
   
   
   
    <nav>
        <ol>
    <?php
    while( $row = mysqli_fetch_assoc($result)){
      echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
    }
    ?>
        </ ol>
    </nav>
    
    
  <div id="control">
    <input type="button" value="white" onclick="document.getElementById('target').className='white'"/>
    <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
    <a href="http://localhost/write.php">쓰기</a>
  </div>
  
  
  <article>
    <form action="process.php" method="post">
      <p>
        <label for="title">제목 :</label>
        <input id="title" type="text" name="title">
      </p>
      <p>
        <label for="author">작성자 :</label>
        <input id="author" type="text" name="author" value="">
      </p>
      <p>
        <label for="description">본문 : </label>
        <textarea name="description" rows="8" cols="40"></textarea>
      </p>
      <p>
        <label for="vote">투표 : </label>
        <input id="vote" type="text" name="vote" value="1" style="border:none">
      </p>
      <p>
         <input type="submit" name="submit" value="전송">
      </p>
    </form>
  </article>
  
 <button onclick="myFunction()">투표</button>
 
  </article>
  
  <script type="text/javascript">
      count = 0;
      function myFunction() 
      {
        count += 1;
        document.getElementById("vote").value = count;    
      }
      
      
      
//        var input = document.getElementById('clickme2'),
//        count = 0;
//        input.onclick = myFunction() 
//        {
//            count += 1;
//            input.value  = "Click me: " + count;
//        };
    </script>
    
    
</body>
</html>