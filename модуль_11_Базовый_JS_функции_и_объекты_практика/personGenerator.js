

const personGenerator = {
    surnameJson: `{  
        "count": 15,
        "list": {
            "id_1": "Иванов",
            "id_2": "Смирнов",
            "id_3": "Кузнецов",
            "id_4": "Васильев",
            "id_5": "Петров",
            "id_6": "Михайлов",
            "id_7": "Новиков",
            "id_8": "Федоров",
            "id_9": "Кравцов",
            "id_10": "Николаев",
            "id_11": "Семёнов",
            "id_12": "Славин",
            "id_13": "Степанов",
            "id_14": "Павлов",
            "id_15": "Александров",
            "id_16": "Морозов"
        }
    }`,
// фамилии мужчины


    firstNameMaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александр",
            "id_2": "Максим",
            "id_3": "Иван",
            "id_4": "Артем",
            "id_5": "Дмитрий",
            "id_6": "Никита",
            "id_7": "Михаил",
            "id_8": "Даниил",
            "id_9": "Егор",
            "id_10": "Андрей"
        }
    }`, 
//имена мужчины

    firstNameFemaleJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александра",
            "id_2": "Виктория",
            "id_3": "Анастасия",
            "id_4": "Татьяна",
            "id_5": "Светлана",
            "id_6": "Евгения",
            "id_7": "Любовь",
            "id_8": "Анна",
            "id_9": "Вера",
            "id_10": "Наталья"
        }
    }`,
//имена женщины

    
    patronymicJson: `{
        "count": 10,
        "list": {     
            "id_1": "Александров",
            "id_2": "Викторов",
            "id_3": "Петров",
            "id_4": "Максимов",
            "id_5": "Егоров",
            "id_6": "Иванов",
            "id_7": "Андреев",
            "id_8": "Дмитриев",
            "id_9": "Михайлов",
            "id_10": "Аркадьев"
        }
    }`,
//имена мужчины


    maleProfessionJson: `{
        "count": 10,
        "list": {     
            "id_1": "слесарь",
            "id_2": "военный",
            "id_3": "юрист",
            "id_4": "экономист",
            "id_5": "водитель",
            "id_6": "шахтер",
            "id_7": "продавец",
            "id_8": "врач",
            "id_9": "уборщик",
            "id_10": "крановщик"
        }
    }`,
//профессии мужчины


    femaleProfessionJson: `{
        "count": 10,
        "list": {     
            "id_1": "учитель",
            "id_2": "сиделка",
            "id_3": "воспитатель",
            "id_4": "швея",
            "id_5": "медсестра",
            "id_6": "модель",
            "id_7": "дизайнер",
            "id_8": "борт-проводница",
            "id_9": "администратор",
            "id_10": "супервайзер"
        }
    }`,
//профессии женщины


    monthJson: `{
        "count": 10,
        "list": {     
            "id_1": "января",
            "id_2": "февраля",
            "id_3": "марта",
            "id_4": "апреля",
            "id_5": "мая",
            "id_6": "июня",
            "id_7": "июля",
            "id_8": "августа",
            "id_9": "сентября",
            "id_10": "октября",
            "id_11": "ноября",
            "id_12": "декабря"
        }
    }`,


    GENDER_MALE: 'Мужчина',
    GENDER_FEMALE: 'Женщина',

  
    randomIntNumber: (max = 1, min = 0) => Math.floor(Math.random() * (max - min + 1) + min),
    randomValue: function (json) {
        const obj = JSON.parse(json);
        const prop = `id_${this.randomIntNumber(obj.count, 1)}`;  // this = personGenerator
        return obj.list[prop];
    },


    randomValueTwo: Math.random(),
//рандом для подбора пола и окончания для женских фамилий


            randomFirstName: function() {
                if (this.randomValueTwo < 0.5) { 
                return this.randomValue(this.firstNameFemaleJson);
            }
                else return this.randomValue(this.firstNameMaleJson);
            },
            //рандом имя

              
            randomSurname: function() {
                if (this.randomValueTwo < 0.5) { 
                return this.randomValue(this.surnameJson) + 'a';
            }
                else return this.randomValue(this.surnameJson);

            },
            //рандом фамилия


            randomGender: function() {
                if (this.randomValueTwo < 0.5)  { 
                return this.GENDER_FEMALE;
            }
                else return this.GENDER_MALE;

            },
            //рандом пол

            
            randomDateYear: function() {
                    return this.randomIntNumber(1940,2000)
              },
               //рандом год


            randomDatemonth: function() {
               return this.randomValue(this.monthJson)
              },
                //рандом месяц
    

            randomDateday: function() {

                switch (this.randomValue(this.monthJson)) {
                    case ("января"):
                        return this.randomIntNumber(31,1)
                        break;
                        case ("августа"):
                            return this.randomIntNumber(31,1)
                            break;
                            case ("декабря"):
                                return this.randomIntNumber(31,1)
                                break;
                                case ("октября"):
                                    return this.randomIntNumber(31,1)
                                    break;
                                    case ("июля"):
                                        return this.randomIntNumber(31,1)
                                        break;
                                        case ("мая"):
                                            return this.randomIntNumber(31,1)
                                            break;
                                            case ("марта"):
                                                return this.randomIntNumber(31,1)
                                                break;

                  
                    case ("апреля"):
                        return this.randomIntNumber(30,1);

                        case ("ноября"):
                            return this.randomIntNumber(30,1);

                            case ("сентября"):
                                return this.randomIntNumber(30,1);
        
                                case ("июня"):
                                    return this.randomIntNumber(30,1);
                 case ("февраля"):
                    return this.randomIntNumber(29,1);
              
                }
                
               },
            //рандом день



            patronymic: function() {
                if (this.randomValueTwo < 0.5) { 
                return this.randomValue(this.patronymicJson) + 'на';
            }
                else return this.randomValue(this.patronymicJson) + 'ич';
            },
            //рандом отчество женщины-мужчины

                   
            profession: function() {
                if (this.randomValueTwo < 0.5) { 
                return this.randomValue(this.femaleProfessionJson);
            }
                else return this.randomValue(this.maleProfessionJson);
            },

            //рандом профессия женщины-мужчины


    getPerson: function () {
        this.person = {};
        this.person.firstName = this.randomFirstName();
        this.person.surName = this.randomSurname();
        this.person.gender = this.randomGender();
        this.person.dateYearBirthday = this.randomDateYear();
        this.person.dateMonthBirthday = this.randomDatemonth();
        this.person.dateDayBirthday = this.randomDateday();
        this.person.Patronymic = this.patronymic();
        this.person.profession = this.profession();
        
        return this.person;
    }
//объект с передаваемыми значениями для вывода в html

};


document.getElementById('btnEqual').addEventListener('click', function () {
    location.reload()
})


