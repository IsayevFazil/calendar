<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CModule::IncludeModule("iblock");

use Bitrix\Main\Application;
use Bitrix\Main\Context,
    Bitrix\Main\Type\DateTime,
    Bitrix\Main\Loader,
    Bitrix\Iblock;

$request = Application::getInstance()->getContext()->getRequest();

// Формируем массив для JSON ответа



$arSelect = array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_*"); //IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);

$i = 0;
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();

    $arResult[] = $arFields;

    $arProps = $ob->GetProperties();

    $arResult[$i]["PROPERTIES"]  =  $arProps;

    $i++;
}






$SelectDate = htmlspecialchars($_POST["get_date"]);
$SelectDate = date('d.m.Y', strtotime($SelectDate));



$ar = array();

foreach ($arResult as $arItem) {
    $ar[] =  $arItem["PROPERTIES"]["PRAZDNIK"]["VALUE"];
}

$flag = true;

$SelectDate = date("d.m.Y", strtotime($SelectDate . ' +1 days'));


while ($flag) {
    foreach ($ar as $indate) {
        if ($indate == $SelectDate) {
            $SelectDate = date("d.m.Y", strtotime($SelectDate . ' +1 days'));
        } else {
            $week = date("D", strtotime($SelectDate));
            if (in_array($week, ['Sat', 'Sun'])) {

                $SelectDate = date("d.m.Y", strtotime($SelectDate . ' +1 days'));
            } else {

                $flag = false;
            }
        }
    }
}

$result = array(
    'get_date' => $SelectDate

);

// Переводим массив в JSON
echo json_encode($result);
