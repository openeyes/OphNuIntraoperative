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
		<div id="div_Element_OphNuIntraoperative_Personnel_surgeon_id" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_surgeon_id">
					<?php echo $element->getAttributeLabel('surgeon_id')?>:
				</label>
			</div>
			<div class="large-3 column">
				<?php echo $form->dropDownList($element, 'surgeon_id', CHtml::listData(User::model()->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('empty'=>'- Please select -','nowrapper'=>true))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_surgeon_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_surgeon_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_surgeon_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search surgeon by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_scrub_nurse_id">
					<?php echo $element->getAttributeLabel('scrub_nurse_id')?>:
				<label>
			</div>
			<div class="large-3 column end">
				<?php echo $form->dropDownList($element, 'scrub_nurse_id', CHtml::listData(User::model()->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('empty'=>'- Please select -','nowrapper'=>true))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_scrub_nurse_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_scrub_nurse_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_scrub_nurse_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search nurse by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
		</div>
		<div id="div_Element_OphNuIntraoperative_Personnel_surgical_assistant_id" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_surgical_assistant_id">
					<?php echo $element->getAttributeLabel('surgical_assistant_id')?>:
				</label>
			</div>
			<div class="large-3 column">
				<?php echo $form->dropDownList($element, 'surgical_assistant_id', CHtml::listData(User::model()->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_surgical_assistant_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_surgical_assistant_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_surgical_assistant_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search assistant by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_circulating_nurse_id">
					<?php echo $element->getAttributeLabel('circulating_nurse_id')?>
				</label>
			</div>
			<div class="large-3 column end">
				<?php echo $form->dropDownList($element, 'circulating_nurse_id', CHtml::listData(User::model()->findAll(array('order'=> ' first_name asc,last_name asc')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_circulating_nurse_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_circulating_nurse_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_circulating_nurse_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search nurse by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
		</div>
		<div id="div_Element_OphNuIntraoperative_Personnel_second_surgical_assistant_id" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_second_surgical_assistant_id">
					<?php echo $element->getAttributeLabel('second_surgical_assistant_id')?>:
				</label>
			</div>
			<div class="large-3 column">
				<?php echo $form->dropDownList($element, 'second_surgical_assistant_id', CHtml::listData(User::model()->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_second_surgical_assistant_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_second_surgical_assistant_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_second_surgical_assistant_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search assistant by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_trainee_scrub_nurse_id">
					<?php echo $element->getAttributeLabel('trainee_scrub_nurse_id')?>
				</label>
			</div>
			<div class="large-3 column end">
				<?php echo $form->dropDownList($element, 'trainee_scrub_nurse_id', CHtml::listData(User::model()->findAll(array('order'=> ' first_name asc,last_name asc')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_trainee_scrub_nurse_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_trainee_scrub_nurse_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_trainee_scrub_nurse_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search nurse by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
		</div>
		<div id="div_Element_OphNuIntraoperative_Personnel_anesthesiologist_id" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_anesthesiologist_id">
					<?php echo $element->getAttributeLabel('anesthesiologist_id')?>:
				</label>
			</div>
			<div class="large-3 column">
				<?php echo $form->dropDownList($element, 'anesthesiologist_id', CHtml::listData(User::model()->findAll(array('order'=> ' first_name asc,last_name asc')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_anesthesiologist_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_anesthesiologist_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_anesthesiologist_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search anesthesiologist by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_trainee_circulating_nurse_id">
					<?php echo $element->getAttributeLabel('trainee_circulating_nurse_id')?>:
				</label>
			</div>
			<div class="large-3 column end">
				<?php echo $form->dropDownList($element, 'trainee_circulating_nurse_id', CHtml::listData(User::model()->findAll(array('order'=> ' first_name asc,last_name asc')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_trainee_circulating_nurse_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_trainee_circulating_nurse_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_trainee_circulating_nurse_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search nurse by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
		</div>
		<div id="div_Element_OphNuIntraoperative_Personnel_anesthetic_assistant_id" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_anesthetic_assistant_id">
					<?php echo $element->getAttributeLabel('anesthetic_assistant_id')?>:
				</label>
			</div>
			<div class="large-3 column">
				<?php echo $form->dropDownList($element, 'anesthetic_assistant_id', CHtml::listData(User::model()->findAll(array('order'=> ' first_name asc,last_name asc')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_anesthetic_assistant_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_anesthetic_assistant_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_anesthetic_assistant_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search assistant by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_translator">
					<?php echo $element->getAttributeLabel('translator')?>:
				</label>
			</div>
			<div class="large-3 column end">
				<?php echo $form->textField($element, 'translator', array('nowrapper' => true))?>
			</div>
		</div>
		<div id="div_Element_OphNuIntraoperative_Personnel_anesthetic_trainee_id" class="row field-row">
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_anesthetic_trainee_id">
					<?php echo $element->getAttributeLabel('anesthetic_trainee_id')?>:
				</label>
			</div>
			<div class="large-3 column">
				<?php echo $form->dropDownList($element, 'anesthetic_trainee_id', CHtml::listData(User::model()->findAll(array('order'=> ' first_name asc,last_name asc')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?>
				<?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					'name' => 'Element_OphNuIntraoperative_Personnel_anesthetic_trainee_autocomplete',
					'id' => 'Element_OphNuIntraoperative_Personnel_anesthetic_trainee_autocomplete',
					'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
					'options' => array(
						'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_anesthetic_trainee_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
					),
					'htmlOptions' => array(
						'placeholder' => 'search trainee by name',
						'class'=> 'autocomplete-top'
					)
				));?>
			</div>
			<div class="large-3 column">
				<label for="Element_OphNuIntraoperative_Personnel_other">
					<?php echo $element->getAttributeLabel('other')?>:
				</label>
			</div>
			<div class="large-3 column end">
				<?php echo $form->textArea($element, 'other', array('nowrapper' => true))?>
			</div>
		</div>
		<?php echo $form->checkBox($element, 'who_timeout_completed', array('text-align' => 'right'), array('label' => 3, 'field' => 4))?>
		<?php echo $form->dropDownList($element, 'time_out_lead_by_id', CHtml::listData(User::model()->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('empty'=>'- Please select -'),false,array('label'=>3,'field'=>3))?>
		<div class="field-row row">
			<div class="large-3 column">&nbsp;</div>
			<div class="large-3 column end">
			<?php
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name' => 'Element_OphNuIntraoperative_Personnel_time_out_lead_by_autocomplete',
			'id' => 'Element_OphNuIntraoperative_Personnel_time_out_lead_by_autocomplete',
			'source' => "js:function(request, response) {
						$.getJSON('".$this->createUrl('users')."', {
							term : request.term,
						}, response);
					}",
			'options' => array(
				'select' => "js:function(event, ui) {
						$('#Element_OphNuIntraoperative_Personnel_time_out_lead_by_id').val(ui.item.id);
						$(this).val('');
						return false;
					}"
			),
			'htmlOptions' => array(
				'placeholder' => 'search leader by name',
			)
		));?></div>
		</div>
	</div>
