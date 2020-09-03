let lastOperand = 0;
let operation = null;
let result = 0;
let archive = '';

const inputWindow = document.getElementById('inputWindow');
inputWindow.value = '0';

document.getElementById('btn_SQ').addEventListener('click', function () {
    lastOperand = parseFloat(inputWindow.value);
    inputWindow.value = Math.sqrt(lastOperand);
    archive = "√"+lastOperand+' = '+ inputWindow.value;
    document.getElementById("archive").innerHTML = archive;
})
document.getElementById('btn_K').addEventListener('click', function () {
    lastOperand = parseFloat(inputWindow.value);
    inputWindow.value = lastOperand * lastOperand;
    archive = lastOperand+' * '+ lastOperand + ' = '+ inputWindow.value;
    document.getElementById("archive").innerHTML = archive;
})
document.getElementById('btn_B').addEventListener('click', function () {
    lastOperand = parseFloat(inputWindow.value);
    operation = null;
    if (inputWindow.value.length == 1) {
        inputWindow.value = 0;    
    } 
    else {
    inputWindow.value = inputWindow.value.slice(0, -1);
    }
})
document.getElementById('btn_C').addEventListener('click', function () {
    lastOperand = 0;
    operation = null;
    inputWindow.value = 0;
    archive = '';
    document.getElementById("archive").innerHTML = '';
})
document.getElementById('btn_Z').addEventListener('click', function () {
    lastOperand = parseFloat(inputWindow.value);
    operation = '*';
    inputWindow.value = '';
})
document.getElementById('btn_7').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '7';
})
document.getElementById('btn_8').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '8';
})
document.getElementById('btn_9').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '9';
})
document.getElementById('btn_D').addEventListener('click', function () {
    lastOperand = parseFloat(inputWindow.value);
    operation = '/';
    inputWindow.value = '';
})
document.getElementById('btn_4').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '4';
})
document.getElementById('btn_5').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '5';
})
document.getElementById('btn_6').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '6';
})
document.getElementById('btn_P').addEventListener('click', function () {
    lastOperand = parseFloat(inputWindow.value);
    operation = '+';
    inputWindow.value = '';
})
document.getElementById('btn_1').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '1';
})
document.getElementById('btn_2').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '2';
})
document.getElementById('btn_3').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '3';
})
document.getElementById('btn_M').addEventListener('click', function () {
    lastOperand = parseFloat(inputWindow.value);
    operation = '-';
    inputWindow.value = '';
})
document.getElementById('btn_T').addEventListener('click', function () {
    inputWindow.value += '.';
})
document.getElementById('btn_0').addEventListener('click', function () {
    if (inputWindow.value.slice(0) == 0) {
        inputWindow.value = inputWindow.value.substr(1);
    }
    inputWindow.value += '0';
})
document.getElementById('btn_R').addEventListener('click', function () {
    if (operation === '+') {
        result = lastOperand + parseFloat(inputWindow.value);
    }
    if (operation === '-') {
        result = lastOperand - parseFloat(inputWindow.value);
    }
    if (operation === '*') {
        result = lastOperand * parseFloat(inputWindow.value);
    }
    if (operation === '/') {
        result = lastOperand / parseFloat(inputWindow.value);
    }
    archive = lastOperand+operation+inputWindow.value+'='+result;
    document.getElementById("archive").innerHTML = archive;
    inputWindow.value = result;
    operation = '';

})