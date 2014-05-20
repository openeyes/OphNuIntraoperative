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
		<?php echo $form->radioBoolean($element, 'intraocular_lens', array('class' => 'linked-fields', 'data-linked-fields' => 'iol_type_id,iol_size_id,iol_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->dropDownList($element, 'iol_type_id', CHtml::listData(OphNuIntraoperative_ImplantProsthesisScleral_IolType::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->intraocular_lens, array('label' => 3, 'field' => 4))?>
		<?php echo $form->dropDownList($element, 'iol_size_id', CHtml::listData(OphNuIntraoperative_ImplantProsthesisScleral_IolSize::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'), !$element->intraocular_lens, array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'iol_comments', array(), !$element->intraocular_lens, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'ocular_sphere_ball', array('class' => 'linked-fields', 'data-linked-fields' => 'ocular_sphere_ball_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'ocular_sphere_ball_comments', array(), !$element->ocular_sphere_ball, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'glaucoma_valve', array('class' => 'linked-fields', 'data-linked-fields' => 'glaucoma_valve_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'glaucoma_valve_comments', array(), !$element->glaucoma_valve, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'lid_weights', array('class' => 'linked-fields', 'data-linked-fields' => 'lid_weight_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'lid_weight_comments', array(), !$element->lid_weights, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'sutures', array('class' => 'linked-fields', 'data-linked-fields' => 'suture_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'suture_comments', array(), !$element->sutures, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'drains', array('class' => 'linked-fields', 'data-linked-fields' => 'drain_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'drain_comments', array(), !$element->drains, array(), array('label' => 3, 'field' => 4))?>
		<?php echo $form->radioBoolean($element, 'other', array('class' => 'linked-fields', 'data-linked-fields' => 'other_comments', 'data-linked-values' => 'Yes'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->textArea($element, 'other_comments', array(), !$element->other, array(), array('label' => 3, 'field' => 4))?>
	</div>
