<?php

class DefaultController extends BaseEventTypeController
{
	static protected $action_types = array(
		'validateSpecimen' => self::ACTION_TYPE_FORM,
	);

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

	public function actionValidateSpecimen()
	{
		$specimen = new OphNuIntraoperative_PostOp_Specimen;
		$specimen->attributes = $_POST;

		$specimen->validate();

		$errors = array();

		foreach ($specimen->errors as $field => $error) {
			$errors[$field] = $error[0];
		}

		if (empty($errors)) {
			$specimen->timestamp = date('Y-m-d',strtotime($specimen->timestamp)).' '.$specimen->time.':00';
			$errors['row'] = $this->renderPartial('_specimen_row',array('item' => $specimen, 'i' => $_POST['i'], 'edit' => true),true);
		}

		echo json_encode($errors);
	}

	protected function setComplexAttributes_Element_OphNuIntraoperative_PostOp($element, $data, $index)
	{
		$specimens = array();

		if (!empty($data['OphNuIntraoperative_PostOp_Specimen']['label'])) {
			foreach ($data['OphNuIntraoperative_PostOp_Specimen']['label'] as $i => $label) {
				$specimen = new OphNuIntraoperative_PostOp_Specimen;
				$specimen->element_id = $element->id;
				$specimen->label = $label;

				foreach (array('type_id','location','centre_name','doctor_name','timestamp') as $field) {
					$specimen->$field = $data['OphNuIntraoperative_PostOp_Specimen'][$field][$i];
				}

				$specimen->time = date('H:i',strtotime($specimen->timestamp));

				$specimens[] = $specimen;
			}
		}

		$element->specimens = $specimens;
	}

	protected function saveComplexAttributes_Element_OphNuIntraoperative_PostOp($element, $data, $index)
	{
		$ids = array();

		foreach ($element->specimens as $specimen) {
			$specimen->element_id = $element->id;

			if (!$specimen->save()) {
				throw new Exception("Unable to save specimen item: ".print_r($specimen->errors,true));
			}

			$ids[] = $specimen->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $element->id;

		if (!empty($ids)) {
			$criteria->addNotInCondition('id',$ids);
		}

		OphNuIntraoperative_PostOp_Specimen::model()->deleteAll($criteria);
	}
}
