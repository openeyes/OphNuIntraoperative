<?php

class m140723_082227_element_changes extends OEMigration
{
	public function up()
	{
		$this->dropTable('ophnuintraoperative_handoff_identifiers_version');
		$this->dropTable('ophnuintraoperative_handoff_identifiers');
		$this->dropTable('ophnuintraoperative_handoff_identifier_version');
		$this->dropTable('ophnuintraoperative_handoff_identifier');

		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuIntraoperative"))->queryRow();

		$this->insert('element_type',array('name' => 'Patient identification', 'class_name' => 'Element_OphNuIntraoperative_PatientId', 'event_type_id' => $et['id'], 'display_order' => 10, 'default' => 1, 'required' => 1));

		$this->update('element_type',array('display_order' => 20),"class_name = 'Element_OphNuIntraoperative_TimeTracking'");
		$this->update('element_type',array('display_order' => 30),"class_name = 'Element_OphNuIntraoperative_Handoff'");
		$this->update('element_type',array('display_order' => 40),"class_name = 'Element_OphNuIntraoperative_Personnel'");
		$this->update('element_type',array('display_order' => 50),"class_name = 'Element_OphNuIntraoperative_SurgicalCounts'");
		$this->update('element_type',array('display_order' => 60),"class_name = 'Element_OphNuIntraoperative_OperationPrep'");
		$this->update('element_type',array('display_order' => 70),"class_name = 'Element_OphNuIntraoperative_ImplantProsthesisScleral'");
		$this->update('element_type',array('display_order' => 80),"class_name = 'Element_OphNuIntraoperative_PostOp'");

		$this->createTable('et_ophnuintraoperative_patientid', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'wristband_verified' => 'tinyint(1) unsigned not null',
				'allergies_verified' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_patientid_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_patientid_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_patientid_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_patientid_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_patientid_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_patientid_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('et_ophnuintraoperative_patientid');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperative_handoff")->order('id asc')->queryAll() as $row) {
			$this->insert('et_ophnuintraoperative_patientid',array(
				'id' => $row['id'],
				'event_id' => $row['event_id'],
				'wristband_verified' => $row['wristband_verified'],
				'allergies_verified' => $row['allergies_verified'],
				'last_modified_user_id' => $row['last_modified_user_id'],
				'last_modified_date' => $row['last_modified_date'],
				'created_user_id' => $row['created_user_id'],
				'created_date' => $row['created_date'],
			));

			foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperative_handoff_version")->order("version_id asc")->where("id = {$row['id']}")->queryAll() as $v) {
				$this->insert('et_ophnuintraoperative_patientid_version',array(
					'id' => $v['id'],
					'event_id' => $v['event_id'],
					'wristband_verified' => $v['wristband_verified'],
					'allergies_verified' => $v['allergies_verified'],
					'last_modified_user_id' => $v['last_modified_user_id'],
					'last_modified_date' => $v['last_modified_date'],
					'created_user_id' => $v['created_user_id'],
					'created_date' => $v['created_date'],
					'version_date' => $v['version_date'],
					'version_id' => $v['version_id'],
				));
			}
		}

		$this->dropColumn('et_ophnuintraoperative_handoff','wristband_verified');
		$this->dropColumn('et_ophnuintraoperative_handoff_version','wristband_verified');

		$this->dropColumn('et_ophnuintraoperative_handoff','allergies_verified');
		$this->dropColumn('et_ophnuintraoperative_handoff_version','allergies_verified');
	}

	public function down()
	{
		$this->addColumn('et_ophnuintraoperative_handoff','allergies_verified','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnuintraoperative_handoff_version','allergies_verified','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnuintraoperative_handoff','wristband_verified','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnuintraoperative_handoff_version','wristband_verified','tinyint(1) unsigned NOT NULL');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperative_patientid")->order('id asc')->queryAll() as $row) {
			$this->update('et_ophnuintraoperative_handoff',array(
					'wristband_verified' => $row['wristband_verified'],
					'allergies_verified' => $row['allergies_verified'],
				),
				"event_id = {$row['event_id']}");

			foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperative_patientid_version")->order("version_id asc")->where("id = {$row['id']}")->queryAll() as $v) {
				$this->update('et_ophnuintraoperative_handoff_version',array(
						'wristband_verified' => $v['wristband_verified'],
						'allergies_verified' => $v['allergies_verified'],
					),
					"id = {$v['id']}");
			}
		}

		$this->dropTable('et_ophnuintraoperative_patientid_version');
		$this->dropTable('et_ophnuintraoperative_patientid');

		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :class_name",array(":class_name" => "OphNuIntraoperative"))->queryRow();

		$this->delete('element_type',"event_type_id = {$et['id']} and class_name = 'Element_OphNuIntraoperative_PatientId'");

		$this->update('element_type',array('display_order' => 1),"event_type_id = {$et['id']}");

		$this->execute("CREATE TABLE `ophnuintraoperative_handoff_identifier` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) COLLATE utf8_bin NOT NULL,
	`display_order` tinyint(1) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnuintraoperative_handoff_identifier_lmui_fk` (`last_modified_user_id`),
	KEY `ophnuintraoperative_handoff_identifier_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnuintraoperative_handoff_identifier_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_handoff_identifier_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnuintraoperative_handoff_identifier');

		$this->execute("CREATE TABLE `ophnuintraoperative_handoff_identifiers` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`identifier_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnuintraoperative_handoff_identifiers_lmui_fk` (`last_modified_user_id`),
	KEY `ophnuintraoperative_handoff_identifiers_cui_fk` (`created_user_id`),
	KEY `ophnuintraoperative_handoff_identifiers_ele_fk` (`element_id`),
	KEY `ophnuintraoperative_handoff_identifiers_idi_fk` (`identifier_id`),
	CONSTRAINT `ophnuintraoperative_handoff_identifiers_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_handoff_identifiers_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_handoff_identifiers_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_patient` (`id`),
	CONSTRAINT `ophnuintraoperative_handoff_identifiers_idi_fk` FOREIGN KEY (`identifier_id`) REFERENCES `ophnuintraoperative_handoff_identifier` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnuintraoperative_handoff_identifiers');
	}
}
