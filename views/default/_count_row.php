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
<tr<?php if ($edit) {?> data-count_type_id="<?php echo CHtml::encode($item->count_type_id)?>" data-timestamp="<?php echo CHtml::encode($item->NHSDate('timestamp'))?>" data-time="<?php echo $item->time?>" data-i="<?php echo $i?>"<?php }?> data-items="<?php foreach ($item->items as $j => $_item) { if ($j>0) echo ','; echo $_item->item_type_id; }?>" data-values="<?php foreach ($item->items as $j => $_item) { if ($j>0) echo ','; echo $_item->value; }?>" data-multiselect-fields="items" data-multiselect-extrafields_items="values">
	<td>
		<?php echo $item->NHSDate('timestamp')?>
		<?php echo substr($item->time,0,5)?>
	</td>
	<td>
		<?php echo $item->count_type->name?>
	</td>
	<td>
		<?php echo $item->description?>
	</td>
	<?php if ($edit) {?>
		<td>
			<div class="editRecordItemDiv">
				<a class="editRecordItem">edit</a>
				&nbsp;&nbsp;
			</div>
			<a class="deleteRecordItem">delete</a>
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[i][]" value="<?php echo $i?>" />
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[count_type_id][]" value="<?php echo CHtml::encode($item->count_type_id)?>" />
			<input type="hidden" name="<?php echo CHtml::modelName($item)?>[timestamp][]" value="<?php echo CHtml::encode($item->timestamp)?>" />
			<?php foreach ($item->items as $_item) {?>
				<input type="hidden" name="<?php echo CHtml::modelName($item)?>[items_<?php echo $i?>][]" value="<?php echo $_item->item_type_id?>" />
				<input type="hidden" name="<?php echo CHtml::modelName($item)?>[values_<?php echo $i?>][]" value="<?php echo $_item->value?>" />
			<?php }?>
		</td>
	<?php }?>
</tr>
