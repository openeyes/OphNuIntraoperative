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
?>
	<div class="element-fields">
		<?php echo $form->checkBox($element, 'wristband_verified', array('text-align' => 'right','class' => 'linked-fields', 'data-linked-fields' => 'two_identifiers', 'data-linked-values' => '1'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->multiSelectList($element, 'two_identifiers', 'two_identifiers', 'identifier_id', CHtml::listData(OphNuIntraoperative_Handoff_Identifier::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Two identifiers'), !$element->wristband_verified, false, null, false, false, array('label' => 3, 'field' => 4))?>
		<?php echo $form->checkBox($element, 'allergies_verified', array('text-align' => 'right'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->dropDownList($element, 'hand_off_from_id', CHtml::listData(User::model()->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('empty' => '- Select -'),false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->dropDownList($element, 'hand_off_to_id', CHtml::listData(User::model()->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('empty' => '- Select -'),false,array('label' => 3, 'field' =>
		 4))?>
		<?php echo $form->dropDownList($element, 'anesthesia_type_id', CHtml::listData(OphNuIntraoperative_Handoff_Anaesthesia_Type::model()->findAll(array('order' => 'id asc')),'id','name'),array('empty' => '- Select -'),false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'nonoperative_eye_protected_id', CHtml::listData(OphNuIntraoperative_Handoff_NonoperativeEyeProtected::model()->findAll(array('order' => 'display_order asc')),'id','name'),null,false,false,false,false,array('class' => 'linked-fields', 'data-linked-fields' => 'tape_or_shield_id', 'data-linked-values' => 'Yes'),array('label'=>3,'field'=>4))?>
		<?php echo $form->radioButtons($element, 'tape_or_shield_id', CHtml::listData(OphNuIntraoperative_Handoff_TapeOrShield::model()->findAll(array('order' => 'display_order asc')),'id','name'),null,false,!$element->nonoperative_eye_protected || $element->nonoperative_eye_protected->name != 'Yes',false,false,array(),array('label'=>3,'field'=>4))?>
	</div>
