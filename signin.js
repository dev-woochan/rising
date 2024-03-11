//회원가입 유효성 검사 
//닉네임 3자 이상 아이디 email양식 비밀번호 7자 이상
//유효한 값만 submit 해서 서버에서 처리하게 해줌 


function siginin_Check() {
    //아이디, 패스워드 정규식 
    const idPattern = /[a-z0-9]*@[a-z0-9]+[|.]*.com/i;
    const passPattern = /[a-z0-9]/i;

    //form값 받아오기 
    let name = document.getElementById("name").value.trim();
    let mail = document.getElementById("mail").value.trim();
    let password = document.getElementById("password").value.trim();
    let passconfirm = document.getElementById("password_confirm").value.trim();

    document.getElementById("name_check").innerText = "";
    document.getElementById("mail_check").innerText = "";
    document.getElementById("password_check").innerText = "";
    document.getElementById("password_confirm_check").innerText = "";

    if (name.length == 0) {
        document.getElementById("name_check").innerText = "닉네임을 입력해주세요";
        document.getElementById("name").focus();
        return false;
    } else if (name.length < 3) {
        document.getElementById("name").focus();
        document.getElementById("name_check").innerText = "닉네임은 3자 이상 설정해주세요";
        return false;
    } else if (!idPattern.test(mail)) {
        document.getElementById("mail").focus();
        document.getElementById("mail_check").innerText = "abc@abc.com 의 양식을 지켜야합니다";
        return false;
    } else if (password == 0) {
        document.getElementById("password_check").innerText = "비밀번호를 입력해주세요";
        document.getElementById("password").focus();
        return false;
    } else if (password.length < 7) {
        document.getElementById("password").focus();
        document.getElementById("password_check").innerText = "비밀번호는 7자리 이상 설정되어야합니다";
        return false;
    } else if (!passPattern.test(password)) {
        document.getElementById("password").focus();
        document.getElementById("password_check").innerText = "비밀번호는 영어소문자,숫자로 구성되어야합니다";
        return false;
    }
    else if (passconfirm != password) {
        document.getElementById("password_confirm").focus;
        document.getElementById("password_confirm_check").innerText = "비밀번호가 일치하지 않습니다";
        return false
    }
    else {
        alert("회원가입 성공")
        return true;
    }
}
