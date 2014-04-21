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
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgeon_id'))?></td>
			<td><span class="big"><?php echo $element->surgeon ? $element->surgeon->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('scrub_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->scrub_nurse ? $element->scrub_nurse->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgical_assistant_id'))?></td>
			<td><span class="big"><?php echo $element->surgical_assistant ? $element->surgical_assistant->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('trainee_scrub_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->trainee_scrub_nurse ? $element->trainee_scrub_nurse-> : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anesthesiologist_id'))?></td>
			<td><span class="big"><?php echo $element->anesthesiologist ? $element->anesthesiologist-> : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('trainee_circulating_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->trainee_circulating_nurse ? $element->trainee_circulating_nurse-> : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anesthetic_assistant_id'))?></td>
			<td><span class="big"><?php echo $element->anesthetic_assistant ? $element->anesthetic_assistant-> : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('translator'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->translator)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anesthetic_trainee_id'))?></td>
			<td><span class="big"><?php echo $element->anesthetic_trainee ? $element->anesthetic_trainee->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('other'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->other)?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('who_timeout_completed'))?></td>
			<td><span class="big"><?php echo $element->who_timeout_completed ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('time_out_lead_by_id'))?></td>
			<td><span class="big"><?php echo $element->time_out_lead_by ? $element->time_out_lead_by->first_name : 'None'?></span></td>
		</tr>
	</tbody>
</table>

