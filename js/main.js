window.onload = function() {
    //updateEmployeeList();
}

$(document).ready(function(){
    updateEmployeeList();
});

<!-- remove selected table row when button was pressed -->
$("#btn_remove").click(function(){
    $('tr').remove('.marked');
    console.log("button remove was pressed");
    //updateEmployeeList();
});

<!-- Show modal window when button add was pressed -->
$("#btn_add").click(function(){
    //$('#win').removeAttr("style");
    $('#win').show();
});

function updateEmployeeList() {
    /*$.ajax({url: "employee.txt", success: function(result){
     $("#employee_list").html(result);
     }});
     */
    $('#employee_list').load("employee.txt");
}

function addNewEmployee() {
    var $form            = $( '#modal_wnd_content' );
    var $field_FIO       = $form.find( "input[name='FIO']" );
    var $field_CellPhone = $form.find( "input[name='CellPhone']" );
    var $field_Phone     = $form.find( "input[name='Phone']" );

    //проверить переменные на пустоту
    if (!isFeildEmpty($field_FIO, "Фамилия Имя Отчество не указаны"))
        return;

    if (!isFeildEmpty($field_CellPhone, "Номер мобильного телефона не указан"))
        return;

    if (!isFeildEmpty($field_Phone, "Не указан номер рабочето телефона"))
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
            //alert("Новый сотрудник успешно добавлен.");

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

function isFeildEmpty($obj, message) {
    var result = null;

    if ($obj.val() == '') {
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

<!-- hide the form -->
function hideForm() {
    //document.getElementById('win').style.display='none';
    $('#win').hide();
}

<!-- Make table row selected -->
$('#employee_list').on('click','tr',function(){
    $(this).addClass("marked");
    $("tr").not(this).removeClass("marked");
});
