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
 * This is the model class for table "et_ophnuintraoperative_personnel".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $surgeon_id
 * @property integer $scrub_nurse_id
 * @property integer $surgical_assistant_id
 * @property integer $trainee_scrub_nurse_id
 * @property integer $anesthesiologist_id
 * @property integer $trainee_circulating_nurse_id
 * @property integer $anesthetic_assistant_id
 * @property string $translator
 * @property integer $anesthetic_trainee_id
 * @property string $other
 * @property integer $who_timeout_completed
 * @property integer $time_out_lead_by_id
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property User $surgeon
 * @property User $scrub_nurse
 * @property User $surgical_assistant
 * @property User $trainee_scrub_nurse
 * @property User $anesthesiologist
 * @property User $trainee_circulating_nurse
 * @property User $anesthetic_assistant
 * @property User $anesthetic_trainee
 * @property User $time_out_lead_by
 */

class Element_OphNuIntraoperative_Personnel  extends  BaseEventTypeElement
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
		return 'et_ophnuintraoperative_personnel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, surgeon_id, scrub_nurse_id, surgical_assistant_id, trainee_scrub_nurse_id, anesthesiologist_id, trainee_circulating_nurse_id, anesthetic_assistant_id, translator, anesthetic_trainee_id, other, who_timeout_completed, time_out_lead_by_id, second_surgical_assistant_id, circulating_nurse_id', 'safe'),
			array('id, event_id, surgeon_id, scrub_nurse_id, surgical_assistant_id, trainee_scrub_nurse_id, anesthesiologist_id, trainee_circulating_nurse_id, anesthetic_assistant_id, translator, anesthetic_trainee_id, other, who_timeout_completed, time_out_lead_by_id, ', 'safe', 'on' => 'search'),
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
			'surgeon' => array(self::BELONGS_TO, 'User', 'surgeon_id'),
			'scrub_nurse' => array(self::BELONGS_TO, 'User', 'scrub_nurse_id'),
			'surgical_assistant' => array(self::BELONGS_TO, 'User', 'surgical_assistant_id'),
			'trainee_scrub_nurse' => array(self::BELONGS_TO, 'User', 'trainee_scrub_nurse_id'),
			'anesthesiologist' => array(self::BELONGS_TO, 'User', 'anesthesiologist_id'),
			'trainee_circulating_nurse' => array(self::BELONGS_TO, 'User', 'trainee_circulating_nurse_id'),
			'anesthetic_assistant' => array(self::BELONGS_TO, 'User', 'anesthetic_assistant_id'),
			'anesthetic_trainee' => array(self::BELONGS_TO, 'User', 'anesthetic_trainee_id'),
			'time_out_lead_by' => array(self::BELONGS_TO, 'User', 'time_out_lead_by_id'),
			'second_surgical_assistant' => array(self::BELONGS_TO, 'User', 'second_surgical_assistant_id'),
			'circulating_nurse' => array(self::BELONGS_TO, 'User', 'circulating_nurse_id'),
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
			'surgeon_id' => 'Surgeon',
			'scrub_nurse_id' => 'Scrub nurse',
			'surgical_assistant_id' => 'Surgical assistant',
			'trainee_scrub_nurse_id' => 'Trainee scrub nurse',
			'anesthesiologist_id' => 'Anesthesiologist',
			'trainee_circulating_nurse_id' => 'Trainee circulating nurse',
			'anesthetic_assistant_id' => 'Anesthetic assistant',
			'translator' => 'Translator',
			'anesthetic_trainee_id' => 'Anesthetic trainee',
			'other' => 'Other',
			'who_timeout_completed' => 'WHO timeout completed',
			'time_out_lead_by_id' => 'Time out lead by',
			'second_surgical_assistant_id' => 'Second surgical assistant',
			'circulating_nurse_id' => 'Circulating nurse',
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
		$criteria->compare('surgeon_id', $this->surgeon_id);
		$criteria->compare('scrub_nurse_id', $this->scrub_nurse_id);
		$criteria->compare('surgical_assistant_id', $this->surgical_assistant_id);
		$criteria->compare('trainee_scrub_nurse_id', $this->trainee_scrub_nurse_id);
		$criteria->compare('anesthesiologist_id', $this->anesthesiologist_id);
		$criteria->compare('trainee_circulating_nurse_id', $this->trainee_circulating_nurse_id);
		$criteria->compare('anesthetic_assistant_id', $this->anesthetic_assistant_id);
		$criteria->compare('translator', $this->translator);
		$criteria->compare('anesthetic_trainee_id', $this->anesthetic_trainee_id);
		$criteria->compare('other', $this->other);
		$criteria->compare('who_timeout_completed', $this->who_timeout_completed);
		$criteria->compare('time_out_lead_by_id', $this->time_out_lead_by_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}



	protected function afterSave()
	{

		return parent::afterSave();
	}
}
?>
