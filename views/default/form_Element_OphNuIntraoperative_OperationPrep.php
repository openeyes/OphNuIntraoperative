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

<section class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name; ?></h3>
	</header>

	<div class="element-fields">
		<?php echo $form->radioButtons($element, 'incision_site_id', CHtml::listData(OphNuIntraoperative_OperationPrep_IncisionSite::model()->findAll(array('order'=>'display_order asc')),'id','name'), null, false, false, false, false, array(), array('label' => 3,'field' => 9))?>
		<?php echo $form->checkBox($element, 'patient_in_sulpine_position', array('text-align'=>'right'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->dropDownList($element, 'prep_solution_id', CHtml::listData(OphNuIntraoperative_OperationPrep_PrepSolution::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','class' => 'linked-fields', 'data-linked-fields' => 'other_solution','data-linked-values' => 'Other (please specify)'),false,array('label'=>3,'field'=>4))?>
		<?php echo $form->textArea($element, 'other_solution', array(), !$element->prep_solution || $element->prep_solution->name != 'Other (please specify)', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'viscoelastic', array('class' => 'linked-fields', 'data-linked-fields' => 'viscoelastic_type_id,viscoelastic_quantity_id', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->dropDownList($element, 'viscoelastic_type_id', CHtml::listData(OphNuIntraoperative_OperationPrep_ViscoelasticType::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'),!$element->viscoelastic,array('label'=>3,'field'=>4))?>
		<?php echo $form->dropDownList($element, 'viscoelastic_quantity_id', CHtml::listData(OphNuIntraoperative_OperationPrep_ViscoelasticQuantity::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'),!$element->viscoelastic,array('label'=>3,'field'=>4))?>
		<?php echo $form->radioBoolean($element, 'grounding_pad', array('class' => 'linked-fields', 'data-linked-fields' => 'grounding_pad_location_id,grounding_pad_side_id', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioButtons($element, 'grounding_pad_location_id', CHtml::listData(OphNuIntraoperative_OperationPrep_GroundingPadLocation::model()->findAll(array('order'=>'display_order asc')),'id','name'),null,false,!$element->grounding_pad,false,false,array(),array('label'=>3,'field'=>4))?>
		<?php echo $form->radioButtons($element, 'grounding_pad_side_id', CHtml::listData(OphNuIntraoperative_OperationPrep_GroundingPadSide::model()->findAll(array('order'=>'display_order asc')),'id','name'),null,false,!$element->grounding_pad,false,false,array(),array('label'=>3,'field'=>4))?>
		<?php echo $form->dropDownList($element, 'post_skin_assessment_id', CHtml::listData(OphNuIntraoperative_OperationPrep_PostSkinAssessment::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -','class' => 'linked-fields', 'data-linked-fields' => 'post_skin_assessment_other', 'data-linked-values' => 'Other (please specify)'),false,array('label'=>3,'field'=>4))?>
		<?php echo $form->textArea($element, 'post_skin_assessment_other', array(), !$element->post_skin_assessment || $element->post_skin_assessment->name != 'Other (please specify)', array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'nasal_throat_pack', array('class' => 'linked-fields', 'data-linked-fields' => 'nasal_insert_time,nasal_remove_time', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textField($element, 'nasal_insert_time', array('hide' => !$element->nasal_throat_pack), array(), array('label' => 3, 'field' => 1))?>
		<?php echo $form->textField($element, 'nasal_remove_time', array('hide' => !$element->nasal_throat_pack), array(), array('label' => 3, 'field' => 1))?>
		<?php echo $form->multiSelectList($element, 'MultiSelect_additional', 'additionals', 'ophnuintraoperative_operationprep_additional_id', CHtml::listData(OphNuIntraoperative_OperationPrep_Additional::model()->findAll(array('order'=>'display_order asc')),'id','name'), array(), array('empty' => '- Please select -', 'label' => 'Additional','class' => 'linked-fields', 'data-linked-fields' => 'additional_other', 'data-linked-values' => 'Other (please specify)'), false,false,null,false,false,array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'additional_other', array(), !$element->hasMultiSelectValue('additionals','Other (please specify)'), array(), array('label' => 3, 'field' => 4))?>
	</div>
</section>
