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
 * This is the model class for table "et_ophnuintraoperative_timetracking".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property string $enters_or
 * @property string $surgery_stop
 * @property string $time_out
 * @property string $second_surgery_stop
 * @property string $surgery_start
 * @property string $sign_out
 * @property string $second_surgery_start
 * @property string $leaves_or
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
		return 'et_ophnuintraoperative_timetracking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, enters_or, surgery_stop, time_out, second_surgery_stop, surgery_start, sign_out, second_surgery_start, leaves_or, ', 'safe'),
			array('id, event_id, enters_or, surgery_stop, time_out, second_surgery_stop, surgery_start, sign_out, second_surgery_start, leaves_or, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
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
			'enters_or' => 'Patient enters OR',
			'surgery_stop' => 'Surgery stop',
			'time_out' => 'Time out',
			'second_surgery_stop' => 'Second surgery stop',
			'surgery_start' => 'Surgery start',
			'sign_out' => 'Sign out',
			'second_surgery_start' => 'Second surgery start',
			'leaves_or' => 'Patient leaves OR',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('enters_or', $this->enters_or);
		$criteria->compare('surgery_stop', $this->surgery_stop);
		$criteria->compare('time_out', $this->time_out);
		$criteria->compare('second_surgery_stop', $this->second_surgery_stop);
		$criteria->compare('surgery_start', $this->surgery_start);
		$criteria->compare('sign_out', $this->sign_out);
		$criteria->compare('second_surgery_start', $this->second_surgery_start);
		$criteria->compare('leaves_or', $this->leaves_or);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	protected function afterValidate()
	{
		foreach (array('enters_or','surgery_stop','time_out','second_surgery_stop','surgery_start','sign_out','second_surgery_start','leaves_or') as $field) {
			if ($this->$field) {
				if (!preg_match('/^([0-9]{1,2}):([0-9]{2})$/',$this->{$field},$m) || $m[1] > 23 || $m[2] > 59) {
					$this->addError($field,'Invalid time format for '.$this->getAttributeLabel($field));
				}
			}
		}

		return parent::afterValidate();
	}
}
?>
