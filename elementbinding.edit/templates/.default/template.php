<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);?>
<?
$INPUT_ID = trim($arParams["INPUT_ID"]);
$randomString = randString(7);
$CONTAINER_ID = trim($arParams["CONTAINER_ID"]);
?>
<div id="<?= $CONTAINER_ID ?>">
	<form action="<? echo $arResult["FORM_ACTION"] ?>">
		<input id="<?= $INPUT_ID ?>" type="text" name="q" value="<?= $arResult["CURRENT_VALUE"]?>" size="40" maxlength="50" autocomplete="off"/>
		<input type="hidden" name="PROPERTY[<?=$arParams["PROPERTY_ID"]?>][0]" id="<?=$randomString?>" value="<?=$arParams["CURRENT_ID"]?>"/>
	</form>
</div>
<script>
	BX.ready(function(){
		new BXETypePropertySearch({
			'AJAX_PAGE' : '<?= CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?= $CONTAINER_ID; ?>',
			'INPUT_ID': '<?= $INPUT_ID; ?>',
			'MIN_QUERY_LEN': 2,
			'HIDDEN_INPUT_ID': '<?= $randomString; ?>'
		});
	});
</script>
