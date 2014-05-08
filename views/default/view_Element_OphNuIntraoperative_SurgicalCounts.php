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
		<table class="eventDetail preoperativeChecklist">
			<tr>
				<th>COUNTABLE ITEMS</th>
				<th>First count</th>
				<th>Second count / sign out</th>
				<th>Final count</th>
			</tr>
			<tr>
				<th>Needles</th>
				<td><?php echo $element->needles1?></td>
				<td><?php echo $element->needles2?></td>
				<td><?php echo $element->needles3?></td>
			</tr>
			<tr>
				<th>Blades</th>
				<td><?php echo $element->blades1?></td>
				<td><?php echo $element->blades2?></td>
				<td><?php echo $element->blades3?></td>
			</tr>
			<tr>
				<th>Plugs</th>
				<td><?php echo $element->plugs1?></td>
				<td><?php echo $element->plugs2?></td>
				<td><?php echo $element->plugs3?></td>
			</tr>
			<tr>
				<th>Trocars</th>
				<td><?php echo $element->trocars1?></td>
				<td><?php echo $element->trocars2?></td>
				<td><?php echo $element->trocars3?></td>
			</tr>
			<tr>
				<th>Sponges/Gauze</th>
				<td><?php echo $element->sponges_gauze1?></td>
				<td><?php echo $element->sponges_gauze2?></td>
				<td><?php echo $element->sponges_gauze3?></td>
			</tr>
			<tr>
				<th>Pledgetts</th>
				<td><?php echo $element->pledgetts1?></td>
				<td><?php echo $element->pledgetts2?></td>
				<td><?php echo $element->pledgetts3?></td>
			</tr>
		</table>
		<div class="row data-row">
			<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('count_discrepancies'))?></div></div>
			<div class="large-9 column end"><div class="data-value"><?php echo is_null($element->count_discrepancies) ? 'Not recorded' : ($element->count_discrepancies ? 'Yes' : 'No')?></div></div>
		</div>
		<?php if ($element->count_discrepancies) {?>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('surgeon_notified'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo is_null($element->surgeon_notified) ? 'Not recorded' : ($element->surgeon_notified ? 'Yes' : 'No')?></div></div>
			</div>
			<div class="row data-row">
				<div class="large-3 column"><div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('comments'))?></div></div>
				<div class="large-9 column end"><div class="data-value"><?php echo CHtml::encode($element->comments)?></div></div>
			</div>
		<?php }?>
	</div>
</section>
