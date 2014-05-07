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
 * This is the model class for table "et_ophnuintraoperative_handoff".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $wristband_verified
 * @property integer $allergies_verified
 * @property integer $hand_off_from_id
 * @property integer $hand_off_to_id
 * @property integer $anesthesia_type_id
 * @property integer $nonoperative_eye_protected_id
 * @property integer $tape_or_shield_id
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property Element_OphNuIntraoperative_Handoff_TwoIdentifiers_Assignment $two_identifierss
 * @property OphNuIntraoperative_Handoff_HandOffFrom $hand_off_from
 * @property Address $hand_off_to
 * @property AnaestheticType $anesthesia_type
 * @property OphNuIntraoperative_Handoff_NonoperativeEyeProtected $nonoperative_eye_protected
 * @property OphNuIntraoperative_Handoff_TapeOrShield $tape_or_shield
 */

class Element_OphNuIntraoperative_Handoff  extends  BaseEventTypeElement
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
		return 'et_ophnuintraoperative_handoff';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, wristband_verified, allergies_verified, hand_off_from_id, hand_off_to_id, anesthesia_type_id, nonoperative_eye_protected_id, tape_or_shield_id, ', 'safe'),
			array('wristband_verified, allergies_verified, hand_off_from_id, hand_off_to_id, anesthesia_type_id, nonoperative_eye_protected_id', 'required'),
			array('id, event_id, wristband_verified, allergies_verified, hand_off_from_id, hand_off_to_id, anesthesia_type_id, nonoperative_eye_protected_id, tape_or_shield_id, ', 'safe', 'on' => 'search'),
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
			'two_identifierss' => array(self::HAS_MANY, 'Element_OphNuIntraoperative_Handoff_TwoIdentifiers_Assignment', 'element_id'),
			'hand_off_from' => array(self::BELONGS_TO, 'OphNuIntraoperative_Handoff_HandOffFrom', 'hand_off_from_id'),
			'hand_off_to' => array(self::BELONGS_TO, 'OphNuIntraoperative_Handoff_HandOffFrom', 'hand_off_to_id'),
			'anesthesia_type' => array(self::BELONGS_TO, 'AnaestheticType', 'anesthesia_type_id'),
			'nonoperative_eye_protected' => array(self::BELONGS_TO, 'OphNuIntraoperative_Handoff_NonoperativeEyeProtected', 'nonoperative_eye_protected_id'),
			'tape_or_shield' => array(self::BELONGS_TO, 'OphNuIntraoperative_Handoff_TapeOrShield', 'tape_or_shield_id'),
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
			'wristband_verified' => 'Patient ID verified with two identifiers',
			'two_identifiers' => 'Two identifiers',
			'allergies_verified' => 'Allergies verified',
			'hand_off_from_id' => 'Hand off from',
			'hand_off_to_id' => 'Hand off to',
			'anesthesia_type_id' => 'Anesthesia type',
			'nonoperative_eye_protected_id' => 'Non-operative eye protected',
			'tape_or_shield_id' => 'Tape or shield',
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
		$criteria->compare('wristband_verified', $this->wristband_verified);
		$criteria->compare('two_identifiers', $this->two_identifiers);
		$criteria->compare('allergies_verified', $this->allergies_verified);
		$criteria->compare('hand_off_from_id', $this->hand_off_from_id);
		$criteria->compare('hand_off_to_id', $this->hand_off_to_id);
		$criteria->compare('anesthesia_type_id', $this->anesthesia_type_id);
		$criteria->compare('nonoperative_eye_protected_id', $this->nonoperative_eye_protected_id);
		$criteria->compare('tape_or_shield_id', $this->tape_or_shield_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function beforeValidate()
	{
		if ($this->nonoperative_eye_protected && $this->nonoperative_eye_protected->name == 'Yes') {
			if (!$this->tape_or_shield) {
				$this->addError('tape_or_shield_id',$this->getAttributeLabel('tape_or_shield_id').' cannot be blank.');
			}
		}

		if ($this->wristband_verified) {
			if (count($this->two_identifierss) != 2) {
				$this->addError('two_identifierss','Please select exactly two patient identifiers');
			}
		}

		return parent::beforeValidate();
	}
}
?>
