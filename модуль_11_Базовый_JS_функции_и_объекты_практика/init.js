window.onload = function()
{
    const initPerson = personGenerator.getPerson();
    document.getElementById('firstNameOutput').innerText = initPerson.firstName;
    document.getElementById('surnameOutput').innerText = initPerson.surName;
    document.getElementById('genderOutput').innerText = initPerson.gender;
    document.getElementById('birthYearOutput').innerText = initPerson.dateYearBirthday;
    document.getElementById('birthmouthOutput').innerText = initPerson.dateMonthBirthday;
    document.getElementById('birthdayOutput').innerText = initPerson.dateDayBirthday;
    document.getElementById('PatronymicOutput').innerText = initPerson.Patronymic;
    document.getElementById('professionOutput').innerText = initPerson.profession;



    
};

document.getElementById('btnRetry').addEventListener('click', function () {
    document.getElementById('firstNameOutput').innerText = 'press_button_generate';
    document.getElementById('surnameOutput').innerText ='';
    document.getElementById('genderOutput').innerText = '';
    document.getElementById('birthYearOutput').innerText = '';
    document.getElementById('birthmouthOutput').innerText = '';
    document.getElementById('birthdayOutput').innerText = '';
    document.getElementById('PatronymicOutput').innerText = '';
    document.getElementById('professionOutput').innerText = '';
})




