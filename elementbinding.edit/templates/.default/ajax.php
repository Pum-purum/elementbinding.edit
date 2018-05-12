<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<?
if (!empty($arResult["ITEMS"])) { ?>
	<table class="title-search-result">
        <? foreach ($arResult["ITEMS"] as $i => $arItem) { ?>
			<tr>
				<td class="title-search-item" data-id="<?= $arItem["ITEM_ID"] ?>"><? echo $arItem["NAME"] ?></td>
			</tr>
        <? } ?>
	</table>
<? } ?>