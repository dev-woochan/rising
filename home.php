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


$sql = "SELECT koPost.id, user.name, koPost.create_time, koPost.title, koPost.riseSelect, koPost.stockName, koPost.watchCnt, koPost.likeCnt, LPAD(koStock.code, 6, '0') AS stockCode
FROM koPost
JOIN user ON koPost.user_id = user.id
JOIN koStock ON koPost.stockName = koStock.name
order by koPost.id desc limit 5" ;
//게시글 불러오기 
$loadPost = mysqli_query($mysqli,$sql);
  


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF8">
    <link rel="stylesheet" href="home.css" type="text/css">
    <title>
        오른다 홈
    </title>
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
                    <a href ="/risingproject/board_koreaStock.php">국내주식</a>
                </div>
                <div class="nav_board">
                    <a href ="/risingproject/board_usStock.php">미국주식</a>
                </div>
                <div class="nav_board">
                    <a>자유게시판</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div style="margin-top : 10px;">
            주요 증시 현황
        </div>
        <section class="sc-chart">
            <section class="chart_wrap">
                <div class="chart_inner">
                    <div class="chart_title">
                        코스피
                    </div>
                    <span>2,648,76</span>
                    <span>34.96</span>
                    <span>+1.34%</span>
                    <div>
                        <img src="https://ssl.pstatic.net/imgfinance/chart/main/KOSPI.png?sidcode=1708490701986"
                            class="main_chart_kospi" alt="실시간 코스피 차트">
                    </div>
                </div>
                <div class="chart_inner">
                    <div class="chart_title">
                        코스닥
                    </div>
                    <span>2,648,76</span>
                    <span>34.96</span>
                    <span>+1.34%</span>
                    <div>
                        <img src="https://ssl.pstatic.net/imgfinance/chart/main/KOSDAQ.png?sidcode=1708490701988"
                            class="main_chart_kosdaq" alt="실시간 코스닥 차트">
                    </div>
                </div>
            </section>
            <section class="chart_wrap">
                <div class="chart_inner">
                    <div class="chart_title">
                        나스닥
                    </div>
                    <span>
                        <?php 
                    echo 1+3
                    ?>
                    </span>
                    <span>34.96</span>
                    <span>+1.34%</span>
                    <div>
                        <img src="https://ssl.pstatic.net/imgfinance/chart/world/continent/NAS@IXIC.png?1708491621832"
                            class="main_chart_nasdaq" alt="실시간 나스닥 차트">
                    </div>
                </div>
                <div class="chart_inner">
                    <div class="chart_title">
                        S&P500
                    </div>
                    <span>2,648,76</span>
                    <span>34.96</span>
                    <span>+1.34%</span>
                    <div>
                        <img src="https://ssl.pstatic.net/imgfinance/chart/world/continent/SPI@SPX.png?1708491621832"
                            class="main_chart_S&P500" alt="실시간 S&P500 차트">
                    </div>
                </div>
            </section>

        </section>
        <section id="sc-board">
            <section class="stock_board">
                <div class="board_title"><a href="/risingproject/board_koreaStock.php">국내주식 게시판</a></div>
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
                        while($row = mysqli_fetch_array($loadPost)){
                            ?>

                        <tr class="ub-content">
                            <td><?php
                                 echo $row['id'];
                                            ?></td>
                            <td><?php
                                                echo "<a href='https://finance.naver.com/item/main.naver?code=".$row["stockCode"]."'>";
                                                echo $row["stockName"];
                                                echo "</a>";
                                                ?></td>
                            <td><?php
                                                echo "<a href='http://192.168.101.129/risingproject/board_koreaStock/koPost_detail.php?id=".$row["id"]."'>";
                                                echo $row["title"];
                                                echo "</a>";
                                                ?></td>
                            <td><?php
                                                echo $row["name"];
                                                ?></td>
                            <td><?php
                                                echo $row["create_time"];
                                                ?></td>
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
                        </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
            <section class="stock_board">
                <div class="board_title"><span>미국주식 게시판</span></div>
                <table>
                    <colgroup>
                        <col style="width: 6%;">
                        <col style="width: 8%;">

                        <col>
                        <col style="width: 8%;">
                        <col style="width: 8%;">
                        <col style="width: 8%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">번호</td>
                            <th scope="col">종목명</td>
                            <th scope="col">제목</td>
                            <th scope="col">글쓴이</td>
                            <th scope="col">작성일</td>
                            <th scope="col">조회수</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="ub-content">
                            <td>1</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>2</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>3</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>4</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>5</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            
    </main>
</body>
<footer>
    Copyright 2024. KimChanWoo all rights reserved.
</footer>

</html>