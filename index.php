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

        <!--=============================================================================-->
        <!--                  Add your site or application content here                  -->
        <!--=============================================================================-->

        <div id="wrap">
            <div>
                <table id="table_header">
                    <tr>
                        <td>Фамилия</td>
                        <td>Внутренний</td>
                        <td>Мобильный</td>
                    </tr>
                </table>
                <table id="listOfEmployees"></table>
            </div>

            <div id="buttons">
                <button class="button" id="btn_add">Добавить</button>
                <button class="button" id="btn_remove">Удалить</button>
                <button class="button" id="btn_change">Изменить</button>
            </div>

        </div>

        <!--Скрытое по умолчанию модальное окно-->
        <div id="win" style="display: none">
            <div class="overlap"></div>
            <div class="modal_wnd">
                <h2>Добавить нововго сотрудника</h2>
                <div id="modal_wnd_content">
                    <input type="text" autofocus placeholder="ФИО" name="FIO" required>
                    <div class="error">&nbsp</div>
                    <input type="text" placeholder="Мобильный телефон" name="CellPhone" required>
                    <div class="error" >&nbsp</div>
                    <input type="text" placeholder="Телефон" name="Phone" required>
                    <div class="error" >&nbsp</div>
                </div>
                <button onClick="hideForm()">Отмена</button>
                <button type="submit" onClick="addNewEmployee()">Добавить</button>
            </div>
        </div>

        <!--======================================================================-->
        <!--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>-->

        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>

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

    </body>
</html>
