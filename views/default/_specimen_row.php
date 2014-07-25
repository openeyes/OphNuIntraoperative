<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2013
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
<tr<?php if ($edit) {?> data-label="<?php echo CHtml::encode($item->label)?>" data-type_id="<?php echo CHtml::encode($item->type_id)?>" data-location="<?php echo CHtml::encode($item->location)?>" data-centre_name="<?php echo CHtml::encode($item->centre_name)?>" data-doctor_name="<?php echo CHtml::encode($item->doctor_name)?>" data-results_received="<?php echo CHtml::encode($item->results_received)?>" data-results_received_timestamp="<?php echo CHtml::encode($item->NHSDate('results_received_timestamp'))?>" data-results_received_time="<?php echo CHtml::encode($item->results_received_time)?>" data-timestamp="<?php echo CHtml::encode($item->NHSDate('timestamp'))?>" data-time="<?php echo $item->time?>" data-i="<?php echo $i?>"<?php }?>>
	<td>
		<?php echo $item->label?>
	</td>
	<td>
		<?php echo $item->NHSDate('timestamp')?>
		<?php echo substr($item->time,0,5)?>
	</td>
	<td>
		<?php echo $item->type->name?>
	</td>
	<td>
		<?php echo $item->description?>
	</td>
	<td>
		<?php if ($item->results_received) {?>
			<?php echo $item->NHSDate('results_received_timestamp')?>
			<?php echo date('H:i',strtotime($item->results_received_timestamp))?>
		<?php }else{?>
			<?php if ($edit) {?>
				<div class="specimenReceived">
					<input type="checkbox" class="specimenResultReceived" name="specimenResultReceived<?php echo $i?>" id="specimenResultReceived<?php echo $i?>" />
					<label for="specimenResultReceived<?php echo $i?>">
						Received
					</label>
				</div>
			<?php }else{?>
				Not received
			<?php }?>
		<?php }?>
	</td>
	<?php if ($edit) {?>
		<td>
			<?php if (!$item->results_received) {?>
				<div class="editRecordItemDiv">
					<a class="editRecordItem">edit</a>
					&nbsp;&nbsp;
				</div>
			<?php }?>
			<a class="deleteRecordItem">delete</a>
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[label][]" value="<?php echo CHtml::encode($item->label)?>" />
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[type_id][]" value="<?php echo CHtml::encode($item->type_id)?>" />
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[location][]" value="<?php echo CHtml::encode($item->location)?>" />
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[centre_name][]" value="<?php echo CHtml::encode($item->centre_name)?>" />
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[doctor_name][]" value="<?php echo CHtml::encode($item->doctor_name)?>" />
			<input type="hidden" class="resultsReceived" name="<?php echo CHtml::modelName($item)?>[results_received][]" value="<?php echo CHtml::encode($item->results_received)?>" />
			<input type="hidden" class="resultsReceivedTimestamp" name="<?php echo CHtml::modelName($item)?>[results_received_timestamp][]" value="<?php echo CHtml::encode($item->results_received_timestamp)?>" />
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[timestamp][]" value="<?php echo CHtml::encode($item->timestamp)?>" />
		</td>
	<?php }?>
</tr>
