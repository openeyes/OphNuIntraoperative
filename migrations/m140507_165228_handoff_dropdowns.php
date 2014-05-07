<?php

class m140507_165228_handoff_dropdowns extends CDbMigration
{
	public function up()
	{
		$this->dropForeignKey('ophnuintraoperative_handoff_hand_off_from_fk','et_ophnuintraoperative_handoff');
		$this->addForeignKey('ophnuintraoperative_handoff_hand_off_from_fk','et_ophnuintraoperative_handoff','hand_off_from_id','user','id');

		$this->dropForeignKey('et_ophnuintraoperative_handoff_hand_off_to_id_fk','et_ophnuintraoperative_handoff');
		$this->addForeignKey('et_ophnuintraoperative_handoff_hand_off_to_id_fk','et_ophnuintraoperative_handoff','hand_off_to_id','user','id');

		$this->dropTable('ophnuintraoperative_handoff_hand_off_from');
	}

	public function down()
	{
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

		$this->dropForeignKey('ophnuintraoperative_handoff_hand_off_from_fk','et_ophnuintraoperative_handoff');
		$this->addForeignKey('ophnuintraoperative_handoff_hand_off_from_fk','et_ophnuintraoperative_handoff','hand_off_from_id','ophnuintraoperative_handoff_hand_off_from','id');

		$this->dropForeignKey('et_ophnuintraoperative_handoff_hand_off_to_id_fk','et_ophnuintraoperative_handoff');
		$this->addForeignKey('et_ophnuintraoperative_handoff_hand_off_to_id_fk','et_ophnuintraoperative_handoff','hand_off_to_id','address','id');
	}
}
