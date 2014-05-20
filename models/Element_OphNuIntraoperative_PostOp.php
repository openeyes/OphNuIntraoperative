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
 * This is the model class for table "et_ophnuintraoperative_postop".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $specimin_collected_id
 * @property string $specimin_comments
 * @property integer $dressing_used
 * @property string $dressing_other
 * @property integer $circulating_nurse_id
 * @property integer $scrub_nurse_id
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuIntraoperative_PostOp_SpeciminCollected $specimin_collected
 * @property Element_OphNuIntraoperative_PostOp_DressingItems_Assignment $dressing_itemss
 * @property OphnuintraoperativePostopProceduresPerformedProceduresPerformed $procedures_performeds
 * @property User $circulating_nurse
 * @property User $scrub_nurse
 */

class Element_OphNuIntraoperative_PostOp  extends  BaseEventTypeElement
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
		return 'et_ophnuintraoperative_postop';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, specimin_collected_id, specimin_comments, dressing_other, circulating_nurse_id, scrub_nurse_id, ', 'safe'),
			array('id, event_id, specimin_collected_id, specimin_comments, circulating_nurse_id, scrub_nurse_id, ', 'safe', 'on' => 'search'),
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
			'specimin_collected' => array(self::BELONGS_TO, 'OphNuIntraoperative_PostOp_SpeciminCollected', 'specimin_collected_id'),
			'dressing_itemss' => array(self::HAS_MANY, 'Element_OphNuIntraoperative_PostOp_DressingItems_Assignment', 'element_id'),
			'procedures_performeds' => array(self::HAS_MANY, 'OphNuIntraoperative_PostOp_Procedures_Performed_Assignment', 'element_id'),
			'procedures' => array(self::MANY_MANY, 'Procedure', 'ophnuintraoperative_ppppp_assignment(element_id, proc_id)'),
			'circulating_nurse' => array(self::BELONGS_TO, 'User', 'circulating_nurse_id'),
			'scrub_nurse' => array(self::BELONGS_TO, 'User', 'scrub_nurse_id'),
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
			'specimin_collected_id' => 'Specimen collected and documented',
			'specimin_comments' => 'Specimen comments',
			'dressing_items' => 'Dressing',
			'dressing_other' => 'Other dressing',
			'procedures_performed' => 'Actual procedures performed',
			'circulating_nurse_id' => 'Circulating nurse',
			'scrub_nurse_id' => 'Scrub nurse',
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
		$criteria->compare('specimin_collected_id', $this->specimin_collected_id);
		$criteria->compare('specimin_comments', $this->specimin_comments);
		$criteria->compare('dressing_items', $this->dressing_items);
		$criteria->compare('procedures_performed', $this->procedures_performed);
		$criteria->compare('circulating_nurse_id', $this->circulating_nurse_id);
		$criteria->compare('scrub_nurse_id', $this->scrub_nurse_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	protected function beforeValidate()
	{
		if ($this->specimin_collected && $this->specimin_collected->name == 'Yes') {
			if (!$this->specimin_comments) {
				$this->addError('specimin_comments',$this->getAttributeLabel('specimin_comments').' cannot be blank');
			}
		}

		if ($this->hasMultiSelectValue('dressing_itemss','Other (please specify)')) {
			if (!$this->dressing_other) {
				$this->addError('dressing_other',$this->getAttributeLabel('dressing_other').' cannot be blank');
			}
		}

		return parent::beforeValidate();
	}
}
?>
