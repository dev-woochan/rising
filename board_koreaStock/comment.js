let urlParams = new URLSearchParams(window.location.search);
let id = urlParams.get('id');

//댓글 ajax 통신을 위한 comment.js 입력한값을 받아서 검사후 php코드로 보낸다


document.getElementById("comment_btn").addEventListener("click", function (event) {
    event.preventDefault();

    let commentInput = document.getElementById("comment_insert_content").value;
    let parentPostId = id;
    let orderNum = document.getElementsByClassName("comment_list").length + 1;
    let depth = 0; // 대댓글 구현 전까지 0 으로 고정

    //입력한 값 가져오기 
    //ajax 통신 
    let data;
    data = {
        "content": commentInput,
        "parentPostId": parentPostId,
        "orderNum": orderNum,
        "depth": depth
    };
    comment_insert(data);
});


async function comment_insert(data) {
    console.log(data)
    let commentInput = document.getElementById("comment_insert_content").value;
    console.log(commentInput);
    try {
        //fetch요청
        const response = await fetch("/risingproject/board_koreaStock/comment_insert.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data)
        });
        const result = await response.json();

        //댓글등록이 성공하게되면 댓글값이 db에 저장되게 될것임 
        console.log(result);
        if (result.valid) { //성공한경우 댓글 추가 
            // //댓글 html 변수에담기
            // var newCommentHTML = '<div class = "comment_list">' + commentInput + '</div>';

            // // 새로운 댓글 추가하기 
            // var newCommentElement = document.createElement('div');
            // newCommentElement.classList.add('comment_list');
            // newCommentElement.textContent = commentInput;

            // var commentContainer = document.getElementById("comment_container");
            // var inputElement = document.getElementById("comment_insert_content");
            // commentContainer.insertBefore(newCommentElement, inputElement.nextSibling);

            // //댓글컨테이너 앞에 댓글 추가 nextSlibing으로 항상 위에오게 
            window.alert("댓글입력 성공");
            location.reload();

        } else {
            window.alert("댓글입력 실패");
        }

    } catch (error) {
        console.log('에러발생 : ', error);
    }
}