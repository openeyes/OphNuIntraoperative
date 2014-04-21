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

<section class="element">
	<header class="element-header">
		<h3 class="element-title"><?php echo $element->elementType->name?></h3>
	</header>

	<div class="element-data">
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('incision_site_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->incision_site ? $element->incision_site->name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('patient_in_sulpine_position'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->patient_in_sulpine_position ? 'Yes' : 'No'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('prep_solution_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->prep_solution ? $element->prep_solution->name : 'None'?></div></div>
		</div>
		<?php if ($element->prep_solution->name == 'Other (please specify)') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other_solution'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->other_solution)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('viscoelastic'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->viscoelastic ? 'Yes' : 'No'?></div></div>
		</div>
		<?php if ($element->viscoelastic) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('viscoelastic_type_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->viscoelastic_type ? $element->viscoelastic_type->name : 'None'?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('viscoelastic_quantity_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->viscoelastic_quantity ? $element->viscoelastic_quantity->name : 'None'?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('grounding_pad'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->grounding_pad ? 'Yes' : 'No'?></div></div>
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
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('post_skin_assessment_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->post_skin_assessment ? $element->post_skin_assessment->name : 'None'?></div></div>
		</div>
		<?php if ($element->post_skin_assessment->name == 'Other (please specify)') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('post_skin_assessment_other'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->post_skin_assessment_other)?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('nasal_throat_pack'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->nasal_throat_pack ? 'Yes' : 'No'?></div></div>
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
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('additional'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php if (!$element->additionals) {?>
							None
						<?php } else {?>
								<?php foreach ($element->additionals as $item) {
									echo $item->ophnuintraoperative_operationprep_additional->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<?php if ($element->hasMultiSelectValue('additionals','Other (please specify)')) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('additional_other'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->additional_other)?></div></div>
			</div>
		<?php }?>
	</div>
</section>
