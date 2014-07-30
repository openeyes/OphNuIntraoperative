<?php

class m140728_152322_patient_position_options extends OEMigration
{
	public function up()
	{
		// Create patient position lookup table.
		$this->createTable('ophnuintraoperative_patient_position', array(
			'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
			'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
			'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
			'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
			'PRIMARY KEY (`id`)',
			'KEY `ophnuintraoperative_patient_position_lmui_fk` (`last_modified_user_id`)',
			'KEY `ophnuintraoperative_patient_position_cui_fk` (`created_user_id`)',
			'CONSTRAINT `ophnuintraoperative_patient_position_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
			'CONSTRAINT `ophnuintraoperative_patient_position_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
		), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// Create version table for lookup table.
		$this->versionExistingTable('ophnuintraoperative_patient_position');

		// Add some options to the lookup table.
		$this->insert('ophnuintraoperative_patient_position',array('name'=>'Sulpine','display_order'=>1));
		$this->insert('ophnuintraoperative_patient_position',array('name'=>'Other (please specify)','display_order'=>2));

		// Change column definition.
		$this->alterColumn('et_ophnuintraoperative_operationprep', 'patient_in_sulpine_position', 'int(10) unsigned DEFAULT NULL');
		$this->renameColumn('et_ophnuintraoperative_operationprep', 'patient_in_sulpine_position', 'patient_position_id');

		// Change version table column definition.
		$this->alterColumn('et_ophnuintraoperative_operationprep_version', 'patient_in_sulpine_position', 'int(10) unsigned DEFAULT NULL');
		$this->renameColumn('et_ophnuintraoperative_operationprep_version', 'patient_in_sulpine_position', 'patient_position_id');

		// Update existing values to match new values. Convert all previous "N/A" values to "Other".
		$this->update('et_ophnuintraoperative_operationprep',array('patient_position_id' => 1),'patient_position_id=0');
		$this->update('et_ophnuintraoperative_operationprep_version',array('patient_position_id' => 1),'patient_position_id=0');

		// Create FK reference.
		$this->addForeignKey(
			'ophnuintraoperative_patient_position_fk',
			'et_ophnuintraoperative_operationprep',
			'patient_position_id',
			'ophnuintraoperative_patient_position',
			'id'
		);

		// Add "other" patient position column.
		$this->addColumn('et_ophnuintraoperative_operationprep', 'other_patient_position', 'text COLLATE utf8_bin DEFAULT \'\'');
		$this->addColumn('et_ophnuintraoperative_operationprep_version', 'other_patient_position', 'text COLLATE utf8_bin DEFAULT \'\'');

		// Refresh schema cache.
		$this->refreshTableSchema('et_ophnuintraoperative_operationprep');
		$this->refreshTableSchema('et_ophnuintraoperative_operationprep_version');
	}

	public function down()
	{
		$this->dropColumn('et_ophnuintraoperative_operationprep', 'other_patient_position');
		$this->dropColumn('et_ophnuintraoperative_operationprep_version', 'other_patient_position');

		$this->dropForeignKey('ophnuintraoperative_patient_position_fk', 'et_ophnuintraoperative_operationprep');

		$this->update('et_ophnuintraoperative_operationprep',array('patient_position_id' => 0),'patient_position_id=1');
		$this->update('et_ophnuintraoperative_operationprep_version',array('patient_position_id' => 0),'patient_position_id=1');

		$this->renameColumn('et_ophnuintraoperative_operationprep_version', 'patient_position_id', 'patient_in_sulpine_position');
		$this->alterColumn('et_ophnuintraoperative_operationprep_version', 'patient_in_sulpine_position', 'tinyint(1) unsigned NOT NULL');

		$this->renameColumn('et_ophnuintraoperative_operationprep', 'patient_position_id', 'patient_in_sulpine_position');
		$this->alterColumn('et_ophnuintraoperative_operationprep', 'patient_in_sulpine_position', 'tinyint(1) unsigned NOT NULL');

		$this->dropTable('ophnuintraoperative_patient_position');
		$this->dropTable('ophnuintraoperative_patient_position_version');

		$this->refreshTableSchema('et_ophnuintraoperative_operationprep');
		$this->refreshTableSchema('et_ophnuintraoperative_operationprep_version');
	}
}