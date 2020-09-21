
// переменные и объекты для изменения чисел в письменное написание
let number_to_text;

let all_dozents = {20: "двадцать",30: "тридцать",40: "сорок",50: "пятьдесят",60: "шестьдесят",70: "семьдесят",80: "восемьдесят",90: "девяносто"};

let all_numbers = {1:"один",2: "два",3:"три",4:"четыре",5:"пять",6:"шесть",7:"семь",8:"восемь",9:"девять",10:"десять",11:"одиннадцать",
12:"двенадцать",13:"тринадцать",14:"четырнадцать",15:"пятнадцать",16:"шестнадцать",17:"семнадцать",18:"восемнадцать",19:"девятнадцать"};

let all_hundreds = {100:"сто",200:"двести",300:"триста",400:"четыреста",500:"пятьсот",600:"шестьсот",700:"семьсот",800:"восемьсот",900:"девятьсот"};
// переменные и объекты для изменения чисел в письменное написание





let minValue = parseInt(prompt('Минимальное знание числа для игры','0'));

// ограничение по вводимому числу
minValue = minValue > 999 ? 999 : minValue < -999 ? -999 : minValue !== typeof(number) ? 0 : minValue;
// ограничение по вводимому числу





let maxValue = parseInt(prompt('Максимальное знание числа для игры','100'));

// ограничение по вводимому числу
maxValue = maxValue > 999 ? 999 : maxValue < -999 ? -999 : maxValue !== typeof(number) ? 100 : maxValue;
// ограничение по вводимому числу



alert(`Загадайте любое целое число от ${minValue} до ${maxValue}, а я его угадаю`);
// выводим пользователю модальное окно с информацией о том, между какими числами идет поиск


let answerNumber  = Math.floor((minValue + maxValue) / 2);
//в этой переменной находится первое предлагаемое число, которое будет выведено далее









// представление в виде текста 
number_to_text = answerNumber;

if (number_to_text in all_numbers) {
    number_to_text = (all_numbers[number_to_text]);
}
else if (number_to_text in all_dozents) {
    number_to_text = (all_dozents[number_to_text]);
}
else if (number_to_text in all_hundreds) {
    number_to_text = (all_hundreds[number_to_text]);
}
else {
    let number1 = number_to_text % 1000;
    let number2 = number_to_text % 100;
    let number3 = number_to_text % 10;
    console.log(number1); //45
    console.log(number2); //45
    console.log(number3); //5
    let number5_csore = number1 - number2;
    let number4_csore = number2 - number3; //40 
    console.log (number4_csore + number3);
    if (number4_csore in all_dozents && number3 in all_numbers && number5_csore in all_hundreds) {
        number_to_text = (all_hundreds[number5_csore] + " " + all_dozents[number4_csore] + " " + all_numbers [number3]);
    }
    else if  (number4_csore in all_dozents && number3 in all_numbers) {
        number_to_text = (all_dozents[number4_csore] + " " + all_numbers [number3]);
    }
}
// представление в виде текста 








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


answerField.innerText = `Вы загадали число ${number_to_text}?`;
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
let answerQuery = ['согласны, что это', 'а если...' , "может", "я у цели! это", "это", "Вы загадали число"];
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



// представление в виде текста 
number_to_text = answerNumber;

if (number_to_text in all_numbers) {
    number_to_text = (all_numbers[number_to_text]);
}
else if (number_to_text in all_dozents) {
    number_to_text = (all_dozents[number_to_text]);
}
else if (number_to_text in all_hundreds) {
    number_to_text = (all_hundreds[number_to_text]);
}
else {
    let number1 = number_to_text % 1000;
    let number2 = number_to_text % 100;
    let number3 = number_to_text % 10;
    console.log(number1); //45
    console.log(number2); //45
    console.log(number3); //5
    let number5_csore = number1 - number2;
    let number4_csore = number2 - number3; //40 
    console.log (number4_csore + number3);
    if (number4_csore in all_dozents && number3 in all_numbers && number5_csore in all_hundreds) {
        number_to_text = (all_hundreds[number5_csore] + " " + all_dozents[number4_csore] + " " + all_numbers [number3]);
    }
    else if  (number4_csore in all_dozents && number3 in all_numbers) {
        number_to_text = (all_dozents[number4_csore] + " " + all_numbers [number3]);
    }
}
// представление в виде текста 



            // угадайка предполагает значение
            answerField.innerText = (answerQuery[randomIndex1] + ` ${number_to_text}?`);
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

            orderNumber++;
            //здесь увеличивается номер вопроса с каждым прохождением программы



// представление в виде текста 
         

            number_to_text = answerNumber;
      
            
            
            if (number_to_text in all_numbers) {
                number_to_text = (all_numbers[number_to_text]);
            }
            else if (number_to_text in all_dozents) {
                number_to_text = (all_dozents[number_to_text]);
            }
            else if (number_to_text in all_hundreds) {
                number_to_text = (all_hundreds[number_to_text]);
            }
            else {
                let number1 = number_to_text % 1000;
                let number2 = number_to_text % 100;
                let number3 = number_to_text % 10;
                console.log(number1); //45
                console.log(number2); //45
                console.log(number3); //5
                let number5_csore = number1 - number2;
                let number4_csore = number2 - number3; //40 
                console.log (number4_csore + number3);
                if (number4_csore in all_dozents && number3 in all_numbers && number5_csore in all_hundreds) {
                    number_to_text = (all_hundreds[number5_csore] + " " + all_dozents[number4_csore] + " " + all_numbers [number3]);
                }
                else if  (number4_csore in all_dozents && number3 in all_numbers) {
                    number_to_text = (all_dozents[number4_csore] + " " + all_numbers [number3]);
                } 
            }
// представление в виде текста 

            orderNumberField.innerText = orderNumber;
         
            // угадайка предполагает значение
            answerField.innerText = (answerQuery[randomIndex1] + ` ${number_to_text }?`);
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





