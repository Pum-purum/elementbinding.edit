<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$query = ltrim($_POST["q"]);
if (!empty($query) && $_REQUEST["ajax_call"] === "y" && (!isset($_REQUEST["INPUT_ID"]) || $_REQUEST["INPUT_ID"] == $arParams["INPUT_ID"]) && CModule::IncludeModule("iblock")) {
    CUtil::decodeURIComponent($query);

    $arFilter["%NAME"] = $query;
    $arFilter["IBLOCK_ID"] = $arParams['IBLOCK_ID'];
    $arFilter["ACTIVE"] = "Y";
    $dbElements = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter);
    while ($ar = $dbElements->Fetch()) {
        $j++;
        if ($j < 5) {
            $arResult["ITEMS"][$j] = array(
                "NAME"    => $ar['NAME'],
                "ITEM_ID" => $ar["ID"]);
        }
    }
}
$curElem = CIBlockElement::GetById($arParams["CURRENT_ID"])->GetNext();
$arResult["CURRENT_VALUE"] = $curElem['NAME'];
$arResult["FORM_ACTION"] = htmlspecialcharsbx(str_replace("#SITE_DIR#", SITE_DIR, $arParams["PAGE"]));

if ($_REQUEST["ajax_call"] === "y" && (!isset($_REQUEST["INPUT_ID"]) || $_REQUEST["INPUT_ID"] == $arParams["INPUT_ID"])) {
    $APPLICATION->RestartBuffer();

    if (!empty($query)) {
        $this->IncludeComponentTemplate('ajax');
    }
    require_once($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/include/epilog_after.php");
    die();
} else {
    $APPLICATION->AddHeadScript($this->GetPath() . '/script.js');
    CUtil::InitJSCore(array('ajax'));
    $this->IncludeComponentTemplate();
}
?>
