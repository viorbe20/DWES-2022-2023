$(document).ready(function () {

    console.log('test.js loaded');

    let students = [
        { name: "Juan", surname1: "Pérez", surname2: "García" },
        { name: "María", surname1: "García", surname2: "Pérez" },
        { name: "Pedro", surname1: "García", surname2: "Pérez" },
        { name: "Daniel", surname1: "Ayalka", surname2: "Pérez" },
    ];

    let tableBody = $('#table_body_students');
    let inputSearch = $('#input_search_student');

    //If inputsearch is empty show the first 5 students

    //     // Show the first 5 students
    for (let i = 0; i < 2; i++) {
        let student = students[i];
        let tr = $('<tr>');
        tr.append($('<td>').text(student.name));
        tr.append($('<td>').text(student.surname1));
        tr.append($('<td>').text(student.surname2));
        tableBody.append(tr);
    }


    //evento que demuestre si el input está vacío o no y haga un console.log con el valor del input
    inputSearch.on('keyup', function () {
        if ((inputSearch.val() == '') || (inputSearch.val().indexOf(' ') > -1)) {
            console.log('input vacío');
            tableBody.empty();
            for (let i = 0; i < 2; i++) {
                let student = students[i];
                let tr = $('<tr>');
                tr.append($('<td>').text(student.name));
                tr.append($('<td>').text(student.surname1));
                tr.append($('<td>').text(student.surname2));
                tableBody.append(tr);
            }
        } else {
            console.log('input con valor');
            tableBody.empty();
            let query = inputSearch.val().toLowerCase();
            let filteredStudents = students.filter(function (student) {
                return student.name.toLowerCase().indexOf(query) > -1 || student.surname1.toLowerCase().indexOf(query) > -1 || student.surname2.toLowerCase().indexOf(query) > -1;
            });
            tableBody.empty();
            filteredStudents.forEach(function (student) {
                let tr = $('<tr>');
                tr.append($('<td>').text(student.name));
                tr.append($('<td>').text(student.surname1));
                tr.append($('<td>').text(student.surname2));
                tableBody.append(tr);
            }
            );

        }
    });



    // let query = inputSearch.val().toLowerCase();
    // let filteredStudents = students.filter(function (student) {
    //     return student.name.toLowerCase().indexOf(query) > -1 || student.surname1.toLowerCase().indexOf(query) > -1 || student.surname2.toLowerCase().indexOf(query) > -1;
    // });
    // tableBody.empty();
    // filteredStudents.forEach(function (student) {
    //     let tr = $('<tr>');
    //     tr.append($('<td>').text(student.name));
    //     tr.append($('<td>').text(student.surname1));
    //     tr.append($('<td>').text(student.surname2));
    //     tableBody.append(tr);
    // }
    // );


    console.log('sppppppppppppppppss');
});

