<?php

class m140724_144327_specimen_collection_changes extends OEMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnuintraoperative_postop','specimin_comments');
		$this->dropColumn('et_ophnuintraoperative_postop_version','specimin_comments');

		$this->createTable('ophnuintraoperative_postop_specimen_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_postop_specimen_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_postop_specimen_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_postop_specimen_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_postop_specimen_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnuintraoperative_postop_specimen_type');

		$this->createTable('ophnuintraoperative_postop_specimen', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'timestamp' => 'datetime not null',
				'label' => 'varchar(255) not null',
				'type_id' => 'int(10) unsigned not null',
				'location' => 'text not null',
				'centre_name' => 'varchar(1024) not null',
				'doctor_name' => 'varchar(255) not null',
				'results_received' => 'tinyint(1) unsigned not null',
				'results_received_timestamp' => 'datetime not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_postop_specimen_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_postop_specimen_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperative_postop_specimen_ele_fk` (`element_id`)',
				'CONSTRAINT `ophnuintraoperative_postop_specimen_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_postop_specimen_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_postop_specimen_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_postop` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnuintraoperative_postop_specimen');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
		$this->dropTable('ophnuintraoperative_postop_specimen_version');
		$this->dropTable('ophnuintraoperative_postop_specimen');
		$this->dropTable('ophnuintraoperative_postop_specimen_type_version');
		$this->dropTable('ophnuintraoperative_postop_specimen_type');

		$this->addColumn('et_ophnuintraoperative_postop','specimin_comments','text');
		$this->addColumn('et_ophnuintraoperative_postop_version','specimin_comments','text');
	}
}
