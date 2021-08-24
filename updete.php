public function updateProperties($iblock, $arValue)
	{
		if(!CModule::IncludeModule("iblock")) return false;
		$res = false;
		$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$iblock, "CODE" => $arValue['CODE']));
		while ($prop_fields = $properties->GetNext())
		{
		  $PROPERTY_TYPE = $prop_fields['PROPERTY_TYPE'];
		}


		if($PROPERTY_TYPE == 'L'){
			$db_enum_list = CIBlockProperty::GetPropertyEnum($arValue['CODE'], array("ID"=>"ASC", "SORT"=>"ASC"), array("IBLOCK_ID"=>$iblock));
				while($ar_enum_list = $db_enum_list->GetNext())
				{
					$idEnum[$ar_enum_list['VALUE']] = $ar_enum_list['ID'];
				}

			$PROPERTY_VALUE = $idEnum[$arValue['VALUE']];				
		}else {
			$PROPERTY_VALUE = $arValue['VALUE'];
		}

		$PROPERTY_CODE = $arValue['CODE'];
		$res = CIBlockElement::SetPropertyValuesEx($arValue['ID'], false, array($PROPERTY_CODE => $PROPERTY_VALUE));

		return $res;
	}

	public function getProperties()
	{
return false;
	}

	public function delProperties()
	{
return false;
	}
