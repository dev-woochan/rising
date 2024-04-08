

//오른다 내린다 설정을 위한 코드 
const button_increase = document.getElementById('button_increase');
const button_decrease = document.getElementById('button_decrease');
const select = document.getElementById('select');
const date = document.getElementById('date');

//현재 날짜 호출해서 date에 담음
function getToday() {
    var date = new Date();
    var year = date.getFullYear();
    var month = ("0" + (1 + date.getMonth())).slice(-2);
    var day = ("0" + date.getDate()).slice(-2);

    return year + "-" + month + "-" + day;
}

date.value = getToday();

button_increase.onclick = () => {
    button_increase.style.backgroundColor = '#FF5c5c';
    button_decrease.style.backgroundColor = '#cecdce';
    select.value = "오른다";
}

button_decrease.onclick = () => {
    button_decrease.style.backgroundColor = 'blue';
    button_increase.style.backgroundColor = '#cecdce';
    select.value = "내린다";
}


//로드되었을때 데이터베이스 가져오기 
var stockList;

window.onload = function () { //window.onload는 창로드 이후의 동작을 수행
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState = 4 && xhr.status == 200) {
            stockList = JSON.parse(xhr.responseText);
        }
    };
    xhr.open("GET", "load_stockList.php", true);
    xhr.send();
}

const stockInput = document.getElementById("stockInput"); // 종목명 입력칸 
var stocks = document.getElementById("stocks");

stockInput.addEventListener("input", function () { //입력시에 값을받아서 필터된 주식리스트를 가져오는 함수 
    var inputValue = this.value.trim();
    setTimeout(() => {
        console.log("입력됨 " + inputValue);
        // 입력 값에 따라 필터링된 결과를 가져옴
        var filteredStocks = stockList.filter(function (stock) {
            return stock.toLowerCase().includes(inputValue.toLowerCase());
        });

        // 이 부분은 필요한 대로 화면에 표시하거나 다른 동작을 수행하면 됨
        var i = 0;
        while (i < 10) {

            var list = document.createElement('option');

            list.textContent = filteredStocks[i];

            stocks.appendChild(list);
            i++;
        }
    }, 800); //너무 많이생성되서 800ms후에 실행되도록 제한을둠 

});

stockInput.addEventListener("blur", function () {
    stocks.innerHTML = "";
}); //blur해제시 기존의 option 태그를 모두 삭제해줌 

const titleInput = document.getElementById("titleInput");
const priceInput = document.getElementById("priceInput");
const selectInput = document.getElementById("select");
const dateInput = document.getElementById("datepicker");
const contentInput = document.getElementById("summernote");


function writeCheck() { //예외처리를 위함 만약에 제목 종목 등 입력값이 제대로 안되어있을시 false 반환
    //onsubmit 으로 post 제출전 사용 예정
    console.log("확인 호출")
    console.log(stockList.value);
    if (titleInput.value.trim() == "") {
        alert('제목을입력해주세요');
        titleInput.focus();
        return false;
    } else if (stockList.value == "") {
        alert('종목명을 입력해주세요');
        stockInput.focus();
        return false;
    } else if (priceInput.value == "") {
        alert('현재가를 입력해주세요');
        priceInput.focus();
        return false;
    } else if (dateInput.value == "") {
        alert("목표일을 지정해주세요");
        dateInput.focus();
        return false;
    } else if (selectInput.value == "") {
        alert("오른다 내린다를 선택해주세요")
        return false;
    }
    else if (contentInput.value == "") {
        alert("내용을 입력해주세요");
        contentInput.focus();
        return false;
    } else if (!stockList || !stockList.includes(stockInput.value)) {
        alert("유효한 종목명을 입력해주세요");
        stockInput.focus();
        return false;
    } else {
        return true;
    }

}

