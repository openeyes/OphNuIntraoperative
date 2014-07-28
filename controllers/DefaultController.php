<?php

class DefaultController extends BaseEventTypeController
{
	protected $booking_operation;
	protected $unbooked = false;

	static protected $action_types = array(
		'validateSpecimen' => self::ACTION_TYPE_FORM,
		'validateCount' => self::ACTION_TYPE_FORM,
	);

	protected function initActionCreate()
	{
		parent::initActionCreate();

		if (isset($_GET['booking_event_id'])) {
			if (!$api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
				throw new Exception('invalid request for booking event');
			}
			if (!$this->booking_operation = $api->getOperationForEvent($_GET['booking_event_id'])) {
				throw new Exception('booking event not found');
			}
		}
		elseif (isset($_GET['unbooked'])) {
			$this->unbooked = true;
		}
	}

	public function actionCreate()
	{
		$errors = array();

		if (!empty($_POST)) {
			if (preg_match('/^booking([0-9]+)$/',@$_POST['SelectBooking'],$m)) {
				$this->redirect(array('/OphNuIntraoperative/Default/create?patient_id='.$this->patient->id.'&booking_event_id='.$m[1]));
			}

			$errors = array('Operation' => array('Please select a booked operation'));
		}

		if ($this->booking_operation || $this->unbooked) {
			parent::actionCreate();
		} else {
			// set up form for selecting a booking for the Op note
			$bookings = array();

			if ($api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
				$bookings = $api->getOpenBookingsForEpisode($this->episode->id);
			}

			$this->title = !empty($bookings) ? 'Please select booking' : 'No bookings created';
			$this->event_tabs = array(
				array(
					'label' => !empty($bookings) ? 'Select a booking' : 'No bookings created',
					'active' => true,
				),
			);
			$cancel_url = ($this->episode) ? '/patient/episode/'.$this->episode->id : '/patient/episodes/'.$this->patient->id;
			$this->event_actions = array(
				EventAction::link('Cancel',
					Yii::app()->createUrl($cancel_url),
					null, array('class' => 'button small warning')
				)
			);

			$this->render('select_event',array(
				'errors' => $errors,
				'bookings' => $bookings,
			));
		}
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

				foreach (array('type_id','location','centre_name','doctor_name','timestamp','results_received','results_received_timestamp') as $field) {
					$specimen->$field = $data['OphNuIntraoperative_PostOp_Specimen'][$field][$i];
				}

				$specimen->time = date('H:i',strtotime($specimen->timestamp));
				$specimen->results_received_time = date('H:i',strtotime($specimen->results_received_timestamp));

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

	public function actionValidateCount()
	{
		$count = new OphNuIntraoperative_SurgicalCounts_Count;
		$count->attributes = $_POST;

		$errors = array();

		if (!$count->validate()) {
			foreach ($count->errors as $error) {
				$errors[] = $error[0];
			}
		}

		if (empty($_POST['value']) || empty($_POST['items'])) {
			$errors[] = 'You must enter at least one count item';
		} else {
			$items = array();

			foreach ($_POST['value'] as $i => $value) {
				$item = new OphNuIntraoperative_SurgicalCounts_CountItem;
				$item->item_type_id = $_POST['items'][$i];
				$item->value = $value;

				if (!$item->validate()) {
					foreach ($item->errors as $error) {
						$errors[] = $error[0];
					}
				}

				$items[] = $item;
			}

			$count->items = $items;
		}

		if (count($errors) == 0) {
			$count->timestamp = date('Y-m-d',strtotime($count->timestamp)).' '.$count->time.':00';
			$errors['row'] = $this->renderPartial('_count_row',array('item' => $count, 'edit' => true, 'i' => (integer)$_POST['i']),true);
		}

		echo json_encode($errors);
	}

	protected function setComplexAttributes_Element_OphNuIntraoperative_SurgicalCounts($element, $data, $index)
	{
		$counts = array();

		if (!empty($data['OphNuIntraoperative_SurgicalCounts_Count']['count_type_id'])) {
			foreach ($data['OphNuIntraoperative_SurgicalCounts_Count']['count_type_id'] as $i => $count_type_id) {
				$count = new OphNuIntraoperative_SurgicalCounts_Count;
				$count->count_type_id = $count_type_id;
				$count->timestamp = $data['OphNuIntraoperative_SurgicalCounts_Count']['timestamp'][$i];
				$count->time = date('H:s',strtotime($count->timestamp));

				$items = array();

				foreach ($data['OphNuIntraoperative_SurgicalCounts_Count']['items_'.$data['OphNuIntraoperative_SurgicalCounts_Count']['i'][$i]] as $j => $item_type_id) {
					$item = new OphNuIntraoperative_SurgicalCounts_CountItem;
					$item->item_type_id = $item_type_id;
					$item->value = $data['OphNuIntraoperative_SurgicalCounts_Count']['values_'.$data['OphNuIntraoperative_SurgicalCounts_Count']['i'][$i]][$j];

					$items[] = $item;
				}

				$count->items = $items;

				$counts[] = $count;
			}
		}

		$element->counts = $counts;
	}

	protected function saveComplexAttributes_Element_OphNuIntraoperative_SurgicalCounts($element, $data, $index)
	{
		$ids = array();

		foreach ($element->counts as $count) {
			$count->element_id = $element->id;

			if (!$count->save()) {
				throw new Exception("Unable to save count: ".print_r($count->errors,true));
			}

			$ids[] = $count->id;

			foreach ($count->items as $item) {
				$item->count_id = $count->id;

				if (!$item->save()) {
					throw new Exception("Unable to save count item: ".print_r($item->errors,true));
				}
			}
		}

		$criteria = new CDbCriteria;
		$criteria->addCondition('element_id = :element_id');
		$criteria->params[':element_id'] = $element->id;

		if (!empty($ids)) {
			$criteria->addNotInCondition('id',$ids);
		}

		foreach (OphNuIntraoperative_SurgicalCounts_Count::model()->findAll($criteria) as $count) {
			foreach ($count->items as $item) {
				if (!$item->delete()) {
					throw new Exception("Unable to delete count item: ".print_r($item->errors,true));
				}
			}

			if (!$count->delete()) {
				throw new Exception("Unable to delete count: ".print_r($count->errors,true));
			}
		}
	}

	public function getBookingOperation()
	{
		foreach ($this->open_elements as $element) {
			if (CHtml::modelName($element) == 'Element_OphNuIntraoperative_PatientId') {
				break;
			}
		}

		if (!($event_id = $element->id ? $element->booking_event_id : @$_GET['booking_event_id'])) {
			return false;
		}

		if (!$api = Yii::app()->moduleAPI->get('OphTrOperationbooking')) {
			throw new Exception('Operation booking API not found');
		}

		if (!$operation = $api->getOperationForEvent($event_id)) {
			throw new Exception("Operation with event_id $event_id not found");
		}

		return $operation;
	}
}
