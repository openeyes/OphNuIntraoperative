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
	<div class="element-data">
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('who_timeout_completed'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo is_null($element->who_timeout_completed) ? 'Not recorded' : ($element->who_timeout_completed ? 'Yes' : 'No')?></div></div>
		</div>
		<?php if ($element->who_timeout_completed) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('who_timeout_lead_by_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->who_timeout_lead_by->fullName?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('nonoperative_eye_protected_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->nonoperative_eye_protected ? $element->nonoperative_eye_protected->name : 'None'?></div></div>
		</div>
		<?php if ($element->nonoperative_eye_protected && $element->nonoperative_eye_protected->name == 'Yes') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('tape_or_shield_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->tape_or_shield ? $element->tape_or_shield->name : 'None'?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('anesthesia_type_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->anesthesia_type ? $element->anesthesia_type->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('incision_site_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->incision_site ? $element->incision_site->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_position_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->patient_position ? $element->patient_position->name : 'None'?></div></div>
		</div>
		<?php if ($element->patient_position && $element->patient_position->name == 'Other (please specify)') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other_patient_position'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->textWithLineBreaks('other_patient_position')?></div></div>
			</div>
		<?php }?>

		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('prep_solution_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->prep_solution ? $element->prep_solution->name : 'None'?></div></div>
		</div>
		<?php if ($element->prep_solution && $element->prep_solution->name == 'Other (please specify)') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other_solution'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->textWithLineBreaks('other_solution')?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('grounding_pad'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo is_null($element->grounding_pad) ? 'Not recorded' : ($element->grounding_pad ? 'Yes' : 'No')?></div></div>
		</div>
		<?php if ($element->grounding_pad) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('grounding_pad_location_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->grounding_pad_location ? $element->grounding_pad_location->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('grounding_pad_side_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->grounding_pad_side ? $element->grounding_pad_side->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('post_skin_assessment_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->post_skin_assessment ? $element->post_skin_assessment->name : 'None'?></div></div>
			</div>
		<?php }?>
		<?php if ($element->post_skin_assessment && $element->post_skin_assessment->name == 'Other (please specify)') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('post_skin_assessment_other'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->post_skin_assessment_other)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('nasal_throat_pack'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo is_null($element->nasal_throat_pack) ? 'Not recorded' : ($element->nasal_throat_pack ? 'Yes' : 'No')?></div></div>
		</div>
		<?php if ($element->nasal_throat_pack) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('nasal_insert_time'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->nasal_insert_time)?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('nasal_remove_time'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->nasal_remove_time)?></div></div>
			</div>
		<?php }?>
	</div>
