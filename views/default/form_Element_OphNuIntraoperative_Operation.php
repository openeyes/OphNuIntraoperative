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

	$operation = $this->getBookingOperation()?>
	<div class="element-fields">
		<?php $this->renderPartial('_booking_summary_form',array('operation' => $operation))?>
		<?php if (!$operation || $operation->eye->name == 'Both') {?>
			<?php echo $form->radioButtons($element,'eye_id',CHtml::listData(Eye::model()->findAll(array('order'=>'display_order asc','condition'=>"name != 'Both'")),'id','name'),null,false,false,false,false,array(),array('label' => 3, 'field' => 4))?>
		<?php }else{?>
			<input type="hidden" name="<?php echo CHtml::modelName($element)?>[eye_id]" value="<?php echo $operation->eye_id?>" />
		<?php }?>
		<input type="hidden" name="<?php echo CHtml::modelName($element)?>[booking_event_id]" value="<?php echo $element->id ? $element->booking_event_id : @$_GET['booking_event_id']?>" />
	</div>
