<?php

class m140507_164252_anaesthesia_type extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnuintraoperative_handoff_anaesthesia_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_handoff_anaesthesia_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_handoff_anaesthesia_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_anaesthesia_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_handoff_anaesthesia_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperative_handoff_anaesthesia_type',array('id'=>1,'name'=>'GA','display_order'=>1));
		$this->insert('ophnuintraoperative_handoff_anaesthesia_type',array('id'=>2,'name'=>'LA/Block','display_order'=>2));
		$this->insert('ophnuintraoperative_handoff_anaesthesia_type',array('id'=>3,'name'=>'Field block +/- sedation','display_order'=>3));
		$this->insert('ophnuintraoperative_handoff_anaesthesia_type',array('id'=>4,'name'=>'Topical','display_order'=>4));
		$this->insert('ophnuintraoperative_handoff_anaesthesia_type',array('id'=>5,'name'=>'Sedation','display_order'=>5));

		$this->dropForeignKey('et_ophnuintraoperative_handoff_anesthesia_type_id_fk','et_ophnuintraoperative_handoff');
		$this->addForeignKey('et_ophnuintraoperative_handoff_anesthesia_type_id_fk','et_ophnuintraoperative_handoff','anesthesia_type_id','ophnuintraoperative_handoff_anaesthesia_type','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophnuintraoperative_handoff_anesthesia_type_id_fk','et_ophnuintraoperative_handoff');
		$this->addForeignKey('et_ophnuintraoperative_handoff_anesthesia_type_id_fk','et_ophnuintraoperative_handoff','anesthesia_type_id','anaesthetic_type','id');

		$this->dropTable('ophnuintraoperative_handoff_anaesthesia_type');
	}
}
