<?php 
class m140417_101809_event_type_OphNuIntraoperative extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperative'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuIntraoperative', 'name' => 'Intraoperative','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperative'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Time tracking',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Time tracking','class_name' => 'Element_OphNuIntraoperative_TimeTracking', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Time tracking'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Handoff',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Handoff','class_name' => 'Element_OphNuIntraoperative_Handoff', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Handoff'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Personnel',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Personnel','class_name' => 'Element_OphNuIntraoperative_Personnel', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Personnel'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Surgical counts',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Surgical counts','class_name' => 'Element_OphNuIntraoperative_SurgicalCounts', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Surgical counts'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Operation prep',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Operation prep','class_name' => 'Element_OphNuIntraoperative_OperationPrep', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Operation prep'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Implant prosthesis scleral',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Implant prosthesis scleral','class_name' => 'Element_OphNuIntraoperative_ImplantProsthesisScleral', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Implant prosthesis scleral'))->queryRow();
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Post op',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Post op','class_name' => 'Element_OphNuIntraoperative_PostOp', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Post op'))->queryRow();



		$this->createTable('et_ophnuintraoperative_timetracking', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'enters_or' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'surgery_stop' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'time_out' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'second_surgery_stop' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'surgery_start' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'sign_out' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'second_surgery_start' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'leaves_or' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_timetracking_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_timetracking_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_timetracking_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_timetracking_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_timetracking_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_timetracking_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_handoff_two_identifiers', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_handoff_two_identifiers_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_handoff_two_identifiers_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_two_identifiers_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_two_identifiers_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_handoff_two_identifiers',array('name'=>'DOB','display_order'=>1));
		$this->insert('ophnuintraoperative_handoff_two_identifiers',array('name'=>'Patient name','display_order'=>2));
		$this->insert('ophnuintraoperative_handoff_two_identifiers',array('name'=>'Parent/caregiver','display_order'=>3));
		$this->insert('ophnuintraoperative_handoff_two_identifiers',array('name'=>'Chart number','display_order'=>4));

		$this->createTable('ophnuintraoperative_handoff_hand_off_from', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_handoff_hand_off_from_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_handoff_hand_off_from_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_hand_off_from_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_hand_off_from_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_handoff_hand_off_from',array('name'=>'Nurse','display_order'=>1));
		$this->insert('ophnuintraoperative_handoff_hand_off_from',array('name'=>'Doctor','display_order'=>2));
		$this->insert('ophnuintraoperative_handoff_hand_off_from',array('name'=>'Surgeon','display_order'=>3));

		$this->createTable('ophnuintraoperative_handoff_nonoperative_eye_protected', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_handoff_nonoperative_eye_protected_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_handoff_nonoperative_eye_protected_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_nonoperative_eye_protected_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_nonoperative_eye_protected_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_handoff_nonoperative_eye_protected',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnuintraoperative_handoff_nonoperative_eye_protected',array('name'=>'No','display_order'=>2));
		$this->insert('ophnuintraoperative_handoff_nonoperative_eye_protected',array('name'=>'N/A','display_order'=>3));

		$this->createTable('ophnuintraoperative_handoff_tape_or_shield', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_handoff_tape_or_shield_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_handoff_tape_or_shield_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_tape_or_shield_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_tape_or_shield_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_handoff_tape_or_shield',array('name'=>'Tape','display_order'=>1));
		$this->insert('ophnuintraoperative_handoff_tape_or_shield',array('name'=>'Shield','display_order'=>2));



		$this->createTable('et_ophnuintraoperative_handoff', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'wristband_verified' => 'tinyint(1) unsigned NOT NULL',

				'allergies_verified' => 'tinyint(1) unsigned NOT NULL',

				'hand_off_from_id' => 'int(10) unsigned NOT NULL',

				'hand_off_to_id' => 'int(10) unsigned NOT NULL',

				'anesthesia_type_id' => 'int(10) unsigned NOT NULL',

				'nonoperative_eye_protected_id' => 'int(10) unsigned NOT NULL',

				'tape_or_shield_id' => 'int(10) unsigned NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_handoff_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_handoff_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_handoff_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_handoff_hand_off_from_fk` (`hand_off_from_id`)',
				'KEY `et_ophnuintraoperative_handoff_hand_off_to_id_fk` (`hand_off_to_id`)',
				'KEY `et_ophnuintraoperative_handoff_anesthesia_type_id_fk` (`anesthesia_type_id`)',
				'KEY `ophnuintraoperative_handoff_nonoperative_eye_protected_fk` (`nonoperative_eye_protected_id`)',
				'KEY `ophnuintraoperative_handoff_tape_or_shield_fk` (`tape_or_shield_id`)',
				'CONSTRAINT `et_ophnuintraoperative_handoff_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_handoff_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_handoff_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_hand_off_from_fk` FOREIGN KEY (`hand_off_from_id`) REFERENCES `ophnuintraoperative_handoff_hand_off_from` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_handoff_hand_off_to_id_fk` FOREIGN KEY (`hand_off_to_id`) REFERENCES `address` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_handoff_anesthesia_type_id_fk` FOREIGN KEY (`anesthesia_type_id`) REFERENCES `anaesthetic_type` (`id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_nonoperative_eye_protected_fk` FOREIGN KEY (`nonoperative_eye_protected_id`) REFERENCES `ophnuintraoperative_handoff_nonoperative_eye_protected` (`id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_tape_or_shield_fk` FOREIGN KEY (`tape_or_shield_id`) REFERENCES `ophnuintraoperative_handoff_tape_or_shield` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraoperative_handoff_two_identifiers_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraoperative_handoff_two_identifiers_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ohtia_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_handoff_two_identifiers_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_handoff_two_identifiers_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraoperative_handoff_two_identifiers_assignment_lku_fk` (`ophnuintraoperative_handoff_two_identifiers_id`)',
				'CONSTRAINT `et_ohtia_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_handoff_two_identifiers_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_handoff_two_identifiers_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_handoff` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_handoff_two_identifiers_assignment_lku_fk` FOREIGN KEY (`ophnuintraoperative_handoff_two_identifiers_id`) REFERENCES `ophnuintraoperative_handoff_two_identifiers` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnuintraoperative_personnel', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'surgeon_id' => 'int(10) unsigned NOT NULL',

				'scrub_nurse_id' => 'int(10) unsigned NOT NULL',

				'surgical_assistant_id' => 'int(10) unsigned NOT NULL',

				'trainee_scrub_nurse_id' => 'int(10) unsigned NULL',

				'anesthesiologist_id' => 'int(10) unsigned NOT NULL',

				'trainee_circulating_nurse_id' => 'int(10) unsigned NULL',

				'anesthetic_assistant_id' => 'int(10) unsigned NOT NULL',

				'translator' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'anesthetic_trainee_id' => 'int(10) unsigned NULL',

				'other' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'who_timeout_completed' => 'tinyint(1) unsigned NOT NULL',

				'time_out_lead_by_id' => 'int(10) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_personnel_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_personnel_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_personnel_ev_fk` (`event_id`)',
				'KEY `et_ophnuintraoperative_personnel_surgeon_id_fk` (`surgeon_id`)',
				'KEY `et_ophnuintraoperative_personnel_scrub_nurse_id_fk` (`scrub_nurse_id`)',
				'KEY `et_ophnuintraoperative_personnel_surgical_assistant_id_fk` (`surgical_assistant_id`)',
				'KEY `et_ophnuintraoperative_personnel_trainee_scrub_nurse_id_fk` (`trainee_scrub_nurse_id`)',
				'KEY `et_ophnuintraoperative_personnel_anesthesiologist_id_fk` (`anesthesiologist_id`)',
				'KEY `et_ophnuintraoperative_personnel_trainee_circulating_nurse_id_fk` (`trainee_circulating_nurse_id`)',
				'KEY `et_ophnuintraoperative_personnel_anesthetic_assistant_id_fk` (`anesthetic_assistant_id`)',
				'KEY `et_ophnuintraoperative_personnel_anesthetic_trainee_id_fk` (`anesthetic_trainee_id`)',
				'KEY `et_ophnuintraoperative_personnel_time_out_lead_by_id_fk` (`time_out_lead_by_id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_surgeon_id_fk` FOREIGN KEY (`surgeon_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_scrub_nurse_id_fk` FOREIGN KEY (`scrub_nurse_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_surgical_assistant_id_fk` FOREIGN KEY (`surgical_assistant_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_trainee_scrub_nurse_id_fk` FOREIGN KEY (`trainee_scrub_nurse_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_anesthesiologist_id_fk` FOREIGN KEY (`anesthesiologist_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_trainee_circulating_nurse_id_fk` FOREIGN KEY (`trainee_circulating_nurse_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_anesthetic_assistant_id_fk` FOREIGN KEY (`anesthetic_assistant_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_anesthetic_trainee_id_fk` FOREIGN KEY (`anesthetic_trainee_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_personnel_time_out_lead_by_id_fk` FOREIGN KEY (`time_out_lead_by_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		$this->createTable('et_ophnuintraoperative_surgicalcounts', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'count_discrepancies' => 'tinyint(1) unsigned NOT NULL',

				'surgeon_notified' => 'tinyint(1) unsigned NOT NULL',

				'comments' => 'text COLLATE utf8_bin DEFAULT \'\'',
				'needles1' => 'int(10) unsigned NULL',
				'needles2' => 'int(10) unsigned NULL',
				'needles3' => 'int(10) unsigned NULL',
				'blades1' => 'int(10) unsigned NULL',
				'blades2' => 'int(10) unsigned NULL',
				'blades3' => 'int(10) unsigned NULL',
				'plugs1' => 'int(10) unsigned NULL',
				'plugs2' => 'int(10) unsigned NULL',
				'plugs3' => 'int(10) unsigned NULL',
				'trocars1' => 'int(10) unsigned NULL',
				'trocars2' => 'int(10) unsigned NULL',
				'trocars3' => 'int(10) unsigned NULL',
				'sponges_gauze1' => 'int(10) unsigned NULL',
				'sponges_gauze2' => 'int(10) unsigned NULL',
				'sponges_gauze3' => 'int(10) unsigned NULL',
				'pledgetts1' => 'int(10) unsigned NULL',
				'pledgetts2' => 'int(10) unsigned NULL',
				'pledgetts3' => 'int(10) unsigned NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_surgicalcounts_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_surgicalcounts_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_surgicalcounts_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_surgicalcounts_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_surgicalcounts_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_surgicalcounts_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_operationprep_incision_site', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_operationprep_incision_site_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_operationprep_incision_site_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_incision_site_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_incision_site_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_operationprep_incision_site',array('name'=>'Clean wound','display_order'=>1));
		$this->insert('ophnuintraoperative_operationprep_incision_site',array('name'=>'Clean contaminated','display_order'=>2));
		$this->insert('ophnuintraoperative_operationprep_incision_site',array('name'=>'Contaminated wound','display_order'=>3));
		$this->insert('ophnuintraoperative_operationprep_incision_site',array('name'=>'Dirty or infected eye','display_order'=>4));
		$this->insert('ophnuintraoperative_operationprep_incision_site',array('name'=>'Red eye','display_order'=>5));

		$this->createTable('ophnuintraoperative_operationprep_prep_solution', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_operationprep_prep_solution_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_operationprep_prep_solution_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_prep_solution_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_prep_solution_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_operationprep_prep_solution',array('name'=>'Betadine 5%','display_order'=>1));
		$this->insert('ophnuintraoperative_operationprep_prep_solution',array('name'=>'Betadine 10%','display_order'=>2));
		$this->insert('ophnuintraoperative_operationprep_prep_solution',array('name'=>'Aqueous Chlorhexidine','display_order'=>3));
		$this->insert('ophnuintraoperative_operationprep_prep_solution',array('name'=>'Other (please specify)','display_order'=>4));

		$this->createTable('ophnuintraoperative_operationprep_viscoelastic_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_operationprep_viscoelastic_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_operationprep_viscoelastic_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_operationprep_viscoelastic_type',array('name'=>'Type1','display_order'=>1));
		$this->insert('ophnuintraoperative_operationprep_viscoelastic_type',array('name'=>'Type2','display_order'=>2));
		$this->insert('ophnuintraoperative_operationprep_viscoelastic_type',array('name'=>'Type3','display_order'=>3));

		$this->createTable('ophnuintraoperative_operationprep_viscoelastic_quantity', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_operationprep_viscoelastic_quantity_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_operationprep_viscoelastic_quantity_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_quantity_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_quantity_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_operationprep_viscoelastic_quantity',array('name'=>'One','display_order'=>1));
		$this->insert('ophnuintraoperative_operationprep_viscoelastic_quantity',array('name'=>'Two','display_order'=>2));
		$this->insert('ophnuintraoperative_operationprep_viscoelastic_quantity',array('name'=>'Three','display_order'=>3));

		$this->createTable('ophnuintraoperative_operationprep_grounding_pad_location', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_operationprep_grounding_pad_location_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_operationprep_grounding_pad_location_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_grounding_pad_location_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_grounding_pad_location_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_operationprep_grounding_pad_location',array('name'=>'Leg','display_order'=>1));
		$this->insert('ophnuintraoperative_operationprep_grounding_pad_location',array('name'=>'Buttocks','display_order'=>2));

		$this->createTable('ophnuintraoperative_operationprep_grounding_pad_side', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_operationprep_grounding_pad_side_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_operationprep_grounding_pad_side_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_grounding_pad_side_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_grounding_pad_side_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_operationprep_grounding_pad_side',array('name'=>'Right','display_order'=>1));
		$this->insert('ophnuintraoperative_operationprep_grounding_pad_side',array('name'=>'Left','display_order'=>2));

		$this->createTable('ophnuintraoperative_operationprep_post_skin_assessment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_operationprep_post_skin_assessment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_operationprep_post_skin_assessment_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_post_skin_assessment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_post_skin_assessment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_operationprep_post_skin_assessment',array('name'=>'Intact','display_order'=>1));
		$this->insert('ophnuintraoperative_operationprep_post_skin_assessment',array('name'=>'Reddened','display_order'=>2));
		$this->insert('ophnuintraoperative_operationprep_post_skin_assessment',array('name'=>'Swollen','display_order'=>3));
		$this->insert('ophnuintraoperative_operationprep_post_skin_assessment',array('name'=>'Other (please specify)','display_order'=>4));

		$this->createTable('ophnuintraoperative_operationprep_additional', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_operationprep_additional_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_operationprep_additional_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_additional_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_additional_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_operationprep_additional',array('name'=>'Vision blue','display_order'=>1));
		$this->insert('ophnuintraoperative_operationprep_additional',array('name'=>'Mitomycin','display_order'=>2));
		$this->insert('ophnuintraoperative_operationprep_additional',array('name'=>'ICG','display_order'=>3));
		$this->insert('ophnuintraoperative_operationprep_additional',array('name'=>'Intravitreal Injections','display_order'=>4));
		$this->insert('ophnuintraoperative_operationprep_additional',array('name'=>'Xylocaine','display_order'=>5));
		$this->insert('ophnuintraoperative_operationprep_additional',array('name'=>'5FU','display_order'=>6));
		$this->insert('ophnuintraoperative_operationprep_additional',array('name'=>'Sub-conjuctival injection','display_order'=>7));
		$this->insert('ophnuintraoperative_operationprep_additional',array('name'=>'Other (please specify)','display_order'=>8));



		$this->createTable('et_ophnuintraoperative_operationprep', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'incision_site_id' => 'int(10) unsigned NOT NULL',

				'patient_in_sulpine_position' => 'tinyint(1) unsigned NOT NULL',

				'prep_solution_id' => 'int(10) unsigned NOT NULL',

				'other_solution' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'viscoelastic' => 'tinyint(1) unsigned NOT NULL',

				'viscoelastic_type_id' => 'int(10) unsigned NULL',

				'viscoelastic_quantity_id' => 'int(10) unsigned NULL',

				'grounding_pad' => 'tinyint(1) unsigned NOT NULL',

				'grounding_pad_location_id' => 'int(10) unsigned NULL',

				'grounding_pad_side_id' => 'int(10) unsigned NULL',

				'post_skin_assessment_id' => 'int(10) unsigned NOT NULL',

				'post_skin_assessment_other' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'nasal_throat_pack' => 'tinyint(1) unsigned NOT NULL',

				'nasal_insert_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'nasal_remove_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'',

				'additional_other' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_operationprep_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_operationprep_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_operationprep_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_operationprep_incision_site_fk` (`incision_site_id`)',
				'KEY `ophnuintraoperative_operationprep_prep_solution_fk` (`prep_solution_id`)',
				'KEY `ophnuintraoperative_operationprep_viscoelastic_type_fk` (`viscoelastic_type_id`)',
				'KEY `ophnuintraoperative_operationprep_viscoelastic_quantity_fk` (`viscoelastic_quantity_id`)',
				'KEY `ophnuintraoperative_operationprep_grounding_pad_location_fk` (`grounding_pad_location_id`)',
				'KEY `ophnuintraoperative_operationprep_grounding_pad_side_fk` (`grounding_pad_side_id`)',
				'KEY `ophnuintraoperative_operationprep_post_skin_assessment_fk` (`post_skin_assessment_id`)',
				'CONSTRAINT `et_ophnuintraoperative_operationprep_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_operationprep_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_operationprep_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_incision_site_fk` FOREIGN KEY (`incision_site_id`) REFERENCES `ophnuintraoperative_operationprep_incision_site` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_prep_solution_fk` FOREIGN KEY (`prep_solution_id`) REFERENCES `ophnuintraoperative_operationprep_prep_solution` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_type_fk` FOREIGN KEY (`viscoelastic_type_id`) REFERENCES `ophnuintraoperative_operationprep_viscoelastic_type` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_quantity_fk` FOREIGN KEY (`viscoelastic_quantity_id`) REFERENCES `ophnuintraoperative_operationprep_viscoelastic_quantity` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_grounding_pad_location_fk` FOREIGN KEY (`grounding_pad_location_id`) REFERENCES `ophnuintraoperative_operationprep_grounding_pad_location` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_grounding_pad_side_fk` FOREIGN KEY (`grounding_pad_side_id`) REFERENCES `ophnuintraoperative_operationprep_grounding_pad_side` (`id`)',
				'CONSTRAINT `ophnuintraoperative_operationprep_post_skin_assessment_fk` FOREIGN KEY (`post_skin_assessment_id`) REFERENCES `ophnuintraoperative_operationprep_post_skin_assessment` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraoperative_operationprep_additional_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraoperative_operationprep_additional_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ooaa_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ooaa_cui_fk` (`created_user_id`)',
				'KEY `et_ooaa_ele_fk` (`element_id`)',
				'KEY `et_ooaa_lku_fk` (`ophnuintraoperative_operationprep_additional_id`)',
				'CONSTRAINT `et_ooaa_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ooaa_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ooaa_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_operationprep` (`id`)',
				'CONSTRAINT `et_ooaa_lku_fk` FOREIGN KEY (`ophnuintraoperative_operationprep_additional_id`) REFERENCES `ophnuintraoperative_operationprep_additional` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_implantprosthesis_iol_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_implantprosthesis_iol_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_implantprosthesis_iol_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_implantprosthesis_iol_type',array('name'=>'IOL 1','display_order'=>1));
		$this->insert('ophnuintraoperative_implantprosthesis_iol_type',array('name'=>'IOL 2','display_order'=>2));
		$this->insert('ophnuintraoperative_implantprosthesis_iol_type',array('name'=>'IOL 3','display_order'=>3));

		$this->createTable('ophnuintraoperative_implantprosthesis_iol_size', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_implantprosthesis_iol_size_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_implantprosthesis_iol_size_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_size_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_size_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_implantprosthesis_iol_size',array('name'=>'Size 1','display_order'=>1));
		$this->insert('ophnuintraoperative_implantprosthesis_iol_size',array('name'=>'Size 2','display_order'=>2));
		$this->insert('ophnuintraoperative_implantprosthesis_iol_size',array('name'=>'Size 3','display_order'=>3));



		$this->createTable('et_ophnuintraoperative_implantprosthesis', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'intraocular_lens' => 'tinyint(1) unsigned NOT NULL',

				'iol_type_id' => 'int(10) unsigned NULL',

				'iol_size_id' => 'int(10) unsigned NULL',

				'iol_comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'ocular_sphere_ball' => 'tinyint(1) unsigned NOT NULL',

				'ocular_sphere_ball_comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'glaucoma_valve' => 'tinyint(1) unsigned NOT NULL',

				'glaucoma_valve_comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'lid_weights' => 'tinyint(1) unsigned NOT NULL',

				'lid_weight_comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'sutures' => 'tinyint(1) unsigned NOT NULL',

				'suture_comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'drains' => 'tinyint(1) unsigned NOT NULL',

				'drain_comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_implantprosthesis_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_implantprosthesis_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_implantprosthesis_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_implantprosthesis_iol_type_fk` (`iol_type_id`)',
				'KEY `ophnuintraoperative_implantprosthesis_iol_size_fk` (`iol_size_id`)',
				'CONSTRAINT `et_ophnuintraoperative_implantprosthesis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_implantprosthesis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_implantprosthesis_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_type_fk` FOREIGN KEY (`iol_type_id`) REFERENCES `ophnuintraoperative_implantprosthesis_iol_type` (`id`)',
				'CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_size_fk` FOREIGN KEY (`iol_size_id`) REFERENCES `ophnuintraoperative_implantprosthesis_iol_size` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_postop_specimin_collected', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_postop_specimin_collected_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_postop_specimin_collected_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_postop_specimin_collected_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_postop_specimin_collected_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_postop_specimin_collected',array('name'=>'Yes','display_order'=>1));
		$this->insert('ophnuintraoperative_postop_specimin_collected',array('name'=>'N/A','display_order'=>2));

		$this->createTable('ophnuintraoperative_postop_dressing_items', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_postop_dressing_items_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_postop_dressing_items_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_postop_dressing_items_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_postop_dressing_items_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_postop_dressing_items',array('name'=>'Dry','display_order'=>1));
		$this->insert('ophnuintraoperative_postop_dressing_items',array('name'=>'Wet','display_order'=>2));
		$this->insert('ophnuintraoperative_postop_dressing_items',array('name'=>'Eye-pad','display_order'=>3));
		$this->insert('ophnuintraoperative_postop_dressing_items',array('name'=>'Steri-strips','display_order'=>4));
		$this->insert('ophnuintraoperative_postop_dressing_items',array('name'=>'Ointment','display_order'=>5));
		$this->insert('ophnuintraoperative_postop_dressing_items',array('name'=>'Other (please specify)','display_order'=>6));


		$this->createTable('ophnuintraoperative_postop_proc_defaults', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'value_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_postop_proc_defaults_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_postop_proc_defaults_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_postop_proc_defaults_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_postop_proc_defaults_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');


		$this->createTable('et_ophnuintraoperative_postop', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'specimin_collected_id' => 'int(10) unsigned NOT NULL',

				'specimin_comments' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'dressing_used' => 'tinyint(1) unsigned NOT NULL',

				'dressing_other' => 'text COLLATE utf8_bin DEFAULT \'\'',

				'circulating_nurse_id' => 'int(10) unsigned NOT NULL',

				'scrub_nurse_id' => 'int(10) unsigned NOT NULL',

				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_postop_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_postop_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_postop_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperative_postop_specimin_collected_fk` (`specimin_collected_id`)',
				'KEY `et_ophnuintraoperative_postop_circulating_nurse_id_fk` (`circulating_nurse_id`)',
				'KEY `et_ophnuintraoperative_postop_scrub_nurse_id_fk` (`scrub_nurse_id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperative_postop_specimin_collected_fk` FOREIGN KEY (`specimin_collected_id`) REFERENCES `ophnuintraoperative_postop_specimin_collected` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_circulating_nurse_id_fk` FOREIGN KEY (`circulating_nurse_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_scrub_nurse_id_fk` FOREIGN KEY (`scrub_nurse_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('et_ophnuintraoperative_postop_dressing_items_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'ophnuintraoperative_postop_dressing_items_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_postop_dressing_items_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_postop_dressing_items_assignment_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_postop_dressing_items_assignment_ele_fk` (`element_id`)',
				'KEY `et_ophnuintraoperative_postop_dressing_items_assignment_lku_fk` (`ophnuintraoperative_postop_dressing_items_id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_dressing_items_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_dressing_items_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_dressing_items_assignment_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_postop` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_postop_dressing_items_assignment_lku_fk` FOREIGN KEY (`ophnuintraoperative_postop_dressing_items_id`) REFERENCES `ophnuintraoperative_postop_dressing_items` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperative_postop_procedures_performed_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'proc_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_ppppp_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_ppppp_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperative_ppppp_ele_fk` (`element_id`)',
				'KEY `ophnuintraoperative_ppppp_lku_fk` (`proc_id`)',
				'CONSTRAINT `ophnuintraoperative_ppppp_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_ppppp_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_ppppp_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_postop` (`id`)',
				'CONSTRAINT `ophnuintraoperative_ppppp_lku_fk` FOREIGN KEY (`proc_id`) REFERENCES `proc` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		$this->dropTable('et_ophnuintraoperative_timetracking');



		$this->dropTable('et_ophnuintraoperative_handoff_two_identifiers_assignment');
		$this->dropTable('et_ophnuintraoperative_handoff');


		$this->dropTable('ophnuintraoperative_handoff_two_identifiers');
		$this->dropTable('ophnuintraoperative_handoff_hand_off_from');
		$this->dropTable('ophnuintraoperative_handoff_nonoperative_eye_protected');
		$this->dropTable('ophnuintraoperative_handoff_tape_or_shield');

		$this->dropTable('et_ophnuintraoperative_personnel');



		$this->dropTable('et_ophnuintraoperative_surgicalcounts');



		$this->dropTable('et_ophnuintraoperative_operationprep_additional_assignment');
		$this->dropTable('et_ophnuintraoperative_operationprep');


		$this->dropTable('ophnuintraoperative_operationprep_incision_site');
		$this->dropTable('ophnuintraoperative_operationprep_prep_solution');
		$this->dropTable('ophnuintraoperative_operationprep_viscoelastic_type');
		$this->dropTable('ophnuintraoperative_operationprep_viscoelastic_quantity');
		$this->dropTable('ophnuintraoperative_operationprep_grounding_pad_location');
		$this->dropTable('ophnuintraoperative_operationprep_grounding_pad_side');
		$this->dropTable('ophnuintraoperative_operationprep_post_skin_assessment');
		$this->dropTable('ophnuintraoperative_operationprep_additional');

		$this->dropTable('et_ophnuintraoperative_implantprosthesis');


		$this->dropTable('ophnuintraoperative_implantprosthesis_iol_type');
		$this->dropTable('ophnuintraoperative_implantprosthesis_iol_size');

		$this->dropTable('et_ophnuintraoperative_postop_dressing_items_assignment');
		$this->dropTable('ophnuintraoperative_postop_procedures_performed_assignment');
		$this->dropTable('et_ophnuintraoperative_postop');

		$this->dropTable('ophnuintraoperative_postop_proc_defaults');

		$this->dropTable('ophnuintraoperative_postop_specimin_collected');
		$this->dropTable('ophnuintraoperative_postop_dressing_items');


		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperative'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}

