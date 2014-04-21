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
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('specimin_collected_id'))?></td>
			<td><span class="big"><?php echo $element->specimin_collected ? $element->specimin_collected->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('specimin_comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->specimin_comments)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('dressing_used'))?></td>
			<td><span class="big"><?php echo $element->dressing_used ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('dressing_items'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->dressing_itemss) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->dressing_itemss as $item) {
									echo $item->ophnuintraoperative_postop_dressing_items->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="colThird">
					<b><?php echo CHtml::encode($element->getAttributeLabel('procedures_performed'))?>:</b>
					<div class="eventHighlight medium">
						<?php if (!$element->procedures_performeds) {?>
							<h4>None</h4>
						<?php } else {?>
							<h4>
								<?php foreach ($element->procedures_performeds as $item) {
									echo $item->proc->name?><br/>
								<?php }?>
							</h4>
						<?php }?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('circulating_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->circulating_nurse ? $element->circulating_nurse->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('scrub_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->scrub_nurse ? $element->scrub_nurse->first_name : 'None'?></span></td>
		</tr>
	</tbody>
</table>

