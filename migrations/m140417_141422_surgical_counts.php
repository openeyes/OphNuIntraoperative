<?php

class m140417_141422_surgical_counts extends CDbMigration
{
	public function up()
	{
		$this->createTable('et_ophnuintraoperative_items', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
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
				'discrepancies' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'xray_required' => 'tinyint(1) unsigned NOT NULL DEFAULT 0',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_items_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_items_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_items_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_items_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_items_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_items_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
	}

	public function down()
	{
		$this->dropTable('et_ophnuintraoperative_items');
	}
}
