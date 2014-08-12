<?php

class m140812_121137_eye_id extends OEMigration
{
	public function up()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from('event_type')->where("class_name = 'OphNuIntraoperative'")->queryRow();

		$this->insert('element_type',array(
			'name' => 'Operation details',
			'class_name' => 'Element_OphNuIntraoperative_Operation',
			'event_type_id' => $et['id'],
			'display_order' => 5,
			'default' => 1,
			'required' => 1,
			'active' => 1,
		));

		$this->createTable('et_ophnuintraoperative_operation', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'eye_id' => 'int(10) unsigned null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_operation_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_operation_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_operation_ev_fk` (`event_id`)',
				'KEY `et_ophnuintraoperative_operation_eye_fk` (`eye_id`)',
				'CONSTRAINT `et_ophnuintraoperative_operation_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_operation_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_operation_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_operation_eye_fk` FOREIGN KEY (`eye_id`) REFERENCES `eye` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('et_ophnuintraoperative_operation');
	}

	public function down()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from('event_type')->where("class_name = 'OphNuIntraoperative'")->queryRow();

		$this->delete('element_type',"event_type_id = {$et['id']} and class_name = 'Element_OphNuIntraoperative_Operation'");

		$this->dropTable('et_ophnuintraoperative_operation_version');
		$this->dropTable('et_ophnuintraoperative_operation');
	}
}
