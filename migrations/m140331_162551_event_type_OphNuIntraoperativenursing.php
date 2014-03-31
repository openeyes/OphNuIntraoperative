<?php 
class m140331_162551_event_type_OphNuIntraoperativenursing extends CDbMigration
{
	public function up()
	{
		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuIntraoperativenursing', 'name' => 'Intraoperativenursing','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'WHO Time Out',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'WHO Time Out','class_name' => 'Element_OphNuIntraoperativenursing_WhoTimeOut', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'WHO Time Out'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'WHO Sign Out',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'WHO Sign Out','class_name' => 'Element_OphNuIntraoperativenursing_WhoSignOut', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'WHO Sign Out'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Time Tracking',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Time Tracking','class_name' => 'Element_OphNuIntraoperativenursing_TimeTracking', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Time Tracking'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Identifiers',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Identifiers','class_name' => 'Element_OphNuIntraoperativenursing_Identifiers', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Identifiers'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Anesthesia',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Anesthesia','class_name' => 'Element_OphNuIntraoperativenursing_Anesthesia', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Anesthesia'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Surgical Counts',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Surgical Counts','class_name' => 'Element_OphNuIntraoperativenursing_SurgicalCounts', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Surgical Counts'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Incision Site',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Incision Site','class_name' => 'Element_OphNuIntraoperativenursing_IncisionSite', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Incision Site'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Preperation',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Preperation','class_name' => 'Element_OphNuIntraoperativenursing_Preperation', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Preperation'))->queryRow();



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraopnurse_whotimeout', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_whotimeout_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_whotimeout_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_whotimeout_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_whotimeout_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_whotimeout_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_whotimeout_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraopnurse_whosignout', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_whosignout_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_whosignout_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_whosignout_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_whosignout_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_whosignout_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_whosignout_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraopnurse_timetrackin', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_enters_or' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Patient Enters OR
				'time_out' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Time Out
				'surgery_start' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Surgery Start
				'second_surgery_start' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Second Surgery Start
				'surgery_stop' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Surgery Stop
				'second_surgery_stop' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Second Surgery Stop
				'sign_out' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Sign Out
				'patient_leaves_or' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Patient Leaves OR
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_timetrackin_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_timetrackin_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_timetrackin_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_timetrackin_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_timetrackin_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_timetrackin_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// element lookup table ophnuintraopnurse_identifiers_idoptions
		$this->createTable('ophnuintraopnurse_identifiers_idoptions', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraopnurse_identifiers_idoptions_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraopnurse_identifiers_idoptions_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraopnurse_identifiers_idoptions_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_identifiers_idoptions_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraopnurse_identifiers_idoptions',array('name'=>'DOB','display_order'=>1));
		$this->insert('ophnuintraopnurse_identifiers_idoptions',array('name'=>'Patient Name','display_order'=>2));
		$this->insert('ophnuintraopnurse_identifiers_idoptions',array('name'=>'Patient / Caregiver','display_order'=>3));
		$this->insert('ophnuintraopnurse_identifiers_idoptions',array('name'=>'Chart Number','display_order'=>4));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraopnurse_identifiers', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'wrist_band' => 'tinyint(1) unsigned NOT NULL', // Patient ID Wrist Band with two identifiers
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_identifiers_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_identifiers_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_identifiers_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_identifiers_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_identifiers_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_identifiers_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraopnurse_identifiers_idoptions_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraopnurse_identifiers_idoptions_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_identifiers_idoptions_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_identifiers_idoptions_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_identifiers_idoptions_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraopnurse_identifiers_idoptions_assignment_lku_fk` (`ophnuintraopnurse_identifiers_idoptions_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_identifiers_idoptions_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_identifiers_idoptions_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_identifiers_idoptions_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraopnurse_identifiers` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_identifiers_idoptions_assignment_lku_fk` FOREIGN KEY (`ophnuintraopnurse_identifiers_idoptions_id`) REFERENCES `ophnuintraopnurse_identifiers_idoptions` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// element lookup table ophnuintraopnurse_anasthesia_hand_off_from
		$this->createTable('ophnuintraopnurse_anasthesia_hand_off_from', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraopnurse_anasthesia_hand_off_from_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraopnurse_anasthesia_hand_off_from_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_hand_off_from_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_hand_off_from_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraopnurse_anasthesia_hand_off_from',array('name'=>'Nurse1','display_order'=>1));
		$this->insert('ophnuintraopnurse_anasthesia_hand_off_from',array('name'=>'Nurse2','display_order'=>2));
		$this->insert('ophnuintraopnurse_anasthesia_hand_off_from',array('name'=>'Nurse3','display_order'=>3));

		// element lookup table ophnuintraopnurse_anasthesia_hand_off_to
		$this->createTable('ophnuintraopnurse_anasthesia_hand_off_to', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraopnurse_anasthesia_hand_off_to_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraopnurse_anasthesia_hand_off_to_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_hand_off_to_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_hand_off_to_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraopnurse_anasthesia_hand_off_to',array('name'=>'Nurse1','display_order'=>1));
		$this->insert('ophnuintraopnurse_anasthesia_hand_off_to',array('name'=>'Nurse2','display_order'=>2));
		$this->insert('ophnuintraopnurse_anasthesia_hand_off_to',array('name'=>'Nurse3','display_order'=>3));

		// element lookup table ophnuintraopnurse_anasthesia_anesthesia_type
		$this->createTable('ophnuintraopnurse_anasthesia_anesthesia_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraopnurse_anasthesia_anesthesia_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraopnurse_anasthesia_anesthesia_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_anesthesia_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_anesthesia_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraopnurse_anasthesia_anesthesia_type',array('name'=>'General Anesthesia','display_order'=>1));
		$this->insert('ophnuintraopnurse_anasthesia_anesthesia_type',array('name'=>'Local Anesthesia','display_order'=>2));
		$this->insert('ophnuintraopnurse_anasthesia_anesthesia_type',array('name'=>'Topical','display_order'=>3));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraopnurse_anasthesia', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'allergies_verfied' => 'tinyint(1) unsigned NOT NULL', // Allergies Verfied
				'hand_off_from_id' => 'int(10) unsigned NOT NULL', // Hand off from
				'hand_off_to_id' => 'int(10) unsigned NOT NULL', // Hand off to
				'anesthesia_type_id' => 'int(10) unsigned NOT NULL', // Anesthesia Type
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_anasthesia_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_anasthesia_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_anasthesia_ev_fk` (`event_id`)',
				'KEY `ophnuintraopnurse_anasthesia_hand_off_from_fk` (`hand_off_from_id`)',
				'KEY `ophnuintraopnurse_anasthesia_hand_off_to_fk` (`hand_off_to_id`)',
				'KEY `ophnuintraopnurse_anasthesia_anesthesia_type_fk` (`anesthesia_type_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_anasthesia_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_anasthesia_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_anasthesia_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_hand_off_from_fk` FOREIGN KEY (`hand_off_from_id`) REFERENCES `ophnuintraopnurse_anasthesia_hand_off_from` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_hand_off_to_fk` FOREIGN KEY (`hand_off_to_id`) REFERENCES `ophnuintraopnurse_anasthesia_hand_off_to` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_anasthesia_anesthesia_type_fk` FOREIGN KEY (`anesthesia_type_id`) REFERENCES `ophnuintraopnurse_anasthesia_anesthesia_type` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraopnurse_surgicalcou', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'count_descrepancies' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Count Descrepancies
				'surgeon_notified' => 'tinyint(1) unsigned NOT NULL', // Surgeon Notified
				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'', // Comments
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_surgicalcou_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_surgicalcou_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_surgicalcou_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_surgicalcou_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_surgicalcou_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_surgicalcou_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// element lookup table ophnuintraopnurse_incisionsit_incision
		$this->createTable('ophnuintraopnurse_incisionsit_incision', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraopnurse_incisionsit_incision_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraopnurse_incisionsit_incision_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraopnurse_incisionsit_incision_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_incisionsit_incision_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraopnurse_incisionsit_incision',array('name'=>'Clean Wound','display_order'=>1));
		$this->insert('ophnuintraopnurse_incisionsit_incision',array('name'=>'Clean / Contaminated','display_order'=>2));
		$this->insert('ophnuintraopnurse_incisionsit_incision',array('name'=>'Contaminated Wound','display_order'=>3));
		$this->insert('ophnuintraopnurse_incisionsit_incision',array('name'=>'Dirty or Infected','display_order'=>4));
		$this->insert('ophnuintraopnurse_incisionsit_incision',array('name'=>'Red Eye','display_order'=>5));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraopnurse_incisionsit', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_position' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Patient Position
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_incisionsit_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_incisionsit_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_incisionsit_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_incisionsit_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_incisionsit_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_incisionsit_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraopnurse_incisionsit_incision_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraopnurse_incisionsit_incision_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_incisionsit_incision_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_incisionsit_incision_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_incisionsit_incision_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraopnurse_incisionsit_incision_assignment_lku_fk` (`ophnuintraopnurse_incisionsit_incision_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_incisionsit_incision_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_incisionsit_incision_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_incisionsit_incision_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraopnurse_incisionsit` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_incisionsit_incision_assignment_lku_fk` FOREIGN KEY (`ophnuintraopnurse_incisionsit_incision_id`) REFERENCES `ophnuintraopnurse_incisionsit_incision` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// element lookup table ophnuintraopnurse_preperation_prep_done
		$this->createTable('ophnuintraopnurse_preperation_prep_done', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraopnurse_preperation_prep_done_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraopnurse_preperation_prep_done_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraopnurse_preperation_prep_done_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraopnurse_preperation_prep_done_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraopnurse_preperation_prep_done',array('name'=>'Betadine 5%','display_order'=>1));
		$this->insert('ophnuintraopnurse_preperation_prep_done',array('name'=>'Betadine 10%','display_order'=>2));
		$this->insert('ophnuintraopnurse_preperation_prep_done',array('name'=>'Aqueus Chlorhexadine','display_order'=>3));
		$this->insert('ophnuintraopnurse_preperation_prep_done',array('name'=>'Other','display_order'=>4));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraopnurse_preperation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'other' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Other
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_preperation_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_preperation_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_preperation_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_preperation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_preperation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_preperation_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraopnurse_preperation_prep_done_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraopnurse_preperation_prep_done_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraopnurse_preperation_prep_done_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraopnurse_preperation_prep_done_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraopnurse_preperation_prep_done_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraopnurse_preperation_prep_done_assignment_lku_fk` (`ophnuintraopnurse_preperation_prep_done_id`)',
				'CONSTRAINT `et_ophnuintraopnurse_preperation_prep_done_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_preperation_prep_done_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_preperation_prep_done_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraopnurse_preperation` (`id`)',
				'CONSTRAINT `et_ophnuintraopnurse_preperation_prep_done_assignment_lku_fk` FOREIGN KEY (`ophnuintraopnurse_preperation_prep_done_id`) REFERENCES `ophnuintraopnurse_preperation_prep_done` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophnuintraopnurse_whotimeout');



		$this->dropTable('et_ophnuintraopnurse_whosignout');



		$this->dropTable('et_ophnuintraopnurse_timetrackin');



		$this->dropTable('et_ophnuintraopnurse_identifiers_idoptions_assignment');
		$this->dropTable('et_ophnuintraopnurse_identifiers');


		$this->dropTable('ophnuintraopnurse_identifiers_idoptions');

		$this->dropTable('et_ophnuintraopnurse_anasthesia');


		$this->dropTable('ophnuintraopnurse_anasthesia_hand_off_from');
		$this->dropTable('ophnuintraopnurse_anasthesia_hand_off_to');
		$this->dropTable('ophnuintraopnurse_anasthesia_anesthesia_type');

		$this->dropTable('et_ophnuintraopnurse_surgicalcou');



		$this->dropTable('et_ophnuintraopnurse_incisionsit_incision_assignment');
		$this->dropTable('et_ophnuintraopnurse_incisionsit');


		$this->dropTable('ophnuintraopnurse_incisionsit_incision');

		$this->dropTable('et_ophnuintraopnurse_preperation_prep_done_assignment');
		$this->dropTable('et_ophnuintraopnurse_preperation');


		$this->dropTable('ophnuintraopnurse_preperation_prep_done');


		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphNuIntraoperativenursing does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}

