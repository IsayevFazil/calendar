<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);




?>

<div class="container">
    <form action="" method="POST" class="ajax_form" mb-4>
        <div class="row">
            <div class="col-12 mb-4">
                <input name="get_date" id="get_date" type="date" value="">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" id="btn">Проверить</button>
            </div>
        </div>
    </form>
    <div id="result_form" class="my-4"></div>
</div>