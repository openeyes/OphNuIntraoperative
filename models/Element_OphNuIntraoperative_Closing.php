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

class Element_OphNuIntraoperative_Closing  extends	BaseEventTypeElement
{
	public $auto_update_relations = true;

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
		return 'et_ophnuintraoperative_closing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('dressings,eyedrops,dressing_other,eyedrops_other','safe'),
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
			'dressing_assignment' => array(self::HAS_MANY, 'OphNuIntraoperative_Closing_Dressing_Assignment', 'element_id'),
			'dressings' => array(self::HAS_MANY, 'OphNuIntraoperative_Closing_Dressing', 'dressing_id', 'through' => 'dressing_assignment'),
			'eyedrops_assignment' => array(self::HAS_MANY, 'OphNuIntraoperative_Closing_Eyedrops_Assignment', 'element_id'),
			'eyedrops' => array(self::HAS_MANY, 'OphNuIntraoperative_Closing_Eyedrops', 'eyedrops_id', 'through' => 'eyedrops_assignment'),
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
			'dressings' => 'Dressing',
			'eyedrops' => 'Eye drops / ointment given',
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

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function afterValidate()
	{
		if ($this->hasMultiSelectValue('dressings','Other (please specify)')) {
			if (!$this->dressing_other) {
				$this->addError('dressing_other',$this->getAttributeLabel('dressing_other').' cannot be blank');
			}
		}

		if ($this->hasMultiSelectValue('eyedrops','Other (please specify)')) {
			if (!$this->eyedrops_other) {
				$this->addError('eyedrops_other',$this->getAttributeLabel('eyedrops_other').' cannot be blank');
			}
		}

		return parent::afterValidate();
	}
}
