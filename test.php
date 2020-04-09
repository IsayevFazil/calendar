<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><? $APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"template1",
		array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"COMPONENT_TEMPLATE" => "template1",
			"PATH" => "/include/calendar.php"
		),
		false
	); ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>