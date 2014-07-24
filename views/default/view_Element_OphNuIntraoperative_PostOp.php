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
		<?php $this->widget('application.widgets.Records', array(
			'form' => $form,
			'element' => $element,
			'model' => new OphNuIntraoperative_PostOp_Specimen,
			'field' => 'specimens',
			'edit' => false,
			'row_view' => 'protected/modules/OphNuIntraoperative/views/default/_specimen_row.php',
			'no_items_text' => 'No specimens have been recorded.',
			'headings' => array('Label','Date/time','Type','Description','Results received'),
		))?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('specimin_collected_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->specimin_collected ? $element->specimin_collected->name : 'None'?></div></div>
		</div>
		<?php if ($element->specimin_collected && $element->specimin_collected->name == 'Yes') {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('specimin_comments'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->textWithLineBreaks('specimin_comments')?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('dressing_items'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php if (!$element->dressing_items) {?>
							No dressing used
						<?php } else {?>
								<?php foreach ($element->dressing_items as $item) {
									echo $item->name?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<?php if ($element->hasMultiSelectValue('dressing_items','Other (please specify)')) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('dressing_other'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->textWithLineBreaks('dressing_other')?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('procedures'))?>:</div></div>
			<div class="large-9 column end"><div class="data-value"><?php if (!$element->procedures) {?>
							None
						<?php } else {?>
								<?php foreach ($element->procedures as $item) {
									echo $item->term?><br/>
								<?php }?>
						<?php }?>
			</div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('circulating_nurse_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->circulating_nurse ? $element->circulating_nurse->first_name : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('scrub_nurse_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->scrub_nurse ? $element->scrub_nurse->first_name : 'None'?></div></div>
		</div>
	</div>
