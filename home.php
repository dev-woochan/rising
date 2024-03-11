
<?php 
$login_id = $_POST['id'];
$login_pass = $_POST['pw'];
$login_name = "김찬우";
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
                    <div class="logo"><img src="rise_logo.png" alt="오른다 로고" width="300px" height ="120px" alt="오른다로고"></div>
                </a>

            </div>
            <div class="right_area">
                <?php 
                $login_name = "김찬우";
            if($_SERVER['REQUEST_METHOD']=="POST" && $login_name != " "){
                echo "{$login_name}님 환영합니다";
                
            }else {
                echo 
                '<a href="login.php">
                    <span class="button">
                        로그인
                    </span>
                </a>
                <a href="signin.html">
                    <span class="button">
                        회원가입
                    </span>
                </a>';
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
                    <a>암호화폐</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div>
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
                <div class="board_title"><span>국내주식 게시판</span></div>
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
            <section class="stock_board">
                <div class="board_title"><span>암호화폐 게시판</span></div>
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
        </section>
    </main>
</body>
<footer>
    Copyright 2024. KimChanWoo all rights reserved.
</footer>

</html>