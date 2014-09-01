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
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('surgeon_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->surgeon ? $element->surgeon->fullName : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('scrub_nurse_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->scrub_nurse ? $element->scrub_nurse->fullName : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('surgical_assistant_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->surgical_assistant ? $element->surgical_assistant->fullName : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('second_surgical_assistant_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->second_surgical_assistant ? $element->second_surgical_assistant->fullName : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('circulating_nurse_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->circulating_nurse ? $element->circulating_nurse->fullName : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('trainee_scrub_nurse_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->trainee_scrub_nurse ? $element->trainee_scrub_nurse->fullName : 'None'?></div></div>
		</div>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('anesthesiologist_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->anesthesiologist ? $element->anesthesiologist->fullName : 'None'?></div></div>
		</div>
		<?php if ($element->trainee_circulating_nurse) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('trainee_circulating_nurse_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->trainee_circulating_nurse ? $element->trainee_circulating_nurse->fullName : 'None'?></div></div>
			</div>
		<?php }?>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('anesthetic_assistant_id'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo $element->anesthetic_assistant ? $element->anesthetic_assistant->fullName : 'None'?></div></div>
		</div>
		<?php if ($element->translator) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('translator'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->translator)?></div></div>
			</div>
		<?php }?>
		<?php if ($element->anesthetic_trainee) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('anesthetic_trainee_id'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->anesthetic_trainee ? $element->anesthetic_trainee->fullName : 'None'?></div></div>
			</div>
		<?php }?>
		<?php if ($element->other) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('other'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo $element->textWithLineBreaks('other')?></div></div>
			</div>
		<?php }?>
	</div>
