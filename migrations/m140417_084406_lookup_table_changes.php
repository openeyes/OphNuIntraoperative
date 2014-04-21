<?php

class m140417_084406_lookup_table_changes extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnuintraoperative_anaesthesia_handoff_person', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'default' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_anaesthesia_handoff_person_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_anaesthesia_handoff_person_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_anaesthesia_handoff_person_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_anaesthesia_handoff_person_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_anaesthesia_handoff_person',array('id'=>1,'name'=>'Nurse','display_order'=>1));
		$this->insert('ophnuintraoperative_anaesthesia_handoff_person',array('id'=>2,'name'=>'Doctor','display_order'=>2));
		$this->insert('ophnuintraoperative_anaesthesia_handoff_person',array('id'=>3,'name'=>'Surgeon','display_order'=>3));

		$this->dropForeignKey('ophnuintraoperative_anasthesia_hand_off_from_fk','et_ophnuintraoperative_anasthesia');
		$this->addForeignKey('ophnuintraoperative_anasthesia_hand_off_from_fk','et_ophnuintraoperative_anasthesia','hand_off_from_id','ophnuintraoperative_anaesthesia_handoff_person','id');
		$this->dropTable('ophnuintraoperative_anasthesia_hand_off_from');

		$this->dropForeignKey('ophnuintraoperative_anasthesia_hand_off_to_fk','et_ophnuintraoperative_anasthesia');
		$this->addForeignKey('ophnuintraoperative_anasthesia_hand_off_to_fk','et_ophnuintraoperative_anasthesia','hand_off_to_id','ophnuintraoperative_anaesthesia_handoff_person','id');
		$this->dropTable('ophnuintraoperative_anasthesia_hand_off_to');

		$this->dropForeignKey('ophnuintraoperative_anasthesia_anesthesia_type_fk','et_ophnuintraoperative_anasthesia');
		$this->addForeignKey('ophnuintraoperative_anasthesia_anesthesia_type_fk','et_ophnuintraoperative_anasthesia','anesthesia_type_id','anaesthetic_type','id');
		$this->dropTable('ophnuintraoperative_anasthesia_anesthesia_type');
	}

	public function down()
	{
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

		$this->dropForeignKey('ophnuintraoperative_anasthesia_anesthesia_type_fk','et_ophnuintraoperative_anasthesia');
		$this->addForeignKey('ophnuintraoperative_anasthesia_anesthesia_type_fk','et_ophnuintraoperative_anasthesia','anesthesia_type_id','ophnuintraoperative_anasthesia_anesthesia_type','id');

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

		$this->dropForeignKey('ophnuintraoperative_anasthesia_hand_off_to_fk','et_ophnuintraoperative_anasthesia');
		$this->addForeignKey('ophnuintraoperative_anasthesia_hand_off_to_fk','et_ophnuintraoperative_anasthesia','hand_off_to_id','ophnuintraoperative_anasthesia_hand_off_to','id');

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

		$this->dropForeignKey('ophnuintraoperative_anasthesia_hand_off_from_fk','et_ophnuintraoperative_anasthesia');
		$this->addForeignKey('ophnuintraoperative_anasthesia_hand_off_from_fk','et_ophnuintraoperative_anasthesia','hand_off_from_id','ophnuintraoperative_anasthesia_hand_off_from','id');

		$this->dropTable('ophnuintraoperative_anaesthesia_handoff_person');

		$this->dropTable('ophnuintraoperative_anaesthesia_handoff_person');
	}
}
