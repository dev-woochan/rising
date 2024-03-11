//로그인 유효성 검사 아이디, 비밀번호 입력이 없을시 submit하기전에 alter로 알려준다

function loginCheck() {
    const id = document.getElementById('id').value.trim();
    const pw = document.getElementById('pw').value.trim();

    let user_id = $id;
    let user_pass = $pass;

    if (id == "") {
        alert("아이디를 입력해주세요.");
        document.getElementById('id').focus();
        return false;
    } else if (pw == "") {
        alert("비밀번호를 입력해주세요.");
        document.getElementById('pw').focus();
        return false;
    } else {
        if (id == user_id) {
            if (pass == user_pass) {
                alert("로그인성공")
                return true;
            }
        }

    }
}
