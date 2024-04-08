<?php
include '../dbconfig.php';
// db 호출 

$post_num = $_GET["id"]; // a태그에 query 를 넣어서 get요청을 보냄 

session_start(); //세션 시동걸어주기 

if(isset($_SESSION['login_id'])){ //세션에 아이디가 있어야댐
    $user_name = $_SESSION['login_name'] ;
    $user_id = $_SESSION['login_id'];
} else{
    $user_name  ="Guest"; //로그인 값없을시 안전하게 user_name사용하기위해서 예외처리해줌 
}
//아이디 불러오기 끝

$sql = "SELECT koPost.create_time,koPost.stockName ,title, user.name, content, watchCnt, likeCnt, riseSelect, goalDate, postPrice , koStock.code, image
FROM koPost  
JOIN user ON koPost.user_id = user.id
JOIN koStock ON koPost.stockName = koStock.name
WHERE koPost.id = ($post_num) ";

$result = mysqli_query($mysqli,$sql);
$result_array = mysqli_fetch_array($result);

// 콘텐츠 끝 댓글 불러오는 db 작성 

$commentSql = "SELECT comment.id, comment.create_time, content, parentPostId, parentCommentId, orderNumber, depth, user.name
FROM comment
JOIN user ON user_id = user.id
WHERE parentPostId = $post_num
order by orderNumber, depth desc
";
//get으로 받아온 값과 일치하는 댓글만 불러오고 순서 orderNumber, depth로 정렬함 물론 최신이 가장위로오게 desc

$commentResult = mysqli_query($mysqli,$commentSql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>국내주식 글쓰기</title>
    <link rel="stylesheet" href="koPost_detail.css" type="text/css">



</head>

<body>

    <header>
        <div class="header_inner">
            <div class="logo_area">
                <div class="logo_area">
                    <a href="/risingproject/home.php">
                        <div class="logo">
                            <img src="/risingproject/resources/rise_logo.png" alt="오른다 로고" width="300px"
                                height="120px" alt="오른다로고"></div>
                    </a>

                </div>
            </div>
            <div class="right_area">
            <?php 
                if($user_name != "Guest"){
                    echo $user_name , " 님 환영합니다 ". '<form action="../user/mypage.php" method="POST">
                    <input type="submit" value="마이페이지">
                    </form>
                    <form action="/risingproject/user/logout_process.php" method="POST">
                    <input type="submit" value="로그아웃">
                    </form>'
                    ;
                }else{
                    echo '
                    <a href="/risingproject/user/login.php">
                    <span class="button">
                        로그인
                    </span>
                </a>
                <a href="/risingproject/user/signin.html">
                    <span class="button">
                        회원가입
                    </span>
                </a>
                    ';
                }
                ?>
                
            </div>
        </div>
        </div>

        <nav class="gnb">
            <div class="gnb_inner">
                <div class="nav_board">
                    <a href="/risingproject/home.php">홈</a>
                </div>
                <div class="nav_board">
                    <a href="/risingproject/board_koreaStock.php">국내주식</a>
                </div>
                <div class="nav_board">
                    <a href="/risingproject/board_usStock.php">미국주식</a>
                </div>
                <div class="nav_board">
                    <a>자유게시판</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
     
    <div class ="articleContentBox">
        <div class = "article_header">
            <div class ="header_top">
                <a href ="http://192.168.101.129/risingproject/board_koreaStock.php" class="link_board">국내주식 게시판</a>
                <div>
                <form action="http://192.168.101.129/risingproject/board_koreaStock/koPost_update.php" method="POST">
                    <input type="hidden" id="post_id" name="post_id" value= "<?php echo $post_num ?>">
                    <input type="submit" id="update_btn" value="수정">
                </form>
                <form action="http://192.168.101.129/risingproject/board_koreaStock/koPost_delete.php" method= "POST"
                    onsubmit=" return confirm('정말로 삭제하시겠습니까??'); ">
                    <input type="hidden" id="post_id" name="post_id" value= "<?php echo $post_num ?>">
                <input type="submit" class="button" id="delete_btn" value="삭제">
                
                </form>
                </div>
            </div>
        </div>
        <div class="header_mid">
            <div class ="article_title">
                <?php
                echo $result_array["title"];
                ?>

            </div>
            <div class ="article_writer">작성자 :
            <?php
                echo $result_array["name"];
                ?>
            </div>
            <div class ="article_date">
                <?php
                echo $result_array["create_time"];
                ?>
                </div>
        </div>
            <!--underline-->
        <div class ="article_stock">
            <div class = "stock">
                종목 : 
            <?php
                echo $result_array["stockName"];
                echo "(".$result_array["code"].")";
                ?>
            </div>
            <div class = "riseSelect">
            오른다
            </div>    
        </div>
        <div class ="article_goal">
            <div class = "price">
            작성일 가격 : 
            <?php
                echo $result_array["postPrice"];
                echo " 원";
                ?>
            </div>
            <div class = "goalDate">
            목표일 : 
            <?php
                echo $result_array["goalDate"];
                
                ?>
                 
            </div>    
        </div>
                    <!--underline-->

        <div class= "article_content">
        <?php
                echo $result_array["content"];

                if($result_array["image"]){
                echo "<image src='image/".$result_array['image']."'/>";
                }

                ?>
        </div>
        <div class="like">

        <input type="button" class="like_btn" >
        <div style="font-size: 20px;">
    <?php
    echo $result_array["likeCnt"];
    ?>
    </div>
        </div>

        <div class="article_comment">
        <div class="comment_title">댓글</div>
        <!--underline-->
        <!--댓글 불러오기 시작 -->
        
            <div id="comment_container">
            <?php 
        while($comment_row = mysqli_fetch_array($commentResult)){
            ?>
        <div class="comment_list">
            <div class="comment_top">
                <div class="comment_name" style="font-weight:700;">
                <?php
                echo $comment_row['name'];
                ?>
                 </div>
                <div>
                    <div style="
                    display :flex;
                    flex-direction:row;
                    ">
                        <a>수정</a>
                        <a>삭제</a>
                    </div>
                </div>  
            </div>
            <div class="comment_time">
            <?php
                echo $comment_row['create_time'];
                ?>
            </div>
            <div class="comment_bottom">
                <div class="comment_content" style="text-align:start; margin-top:10px; font-size:14px">
                <?php
                echo $comment_row['content'];
                ?>
                </div>
                <div style="padding-top:20px">
                <input type="button" class="reply_btn" value="답글">
                </div>
            </div>    
        </div>
        <?php
        }
        ?>
                </div>

            <!--댓글 불러오기 끝 -->

            <div class="comment_insert">
                <div class="comment_insert_name" id = "login_name"  >
                    <!--로그인했을때 안했을때 경우 나눠서 이름으로 등록되거나 로그인 요구창 나옴 -->
                    <?php
                        if($user_name){ //로그인중 
                            echo '<span style="font-weight: bold">'.$user_name.'</span>';
                        }else{
                            echo'
                            <a href="/risingproject/user/login.php" style="font-weight: bold"> 로그인</a>  을해주세요 
                            ';
                        }
                    ?>
        
                </div>
                <input type="text" id = "comment_insert_content" name="comment_insert_content">
                <div class ="comment_btn_wrapper">

                <?php
                        if($user_name){ //로그인중 
                            echo '                <input type="button" value = "등록" id="comment_btn">
                            ';
                        }else{
                            //로그인 안되어있으면 등록버튼이 없음
                        }   
                    ?>
        </div>
  

            </div>    
         </div>


    </div>    
   

    <footer>
    Copyright 2024. KimChanWoo all rights reserved.
</footer>
<script src="comment.js">
        </script>
</body>

</html> 