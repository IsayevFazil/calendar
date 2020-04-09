<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Page\Asset;

$arJsConfig = array(
    "jquery3" => array(
        "js"  => $templateFolder . "/js/jquery-3.2.0.min.js"
    ),
    "bootstrap" => array(
        "js"  => $templateFolder . "/js/bootstrap.min.js",
        "css" => $templateFolder . "/css/bootstrap.min.css",
        "rel" => array('jquery3')
    ),
    "fancybox" => array(
        "js"  => $templateFolder . "/js/jquery.fancybox.min.js",
        "css" => $templateFolder . "/css/jquery.fancybox.min.css",
    ),

);


CModule::IncludeModule("iblock");


foreach ($arJsConfig as $ext => $arExt) {


    CJSCore::RegisterExt($ext, $arExt);
}

CJSCore::Init(array("UniversalLibs"));
//dump($arParams);
?>


<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $("#btn").click(function() {





                sendAjaxForm('result_form', 'ajax_form');
                return false;
            });
        });

        function sendAjaxForm(result_form, ajax_form) {

            var get_date = $("#get_date").val();

            $.ajax({
                url: "<?= $templateFolder . "/ajax.php" ?>",
                type: "POST", //метод отправки
                dataType: "html", //формат данных
                data: {
                    get_date: get_date
                }, // Сеарилизуем объект
                success: function(response) { //Данные отправлены успешно
                    result = $.parseJSON(response);


                    console.log(result);

                    $('#result_form').html(result.get_date);

                },
                error: function(response) { // Данные не отправлены
                    $('#result_form').html('Ошибка. Данные не отправлены.');
                }
            });
        }
    });
</script>