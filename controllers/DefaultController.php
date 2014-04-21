<?php

class DefaultController extends BaseEventTypeController
{
	public function actionCreate()
	{
		parent::actionCreate();
	}

	public function actionUpdate($id)
	{
		parent::actionUpdate($id);
	}

	public function actionView($id)
	{
		parent::actionView($id);
	}

	public function actionPrint($id)
	{
		parent::actionPrint($id);
	}

	/**
	* use the split event type javascript and styling
	*
	* @param CAction $action
	* @return bool
	*/
	protected function beforeAction($action)
	{
		Yii::app()->assetManager->registerScriptFile('js/spliteventtype.js', null, null, AssetManager::OUTPUT_SCREEN);
		return parent::beforeAction($action);
	}

	protected function setComplexAttributes_Element_OphNuIntraoperative_HandOff($element, $data, $index)
	{
		$two_identifiers = array();

		if (!empty($data['MultiSelect_two_identifiers'])) {
			foreach ($data['MultiSelect_two_identifiers'] as $identifier_id) {
				$two_identifiers[] = OphNuIntraoperative_Handoff_TwoIdentifiers::model()->findByPk($identifier_id);
			}
		}

		$element->two_identifierss = $two_identifiers;
	}

	protected function saveComplexAttributes_Element_OphNuIntraoperative_HandOff($element, $data, $index)
	{
		if (!empty($data['MultiSelect_two_identifiers'])) {
			foreach ($data['MultiSelect_two_identifiers'] as $identifier_id) {
				if (!Element_OphNuIntraoperative_Identifiers_Idoptions_Assignment::model()->find('element_id=? and ophnuintraoperative_handoff_two_identifiers_id=?',array($element->id,$identifier_id))) {
					$assignment = new Element_OphNuIntraoperative_Identifiers_Idoptions_Assignment;
					$assignment->element_id = $element->id;
					$assignment->ophnuintraoperative_handoff_two_identifiers_id = $identifier_id;

					if (!$assignment->save()) {
						throw new Exception("Unable to save Element_OphNuIntraoperative_Identifiers_Idoptions_Assignment: ".print_r($assignment->getErrors(),true));
					}
				}
			}
		} else {
			$data['MultiSelect_two_identifiers'] = array();
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $element->id;
		$criteria->addNotInCondition('ophnuintraoperative_handoff_two_identifiers_id',$data['MultiSelect_two_identifiers']);

		Element_OphNuIntraoperative_Identifiers_Idoptions_Assignment::model()->deleteAll($criteria);
	}

	protected function setComplexAttributes_Element_OphNuIntraoperative_OperationPrep($element, $data, $index)
	{
		$additional = array();

		if (!empty($_POST['MultiSelect_additional'])) {
			foreach ($_POST['MultiSelect_additional'] as $additional_id) {
				$additional[] = OphNuIntraoperative_OperationPrep_Additional::model()->findByPk($additional_id);
			}
		}

		$element->additionals = $additional;
	}
}
