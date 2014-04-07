<?php 
class m140401_135045_event_type_OphNuIntraoperative extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperative'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuIntraoperative', 'name' => 'Intraoperative','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperative'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Time Tracking',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Time Tracking','class_name' => 'Element_OphNuIntraoperative_TimeTracking', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Time Tracking'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Identifiers',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Identifiers','class_name' => 'Element_OphNuIntraoperative_Identifiers', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Identifiers'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Anesthesia',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Anesthesia','class_name' => 'Element_OphNuIntraoperative_Anesthesia', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Anesthesia'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Surgical Counts',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Surgical Counts','class_name' => 'Element_OphNuIntraoperative_SurgicalCounts', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Surgical Counts'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Incision Site',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Incision Site','class_name' => 'Element_OphNuIntraoperative_IncisionSite', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Incision Site'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Preperation',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Preperation','class_name' => 'Element_OphNuIntraoperative_Preperation', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Preperation'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Grounding Pad',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Grounding Pad','class_name' => 'Element_OphNuIntraoperative_GroundingPad', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Grounding Pad'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Nasal Pack',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Nasal Pack','class_name' => 'Element_OphNuIntraoperative_NasalPack', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Nasal Pack'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Throat Pack',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Throat Pack','class_name' => 'Element_OphNuIntraoperative_ThroatPack', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Throat Pack'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Aditionals',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Aditionals','class_name' => 'Element_OphNuIntraoperative_Aditionals', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Aditionals'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Implant Prosthesis Scleral Buckle',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Implant Prosthesis Scleral Buckle','class_name' => 'Element_OphNuIntraoperative_ImplantProsthesisScleralBuckle', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Implant Prosthesis Scleral Buckle'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Specimen',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Specimen','class_name' => 'Element_OphNuIntraoperative_Specimen', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Specimen'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Dressing',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Dressing','class_name' => 'Element_OphNuIntraoperative_Dressing', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Dressing'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Procedure Performed',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Procedure Performed','class_name' => 'Element_OphNuIntraoperative_ProcedurePerformed', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Procedure Performed'))->queryRow();



		$this->createTable('et_ophnuintraoperative_timetrackin', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_enters_or' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'time_out' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'surgery_start' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'second_surgery_start' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'surgery_stop' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'second_surgery_stop' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'sign_out' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'patient_leaves_or' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_timetrackin_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_timetrackin_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_timetrackin_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_timetrackin_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_timetrackin_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_timetrackin_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_identifiers_idoptions', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_identifiers_idoptions_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_identifiers_idoptions_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_identifiers_idoptions_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_identifiers_idoptions_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_identifiers_idoptions',array('name'=>'DOB','display_order'=>1));
		$this->insert('ophnuintraoperative_identifiers_idoptions',array('name'=>'Patient Name','display_order'=>2));
		$this->insert('ophnuintraoperative_identifiers_idoptions',array('name'=>'Patient / Caregiver','display_order'=>3));
		$this->insert('ophnuintraoperative_identifiers_idoptions',array('name'=>'Chart Number','display_order'=>4));



		$this->createTable('et_ophnuintraoperative_identifiers', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'wrist_band' => 'tinyint(1) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_identifiers_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_identifiers_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_identifiers_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_identifiers_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_identifiers_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_identifiers_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraoperative_identifiers_idoptions_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraoperative_identifiers_idoptions_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_identifiers_idoptions_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_identifiers_idoptions_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_identifiers_idoptions_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraoperative_identifiers_idoptions_assignment_lku_fk` (`ophnuintraoperative_identifiers_idoptions_id`)',
				'CONSTRAINT `et_ophnuintraoperative_identifiers_idoptions_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_identifiers_idoptions_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_identifiers_idoptions_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_identifiers` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_identifiers_idoptions_assignment_lku_fk` FOREIGN KEY (`ophnuintraoperative_identifiers_idoptions_id`) REFERENCES `ophnuintraoperative_identifiers_idoptions` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_anasthesia_hand_off_from', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_anasthesia_hand_off_from_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_anasthesia_hand_off_from_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_hand_off_from_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_hand_off_from_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_anasthesia_hand_off_from',array('name'=>'Nurse1','display_order'=>1));
		$this->insert('ophnuintraoperative_anasthesia_hand_off_from',array('name'=>'Nurse2','display_order'=>2));
		$this->insert('ophnuintraoperative_anasthesia_hand_off_from',array('name'=>'Nurse3','display_order'=>3));

		$this->createTable('ophnuintraoperative_anasthesia_hand_off_to', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_anasthesia_hand_off_to_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_anasthesia_hand_off_to_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_hand_off_to_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_hand_off_to_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_anasthesia_hand_off_to',array('name'=>'Nurse1','display_order'=>1));
		$this->insert('ophnuintraoperative_anasthesia_hand_off_to',array('name'=>'Nurse2','display_order'=>2));
		$this->insert('ophnuintraoperative_anasthesia_hand_off_to',array('name'=>'Nurse3','display_order'=>3));

		$this->createTable('ophnuintraoperative_anasthesia_anesthesia_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_anasthesia_anesthesia_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_anasthesia_anesthesia_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_anesthesia_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_anesthesia_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_anasthesia_anesthesia_type',array('name'=>'General Anesthesia','display_order'=>1));
		$this->insert('ophnuintraoperative_anasthesia_anesthesia_type',array('name'=>'Local Anesthesia','display_order'=>2));
		$this->insert('ophnuintraoperative_anasthesia_anesthesia_type',array('name'=>'Topical','display_order'=>3));



		$this->createTable('et_ophnuintraoperative_anasthesia', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'allergies_verfied' => 'tinyint(1) unsigned NOT NULL',

				'hand_off_from_id' => 'int(10) unsigned NOT NULL',

				'hand_off_to_id' => 'int(10) unsigned NOT NULL',

				'anesthesia_type_id' => 'int(10) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_anasthesia_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_anasthesia_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_anasthesia_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_anasthesia_hand_off_from_fk` (`hand_off_from_id`)',
				'KEY `ophnuintraoperative_anasthesia_hand_off_to_fk` (`hand_off_to_id`)',
				'KEY `ophnuintraoperative_anasthesia_anesthesia_type_fk` (`anesthesia_type_id`)',
				'CONSTRAINT `et_ophnuintraoperative_anasthesia_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_anasthesia_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_anasthesia_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_hand_off_from_fk` FOREIGN KEY (`hand_off_from_id`) REFERENCES `ophnuintraoperative_anasthesia_hand_off_from` (`id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_hand_off_to_fk` FOREIGN KEY (`hand_off_to_id`) REFERENCES `ophnuintraoperative_anasthesia_hand_off_to` (`id`)',
				'CONSTRAINT `ophnuintraoperative_anasthesia_anesthesia_type_fk` FOREIGN KEY (`anesthesia_type_id`) REFERENCES `ophnuintraoperative_anasthesia_anesthesia_type` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnuintraoperative_surgicalcou', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'count_descrepancies' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'surgeon_notified' => 'tinyint(1) unsigned NOT NULL',

				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_surgicalcou_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_surgicalcou_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_surgicalcou_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_surgicalcou_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_surgicalcou_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_surgicalcou_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_incisionsit_incision', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_incisionsit_incision_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_incisionsit_incision_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_incisionsit_incision_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_incisionsit_incision_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_incisionsit_incision',array('name'=>'Clean Wound','display_order'=>1));
		$this->insert('ophnuintraoperative_incisionsit_incision',array('name'=>'Clean / Contaminated','display_order'=>2));
		$this->insert('ophnuintraoperative_incisionsit_incision',array('name'=>'Contaminated Wound','display_order'=>3));
		$this->insert('ophnuintraoperative_incisionsit_incision',array('name'=>'Dirty or Infected','display_order'=>4));
		$this->insert('ophnuintraoperative_incisionsit_incision',array('name'=>'Red Eye','display_order'=>5));



		$this->createTable('et_ophnuintraoperative_incisionsit', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_position' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_incisionsit_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_incisionsit_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_incisionsit_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_incisionsit_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_incisionsit_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_incisionsit_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraoperative_incisionsit_incision_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraoperative_incisionsit_incision_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_incisionsit_incision_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_incisionsit_incision_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_incisionsit_incision_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraoperative_incisionsit_incision_assignment_lku_fk` (`ophnuintraoperative_incisionsit_incision_id`)',
				'CONSTRAINT `et_ophnuintraoperative_incisionsit_incision_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_incisionsit_incision_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_incisionsit_incision_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_incisionsit` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_incisionsit_incision_assignment_lku_fk` FOREIGN KEY (`ophnuintraoperative_incisionsit_incision_id`) REFERENCES `ophnuintraoperative_incisionsit_incision` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_preperation_prep_done', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_preperation_prep_done_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_preperation_prep_done_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_preperation_prep_done_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_preperation_prep_done_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_preperation_prep_done',array('name'=>'Betadine 5%','display_order'=>1));
		$this->insert('ophnuintraoperative_preperation_prep_done',array('name'=>'Betadine 10%','display_order'=>2));
		$this->insert('ophnuintraoperative_preperation_prep_done',array('name'=>'Aqueus Chlorhexadine','display_order'=>3));
		$this->insert('ophnuintraoperative_preperation_prep_done',array('name'=>'Other','display_order'=>4));

		$this->createTable('ophnuintraoperative_preperation_viscoelastic', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_preperation_viscoelastic_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_preperation_viscoelastic_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_preperation_viscoelastic_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_preperation_viscoelastic_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_preperation_viscoelastic',array('name'=>'Value1','display_order'=>1));



		$this->createTable('et_ophnuintraoperative_preperation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'other' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'viscoelastic_id' => 'int(10) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_preperation_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_preperation_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_preperation_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_preperation_viscoelastic_fk` (`viscoelastic_id`)',
				'CONSTRAINT `et_ophnuintraoperative_preperation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_preperation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_preperation_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_preperation_viscoelastic_fk` FOREIGN KEY (`viscoelastic_id`) REFERENCES `ophnuintraoperative_preperation_viscoelastic` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraoperative_preperation_prep_done_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraoperative_preperation_prep_done_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_preperation_prep_done_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_preperation_prep_done_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_preperation_prep_done_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraoperative_preperation_prep_done_assignment_lku_fk` (`ophnuintraoperative_preperation_prep_done_id`)',
				'CONSTRAINT `et_ophnuintraoperative_preperation_prep_done_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_preperation_prep_done_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_preperation_prep_done_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_preperation` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_preperation_prep_done_assignment_lku_fk` FOREIGN KEY (`ophnuintraoperative_preperation_prep_done_id`) REFERENCES `ophnuintraoperative_preperation_prep_done` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_groundingpa_location', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_groundingpa_location_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_groundingpa_location_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_location_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_location_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_groundingpa_location',array('name'=>'Leg','display_order'=>1));
		$this->insert('ophnuintraoperative_groundingpa_location',array('name'=>'Buttocks','display_order'=>2));

		$this->createTable('ophnuintraoperative_groundingpa_side', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_groundingpa_side_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_groundingpa_side_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_side_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_side_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_groundingpa_side',array('name'=>'Right','display_order'=>1));
		$this->insert('ophnuintraoperative_groundingpa_side',array('name'=>'Left','display_order'=>2));

		$this->createTable('ophnuintraoperative_groundingpa_post_skin', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_groundingpa_post_skin_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_groundingpa_post_skin_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_post_skin_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_post_skin_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_groundingpa_post_skin',array('name'=>'Intact','display_order'=>1));
		$this->insert('ophnuintraoperative_groundingpa_post_skin',array('name'=>'Reddened','display_order'=>2));
		$this->insert('ophnuintraoperative_groundingpa_post_skin',array('name'=>'Swollen','display_order'=>3));
		$this->insert('ophnuintraoperative_groundingpa_post_skin',array('name'=>'Other','display_order'=>4));



		$this->createTable('et_ophnuintraoperative_groundingpa', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'grounding_pad' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'location_id' => 'int(10) unsigned NOT NULL',

				'side_id' => 'int(10) unsigned NOT NULL',

				'post_skin_id' => 'int(10) unsigned NOT NULL',

				'other' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_groundingpa_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_groundingpa_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_groundingpa_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_groundingpa_location_fk` (`location_id`)',
				'KEY `ophnuintraoperative_groundingpa_side_fk` (`side_id`)',
				'KEY `ophnuintraoperative_groundingpa_post_skin_fk` (`post_skin_id`)',
				'CONSTRAINT `et_ophnuintraoperative_groundingpa_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_groundingpa_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_groundingpa_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_location_fk` FOREIGN KEY (`location_id`) REFERENCES `ophnuintraoperative_groundingpa_location` (`id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_side_fk` FOREIGN KEY (`side_id`) REFERENCES `ophnuintraoperative_groundingpa_side` (`id`)',
				'CONSTRAINT `ophnuintraoperative_groundingpa_post_skin_fk` FOREIGN KEY (`post_skin_id`) REFERENCES `ophnuintraoperative_groundingpa_post_skin` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnuintraoperative_nasalpack', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'nasal_pack_inserted' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'inserted_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'removal_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_nasalpack_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_nasalpack_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_nasalpack_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_nasalpack_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_nasalpack_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_nasalpack_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnuintraoperative_throatpack', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'throat_pack_inserted' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',

				'inserted_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'removal_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_throatpack_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_throatpack_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_throatpack_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_throatpack_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_throatpack_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_throatpack_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_aditionals_aditionals', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_aditionals_aditionals_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_aditionals_aditionals_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_aditionals_aditionals_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_aditionals_aditionals_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_aditionals_aditionals',array('name'=>'Vision Blue','display_order'=>1));
		$this->insert('ophnuintraoperative_aditionals_aditionals',array('name'=>'ICG','display_order'=>2));
		$this->insert('ophnuintraoperative_aditionals_aditionals',array('name'=>'Xylocaine','display_order'=>3));
		$this->insert('ophnuintraoperative_aditionals_aditionals',array('name'=>'Sub-Conjunctival Injection','display_order'=>4));
		$this->insert('ophnuintraoperative_aditionals_aditionals',array('name'=>'Mitomycin','display_order'=>5));
		$this->insert('ophnuintraoperative_aditionals_aditionals',array('name'=>'Intravitreal Injections','display_order'=>6));
		$this->insert('ophnuintraoperative_aditionals_aditionals',array('name'=>'5FU','display_order'=>7));
		$this->insert('ophnuintraoperative_aditionals_aditionals',array('name'=>'Other','display_order'=>8));



		$this->createTable('et_ophnuintraoperative_aditionals', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'other' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_aditionals_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_aditionals_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_aditionals_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_aditionals_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_aditionals_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_aditionals_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraoperative_aditionals_aditionals_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraoperative_aditionals_aditionals_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_aditionals_aditionals_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_aditionals_aditionals_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_aditionals_aditionals_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraoperative_aditionals_aditionals_assignment_lku_fk` (`ophnuintraoperative_aditionals_aditionals_id`)',
				'CONSTRAINT `et_ophnuintraoperative_aditionals_aditionals_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_aditionals_aditionals_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_aditionals_aditionals_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_aditionals` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_aditionals_aditionals_assignment_lku_fk` FOREIGN KEY (`ophnuintraoperative_aditionals_aditionals_id`) REFERENCES `ophnuintraoperative_aditionals_aditionals` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_implantpros_iol_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_implantpros_iol_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_implantpros_iol_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_implantpros_iol_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_implantpros_iol_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_implantpros_iol_type',array('name'=>'Item1','display_order'=>1));

		$this->createTable('ophnuintraoperative_implantpros_iol_size', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_implantpros_iol_size_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_implantpros_iol_size_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_implantpros_iol_size_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_implantpros_iol_size_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_implantpros_iol_size',array('name'=>'Item1','display_order'=>1));



		$this->createTable('et_ophnuintraoperative_implantpros', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'intraocular_lens' => 'tinyint(1) unsigned NOT NULL',

				'iol_type_id' => 'int(10) unsigned NOT NULL',

				'iol_size_id' => 'int(10) unsigned NOT NULL',

				'ocular_sphere_ball' => 'tinyint(1) unsigned NOT NULL',

				'comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'glaucoma_valve' => 'tinyint(1) unsigned NOT NULL',

				'comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'lid_weights' => 'tinyint(1) unsigned NOT NULL',

				'lid_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'sutures' => 'tinyint(1) unsigned NOT NULL',

				'sutures_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'drains' => 'tinyint(1) unsigned NOT NULL',

				'drains_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'other' => 'tinyint(1) unsigned NOT NULL',

				'other_comments' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_implantpros_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_implantpros_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_implantpros_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_implantpros_iol_type_fk` (`iol_type_id`)',
				'KEY `ophnuintraoperative_implantpros_iol_size_fk` (`iol_size_id`)',
				'CONSTRAINT `et_ophnuintraoperative_implantpros_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_implantpros_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_implantpros_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_implantpros_iol_type_fk` FOREIGN KEY (`iol_type_id`) REFERENCES `ophnuintraoperative_implantpros_iol_type` (`id`)',
				'CONSTRAINT `ophnuintraoperative_implantpros_iol_size_fk` FOREIGN KEY (`iol_size_id`) REFERENCES `ophnuintraoperative_implantpros_iol_size` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_specimen_speciment_collected', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_specimen_speciment_collected_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_specimen_speciment_collected_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_specimen_speciment_collected_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_specimen_speciment_collected_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_specimen_speciment_collected',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnuintraoperative_specimen_speciment_collected',array('name'=>'N/A','display_order'=>2));



		$this->createTable('et_ophnuintraoperative_specimen', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'speciment_collected_id' => 'int(10) unsigned NOT NULL',

				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_specimen_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_specimen_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_specimen_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_specimen_speciment_collected_fk` (`speciment_collected_id`)',
				'CONSTRAINT `et_ophnuintraoperative_specimen_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_specimen_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_specimen_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_specimen_speciment_collected_fk` FOREIGN KEY (`speciment_collected_id`) REFERENCES `ophnuintraoperative_specimen_speciment_collected` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_dressing_dressing', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_dressing_dressing_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_dressing_dressing_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_dressing_dressing_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_dressing_dressing_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_dressing_dressing',array('name'=>'NA','display_order'=>1));
		$this->insert('ophnuintraoperative_dressing_dressing',array('name'=>'Eye Pod','display_order'=>2));
		$this->insert('ophnuintraoperative_dressing_dressing',array('name'=>'Steri-strips','display_order'=>3));
		$this->insert('ophnuintraoperative_dressing_dressing',array('name'=>'Ointment','display_order'=>4));
		$this->insert('ophnuintraoperative_dressing_dressing',array('name'=>'Dry','display_order'=>5));
		$this->insert('ophnuintraoperative_dressing_dressing',array('name'=>'Wet','display_order'=>6));
		$this->insert('ophnuintraoperative_dressing_dressing',array('name'=>'Other','display_order'=>7));



		$this->createTable('et_ophnuintraoperative_dressing', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'na' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_dressing_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_dressing_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_dressing_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_dressing_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_dressing_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_dressing_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraoperative_dressing_dressing_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraoperative_dressing_dressing_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_dressing_dressing_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_dressing_dressing_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_dressing_dressing_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraoperative_dressing_dressing_assignment_lku_fk` (`ophnuintraoperative_dressing_dressing_id`)',
				'CONSTRAINT `et_ophnuintraoperative_dressing_dressing_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_dressing_dressing_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_dressing_dressing_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_dressing` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_dressing_dressing_assignment_lku_fk` FOREIGN KEY (`ophnuintraoperative_dressing_dressing_id`) REFERENCES `ophnuintraoperative_dressing_dressing` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_procedurepe_procedure_performed', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_procedurepe_procedure_performed_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_procedurepe_procedure_performed_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_procedurepe_procedure_performed_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_procedurepe_procedure_performed_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_procedurepe_procedure_performed',array('name'=>'value1','display_order'=>1));



		$this->createTable('et_ophnuintraoperative_procedurepe', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'procedure_performed_id' => 'int(10) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_procedurepe_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_procedurepe_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_procedurepe_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_procedurepe_procedure_performed_fk` (`procedure_performed_id`)',
				'CONSTRAINT `et_ophnuintraoperative_procedurepe_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_procedurepe_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_procedurepe_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_procedurepe_procedure_performed_fk` FOREIGN KEY (`procedure_performed_id`) REFERENCES `ophnuintraoperative_procedurepe_procedure_performed` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		$this->dropTable('et_ophnuintraoperative_timetrackin');



		$this->dropTable('et_ophnuintraoperative_identifiers_idoptions_assignment');
		$this->dropTable('et_ophnuintraoperative_identifiers');


		$this->dropTable('ophnuintraoperative_identifiers_idoptions');

		$this->dropTable('et_ophnuintraoperative_anasthesia');


		$this->dropTable('ophnuintraoperative_anasthesia_hand_off_from');
		$this->dropTable('ophnuintraoperative_anasthesia_hand_off_to');
		$this->dropTable('ophnuintraoperative_anasthesia_anesthesia_type');

		$this->dropTable('et_ophnuintraoperative_surgicalcou');



		$this->dropTable('et_ophnuintraoperative_incisionsit_incision_assignment');
		$this->dropTable('et_ophnuintraoperative_incisionsit');


		$this->dropTable('ophnuintraoperative_incisionsit_incision');

		$this->dropTable('et_ophnuintraoperative_preperation_prep_done_assignment');
		$this->dropTable('et_ophnuintraoperative_preperation');


		$this->dropTable('ophnuintraoperative_preperation_prep_done');
		$this->dropTable('ophnuintraoperative_preperation_viscoelastic');

		$this->dropTable('et_ophnuintraoperative_groundingpa');


		$this->dropTable('ophnuintraoperative_groundingpa_location');
		$this->dropTable('ophnuintraoperative_groundingpa_side');
		$this->dropTable('ophnuintraoperative_groundingpa_post_skin');

		$this->dropTable('et_ophnuintraoperative_nasalpack');



		$this->dropTable('et_ophnuintraoperative_throatpack');



		$this->dropTable('et_ophnuintraoperative_aditionals_aditionals_assignment');
		$this->dropTable('et_ophnuintraoperative_aditionals');


		$this->dropTable('ophnuintraoperative_aditionals_aditionals');

		$this->dropTable('et_ophnuintraoperative_implantpros');


		$this->dropTable('ophnuintraoperative_implantpros_iol_type');
		$this->dropTable('ophnuintraoperative_implantpros_iol_size');

		$this->dropTable('et_ophnuintraoperative_specimen');


		$this->dropTable('ophnuintraoperative_specimen_speciment_collected');

		$this->dropTable('et_ophnuintraoperative_dressing_dressing_assignment');
		$this->dropTable('et_ophnuintraoperative_dressing');


		$this->dropTable('ophnuintraoperative_dressing_dressing');

		$this->dropTable('et_ophnuintraoperative_procedurepe');


		$this->dropTable('ophnuintraoperative_procedurepe_procedure_performed');


		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperative'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}

