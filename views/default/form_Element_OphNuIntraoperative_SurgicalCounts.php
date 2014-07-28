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
	<div class="element-fields">
		<?php $form->widget('application.widgets.Records', array(
			'form' => $form,
			'element' => $element,
			'model' => new OphNuIntraoperative_SurgicalCounts_Count,
			'field' => 'counts',
			'validate_method' => '/OphNuIntraoperative/default/validateCount',
			'row_view' => 'protected/modules/OphNuIntraoperative/views/default/_count_row.php',
			'columns' => array(
				array(
					'width' => 8,
					'fields' => array(
						array(
							'field' => 'count_type_id',
							'type' => 'dropdown',
							'options' => CHtml::listData(OphNuIntraoperative_SurgicalCounts_CountType::model()->findAll(array('order'=>'display_order asc')),'id','name'),
							'cycle_on_add' => true,
						),
						array(
							'field' => 'items',
							'type' => 'multiselect',
							'options' => CHtml::listData(OphNuIntraoperative_SurgicalCounts_CountItemType::model()->findAll(array('order'=>'display_order asc')),'id','name'),
							'extra_fields' => array(
								'value',
							),
							'width' => 7,
						),
					),
				),
			),
			'no_items_text' => 'No counts have been recorded.',
			'add_button_text' => 'Add count',
			'use_last_button_text' => false,
			'headings' => array('Date/time','Count','Description'),
		))?>
		<?php echo $form->radioBoolean($element, 'count_discrepancies', array('class'=>'linked-fields','data-linked-fields'=>'surgeon_notified,comments','data-linked-values'=>'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->checkBox($element, 'surgeon_notified', array('text-align' => 'right', 'hide' => !$element->count_discrepancies), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'comments', array(), !$element->count_discrepancies, array(), array('label' => 3, 'field' => 4))?>
	</div>
