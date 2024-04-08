<?php 
include 'dbconfig.php';

session_start(); //세션 시동걸어주기 

if(isset($_SESSION['login_id'])){ //세션에 아이디가 있어야댐
    $user_name = $_SESSION['login_name'] ;
    $user_id = $_SESSION['login_id'];
} else{
    $user_name  ="Guest"; //로그인 값없을시 안전하게 user_name사용하기위해서 예외처리해줌 
}
//아이디 불러오기 끝


$currentPage = 1; // 기본적으로 1번 페이지로 지정 
            if (isset($_GET["currentPage"])) {
                $currentPage = $_GET["currentPage"];
            } //get요청에 페이지 지정이 있으면 그페이지로 설정하게됨 /

//페이징 작업용 테이블 내 전체 행 갯수 조회 
$sqlCount = "SELECT count(*) FROM koPost";
// koPost의 총 행의 갯수를 조회함 count(*) = 전체행수를 알려주는 sql 자체함수임 
$resultCount = mysqli_query($mysqli,$sqlCount); //sql 실행
if($rowCount = mysqli_fetch_array($resultCount)){
    $totalRowNum = $rowCount["count(*)"];
} //totalRowNum에 결과 값 담김 행이 몇개인지 

if($resultCount){
}else{
    mysqli_error($mysqli);
} // 실행실패시 에러발생

$rowPerPage = 20; //몇개씩 보여줄건지 20개 
$begin = ($currentPage -1) * $rowPerPage; // 시작할 post id 의 번호 begin
$sql = "SELECT koPost.id, user.name, koPost.create_time, koPost.title, koPost.riseSelect, koPost.stockName, koPost.watchCnt, koPost.likeCnt, LPAD(koStock.code, 6, '0') AS stockCode
FROM koPost
JOIN user ON koPost.user_id = user.id
JOIN koStock ON koPost.stockName = koStock.name
 order by koPost.id desc limit $begin,$rowPerPage ";
// 리스트 조회를위한 select user, koPost를 id로 조인해서 user.name이 반환되게하였다. desc로 내림차순 begin ~ rowPerPage = 1~20까지라는뜻임 
$result = mysqli_query($mysqli,$sql);
if($result){
}else{
    mysqli_error($mysqli);
}

//검색했을때의 경우 
if($_SERVER["REQUEST_METHOD"] == "GET"){
//GET에서 받은 종목명만 조회하기 

}

   
?>

<!DOCTYPE html>
<html lang="kr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css" type="text/css">

    <title>국내주식게시판</title>
</head>

<body>

    <header>
        <div class="header_inner">
            <div class="logo_area">
                <a href="/risingproject/home.php">
                <div class="logo"><img src="resources/rise_logo.png" alt="오른다 로고" width="300px" height ="120px" alt="오른다로고"></div>
                </a>

            </div>
            <div class="right_area">
            <?php 
                if($user_name != "Guest"){
                    echo $user_name , " 님 환영합니다 ". '<form action="user/mypage.php" method="POST">
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
                    <a href = "/risingproject/board_usStock.php">미국주식</a>
                </div>
                <div class="nav_board">
                    <a>자유게시판</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="list_option">
            <div class="left_option">
                <form action="board_koreaStock.php" method="get" >
                    <input type="textarea" placeholder="종목명 검색" name='search'>
                    <input type="submit" value="검색">
                </form>
            </div>
            <div class="right_option">
                <input type="button" value="글쓰기" onClick="location.replace('http://192.168.101.129/risingproject/board_koreaStock/write.php');">
            </div>
        </div>
        <section id="sc-board">
            <section class="stock_board">
                <div class="board_title"><span>국내주식 게시판</span></div>
                <table>
                    <colgroup>
                        <col style="width: 4%;">
                        <col style="width: 8%;">
                        <col style="width: 20%;">
                        <col style="width: 8%;">
                        <col style="width: 8%;">
                        <col style="width: 4%;">
                        <col style="width: 3%;">
                        <col style="width: 3%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">번호</th>
                            <th scope="col">종목명</th>
                            <th scope="col">제목</th>
                            <th scope="col">글쓴이</th>
                            <th scope="col">작성일</th>
                            <th scope="col">오를까?</th>
                            <th scope="col">조회</th>
                            <th scope="col">공감</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                 <tr>
                                    <!--id 시작-->
                                        <td class="table"> 
                                            <?php
                                                echo $row['id'];
                                            ?>
                                        </td>
                                        <!--id  끝 -->
                                        <!--종목명 a태그라서 클릭하면 네이버 페이 증권으로 이동 -->
                                        <td>
                                            <?php
                                                echo "<a href='https://finance.naver.com/item/main.naver?code=".$row["stockCode"]."'>";
                                                echo $row["stockName"];
                                                echo "</a>";
                                                ?>
                            </td>
                            <!--종목명 끝-->
                            <!--제목 title -->
                            <td class="table"> 
                                            <?php
                                                echo "<a href='http://192.168.101.129/risingproject/board_koreaStock/koPost_detail.php?id=".$row["id"]."'>";
                                                echo $row["title"];
                                                echo "</a>";
                                                ?>
                            </td>
                            <!--제목 끝-->
                            <td class="table"> 
                                            <?php
                                                echo $row["name"];
                                                ?>
                            </td>
                            <td class="table"> 
                                            <?php
                                                echo $row["create_time"];
                                                ?>
                            </td>
                            <td>
                                            <?php
                                                echo $row["riseSelect"];
                                                ?>
                            </td>
                            <td class="table"> 
                                            <?php
                                                echo $row["watchCnt"];
                                                ?>
                            </td>
                            <td class="table"> 
                                            <?php
                                                echo $row["likeCnt"];
                                                ?>
                            </td>
                        <?php
                            }
                        ?>
                        <!--테이블생성기 끝-->
                    
                    </tbody>
                </table>
            </section>
        </section>
        <div class="list_option">
            <div class="left_option">
                왼쪽
            </div>
            <div class="right_option">
                오른쪽
            </div>
        </div>
        <div class="bottom_paging_wrap">
            <div class="bottom_paging_box_iconpaging">
                <em>1</em><a>2</a><a>3</a><a>4</a><a>5</a><a>6</a><a>7</a><a>8</a><a>9</a><a>10</a><a>11</a><a>12</a><a>13</a><a>14</a><a>15</a><a
                    href="/board/lists/?id=neostock&amp;page=16" class="sp_pagingicon page_next">다음</a><a
                    href="/board/lists/?id=neostock&amp;page=83920" class="sp_pagingicon page_end">끝</a>
            </div>
            <div class="bottom_movebox">
                <button type="button" class="btn_grey_roundbg btn_schmove" onclick="$('.move_page_lyr').show();">페이지
                    이동<span class="sp_img icon_schmove"></span></button>
            </div>
            <div class="pop_wrap type3 move_page_lyr" style="top:-121px;right:0;display:none">
                <div class="pop_content schmove">
                    <div class="pop_head">
                        <h3>페이지 이동</h3>
                    </div>

                    <div class="inner page">
                        <div class="hint_txt">이동할 페이지 번호를 입력하세요.</div>
                        <div class="moveset">
                            <span class="tit">페이지</span>
                            <input class="" type="text" name="move_page" value="1">
                            <span class="num total_page">83920</span>
                            <button type="button" class="btn_blue small move_page_btn">이동</button>
                        </div>
                    </div>

                </div>

            </div>


        </div>

    </main>
    <footer>
        <div> Copyright 2024. KimChanWoo all rights reserved.

        </div>
    </footer>

<?php
 $mysqli->close();
?>

</body>

</html>