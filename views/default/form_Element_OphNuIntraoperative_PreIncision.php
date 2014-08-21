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
	<?php echo $form->checkBox($element, 'who_timeout_completed', array('text-align' => 'right', 'class' => 'linked-fields', 'data-linked-fields' => 'who_timeout_lead_by_id', 'data-linked-values' => '1'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->dropDownList($element, 'who_timeout_lead_by_id', CHtml::listData(User::model()->findAll(array('order'=>'first_name asc,last_name asc')),'id','fullName'), array('empty' => '- Select -'), !$element->who_timeout_completed, array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioButtons($element, 'nonoperative_eye_protected_id', CHtml::listData(OphNuIntraoperative_PreIncision_NonoperativeEyeProtected::model()->findAll(array('order' => 'display_order asc')),'id','name'),null,false,false,false,false,array('class' => 'linked-fields', 'data-linked-fields' => 'tape_or_shield_id', 'data-linked-values' => 'Yes'),array('label'=>3,'field'=>4))?>
	<?php echo $form->radioButtons($element, 'tape_or_shield_id', CHtml::listData(OphNuIntraoperative_PreIncision_TapeOrShield::model()->findAll(array('order' => 'display_order asc')),'id','name'),null,false,!$element->nonoperative_eye_protected || $element->nonoperative_eye_protected->name != 'Yes',false,false,array(),array('label'=>3,'field'=>4))?>
	<?php echo $form->dropDownList($element, 'anesthesia_type_id', CHtml::listData(OphNuIntraoperative_PreIncision_Anaesthesia_Type::model()->findAll(array('order' => 'id asc')),'id','name'),array('empty' => '- Select -'),false,array('label' => 3, 'field' => 4))?>
	<?php echo $form->dropDownList($element, 'incision_site_id', CHtml::listData(OphNuIntraoperative_PreIncision_IncisionSite::model()->findAll(array('order'=>'display_order asc')),'id','name'), array('empty'=>'- Please select -'), false,array('label'=>3,'field'=>4))?>
	<?php echo $form->dropDownList($element, 'patient_position_id', CHtml::listData(OphNuIntraoperative_PreIncision_PatientPosition::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(
		'empty'=>'- Please select -',
		'class' => 'linked-fields',
		'data-linked-fields' => 'other_patient_position',
		'data-linked-values' => 'Other (please specify)'
	), false,array('label'=>3,'field'=>4))?>
	<?php echo $form->textArea($element, 'other_patient_position', array(), !$element->patient_position || $element->patient_position->name !== 'Other (please specify)', array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->dropDownList($element, 'prep_solution_id', CHtml::listData(OphNuIntraoperative_PreIncision_PrepSolution::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','class' => 'linked-fields', 'data-linked-fields' => 'other_solution','data-linked-values' => 'Other (please specify)'),false,array('label'=>3,'field'=>4))?>
	<?php echo $form->textArea($element, 'other_solution', array(), !$element->prep_solution || $element->prep_solution->name != 'Other (please specify)', array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'grounding_pad', array('class' => 'linked-fields', 'data-linked-fields' => 'grounding_pad_location_id,grounding_pad_side_id,post_skin_assessment_id', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioButtons($element, 'grounding_pad_location_id', CHtml::listData(OphNuIntraoperative_PreIncision_GroundingPadLocation::model()->findAll(array('order'=>'display_order asc')),'id','name'),null,false,!$element->grounding_pad,false,false,array(),array('label'=>3,'field'=>4))?>
	<?php echo $form->radioButtons($element, 'grounding_pad_side_id', CHtml::listData(OphNuIntraoperative_PreIncision_GroundingPadSide::model()->findAll(array('order'=>'display_order asc')),'id','name'),null,false,!$element->grounding_pad,false,false,array(),array('label'=>3,'field'=>4))?>
	<?php echo $form->dropDownList($element, 'post_skin_assessment_id', CHtml::listData(OphNuIntraoperative_PreIncision_PostSkinAssessment::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','class' => 'linked-fields', 'data-linked-fields' => 'post_skin_assessment_other', 'data-linked-values' => 'Other (please specify)'),!$element->grounding_pad,array('label'=>3,'field'=>4))?>
	<?php echo $form->textArea($element, 'post_skin_assessment_other', array(), !$element->post_skin_assessment || $element->post_skin_assessment->name != 'Other (please specify)', array(), array('label' => 3, 'field' => 4))?>
	<?php echo $form->radioBoolean($element, 'nasal_throat_pack', array('class' => 'linked-fields', 'data-linked-fields' => 'nasal_insert_time,nasal_remove_time', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
	<?php echo $form->timePicker($element, 'nasal_insert_time', array('showTimeNowButton' => true), array('hide' => !$element->nasal_throat_pack), array('label' => 3, 'field' => 4))?>
	<?php echo $form->timePicker($element, 'nasal_remove_time', array('showTimeNowButton' => true), array('hide' => !$element->nasal_throat_pack), array('label' => 3, 'field' => 4))?>
</div>
