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
				if (!Element_OphNuIntraoperative_Handoff_TwoIdentifiers_Assignment::model()->find('element_id=? and ophnuintraoperative_handoff_two_identifiers_id=?',array($element->id,$identifier_id))) {
					$assignment = new Element_OphNuIntraoperative_Handoff_TwoIdentifiers_Assignment;
					$assignment->element_id = $element->id;
					$assignment->ophnuintraoperative_handoff_two_identifiers_id = $identifier_id;

					if (!$assignment->save()) {
						throw new Exception("Unable to save Element_OphNuIntraoperative_Handoff_TwoIdentifiers_Assignment: ".print_r($assignment->getErrors(),true));
					}
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $element->id;
		!empty($data['MultiSelect_two_identifiers']) && $criteria->addNotInCondition('ophnuintraoperative_handoff_two_identifiers_id',$data['MultiSelect_two_identifiers']);

		Element_OphNuIntraoperative_Handoff_TwoIdentifiers_Assignment::model()->deleteAll($criteria);
	}

	protected function setComplexAttributes_Element_OphNuIntraoperative_OperationPrep($element, $data, $index)
	{
		$additional = array();

		if (!empty($data['MultiSelect_additional'])) {
			foreach ($data['MultiSelect_additional'] as $additional_id) {
				$additional[] = OphNuIntraoperative_OperationPrep_Additional::model()->findByPk($additional_id);
			}
		}

		$element->additionals = $additional;
	}

	protected function saveComplexAttributes_Element_OphNuIntraoperative_OperationPrep($element, $data, $index)
	{
		if (!empty($data['MultiSelect_additional'])) {
			foreach ($data['MultiSelect_additional'] as $additional_id) {
				if (!Element_OphNuIntraoperative_OperationPrep_Additional_Assignment::model()->find('element_id=? and ophnuintraoperative_operationprep_additional_id=?',array($element->id,$additional_id))) {
					$assignment = new Element_OphNuIntraoperative_OperationPrep_Additional_Assignment;
					$assignment->element_id = $element->id;
					$assignment->ophnuintraoperative_operationprep_additional_id = $additional_id;

					if (!$assignment->save()) {
						throw new Exception("Unable to save Element_OphNuIntraoperative_OperationPrep_Additional_Assignment: ".print_r($assignment->getErrors(),true));
					}
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $element->id;
		!empty($data['MultiSelect_additional']) && $criteria->addNotInCondition('ophnuintraoperative_operationprep_additional_id',$data['MultiSelect_additional']);

		Element_OphNuIntraoperative_OperationPrep_Additional_Assignment::model()->deleteAll($criteria);
	}

	protected function setComplexAttributes_Element_OphNuIntraoperative_PostOp($element, $data, $index)
	{
		$dressing_items = array();

		if (!empty($data['MultiSelect_dressing_items'])) {
			foreach ($data['MultiSelect_dressing_items'] as $item_id) {
				$dressing_items[] = OphNuIntraoperative_PostOp_DressingItems::model()->findByPk($item_id);
			}
		}

		$procedures = array();

		if (!empty($data['Procedures_procs'])) {
			foreach ($data['Procedures_procs'] as $proc_id) {
				$procedures[] = Procedure::model()->findByPk($proc_id);
			}
		}

		$element->dressing_itemss = $dressing_items;
		$element->procedures_performeds = $procedures;
	}

	protected function saveComplexAttributes_Element_OphNuIntraoperative_PostOp($element, $data, $index)
	{
		if (!empty($data['MultiSelect_dressing_items'])) {
			foreach ($data['MultiSelect_dressing_items'] as $item_id) {
				if (!Element_OphNuIntraoperative_PostOp_DressingItems_Assignment::model()->find('element_id=? and ophnuintraoperative_postop_dressing_items_id=?',array($element->id,$item_id))) {
					$assignment = new Element_OphNuIntraoperative_PostOp_DressingItems_Assignment;
					$assignment->element_id = $element->id;
					$assignment->ophnuintraoperative_postop_dressing_items_id = $item_id;

					if (!$assignment->save()) {
						throw new Exception("Unable to save Element_OphNuIntraoperative_PostOp_DressingItems_Assignment: ".print_r($assignment->getErrors(),true));
					}
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $element->id;
		!empty($data['MultiSelect_dressing_items']) && $criteria->addNotInCondition('ophnuintraoperative_postop_dressing_items_id',$data['MultiSelect_dressing_items']);

		Element_OphNuIntraoperative_PostOp_DressingItems_Assignment::model()->deleteAll($criteria);

		if (!empty($data['Procedures_procs'])) {
			foreach ($data['Procedures_procs'] as $proc_id) {
				if (!OphNuIntraoperative_PostOp_Procedures_Performed_Assignment::model()->find('element_id=? and proc_id=?',array($element->id,$proc_id))) {
					$assignment = new OphNuIntraoperative_PostOp_Procedures_Performed_Assignment;
					$assignment->element_id = $element->id;
					$assignment->proc_id = $proc_id;

					if (!$assignment->save()) {
						throw new Exception("Unable to save OphNuIntraoperative_PostOp_Procedures_Performed_Assignment: ".print_r($assignment->getErrors(),true));
					}
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $element->id;
		!empty($data['Procedures_procs']) && $criteria->addNotInCondition('proc_id',$data['Procedures_procs']);

		OphNuIntraoperative_PostOp_Procedures_Performed_Assignment::model()->deleteAll($criteria);
	}
}
