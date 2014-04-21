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

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>
<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('incision_site_id'))?></td>
			<td><span class="big"><?php echo $element->incision_site ? $element->incision_site->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('patient_in_sulpine_position'))?></td>
			<td><span class="big"><?php echo $element->patient_in_sulpine_position ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('prep_solution_id'))?></td>
			<td><span class="big"><?php echo $element->prep_solution ? $element->prep_solution->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('other_solution'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->other_solution)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('viscoelastic'))?>:</td>
			<td><span class="big"><?php echo $element->viscoelastic ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('viscoelastic_type_id'))?></td>
			<td><span class="big"><?php echo $element->viscoelastic_type ? $element->viscoelastic_type->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('viscoelastic_quantity_id'))?></td>
			<td><span class="big"><?php echo $element->viscoelastic_quantity ? $element->viscoelastic_quantity->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('grounding_pad'))?>:</td>
			<td><span class="big"><?php echo $element->grounding_pad ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('grounding_pad_location_id'))?></td>
			<td><span class="big"><?php echo $element->grounding_pad_location ? $element->grounding_pad_location->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('grounding_pad_side_id'))?></td>
			<td><span class="big"><?php echo $element->grounding_pad_side ? $element->grounding_pad_side->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('post_skin_assessment_id'))?></td>
			<td><span class="big"><?php echo $element->post_skin_assessment ? $element->post_skin_assessment->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('post_skin_assessment_other'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->post_skin_assessment_other)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('nasal_throat_pack'))?>:</td>
			<td><span class="big"><?php echo $element->nasal_throat_pack ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('nasal_insert_time'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->nasal_insert_time)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('nasal_remove_time'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->nasal_remove_time)?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('additional'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->additionals) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->additionals as $item) {
									echo $item->ophnuintraoperative_operationprep_additional->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('additional_other'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->additional_other)?></span></td>
		</tr>
	</tbody>
</table>

