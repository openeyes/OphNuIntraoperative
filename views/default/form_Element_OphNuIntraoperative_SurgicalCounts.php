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
		<table class="eventDetail preoperativeChecklist">
			<tr>
				<th>COUNTABLE ITEMS</th>
				<th>First count</th>
				<th>Second count / sign out</th>
				<th>Final count</th>
			</tr>
			<tr>
				<th>Needles</th>
				<td><?php echo $form->textField($element, 'needles1', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'needles2', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'needles3', array('size'=>10,'nowrapper'=>true))?></td>
			</tr>
			<tr>
				<th>Blades</th>
				<td><?php echo $form->textField($element, 'blades1', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'blades2', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'blades3', array('size'=>10,'nowrapper'=>true))?></td>
			</tr>
			<tr>
				<th>Plugs</th>
				<td><?php echo $form->textField($element, 'plugs1', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'plugs2', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'plugs3', array('size'=>10,'nowrapper'=>true))?></td>
			</tr>
			<tr>
				<th>Trocars</th>
				<td><?php echo $form->textField($element, 'trocars1', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'trocars2', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'trocars3', array('size'=>10,'nowrapper'=>true))?></td>
			</tr>
			<tr>
				<th>Sponges/Gauze</th>
				<td><?php echo $form->textField($element, 'sponges_gauze1', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'sponges_gauze2', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'sponges_gauze3', array('size'=>10,'nowrapper'=>true))?></td>
			</tr>
			<tr>
				<th>Pledgetts</th>
				<td><?php echo $form->textField($element, 'pledgetts1', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'pledgetts2', array('size'=>10,'nowrapper'=>true))?></td>
				<td><?php echo $form->textField($element, 'pledgetts3', array('size'=>10,'nowrapper'=>true))?></td>
			</tr>
		</table>

		<?php echo $form->radioBoolean($element, 'count_discrepancies', array('class'=>'linked-fields','data-linked-fields'=>'surgeon_notified,comments','data-linked-values'=>'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->checkBox($element, 'surgeon_notified', array('text-align' => 'right', 'hide' => !$element->count_discrepancies), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'comments', array(), !$element->count_discrepancies, array(), array('label' => 3, 'field' => 4))?>
	</div>
</section>
