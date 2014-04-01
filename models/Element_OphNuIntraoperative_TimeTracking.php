<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophnuintraopnurse_timetrackin".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $patient_enters_or
 * @property string $time_out
 * @property string $surgery_start
 * @property string $second_surgery_start
 * @property string $surgery_stop
 * @property string $second_surgery_stop
 * @property string $sign_out
 * @property string $patient_leaves_or
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphNuIntraoperative_TimeTracking  extends  BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophnuintraopnurse_timetrackin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, patient_enters_or, time_out, surgery_start, second_surgery_start, surgery_stop, second_surgery_stop, sign_out, patient_leaves_or, ', 'safe'),
			array('patient_enters_or, time_out, surgery_start, second_surgery_start, surgery_stop, second_surgery_stop, sign_out, patient_leaves_or, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, patient_enters_or, time_out, surgery_start, second_surgery_start, surgery_stop, second_surgery_stop, sign_out, patient_leaves_or, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'patient_enters_or' => 'Patient Enters OR',
			'time_out' => 'Time Out',
			'surgery_start' => 'Surgery Start',
			'second_surgery_start' => 'Second Surgery Start',
			'surgery_stop' => 'Surgery Stop',
			'second_surgery_stop' => 'Second Surgery Stop',
			'sign_out' => 'Sign Out',
			'patient_leaves_or' => 'Patient Leaves OR',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('patient_enters_or', $this->patient_enters_or);
		$criteria->compare('time_out', $this->time_out);
		$criteria->compare('surgery_start', $this->surgery_start);
		$criteria->compare('second_surgery_start', $this->second_surgery_start);
		$criteria->compare('surgery_stop', $this->surgery_stop);
		$criteria->compare('second_surgery_stop', $this->second_surgery_stop);
		$criteria->compare('sign_out', $this->sign_out);
		$criteria->compare('patient_leaves_or', $this->patient_leaves_or);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}



	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{

		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}
}
?>