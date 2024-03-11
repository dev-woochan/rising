<?php 
$title1 = "제목임";
$stock1 = "삼성전자";
$date1 = "2024-03-06";
$select1 = "오른다";

$title2 = "제목임";
$stock2 = "SK하이닉스";
$date2 = "2024-03-06";
$select2 = "오른다";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title3 = $_POST['title'];
    $stock3 = $_POST['stock'];
    $date3 = $_POST['date'];
    $select3 = $_POST['select'];
    $title = array('1'=>$title1, '2' => $title2, '3' => $title3);
    $stock = array('1'=>$stock1, '2' => $stock2, '3' => $stock3);
    $select = array('1'=>$select1, '2' => $select2, '3' => $select3);
    $date = array('1'=>$date1, '2' => $date2, '3' => $date3);

}
if($_SERVER["REQUEST_METHOD"] == "GET"){

    $search = $_GET['search'];
    $title3 = $_POST['title'];
    $stock3 = $_POST['stock'];
    $date3 = $_POST['date'];
    $select3 = $_POST['select'];
    $title = array('1'=>$title1, '2' => $title2, '3' => $title3);
    $stock = array('1'=>$stock1, '2' => $stock2, '3' => $stock3);
    $select = array('1'=>$select1, '2' => $select2, '3' => $select3);
    $date = array('1'=>$date1, '2' => $date2, '3' => $date3);
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
                <div class="logo"><img src="rise_logo.png" alt="오른다 로고" width="300px" height ="120px" alt="오른다로고"></div>
                </a>

            </div>
            <div class="right_area">
                <a href="login.php">
                    <span class="button">
                        로그인
                    </span>
                </a>
                <a href="signin.html">
                    <span class="button">
                        회원가입
                    </span>
                </a>
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
                    <a>암호화폐</a>
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
                <input type="button" value="글쓰기" onClick="location.replace('http://192.168.0.10/risingproject/board_koreaStock/write.html');">
            </div>
        </div>
        <section id="sc-board">
            <section class="stock_board">
                <div class="board_title"><span>국내주식 게시판</span></div>
                <table>
                    <colgroup>
                        <col style="width: 6%;">
                        <col style="width: 12%;">

                        <col>
                        <col style="width: 8%;">
                        <col style="width: 12%;">
                        <col style="width: 8%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">번호</td>
                            <th scope="col">종목명</td>
                            <th scope="col">제목</td>
                            <th scope="col">오를까?</td>
                            <th scope="col">작성일</td>
                            <th scope="col">조회수</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                            if(!empty($search)){
                                for($i = 1; $i< 21; $i++){
                            if($stock[$i] == $search && !empty($search)){
                        echo "<tr class='ub-content'>
                        <td>
                         {$i}
                        </td>
                        <td>
                        {$stock[$i]}</td>
                        <td>{$title[$i]}</td>
                        <td>{$select[$i]}</td>
                        <td>{$date[$i]}</td>
                        <td>0</td>
                    </tr>";}}}

                    else{
                        for($i = 1; $i< 21; $i++){
                        echo "<tr class='ub-content'>
                        <td>
                         {$i}
                        </td>
                        <td>
                        {$stock[$i]}</td>
                        <td>{$title[$i]}</td>
                        <td>{$select[$i]}</td>
                        <td>{$date[$i]}</td>
                        <td>0</td>
                    </tr>";
                    }
            }
                        ?>
                        
                        
                        <!-- <tr class="ub-content">
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
                        <tr class="ub-content">
                            <td>6</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>7</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>8</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>9</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>10</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>11</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>12</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>13</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>14</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>15</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>16</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>17</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>18</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>19</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr>
                        <tr class="ub-content">
                            <td>20</td>
                            <td>종목명</td>
                            <td>제목</td>
                            <td>글쓴이</td>
                            <td>작성일</td>
                            <td>조회수</td>
                        </tr> -->

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



</body>

</html>