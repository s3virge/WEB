<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/page.css">
        <link rel="stylesheet" href="css/modalwnd.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <title>HTML5 Boilerplate</title>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <script>console.log("index.php was load");</script>

        <!--=============================================================================-->
        <!--                  Add your site or application content here                  -->
        <!--=============================================================================-->
        <?php

            if($_POST['action'] == 'call_this') {
                echo "BUtton Add was pressed <br>";
            }

        if($_POST['name'] == 'John') {
            echo "name = Jhone <br>";
        }


        ?>

        <div id="wrap">
            <div id="employee_list">
                <table>
                    <tr>
                        <th>Фамилия</th>
                        <th>Мобильный</th>
                        <th>Внутренний</th>
                    </tr>
                    <tr>
                        <td>Капустенко Иван Витальевич</td>
                        <td>050-123-45-67</td>
                        <td>77</td>
                    </tr>
                    <tr>
                        <td>Коломиец Анатолий Иванович</td>
                        <td>050-123-45-67</td>
                        <td>***</td>
                    </tr>
                    <tr>
                        <td>Ходорковский Александр ******</td>
                        <td>050-123-45-67</td>
                        <td>***</td>
                    </tr>
                    <tr>
                        <td>Кобзарь Виталий Владимирович</td>
                        <td>050-683-12-26</td>
                        <td>***</td>
                    </tr>
                    <tr>
                        <td>Laughing Bacchus Winecellars</td>
                        <td>Yoshi Tannamuri</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>Magazzini Alimentari Riuniti</td>
                        <td>Giovanni Rovelli</td>
                        <td>Italy</td>
                    </tr>
                </table>
            </div>

            <div id="buttons">
                <button class="button" id="btn_add">Добавить</button>
                <button class="button" id="btn_remove">Удалить</button>
                <button class="button" id="btn_change">Изменить</button>
            </div>

        </div>

        <!--Скрытое по умолчанию модальное окно-->
<!--        <div id="win" style="display:none;">-->
        <!-- <form> </form>-->
        <div id="win" >
            <div class="overlap"></div>
            <div class="modal_wnd">
                <h2>Добавить нововго сотрудника</h2>
                <div id="modal_wnd_content">
                    <input type="text" autofocus placeholder="ФИО" name="FIO">
                    <input type="text" placeholder="Мобильный телефон" name="CellPhone">
                    <input type="text" placeholder="Телефон" name="Phone"
                </div>
                <!--<button onClick="getElementById('win').style.display='none';">Закрыть</button>-->
                <button onClick="myAjax()">Добавить</button>
            </div>
        </div>

        <!--======================================================================-->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>-->

        <!-- Processing of button pressing -->
        <script>
            //Перечитываем файл со списком пользователем
            $("#btn_remove").click(function(){
                $.ajax({url: "employee.txt", success: function(result){
                    $("#employee_list").html(result);
                }});
            });
        </script>

        <script>
            function myAjax() {
                /*$.ajax({
                    type: "POST",
                    url: 'index.php',
                    data:{action:'call_this'},
                    success:function(html) {
                        alert(html);
                    }
                });*/
                
                $.ajax({
                    method: 'POST',
//                    url: 'index.php',
//                    async: 'false',
                    data: { name: "John", location: "Boston" },
                    success:function(){getElementById('win').style.display='none';}
                });
            }
        </script>

        <!-- Make table row selected -->
        <script>
            $('#employee_list').on('click','tr',function(){
                $(this).addClass("marked");
                $("tr").not(this).removeClass("marked");
            });
        </script>

        <!-- Show modal window when button add was pressed -->
        <script>
            $("#btn_add").click(function(){
                $("#win").removeAttr("style");
            });
        </script>

    </body>
</html>
