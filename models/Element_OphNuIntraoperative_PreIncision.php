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

class Element_OphNuIntraoperative_PreIncision  extends	BaseEventTypeElement
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
		return 'et_ophnuintraoperative_preincision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, incision_site_id, patient_position_id, prep_solution_id, other_solution, grounding_pad, grounding_pad_location_id, grounding_pad_side_id, post_skin_assessment_id, post_skin_assessment_other, nasal_throat_pack, nasal_insert_time, nasal_remove_time, other_patient_position, anesthesia_type_id, nonoperative_eye_protected_id, tape_or_shield_id, who_timeout_completed, who_timeout_lead_by_id', 'safe'),
			array('id, event_id, incision_site_id, patient_position_id, prep_solution_id, other_solution, grounding_pad, grounding_pad_location_id, grounding_pad_side_id, post_skin_assessment_id, post_skin_assessment_other, nasal_throat_pack, nasal_insert_time, nasal_remove_time, other_patient_position', 'safe', 'on' => 'search'),
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
			'incision_site' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_IncisionSite', 'incision_site_id'),
			'patient_position' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_PatientPosition', 'patient_position_id'),
			'prep_solution' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_PrepSolution', 'prep_solution_id'),
			'grounding_pad_location' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_GroundingPadLocation', 'grounding_pad_location_id'),
			'grounding_pad_side' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_GroundingPadSide', 'grounding_pad_side_id'),
			'post_skin_assessment' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_PostSkinAssessment', 'post_skin_assessment_id'),
			'anesthesia_type' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_Anaesthesia_Type', 'anesthesia_type_id'),
			'nonoperative_eye_protected' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_NonoperativeEyeProtected', 'nonoperative_eye_protected_id'),
			'tape_or_shield' => array(self::BELONGS_TO, 'OphNuIntraoperative_PreIncision_TapeOrShield', 'tape_or_shield_id'),
			'who_timeout_lead_by' => array(self::BELONGS_TO, 'User', 'who_timeout_lead_by_id'),
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
			'incision_site_id' => 'Incision site',
			'patient_position_id' => 'Patient position',
			'prep_solution_id' => 'Prep done',
			'other_solution' => 'Other solution',
			'grounding_pad' => 'Grounding pad',
			'grounding_pad_location_id' => 'Grounding pad location',
			'grounding_pad_side_id' => 'Grounding pad side',
			'post_skin_assessment_id' => 'Post skin assessment',
			'post_skin_assessment_other' => 'Post skin assessment other',
			'nasal_throat_pack' => 'Nasal pack / throat pack',
			'nasal_insert_time' => 'Inserted time',
			'nasal_remove_time' => 'Removal time',
			'other_patient_position' => 'Other patient position',
			'anesthesia_type_id' => 'Anesthesia type',
			'nonoperative_eye_protected_id' => 'Non-operative eye protected',
			'tape_or_shield_id' => 'Tape or shield',
			'who_timeout_completed' => 'WHO TIME OUT Completed',
			'who_timeout_lead_by_id' => 'Time out lead by',
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
		$criteria->compare('incision_site_id', $this->incision_site_id);
		$criteria->compare('patient_position_id', $this->patient_position_id);
		$criteria->compare('prep_solution_id', $this->prep_solution_id);
		$criteria->compare('other_solution', $this->other_solution);
		$criteria->compare('grounding_pad', $this->grounding_pad);
		$criteria->compare('grounding_pad_location_id', $this->grounding_pad_location_id);
		$criteria->compare('grounding_pad_side_id', $this->grounding_pad_side_id);
		$criteria->compare('post_skin_assessment_id', $this->post_skin_assessment_id);
		$criteria->compare('post_skin_assessment_other', $this->post_skin_assessment_other);
		$criteria->compare('nasal_throat_pack', $this->nasal_throat_pack);
		$criteria->compare('nasal_insert_time', $this->nasal_insert_time);
		$criteria->compare('nasal_remove_time', $this->nasal_remove_time);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	protected function beforeValidate()
	{
		if ($this->who_timeout_completed) {
			if (!$this->who_timeout_lead_by) {
				$this->addError('who_timeout_lead_by',$this->getAttributeLabel('who_timeout_lead_by').' cannot be blank');
			}
		}

		if ($this->prep_solution && $this->prep_solution->name == 'Other (please specify)') {
			if (!$this->other_solution) {
				$this->addError('other_solution',$this->getAttributeLabel('other_solution').' cannot be blank');
			}
		}

		if ($this->patient_position && $this->patient_position->name === 'Other (please specify)') {
			if (!$this->other_patient_position) {
				$this->addError('other_patient_position',$this->getAttributeLabel('other_patient_position').' cannot be blank');
			}
		}

		if ($this->grounding_pad) {
			foreach (array('grounding_pad_location_id','grounding_pad_side_id','post_skin_assessment_id') as $field) {
				if (!$this->$field) {
					$this->addError($field,$this->getAttributeLabel($field).' cannot be blank');
				}
			}
		}

		if ($this->post_skin_assessment && $this->post_skin_assessment->name == 'Other (please specify)') {
			if (!$this->post_skin_assessment_other) {
				$this->addError('post_skin_assessment_other',$this->getAttributeLabel('post_skin_assessment_other').' cannot be blank');
			}
		}

		if ($this->nasal_throat_pack) {
			foreach (array('nasal_insert_time','nasal_remove_time') as $field) {
				if (!$this->$field) {
					$this->addError($field,$this->getAttributeLabel($field).' cannot be blank');
				} else if (!preg_match('/^([0-9]{1,2}):([0-9]{2})$/',$this->{$field},$m) || $m[1] > 23 || $m[2] > 59) {
					$this->addError($field,'Invalid time format for '.$this->getAttributeLabel($field));
				}
			}

			if (preg_match('/^([0-9]{1,2}):([0-9]{2})$/',$this->nasal_insert_time,$i) && preg_match('/^([0-9]{1,2}):([0-9]{2})$/',$this->nasal_remove_time,$r)) {
				if (mktime($i[1],$i[2],0,1,1,2012) > mktime($r[1],$r[2],0,1,1,2012)) {
					$this->addError('nasal_remove_time',$this->getAttributeLabel('nasal_remove_time').' cannot be before '.$this->getAttributeLabel('nasal_insert_time'));
				}
			}
		}

		if ($this->nonoperative_eye_protected && $this->nonoperative_eye_protected->name == 'Yes') {
			if (!$this->tape_or_shield) {
				$this->addError('tape_or_shield_id',$this->getAttributeLabel('tape_or_shield_id').' cannot be blank.');
			}
		}

		return parent::beforeValidate();
	}
}
?>
