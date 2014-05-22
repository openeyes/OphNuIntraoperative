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

	protected function setComplexAttributes_Element_OphNuIntraoperative_PostOp($element, $data, $index)
	{
		$procedures = array();

		if (!empty($data['Procedures_procs'])) {
			foreach ($data['Procedures_procs'] as $proc_id) {
				$procedures[] = Procedure::model()->findByPk($proc_id);
			}
		}

		$element->procedures_performeds = $procedures;
	}

	protected function saveComplexAttributes_Element_OphNuIntraoperative_PostOp($element, $data, $index)
	{
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
