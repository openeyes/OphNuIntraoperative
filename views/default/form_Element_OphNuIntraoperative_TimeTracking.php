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
		<div id="div_Element_OphNuIntraoperative_TimeTracking_enters_or" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_TimeTracking_enters_or">
					<?php echo $element->getAttributeLabel('enters_or')?>:
				</label>
			</div>
			<div class="large-9 column">
				<div class="row field-row">
					<div class="large-1 column">
						<?php echo $form->textField($element, 'enters_or', array('nowrapper' => true))?>
					</div>
					<div class="large-2 column">
						<button type="submit" class="secondary small time-now" data-target="enters_or">Now</button>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuIntraoperative_TimeTracking_surgery_stop">
							<?php echo $element->getAttributeLabel('surgery_stop')?>:
						</label>
					</div>
					<div class="large-1 column">
						<?php echo $form->textField($element, 'surgery_stop', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
					</div>
					<div class="large-2 column end">
						<button type="submit" class="secondary small time-now" data-target="surgery_stop">Now</button>
					</div>
				</div>
			</div>
		</div>
		<div id="div_Element_OphNuIntraoperative_TimeTracking_patient_time_out" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_TimeTracking_patient_time_out">
					<?php echo $element->getAttributeLabel('time_out')?>:
				</label>
			</div>
			<div class="large-9 column">
				<div class="row field-row">
					<div class="large-1 column">
						<?php echo $form->textField($element, 'time_out', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
					</div>
					<div class="large-2 column">
						<button type="submit" class="secondary small time-now" data-target="time_out">Now</button>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuIntraoperative_TimeTracking_second_surgery_stop">
							<?php echo $element->getAttributeLabel('second_surgery_stop')?>:
						</label>
					</div>
					<div class="large-1 column">
						<?php echo $form->textField($element, 'second_surgery_stop', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
					</div>
					<div class="large-2 column end">
						<button type="submit" class="secondary small time-now" data-target="second_surgery_stop">Now</button>
					</div>
				</div>
			</div>
		</div>
		<div id="div_Element_OphNuIntraoperative_TimeTracking_surgery_start" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_TimeTracking_surgery_start">
					<?php echo $element->getAttributeLabel('surgery_start')?>:
				</label>
			</div>
			<div class="large-9 column">
				<div class="row field-row">
					<div class="large-1 column">
						<?php echo $form->textField($element, 'surgery_start', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
					</div>
					<div class="large-2 column">
						<button type="submit" class="secondary small time-now" data-target="surgery_start">Now</button>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuIntraoperative_TimeTracking_sign_out">
							<?php echo $element->getAttributeLabel('sign_out')?>:
						</label>
					</div>
					<div class="large-1 column">
						<?php echo $form->textField($element, 'sign_out', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
					</div>
					<div class="large-2 column end">
						<button type="submit" class="secondary small time-now" data-target="sign_out">Now</button>
					</div>
				</div>
			</div>
		</div>
		<div id="div_Element_OphNuIntraoperative_TimeTracking_second_surgery_start" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_TimeTracking_second_surgery_start">
					<?php echo $element->getAttributeLabel('second_surgery_start')?>:
				</label>
			</div>
			<div class="large-9 column">
				<div class="row field-row">
					<div class="large-1 column">
						<?php echo $form->textField($element, 'second_surgery_start', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
					</div>
					<div class="large-2 column">
						<button type="submit" class="secondary small time-now" data-target="second_surgery_start">Now</button>
					</div>
					<div class="large-3 column">
						<label for="Element_OphNuIntraoperative_TimeTracking_leaves_or">
							<?php echo $element->getAttributeLabel('leaves_or')?>:
						</label>
					</div>
					<div class="large-1 column end">
						<?php echo $form->textField($element, 'leaves_or', array('nowrapper' => true), array(), array('label' => 3, 'field' => 1))?>
					</div>
					<div class="large-2 column end">
						<button type="submit" class="secondary small time-now" data-target="leaves_or">Now</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
