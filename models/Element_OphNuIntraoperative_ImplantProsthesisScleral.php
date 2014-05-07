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
 * This is the model class for table "et_ophnuintraoperative_implantprosthesis".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $intraocular_lens
 * @property integer $iol_type_id
 * @property integer $iol_size_id
 * @property string $iol_comments
 * @property integer $ocular_sphere_ball
 * @property string $ocular_sphere_ball_comments
 * @property integer $glaucoma_valve
 * @property string $glaucoma_valve_comments
 * @property integer $lid_weights
 * @property string $lid_weight_comments
 * @property integer $sutures
 * @property string $suture_comments
 * @property integer $drains
 * @property string $drain_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuIntraoperative_ImplantProsthesisScleral_IolType $iol_type
 * @property OphNuIntraoperative_ImplantProsthesisScleral_IolSize $iol_size
 */

class Element_OphNuIntraoperative_ImplantProsthesisScleral  extends  BaseEventTypeElement
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
		return 'et_ophnuintraoperative_implantprosthesis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, intraocular_lens, iol_type_id, iol_size_id, iol_comments, ocular_sphere_ball, ocular_sphere_ball_comments, glaucoma_valve, glaucoma_valve_comments, lid_weights, lid_weight_comments, sutures, suture_comments, drains, drain_comments, other, other_comments', 'safe'),
			array('id, event_id, intraocular_lens, iol_type_id, iol_size_id, iol_comments, ocular_sphere_ball, ocular_sphere_ball_comments, glaucoma_valve, glaucoma_valve_comments, lid_weights, lid_weight_comments, sutures, suture_comments, drains, drain_comments, ', 'safe', 'on' => 'search'),
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
			'iol_type' => array(self::BELONGS_TO, 'OphNuIntraoperative_ImplantProsthesisScleral_IolType', 'iol_type_id'),
			'iol_size' => array(self::BELONGS_TO, 'OphNuIntraoperative_ImplantProsthesisScleral_IolSize', 'iol_size_id'),
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
			'intraocular_lens' => 'Intraocular lens',
			'iol_type_id' => 'IOL type',
			'iol_size_id' => 'IOL size',
			'iol_comments' => 'IOL comments',
			'ocular_sphere_ball' => 'Ocular sphere ball',
			'ocular_sphere_ball_comments' => 'Ocular sphere ball comments',
			'glaucoma_valve' => 'Glaucoma valve',
			'glaucoma_valve_comments' => 'Glaucoma valve comments',
			'lid_weights' => 'Lid weights',
			'lid_weight_comments' => 'Lid weight comments',
			'sutures' => 'Sutures',
			'suture_comments' => 'Suture comments',
			'drains' => 'Drains',
			'drain_comments' => 'Drain comments',
			'other_comments' => 'Other comments',
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
		$criteria->compare('intraocular_lens', $this->intraocular_lens);
		$criteria->compare('iol_type_id', $this->iol_type_id);
		$criteria->compare('iol_size_id', $this->iol_size_id);
		$criteria->compare('iol_comments', $this->iol_comments);
		$criteria->compare('ocular_sphere_ball', $this->ocular_sphere_ball);
		$criteria->compare('ocular_sphere_ball_comments', $this->ocular_sphere_ball_comments);
		$criteria->compare('glaucoma_valve', $this->glaucoma_valve);
		$criteria->compare('glaucoma_valve_comments', $this->glaucoma_valve_comments);
		$criteria->compare('lid_weights', $this->lid_weights);
		$criteria->compare('lid_weight_comments', $this->lid_weight_comments);
		$criteria->compare('sutures', $this->sutures);
		$criteria->compare('suture_comments', $this->suture_comments);
		$criteria->compare('drains', $this->drains);
		$criteria->compare('drain_comments', $this->drain_comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	protected function beforeValidate()
	{
		if ($this->intraocular_lens) {
			foreach (array('iol_type_id','iol_size_id','iol_comments') as $field) {
				if (!$this->$field) {
					$this->addError($field,$this->getAttributeLabel($field).' cannot be blank');
				}
			}
		}

		foreach (array('ocular_sphere_ball','glaucoma_valve','lid_weights','sutures','drains') as $field) {
			if ($this->$field) {
				$comments_field = preg_replace('/s$/','',$field).'_comments';
				if (!$this->$comments_field) {
					$this->addError($comments_field,$this->getAttributeLabel($comments_field).' cannot be blank');
				}
			}
		}

		return parent::beforeValidate();
	}
}
?>
