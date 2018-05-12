# Битрикс. Редактирование свойств типа Привязка к элементу в компоненте iblock.element.add.form

Для редактирования свойств типа Привязка к элементу в компоненте bitrix:iblock.element.add.form с помощью предлагаемого компонента выполнить следующее:
1. В папку сайта local/components/pumpon склонировать данный репозиторий
2. В шаблоне компонента bitrix:iblock.element.add.form найти место вывода полей редактирования элемента. Там будет конструкция switch. Вставить туда следующий код:
```php
  case "E":
    $APPLICATION->IncludeComponent("pumpon:elementbinding.edit", "", Array(
    "PROPERTY_ID" => $propertyID, //Эта переменная определена по умолчанию в .default-шаблоне компонента 
                                  //Форма редактирования, если вы все делаете правильно
    "INPUT_ID"    => "randomstring1", //Здесь и ниже randomstringN означает любую случайную строку
    "IBLOCK_ID"   => "4", //ID инфоблока, элементы которого привязаны к нашему
    "CONTAINER_ID"   => "randomstring2",
    "CURRENT_ID"  => $arResult["ELEMENT_PROPERTIES"][$propertyID][0]['VALUE']));
  break;
  ```
3. Видим текстовое поле для ввода текста, вводим название элемента, выбираем подходящий. Профит!
<img src="https://raw.githubusercontent.com/Pum-purum/elementbinding.edit/master/elementbinding.edit/fwp234oerj.jpg" width="400" height="200" />
