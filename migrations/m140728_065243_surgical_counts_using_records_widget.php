<?php

class m140728_065243_surgical_counts_using_records_widget extends OEMigration
{
	public function up()
	{
		$this->createTable('ophtrintraoperative_count_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophtrintraoperative_count_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophtrintraoperative_count_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophtrintraoperative_count_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophtrintraoperative_count_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophtrintraoperative_count_type');

		$this->createTable('ophtrintraoperative_count', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'count_type_id' => 'int(10) unsigned not null',
				'timestamp' => 'datetime not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophtrintraoperative_count_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophtrintraoperative_count_cui_fk` (`created_user_id`)',
				'KEY `ophtrintraoperative_count_ele_fk` (`element_id`)',
				'KEY `ophtrintraoperative_count_cti_fk` (`count_type_id`)',
				'CONSTRAINT `ophtrintraoperative_count_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophtrintraoperative_count_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophtrintraoperative_count_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_surgicalcounts` (`id`)',
				'CONSTRAINT `ophtrintraoperative_count_cti_fk` FOREIGN KEY (`count_type_id`) REFERENCES `ophtrintraoperative_count_type` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophtrintraoperative_count');

		$this->createTable('ophtrintraoperative_count_item_type', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) not null',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophtrintraoperative_count_item_type_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophtrintraoperative_count_item_type_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophtrintraoperative_count_item_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophtrintraoperative_count_item_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophtrintraoperative_count_item_type');

		$this->initialiseData(dirname(__FILE__));

		$this->createTable('ophtrintraoperative_count_item', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'count_id' => 'int(10) unsigned not null',
				'item_type_id' => 'int(10) unsigned not null',
				'value' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophtrintraoperative_count_item_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophtrintraoperative_count_item_cui_fk` (`created_user_id`)',
				'KEY `ophtrintraoperative_count_item_cti_fk` (`count_id`)',
				'KEY `ophtrintraoperative_count_item_iti_fk` (`item_type_id`)',
				'CONSTRAINT `ophtrintraoperative_count_item_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophtrintraoperative_count_item_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophtrintraoperative_count_item_cti_fk` FOREIGN KEY (`count_id`) REFERENCES `ophtrintraoperative_count` (`id`)',
				'CONSTRAINT `ophtrintraoperative_count_item_iti_fk` FOREIGN KEY (`item_type_id`) REFERENCES `ophtrintraoperative_count_item_type` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophtrintraoperative_count_item');

		$i=1;
		$l=1;
		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperative_surgicalcounts")->order("id asc")->queryAll() as $row) {
			for ($j=1; $j<=3; $j++) {
				$this->insert('ophtrintraoperative_count',array(
						'id' => $i,
						'element_id' => $row['id'],
						'count_type_id' => $j,
						'timestamp' => $row['created_date'],
						'last_modified_user_id' => $row['last_modified_user_id'],
						'last_modified_date' => $row['last_modified_date'],
						'created_user_id' => $row['created_user_id'],
						'created_date' => $row['created_date'],
				));

				foreach (array('needles','blades','plugs','trocars','sponges_gauze','pledgetts') as $k => $field) {
					$this->insert('ophtrintraoperative_count_item',array(
							'id' => $l++,
							'count_id' => $i,
							'item_type_id' => $k+1,
							'value' => $row[$field.$j],
							'last_modified_user_id' => $row['last_modified_user_id'],
							'last_modified_date' => $row['last_modified_date'],
							'created_user_id' => $row['created_user_id'],
							'created_date' => $row['created_date'],
					));
				}

				$i++;
			}
		}

		for ($j=1; $j<=3; $j++) {
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts','needles'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts','blades'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts','plugs'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts','trocars'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts','sponges_gauze'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts','pledgetts'.$j);

			$this->dropColumn('et_ophnuintraoperative_surgicalcounts_version','needles'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts_version','blades'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts_version','plugs'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts_version','trocars'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts_version','sponges_gauze'.$j);
			$this->dropColumn('et_ophnuintraoperative_surgicalcounts_version','pledgetts'.$j);
		}
	}

	public function down()
	{
		for ($j=1; $j<=3; $j++) {
			$this->addColumn('et_ophnuintraoperative_surgicalcounts','needles'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts','blades'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts','plugs'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts','trocars'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts','sponges_gauze'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts','pledgetts'.$j,'int(10) unsigned DEFAULT NULL');

			$this->addColumn('et_ophnuintraoperative_surgicalcounts_version','needles'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts_version','blades'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts_version','plugs'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts_version','trocars'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts_version','sponges_gauze'.$j,'int(10) unsigned DEFAULT NULL');
			$this->addColumn('et_ophnuintraoperative_surgicalcounts_version','pledgetts'.$j,'int(10) unsigned DEFAULT NULL');
		} 

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperative_surgicalcounts")->order("id asc")->queryAll() as $row) {
			for ($j=1; $j<=3; $j++) {
				$count = $this->dbConnection->createCommand()->select("*")->from("ophtrintraoperative_count")->where("element_id = :element_id and count_type_id = :cti",array(":element_id" => $row['id'], ":cti" => $j))->queryRow();

				foreach (array('needles','blades','plugs','trocars','sponges_gauze','pledgetts') as $i => $field) {
					$value = $this->dbConnection->createCommand()->select("value")->from("ophtrintraoperative_count_item")->where("count_id = :ci and item_type_id = :it",array(":ci" => $count['id'],":it" => $i+1))->queryScalar();
					$this->update('et_ophnuintraoperative_surgicalcounts',array($field.$j => $value),"id = {$row['id']}");
				}
			}
		}

		$this->dropTable('ophtrintraoperative_count_item_version');
		$this->dropTable('ophtrintraoperative_count_item');
		$this->dropTable('ophtrintraoperative_count_item_type_version');
		$this->dropTable('ophtrintraoperative_count_item_type');
		$this->dropTable('ophtrintraoperative_count_version');
		$this->dropTable('ophtrintraoperative_count');
		$this->dropTable('ophtrintraoperative_count_type_version');
		$this->dropTable('ophtrintraoperative_count_type');
	}
}
