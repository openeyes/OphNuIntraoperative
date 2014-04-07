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
 * This is the model class for table "et_ophnuintraoperative_implantpros".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $intraocular_lens
 * @property integer $iol_type_id
 * @property integer $iol_size_id
 * @property integer $ocular_sphere_ball
 * @property string $comments
 * @property integer $glaucoma_valve
 * @property string $comments
 * @property integer $lid_weights
 * @property string $lid_comments
 * @property integer $sutures
 * @property string $sutures_comments
 * @property integer $drains
 * @property string $drains_comments
 * @property integer $other
 * @property string $other_comments
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuIntraoperative_ImplantProsthesisScleralBuckle_IolType $iol_type
 * @property OphNuIntraoperative_ImplantProsthesisScleralBuckle_IolSize $iol_size
 */

class Element_OphNuIntraoperative_ImplantProsthesisScleralBuckle  extends  BaseEventTypeElement
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
		return 'et_ophnuintraoperative_implantpros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('event_id, intraocular_lens, iol_type_id, iol_size_id, ocular_sphere_ball, comments, glaucoma_valve, comments, lid_weights, lid_comments, sutures, sutures_comments, drains, drains_comments, other, other_comments, ', 'safe'),
			array('intraocular_lens, iol_type_id, iol_size_id, ocular_sphere_ball, comments, glaucoma_valve, comments, lid_weights, sutures, drains, other, ', 'required'),
			array('id, event_id, intraocular_lens, iol_type_id, iol_size_id, ocular_sphere_ball, comments, glaucoma_valve, comments, lid_weights, lid_comments, sutures, sutures_comments, drains, drains_comments, other, other_comments, ', 'safe', 'on' => 'search'),
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
			'iol_type' => array(self::BELONGS_TO, 'OphNuIntraoperative_ImplantProsthesisScleralBuckle_IolType', 'iol_type_id'),
			'iol_size' => array(self::BELONGS_TO, 'OphNuIntraoperative_ImplantProsthesisScleralBuckle_IolSize', 'iol_size_id'),
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
			'intraocular_lens' => 'Intraocular Lens',
			'iol_type_id' => 'IOL Type',
			'iol_size_id' => 'IOL Size',
			'ocular_sphere_ball' => 'Ocular Sphere Ball',
			'comments' => 'Comments',
			'glaucoma_valve' => 'Glaucoma Valve',
			'comments' => 'Comments',
			'lid_weights' => 'Lid Weights',
			'lid_comments' => 'Comments',
			'sutures' => 'Sutures',
			'sutures_comments' => 'Comments',
			'drains' => 'Drains',
			'drains_comments' => 'Comments',
			'other' => 'Other',
			'other_comments' => 'Comments',
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
		$criteria->compare('ocular_sphere_ball', $this->ocular_sphere_ball);
		$criteria->compare('comments', $this->comments);
		$criteria->compare('glaucoma_valve', $this->glaucoma_valve);
		$criteria->compare('comments', $this->comments);
		$criteria->compare('lid_weights', $this->lid_weights);
		$criteria->compare('lid_comments', $this->lid_comments);
		$criteria->compare('sutures', $this->sutures);
		$criteria->compare('sutures_comments', $this->sutures_comments);
		$criteria->compare('drains', $this->drains);
		$criteria->compare('drains_comments', $this->drains_comments);
		$criteria->compare('other', $this->other);
		$criteria->compare('other_comments', $this->other_comments);

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