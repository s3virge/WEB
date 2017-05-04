window.onload = function() {
    //updateEmployeeList();
};

$(document).ready(function(){
    updateEmployeeList();
});

//==============  buttons =======================
$("#btn_remove").click(function(){
    //.............. is the row selected ....................
    if ($('tr').hasClass('marked')) {
        //remove selected table row
        $('tr').remove('.marked');

        // ............ получить данные из таблицы .....................
        var arrEmployees = [];
        var i = 0;

        $('#listOfEmployees tr').each(function(){
            //arrEmployees[i] = $(this).text();
            arrEmployees[i] = $(this).html();
            console.log("arrEmployees[i] = " + arrEmployees[i]);
            i++;
        });

        //............ then use ajax to post this data .................
        $.ajax({
            type: 'post',
            url: 'form.php',
            data: { employees: arrEmployees },
            //success: updateEmployeeList()
            // нет смысла перечитывать файл. В таблице уже видны изменения
            success: function() {
                console.log("list of employees was write successfully");
            }
        });
    }
});

$("#btn_add").click(function () {
    //изменить Заглавие окна
    $("#title").text("Добавить нового сотрудника");
    $('#win').show();
});

$("#btn_change").click(function(){
    //проверить выбрана ли какая то строка в таблице если да
    if ($('tr').hasClass('marked')) {
        //то получить данные из выжеделенной строки
        var arrRowText = [];
        var i = 0;

        $("tr.marked td").each(function(){
            arrRowText[i] = $(this).text();
            i++;
        });

        //вставить данные в поля ввода формы
        var $modalForm            = $( '#modal_wnd_content' );
        var $fieldFIO       = $modalForm.find( "input[name='FIO']" );
        var $fieldCellPhone = $modalForm.find( "input[name='CellPhone']" );
        var $fieldPhone     = $modalForm.find( "input[name='Phone']" );

        $fieldFIO.val(arrRowText[0]);
        $fieldCellPhone.val(arrRowText[1]);
        $fieldPhone.val(arrRowText[2]);

        //изменить Заглавие окна
        $("#title").text("Изменить данные сотрудника");

        //показать форму редактирования
        $('#win').show();
    }
    else {
        //иначе вывести сообщение о необходимости выбора строки таблицы
        alert("Данные какого сотрудника необходимо изменить?");
    }

})

//===============================================
function updateEmployeeList() {
    /*$.ajax({url: "employee.txt", success: function(result){
     $("#listOfEmployees").html(result);
     }});*/

    $('#listOfEmployees').load("employee.txt");
}

function addNewEmployee() {
    var $form            = $( '#modal_wnd_content' );
    var $field_FIO       = $form.find( "input[name='FIO']" );
    var $field_CellPhone = $form.find( "input[name='CellPhone']" );
    var $field_Phone     = $form.find( "input[name='Phone']" );

    //проверить переменные на пустоту
    if (!isFieldEmpty($field_FIO, "Фамилия Имя Отчество не указаны"))
        return;

    if (!isFieldEmpty($field_CellPhone, "Номер мобильного телефона не указан"))
        return;

    if (!isFieldEmpty($field_Phone, "Не указан номер рабочето телефона"))
        return;

    // и передать их скрипту который запишет их в файл
    $.ajax({
        method: 'POST',
        url: 'form.php',
        data: {
            fio: $field_FIO.val(),
            cellphone: $field_CellPhone.val(),
            phone: $field_Phone.val()
        },
        success:function(){
            $field_FIO.val("");
            $field_CellPhone.val("");
            $field_Phone.val("");

            $field_FIO.focus();

            //скрыть форму создания пользователей
            //$('#win').attr('style','display:none');

            //затем перечитать файл что бы показать новые данные
            updateEmployeeList();
        }
    });
}

function isFieldEmpty($obj, message) {
    var result = null;

    if ($obj.val() == '') {
        //показываем сообщение message
        $obj.next().html(message);
        $obj.focus();
        result = false;
    }
    else {
        $obj.next().html("&nbsp");
        result = true;
    }

    return result;
}

function changeEmployee() {
    //изменить данные сотрудника в выбранной строке
}

// КНопка Отмена скрывает форму
function hideForm() {
    //document.getElementById('win').style.display='none';
    $('#win').hide();
}

// Кнопка ОК
function onOK(){

    /*
     $( "button" ).click(function() {
     var value;

     switch ( $( "button" ).index( this ) ) {
     case 0 :
     value = $( "div" ).data( "blah" );
     break;
     case 1 :
     $( "div" ).data( "blah", "hello" );
     value = "Stored!";
     break;
     case 2 :
     $( "div" ).data( "blah", 86 );
     value = "Stored!";
     break;
     case 3 :
     $( "div" ).removeData( "blah" );
     value = "Removed!";
     break;
     }

     $( "span" ).text( "" + value );
     });
    */

    //добавляем нового сотрудника или редактируем?
    addNewEmployee();

    changeEmployee();
}
//Make table row selected
$('#listOfEmployees').on('click','tr',function(){
    $(this).addClass("marked");
    $("tr").not(this).removeClass("marked");
});