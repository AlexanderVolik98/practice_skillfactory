
// <![CDATA[
/* ----------------------------
 Сумма прописью на JavaScript
 Author: Mad Max 2005
 ---------------------------- */
var money;
var price;
var rub, kop;
var litera = sotny = desatky = edinicy = minus = "";
var k = 0, i, j;
N = 

let minValue = parseInt(prompt('Минимальное знание числа для игры','0'));
minValue = minValue > 999 ? 999 : minValue < -999 ? -999 : minValue !== typeof(number) ? 0 : minValue;


// if (minValue !== typeof(number)) {
//     minValue = 0;
// }
// пользователь вводит минимальное значение (с помощью функции prompt мы спрашиваем у него это число)



let maxValue = parseInt(prompt('Максимальное знание числа для игры','100'));
maxValue = maxValue > 999 ? 999 : maxValue < -999 ? -999 : maxValue !== typeof(number) ? 100 : maxValue;


// if (maxValue !== typeof(number)) {
//     maxValue = 100;
// }
// let maxValue1 = (maxValue > 999) ? maxValue1 = 999 : (maxValue < (-999)) ? maxValue1 = (-999);
// console.log(maxValue1);
// пользователь вводит максимальное значение (с помощью функции prompt мы спрашиваем у него это число)


alert(`Загадайте любое целое число от ${minValue} до ${maxValue}, а я его угадаю`);
// выводим пользователю модальное окно с информацией о том, между какими числами идет поиск


let answerNumber  = Math.floor((minValue + maxValue) / 2);
//в этой переменной находится первое предлагаемое число, которое будет выведено далее


let orderNumber = 1;
//это номер вопроса, первоначально номер вопроса равен 1, далее он увеличивается с помощью orderNumber++


let gameRun = true;

const orderNumberField = document.getElementById('orderNumberField');
//здесь мы присваиваем переменной значение ТЭГА, в котором заключен номер вопроса


const answerField = document.getElementById('answerField');
//здесь мы берем значение answerField и присваиваем к переменной, в которой заключено 
// значение ТЭГА


orderNumberField.innerText = orderNumber;
//здесь мы берем ПЕРВОЕ значение orderNumber (то есть номер прохождения итерации) и присваиваем к переменной, в которой заключено 
// значение ТЭГА


answerField.innerText = `Вы загадали число ${answerNumber }?`;
// innertext присваивает ТЕГУ внутри HTML документа ЗНАЧЕНИЕ, если УБРАТЬ innertext то значение будет браться из ТЕГА ПО УМОЛЧАНИЮ




document.getElementById('btnRetry').addEventListener('click', function () {
    minValue = 0;
    maxValue = 100;

    // минимальное и максимальное значение сводится к типичным значениям

    orderNumber = 0;
    // значение номера прохождения сводится к нулю

    location.reload();
    // функция перезагрузки страницы
})
//кнопка начала игры заново




// массив со значениями ответов
let answerQuery = ['согласны, что это', 'а если...' , "может", "я у цели! это", "это наверняка", "Вы загадали число"];
let randomIndex1 = Math.floor(Math.random() * 5);
// массив со значениями ответов 


// массив с конечными ответами
let answerTask = ["Я всегда угадываю\n\u{1F60E}", "это было просто", "элементарно", "бинарный поиск - сила", "даже не вспотел"];
let randomIndex2 = Math.floor(Math.random() * 5);
// массив с конечными ответами





// кнопка больше для программы которая увеличивает предполагаемое число (работа с изменением реакции)__________________________________________________

document.getElementById('btnOver').addEventListener('click', function () {
    // присваиваем событию клик по элементу (кнопке "больше") обработчик

    if (gameRun){
        //если gameRun равен true то начать выполнение программы, 

        if (minValue === maxValue){
            // если минимальное значение равно максимальному значению то...

            const phraseRandom = Math.round( Math.random());
            const answerPhrase = (phraseRandom === 1) ?
                `Вы загадали неправильное число!\n\u{1F914}` :
                `Я сдаюсь..\n\u{1F92F}`;

            answerField.innerText = answerPhrase;
            gameRun = false;
        } else {
            minValue = answerNumber  + 1;
            answerNumber  = Math.floor((minValue + maxValue) / 2);

            orderNumber++;




            // угадайка предполагает значение
            answerField.innerText = (answerQuery[randomIndex1] + ` ${answerNumber }?`);
            randomIndex1 = Math.floor(Math.random() * 5);
            // угадайка предполагает значение
        }
    }
   
   
})
// кнопка больше для программы которая увеличивает предполагаемое число (работа с изменением реакции)_________________________________________________________






// кнопка меньше для программы которая уменьшает предполагаемое число (работа с изменением реакции)___________________________________________________________
document.getElementById('btnLess').addEventListener('click', function () {
    // присваиваем событию клик по элементу (кнопке "больше") обработчик

    if (gameRun){
        //если gameRun равен true то начать выполнение программы, 

        if (minValue === maxValue){
            // если минимальное значение равно максимальному значению то...

            const phraseRandom = Math.round( Math.random());
            const answerPhrase = (phraseRandom === 1) ?
                `Вы загадали неправильное число!\n\u{1F914}` :
                `Я сдаюсь..\n\u{1F92F}`;

            answerField.innerText = answerPhrase;
            gameRun = false;
        } else {
            maxValue = answerNumber - 1;
            answerNumber  = Math.ceil((minValue + maxValue) / 2);

            if answerNumber == 

            orderNumber++;
            //здесь увеличивается номер вопроса с каждым прохождением программы

            orderNumberField.innerText = orderNumber;
            


            // угадайка предполагает значение
            answerField.innerText = (answerQuery[randomIndex1] + ` ${answerNumber }?`);
            randomIndex1 = Math.floor(Math.random() * 5);
            // угадайка предполагает значение
            
        }
    }
   
   
})
    

// кнопка меньше для программы которая уменьшает предполагаемое число (работа с изменением реакции)___________________________________________________________



document.getElementById('btnEqual').addEventListener('click', function () {
    if (gameRun){
        answerField.innerText = (answerTask[randomIndex2]);
        gameRun = false;
    }
})





