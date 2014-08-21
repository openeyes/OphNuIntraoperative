<?php

class m140821_060335_element_changes extends OEMigration
{
	public function up()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :cn",array(":cn" => "OphNuIntraoperative"))->queryRow();

		$this->update('element_type',array('display_order' => 20),"class_name = 'Element_OphNuIntraoperative_PatientId'");
		$this->update('element_type',array('display_order' => 50, 'name' => 'Pre-incision', 'class_name' => 'Element_OphNuIntraoperative_PreIncision'),"class_name = 'Element_OphNuIntraoperative_OperationPrep'");
		$this->update('element_type',array('display_order' => 70),"class_name = 'Element_OphNuIntraoperative_SurgicalCounts'");
		$this->update('element_type',array('display_order' => 80, 'name' => 'Specimens', 'class_name' => 'Element_OphNuIntraoperative_Specimens'),"class_name = 'Element_OphNuIntraoperative_PostOp'");
		$this->update('element_type',array('display_order' => 100),"class_name = 'Element_OphNuIntraoperative_WHOSignOut'");

		foreach (array(
				'ophnuintraoperative_operationprep_grounding_pad_location',
				'ophnuintraoperative_operationprep_grounding_pad_side',
				'ophnuintraoperative_operationprep_incision_site',
				'ophnuintraoperative_operationprep_post_skin_assessment',
				'ophnuintraoperative_operationprep_prep_solution',
			) as $table) {

			$target = str_replace('_operationprep_','_preincision_',$table);

			$this->dropForeignKey($table.'_lmui_fk',$table);
			$this->dropForeignKey($table.'_cui_fk',$table);

			$this->renameTable($table,$target);
			$this->renameTable($table.'_version',$target.'_version');

			$this->addForeignKey($target.'_lmui_fk',$target,'last_modified_user_id','user','id');
			$this->addForeignKey($target.'_cui_fk',$target,'created_user_id','user','id');
		}

		$this->dropForeignKey('et_ophnuintraoperative_operationprep_cui_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('et_ophnuintraoperative_operationprep_ev_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('et_ophnuintraoperative_operationprep_lmui_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('ophnuintraoperative_operationprep_grounding_pad_location_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('ophnuintraoperative_operationprep_grounding_pad_side_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('ophnuintraoperative_operationprep_incision_site_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('ophnuintraoperative_operationprep_post_skin_assessment_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('ophnuintraoperative_operationprep_prep_solution_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('ophnuintraoperative_operationprep_viscoelastic_quantity_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('ophnuintraoperative_operationprep_viscoelastic_type_fk','et_ophnuintraoperative_operationprep');
		$this->dropForeignKey('ophnuintraoperative_patient_position_fk','et_ophnuintraoperative_operationprep');

		$this->renameTable('et_ophnuintraoperative_operationprep','et_ophnuintraoperative_preincision');
		$this->renameTable('et_ophnuintraoperative_operationprep_version','et_ophnuintraoperative_preincision_version');

		$this->addForeignKey('et_ophnuintraoperative_preincision_cui_fk','et_ophnuintraoperative_preincision','created_user_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_preincision_ev_fk','et_ophnuintraoperative_preincision','event_id','event','id');
		$this->addForeignKey('et_ophnuintraoperative_preincision_lmui_fk','et_ophnuintraoperative_preincision','last_modified_user_id','user','id');
		$this->addForeignKey('ophnuintraoperative_preincision_grounding_pad_location_fk','et_ophnuintraoperative_preincision','grounding_pad_location_id','ophnuintraoperative_preincision_grounding_pad_location','id');
		$this->addForeignKey('ophnuintraoperative_preincision_grounding_pad_side_fk','et_ophnuintraoperative_preincision','grounding_pad_side_id','ophnuintraoperative_preincision_grounding_pad_side','id');
		$this->addForeignKey('ophnuintraoperative_preincision_incision_site_fk','et_ophnuintraoperative_preincision','incision_site_id','ophnuintraoperative_preincision_incision_site','id');
		$this->addForeignKey('ophnuintraoperative_preincision_post_skin_assessment_fk','et_ophnuintraoperative_preincision','post_skin_assessment_id','ophnuintraoperative_preincision_post_skin_assessment','id');
		$this->addForeignKey('ophnuintraoperative_preincision_prep_solution_fk','et_ophnuintraoperative_preincision','prep_solution_id','ophnuintraoperative_preincision_prep_solution','id');
		$this->addForeignKey('ophnuintraoperative_patient_position_fk','et_ophnuintraoperative_preincision','patient_position_id','ophnuintraoperative_patient_position','id');

		foreach (array(
				'ophnuintraoperative_handoff_anaesthesia_type',
				'ophnuintraoperative_handoff_nonoperative_eye_protected',
				'ophnuintraoperative_handoff_tape_or_shield',
			) as $table) {

			if ($table == 'ophnuintraoperative_handoff_nonoperative_eye_protected') {
				$target = 'ophnuintraoperative_preincision_nonoperativeeyeprotected';
			} else {
				$target = str_replace('_handoff_','_preincision_',$table);
			}

			$this->dropForeignKey($table.'_cui_fk',$table);
			$this->dropForeignKey($table.'_lmui_fk',$table);

			$this->renameTable($table,$target);
			$this->renameTable($table.'_version',$target.'_version');

			$this->addForeignKey($target.'_cui_fk',$target,'created_user_id','user','id');
			$this->addForeignKey($target.'_lmui_fk',$target,'last_modified_user_id','user','id');
		}

		$this->addColumn('et_ophnuintraoperative_preincision','anesthesia_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision','nonoperative_eye_protected_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision','tape_or_shield_id','int(10) unsigned null');

		$this->addColumn('et_ophnuintraoperative_preincision_version','anesthesia_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision_version','nonoperative_eye_protected_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision_version','tape_or_shield_id','int(10) unsigned null');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperative_handoff")->queryAll() as $handoff) {
			$this->update('et_ophnuintraoperative_preincision',array(
				'anesthesia_type_id' => $handoff['anesthesia_type_id'],
				'nonoperative_eye_protected_id' => $handoff['nonoperative_eye_protected_id'],
				'tape_or_shield_id' => $handoff['tape_or_shield_id'],
			),"event_id = {$handoff['event_id']}");
		}

		$this->addForeignKey('et_ophnuintraoperative_preincision_anesthesia_type_id_fk','et_ophnuintraoperative_preincision','anesthesia_type_id','ophnuintraoperative_preincision_anaesthesia_type','id');
		$this->addForeignKey('et_ophnuintraoperative_preincision_noep_fk','et_ophnuintraoperative_preincision','nonoperative_eye_protected_id','ophnuintraoperative_preincision_nonoperativeeyeprotected','id');
		$this->addForeignKey('et_ophnuintraoperative_preincision_tos_fk','et_ophnuintraoperative_preincision','tape_or_shield_id','ophnuintraoperative_preincision_tape_or_shield','id');

		$this->dropForeignKey('et_ophnuintraoperative_handoff_anesthesia_type_id_fk','et_ophnuintraoperative_handoff');
		$this->dropForeignKey('ophnuintraoperative_handoff_nonoperative_eye_protected_fk','et_ophnuintraoperative_handoff');
		$this->dropForeignKey('ophnuintraoperative_handoff_tape_or_shield_fk','et_ophnuintraoperative_handoff');

		$this->dropColumn('et_ophnuintraoperative_handoff','anesthesia_type_id');
		$this->dropColumn('et_ophnuintraoperative_handoff','nonoperative_eye_protected_id');
		$this->dropColumn('et_ophnuintraoperative_handoff','tape_or_shield_id');

		$this->dropColumn('et_ophnuintraoperative_handoff_version','anesthesia_type_id');
		$this->dropColumn('et_ophnuintraoperative_handoff_version','nonoperative_eye_protected_id');
		$this->dropColumn('et_ophnuintraoperative_handoff_version','tape_or_shield_id');

		$this->addColumn('et_ophnuintraoperative_preincision','who_timeout_completed','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperative_preincision_version','who_timeout_completed','tinyint(1) unsigned not null');

		$this->addColumn('et_ophnuintraoperative_preincision','who_timeout_lead_by_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision_version','who_timeout_lead_by_id','int(10) unsigned null');
		$this->addForeignKey('et_ophnuintraoperative_preincision_wtlb_fk','et_ophnuintraoperative_preincision','who_timeout_lead_by_id','user','id');

		$this->dropColumn('et_ophnuintraoperative_preincision','viscoelastic');
		$this->dropColumn('et_ophnuintraoperative_preincision_version','viscoelastic');
		$this->dropColumn('et_ophnuintraoperative_preincision','viscoelastic_type_id');
		$this->dropColumn('et_ophnuintraoperative_preincision_version','viscoelastic_type_id');
		$this->dropColumn('et_ophnuintraoperative_preincision','viscoelastic_quantity_id');
		$this->dropColumn('et_ophnuintraoperative_preincision_version','viscoelastic_quantity_id');

		$this->dropTable('ophnuintraoperative_operationprep_viscoelastic_quantity');
		$this->dropTable('ophnuintraoperative_operationprep_viscoelastic_quantity_version');
		$this->dropTable('ophnuintraoperative_operationprep_viscoelastic_type');
		$this->dropTable('ophnuintraoperative_operationprep_viscoelastic_type_version');

		$this->dropTable('ophnuintraoperative_operationprep_additionals');
		$this->dropTable('ophnuintraoperative_operationprep_additionals_version');

		$this->dropTable('ophnuintraoperative_operationprep_additional');
		$this->dropTable('ophnuintraoperative_operationprep_additional_version');

		$this->insert('element_type',array(
			'name' => 'Closing',
			'class_name' => 'Element_OphNuIntraoperative_Closing',
			'event_type_id' => $et['id'],
			'display_order' => 85,
			'default' => 1,
			'required' => 1,
			'active' => 1,
		));

		$this->createTable('et_ophnuintraoperative_closing', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'dressing_other' => 'varchar(64) not null',
				'eyedrops_other' => 'varchar(64) not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperative_closing_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperative_closing_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperative_closing_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperative_closing_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_closing_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperative_closing_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('et_ophnuintraoperative_closing');

		$this->createTable('ophnuintraoperative_closing_dressing', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_closing_dressing_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_closing_dressing_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_closing_dressing_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_closing_dressing_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnuintraoperative_closing_dressing');

		$this->createTable('ophnuintraoperative_closing_dressing_assign', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'dressing_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_closing_dressing_assign_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_closing_dressing_assign_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperative_closing_dressing_assign_ele_fk` (`element_id`)',
				'KEY `ophnuintraoperative_closing_dressing_assign_dre_fk` (`dressing_id`)',
				'CONSTRAINT `ophnuintraoperative_closing_dressing_assign_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_closing_dressing_assign_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_closing_dressing_assign_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_closing` (`id`)',
				'CONSTRAINT `ophnuintraoperative_closing_dressing_assign_dre_fk` FOREIGN KEY (`dressing_id`) REFERENCES `ophnuintraoperative_closing_dressing` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnuintraoperative_closing_dressing_assign');

		$this->createTable('ophnuintraoperative_closing_eyedrops', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) NOT NULL',
				'display_order' => 'tinyint(1) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_closing_eyedrops_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_closing_eyedrops_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperative_closing_eyedrops_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_closing_eyedrops_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnuintraoperative_closing_eyedrops');

		$this->createTable('ophnuintraoperative_closing_eyedrops_assign', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'eyedrops_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperative_closing_eyedrops_assign_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperative_closing_eyedrops_assign_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperative_closing_eyedrops_assign_ele_fk` (`element_id`)',
				'KEY `ophnuintraoperative_closing_eyedrops_assign_dre_fk` (`eyedrops_id`)',
				'CONSTRAINT `ophnuintraoperative_closing_eyedrops_assign_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_closing_eyedrops_assign_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperative_closing_eyedrops_assign_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_closing` (`id`)',
				'CONSTRAINT `ophnuintraoperative_closing_eyedrops_assign_dre_fk` FOREIGN KEY (`eyedrops_id`) REFERENCES `ophnuintraoperative_closing_eyedrops` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->versionExistingTable('ophnuintraoperative_closing_eyedrops_assign');

		$this->dropForeignKey('et_ophnuintraoperative_postop_circulating_nurse_id_fk','et_ophnuintraoperative_postop');
		$this->dropForeignKey('et_ophnuintraoperative_postop_cui_fk','et_ophnuintraoperative_postop');
		$this->dropForeignKey('et_ophnuintraoperative_postop_ev_fk','et_ophnuintraoperative_postop');
		$this->dropForeignKey('et_ophnuintraoperative_postop_lmui_fk','et_ophnuintraoperative_postop');
		$this->dropForeignKey('et_ophnuintraoperative_postop_scrub_nurse_id_fk','et_ophnuintraoperative_postop');
		$this->dropForeignKey('ophnuintraoperative_postop_specimin_collected_fk','et_ophnuintraoperative_postop');

		$this->renameTable('et_ophnuintraoperative_postop','et_ophnuintraoperative_specimens');
		$this->renameTable('et_ophnuintraoperative_postop_version','et_ophnuintraoperative_specimens_version');

		$this->addForeignKey('et_ophnuintraoperative_specimens_cni_fk','et_ophnuintraoperative_specimens','circulating_nurse_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_specimens_cui_fk','et_ophnuintraoperative_specimens','created_user_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_specimens_ev_fk','et_ophnuintraoperative_specimens','event_id','event','id');
		$this->addForeignKey('et_ophnuintraoperative_specimens_lmui_fk','et_ophnuintraoperative_specimens','last_modified_user_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_specimens_sni_fk','et_ophnuintraoperative_specimens','scrub_nurse_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_specimens_sci_fk','et_ophnuintraoperative_specimens','specimin_collected_id','ophnuintraoperative_postop_specimin_collected','id');

		foreach (array(
				'ophnuintraoperative_postop_specimen_type',
				'ophnuintraoperative_postop_specimin_collected',
			) as $table) {
			$target = str_replace('_postop_','_specimens_',str_replace('specimin','specimen',$table));

			$this->dropForeignKey($table.'_lmui_fk',$table);
			$this->dropForeignKey($table.'_cui_fk',$table);

			$this->renameTable($table,$target);
			$this->renameTable($table.'_version',$target.'_version');

			$this->addForeignKey($target.'_lmui_fk',$target,'last_modified_user_id','user','id');
			$this->addForeignKey($target.'_cui_fk',$target,'created_user_id','user','id');
		}

		$this->dropForeignKey('ophnuintraoperative_postop_specimen_lmui_fk','ophnuintraoperative_postop_specimen');
		$this->dropForeignKey('ophnuintraoperative_postop_specimen_cui_fk','ophnuintraoperative_postop_specimen');
		$this->dropForeignKey('ophnuintraoperative_postop_specimen_ele_fk','ophnuintraoperative_postop_specimen');

		$this->renameTable('ophnuintraoperative_postop_specimen','ophnuintraoperative_specimens_specimen');
		$this->renameTable('ophnuintraoperative_postop_specimen_version','ophnuintraoperative_specimens_specimen_version');

		$this->addForeignKey('ophnuintraoperative_specimens_specimen_lmui_fk','ophnuintraoperative_specimens_specimen','last_modified_user_id','user','id');
		$this->addForeignKey('ophnuintraoperative_specimens_specimen_cui_fk','ophnuintraoperative_specimens_specimen','created_user_id','user','id');
		$this->addForeignKey('ophnuintraoperative_specimens_specimen_ele_fk','ophnuintraoperative_specimens_specimen','element_id','et_ophnuintraoperative_specimens','id');

		$this->delete('element_type',"class_name = 'Element_OphNuIntraoperative_ImplantProsthesisScleral'");

		$this->dropTable('et_ophnuintraoperative_implantprosthesis_version');
		$this->dropTable('et_ophnuintraoperative_implantprosthesis');

		$this->dropTable('ophnuintraoperative_implantprosthesis_iol_size_version');
		$this->dropTable('ophnuintraoperative_implantprosthesis_iol_size');

		$this->dropTable('ophnuintraoperative_implantprosthesis_iol_type_version');
		$this->dropTable('ophnuintraoperative_implantprosthesis_iol_type');

		$this->dropForeignKey('et_ophnuintraoperative_specimens_sci_fk','et_ophnuintraoperative_specimens');
		$this->dropForeignKey('et_ophnuintraoperative_specimens_cni_fk','et_ophnuintraoperative_specimens');
		$this->dropForeignKey('et_ophnuintraoperative_specimens_sni_fk','et_ophnuintraoperative_specimens');

		$this->dropColumn('et_ophnuintraoperative_specimens','specimin_collected_id');
		$this->dropColumn('et_ophnuintraoperative_specimens','circulating_nurse_id');
		$this->dropColumn('et_ophnuintraoperative_specimens','scrub_nurse_id');
		$this->dropColumn('et_ophnuintraoperative_specimens','dressing_other');

		$this->dropColumn('et_ophnuintraoperative_specimens_version','specimin_collected_id');
		$this->dropColumn('et_ophnuintraoperative_specimens_version','circulating_nurse_id');
		$this->dropColumn('et_ophnuintraoperative_specimens_version','scrub_nurse_id');
		$this->dropColumn('et_ophnuintraoperative_specimens_version','dressing_other');

		$this->initialiseData(dirname(__FILE__));
	}

	public function down()
	{
		$this->addColumn('et_ophnuintraoperative_specimens','specimin_collected_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_specimens','circulating_nurse_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_specimens','scrub_nurse_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_specimens','dressing_other','text');

		$this->addColumn('et_ophnuintraoperative_specimens_version','specimin_collected_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_specimens_version','circulating_nurse_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_specimens_version','scrub_nurse_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_specimens_version','dressing_other','text');

		$this->addForeignKey('et_ophnuintraoperative_specimens_sci_fk','et_ophnuintraoperative_specimens','specimin_collected_id','ophnuintraoperative_specimens_specimen_collected','id');
		$this->addForeignKey('et_ophnuintraoperative_specimens_cni_fk','et_ophnuintraoperative_specimens','circulating_nurse_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_specimens_sni_fk','et_ophnuintraoperative_specimens','scrub_nurse_id','user','id');

		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :cn",array(":cn" => "OphNuIntraoperative"))->queryRow();

		$this->execute("CREATE TABLE `ophnuintraoperative_implantprosthesis_iol_type` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnuintraoperative_implantprosthesis_iol_type_lmui_fk` (`last_modified_user_id`),
	KEY `ophnuintraoperative_implantprosthesis_iol_type_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnuintraoperative_implantprosthesis_iol_type');

		$this->execute("CREATE TABLE `ophnuintraoperative_implantprosthesis_iol_size` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnuintraoperative_implantprosthesis_iol_size_lmui_fk` (`last_modified_user_id`),
	KEY `ophnuintraoperative_implantprosthesis_iol_size_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_size_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_size_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnuintraoperative_implantprosthesis_iol_size');

		$this->execute("CREATE TABLE `et_ophnuintraoperative_implantprosthesis` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`intraocular_lens` tinyint(1) unsigned DEFAULT NULL,
	`iol_type_id` int(10) unsigned DEFAULT NULL,
	`iol_size_id` int(10) unsigned DEFAULT NULL,
	`iol_comments` text COLLATE utf8_bin,
	`ocular_sphere_ball` tinyint(1) unsigned DEFAULT NULL,
	`ocular_sphere_ball_comments` text COLLATE utf8_bin,
	`glaucoma_valve` tinyint(1) unsigned DEFAULT NULL,
	`glaucoma_valve_comments` text COLLATE utf8_bin,
	`lid_weights` tinyint(1) unsigned DEFAULT NULL,
	`lid_weight_comments` text COLLATE utf8_bin,
	`sutures` tinyint(1) unsigned DEFAULT NULL,
	`suture_comments` text COLLATE utf8_bin,
	`drains` tinyint(1) unsigned DEFAULT NULL,
	`drain_comments` text COLLATE utf8_bin,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`other` tinyint(1) unsigned DEFAULT NULL,
	`other_comments` text COLLATE utf8_bin NOT NULL,
	PRIMARY KEY (`id`),
	KEY `et_ophnuintraoperative_implantprosthesis_lmui_fk` (`last_modified_user_id`),
	KEY `et_ophnuintraoperative_implantprosthesis_cui_fk` (`created_user_id`),
	KEY `et_ophnuintraoperative_implantprosthesis_ev_fk` (`event_id`),
	KEY `ophnuintraoperative_implantprosthesis_iol_type_fk` (`iol_type_id`),
	KEY `ophnuintraoperative_implantprosthesis_iol_size_fk` (`iol_size_id`),
	CONSTRAINT `et_ophnuintraoperative_implantprosthesis_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `et_ophnuintraoperative_implantprosthesis_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `et_ophnuintraoperative_implantprosthesis_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_size_fk` FOREIGN KEY (`iol_size_id`) REFERENCES `ophnuintraoperative_implantprosthesis_iol_size` (`id`),
	CONSTRAINT `ophnuintraoperative_implantprosthesis_iol_type_fk` FOREIGN KEY (`iol_type_id`) REFERENCES `ophnuintraoperative_implantprosthesis_iol_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('et_ophnuintraoperative_implantprosthesis');

		$this->insert('element_type',array(
			'name' => 'Implant/prosthesis/scleral buckle',
			'class_name' => 'Element_OphNuIntraoperative_ImplantProsthesisScleral',
			'event_type_id' => $et['id'],
			'display_order' => 70,
			'default' => 1,
			'required' => 1,
			'active' => 1,
		));

		$this->dropForeignKey('ophnuintraoperative_specimens_specimen_lmui_fk','ophnuintraoperative_specimens_specimen');
		$this->dropForeignKey('ophnuintraoperative_specimens_specimen_cui_fk','ophnuintraoperative_specimens_specimen');
		$this->dropForeignKey('ophnuintraoperative_specimens_specimen_ele_fk','ophnuintraoperative_specimens_specimen');

		$this->renameTable('ophnuintraoperative_specimens_specimen','ophnuintraoperative_postop_specimen');
		$this->renameTable('ophnuintraoperative_specimens_specimen_version','ophnuintraoperative_postop_specimen_version');

		$this->addForeignKey('ophnuintraoperative_postop_specimen_lmui_fk','ophnuintraoperative_postop_specimen','last_modified_user_id','user','id');
		$this->addForeignKey('ophnuintraoperative_postop_specimen_cui_fk','ophnuintraoperative_postop_specimen','created_user_id','user','id');
		$this->addForeignKey('ophnuintraoperative_postop_specimen_ele_fk','ophnuintraoperative_postop_specimen','element_id','et_ophnuintraoperative_specimens','id');

		foreach (array(
				'ophnuintraoperative_postop_specimen_type',
				'ophnuintraoperative_postop_specimin_collected',
			) as $table) {
			$target = str_replace('_postop_','_specimens_',str_replace('specimin','specimen',$table));

			$this->dropForeignKey($target.'_lmui_fk',$target);
			$this->dropForeignKey($target.'_cui_fk',$target);

			$this->renameTable($target,$table);
			$this->renameTable($target.'_version',$table.'_version');

			$this->addForeignKey($table.'_lmui_fk',$table,'last_modified_user_id','user','id');
			$this->addForeignKey($table.'_cui_fk',$table,'created_user_id','user','id');
		} 

		$this->dropForeignKey('et_ophnuintraoperative_specimens_cni_fk','et_ophnuintraoperative_specimens');
		$this->dropForeignKey('et_ophnuintraoperative_specimens_cui_fk','et_ophnuintraoperative_specimens');
		$this->dropForeignKey('et_ophnuintraoperative_specimens_ev_fk','et_ophnuintraoperative_specimens');
		$this->dropForeignKey('et_ophnuintraoperative_specimens_lmui_fk','et_ophnuintraoperative_specimens');
		$this->dropForeignKey('et_ophnuintraoperative_specimens_sni_fk','et_ophnuintraoperative_specimens');
		$this->dropForeignKey('et_ophnuintraoperative_specimens_sci_fk','et_ophnuintraoperative_specimens');

		$this->renameTable('et_ophnuintraoperative_specimens','et_ophnuintraoperative_postop');
		$this->renameTable('et_ophnuintraoperative_specimens_version','et_ophnuintraoperative_postop_version');

		$this->addForeignKey('et_ophnuintraoperative_postop_circulating_nurse_id_fk','et_ophnuintraoperative_postop','circulating_nurse_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_postop_cui_fk','et_ophnuintraoperative_postop','created_user_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_postop_ev_fk','et_ophnuintraoperative_postop','event_id','event','id');
		$this->addForeignKey('et_ophnuintraoperative_postop_lmui_fk','et_ophnuintraoperative_postop','last_modified_user_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_postop_scrub_nurse_id_fk','et_ophnuintraoperative_postop','scrub_nurse_id','user','id');
		$this->addForeignKey('ophnuintraoperative_postop_specimin_collected_fk','et_ophnuintraoperative_postop','specimin_collected_id','ophnuintraoperative_postop_specimin_collected','id');

		$this->dropTable('ophnuintraoperative_closing_eyedrops_assign_version');
		$this->dropTable('ophnuintraoperative_closing_eyedrops_assign');

		$this->dropTable('ophnuintraoperative_closing_eyedrops_version');
		$this->dropTable('ophnuintraoperative_closing_eyedrops');

		$this->dropTable('ophnuintraoperative_closing_dressing_assign_version');
		$this->dropTable('ophnuintraoperative_closing_dressing_assign');

		$this->dropTable('ophnuintraoperative_closing_dressing_version');
		$this->dropTable('ophnuintraoperative_closing_dressing');

		$this->dropTable('et_ophnuintraoperative_closing_version');
		$this->dropTable('et_ophnuintraoperative_closing');

		$this->delete('element_type',"class_name = 'Element_OphNuIntraoperative_Closing'");

		$this->execute("CREATE TABLE `ophnuintraoperative_operationprep_additional` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`default` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnuintraoperative_operationprep_additional_lmui_fk` (`last_modified_user_id`),
	KEY `ophnuintraoperative_operationprep_additional_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnuintraoperative_operationprep_additional_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_operationprep_additional_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnuintraoperative_operationprep_additional');

		$this->execute("CREATE TABLE `ophnuintraoperative_operationprep_additionals` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`additional_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnuintraoperative_operationprep_additionals_lmui_fk` (`last_modified_user_id`),
	KEY `ophnuintraoperative_operationprep_additionals_cui_fk` (`created_user_id`),
	KEY `ophnuintraoperative_operationprep_additionals_ele_fk` (`element_id`),
	KEY `ophnuintraoperative_operationprep_additionals_lku_fk` (`additional_id`),
	CONSTRAINT `ophnuintraoperative_operationprep_additionals_lku_fk` FOREIGN KEY (`additional_id`) REFERENCES `ophnuintraoperative_operationprep_additional` (`id`),
	CONSTRAINT `ophnuintraoperative_operationprep_additionals_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_operationprep_additionals_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperative_preincision` (`id`),
	CONSTRAINT `ophnuintraoperative_operationprep_additionals_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnuintraoperative_operationprep_additionals');

		$this->execute("CREATE TABLE `ophnuintraoperative_operationprep_viscoelastic_quantity` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnuintraoperative_operationprep_viscoelastic_quantity_lmui_fk` (`last_modified_user_id`),
	KEY `ophnuintraoperative_operationprep_viscoelastic_quantity_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_quantity_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_quantity_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnuintraoperative_operationprep_viscoelastic_quantity');

		$this->execute("CREATE TABLE `ophnuintraoperative_operationprep_viscoelastic_type` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `ophnuintraoperative_operationprep_viscoelastic_type_lmui_fk` (`last_modified_user_id`),
	KEY `ophnuintraoperative_operationprep_viscoelastic_type_cui_fk` (`created_user_id`),
	CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_type_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `ophnuintraoperative_operationprep_viscoelastic_type_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");

		$this->versionExistingTable('ophnuintraoperative_operationprep_viscoelastic_type');

		$this->addColumn('et_ophnuintraoperative_preincision','viscoelastic_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision_version','viscoelastic_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision','viscoelastic_quantity_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision_version','viscoelastic_quantity_id','int(10) unsigned null');

		$this->addForeignKey('ophnuintraoperative_operationprep_viscoelastic_quantity_fk','et_ophnuintraoperative_preincision','viscoelastic_quantity_id','ophnuintraoperative_operationprep_viscoelastic_quantity','id');
		$this->addForeignKey('ophnuintraoperative_operationprep_viscoelastic_type_fk','et_ophnuintraoperative_preincision','viscoelastic_type_id','ophnuintraoperative_operationprep_viscoelastic_type','id');

		$this->addColumn('et_ophnuintraoperative_preincision','viscoelastic','tinyint(1) unsigned null');
		$this->addColumn('et_ophnuintraoperative_preincision_version','viscoelastic','tinyint(1) unsigned null');

		$this->dropForeignKey('et_ophnuintraoperative_preincision_wtlb_fk','et_ophnuintraoperative_preincision');
		$this->dropColumn('et_ophnuintraoperative_preincision','who_timeout_lead_by_id');
		$this->dropColumn('et_ophnuintraoperative_preincision_version','who_timeout_lead_by_id');

		$this->dropColumn('et_ophnuintraoperative_preincision','who_timeout_completed');
		$this->dropColumn('et_ophnuintraoperative_preincision_version','who_timeout_completed');

		$this->addColumn('et_ophnuintraoperative_handoff','anesthesia_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_handoff','nonoperative_eye_protected_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_handoff','tape_or_shield_id','int(10) unsigned null');

		$this->addColumn('et_ophnuintraoperative_handoff_version','anesthesia_type_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_handoff_version','nonoperative_eye_protected_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_handoff_version','tape_or_shield_id','int(10) unsigned null');

		$this->addForeignKey('et_ophnuintraoperative_handoff_anesthesia_type_id_fk','et_ophnuintraoperative_handoff','anesthesia_type_id','ophnuintraoperative_preincision_anaesthesia_type','id');
		$this->addForeignKey('ophnuintraoperative_handoff_nonoperative_eye_protected_fk','et_ophnuintraoperative_handoff','nonoperative_eye_protected_id','ophnuintraoperative_preincision_nonoperativeeyeprotected','id');
		$this->addForeignKey('ophnuintraoperative_handoff_tape_or_shield_fk','et_ophnuintraoperative_handoff','tape_or_shield_id','ophnuintraoperative_preincision_tape_or_shield','id');

		$this->dropForeignKey('et_ophnuintraoperative_preincision_anesthesia_type_id_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('et_ophnuintraoperative_preincision_noep_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('et_ophnuintraoperative_preincision_tos_fk','et_ophnuintraoperative_preincision');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperative_preincision")->queryAll() as $preincision) {
			$this->update('et_ophnuintraoperative_handoff',array(
				'anesthesia_type_id' => $preincision['anesthesia_type_id'],
				'nonoperative_eye_protected_id' => $preincision['nonoperative_eye_protected_id'],
				'tape_or_shield_id' => $preincision['tape_or_shield_id'],
			),"event_id = {$preincision['event_id']}");
		}

		$this->dropColumn('et_ophnuintraoperative_preincision','anesthesia_type_id');
		$this->dropColumn('et_ophnuintraoperative_preincision','nonoperative_eye_protected_id');
		$this->dropColumn('et_ophnuintraoperative_preincision','tape_or_shield_id');

		$this->dropColumn('et_ophnuintraoperative_preincision_version','anesthesia_type_id');
		$this->dropColumn('et_ophnuintraoperative_preincision_version','nonoperative_eye_protected_id');
		$this->dropColumn('et_ophnuintraoperative_preincision_version','tape_or_shield_id');

		foreach (array(
				'ophnuintraoperative_handoff_anaesthesia_type',
				'ophnuintraoperative_handoff_nonoperative_eye_protected',
				'ophnuintraoperative_handoff_tape_or_shield',
			) as $table) {

			if ($table == 'ophnuintraoperative_handoff_nonoperative_eye_protected') {
				$target = 'ophnuintraoperative_preincision_nonoperativeeyeprotected';
			} else {
				$target = str_replace('_handoff_','_preincision_',$table);
			}

			$this->dropForeignKey($target.'_cui_fk',$target);
			$this->dropForeignKey($target.'_lmui_fk',$target);

			$this->renameTable($target,$table);
			$this->renameTable($target.'_version',$table.'_version');

			$this->addForeignKey($table.'_cui_fk',$table,'created_user_id','user','id');
			$this->addForeignKey($table.'_lmui_fk',$table,'last_modified_user_id','user','id');
		}

		$this->dropForeignKey('et_ophnuintraoperative_preincision_cui_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('et_ophnuintraoperative_preincision_ev_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('et_ophnuintraoperative_preincision_lmui_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('ophnuintraoperative_preincision_grounding_pad_location_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('ophnuintraoperative_preincision_grounding_pad_side_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('ophnuintraoperative_preincision_incision_site_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('ophnuintraoperative_preincision_post_skin_assessment_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('ophnuintraoperative_preincision_prep_solution_fk','et_ophnuintraoperative_preincision');
		$this->dropForeignKey('ophnuintraoperative_patient_position_fk','et_ophnuintraoperative_preincision');

		$this->renameTable('et_ophnuintraoperative_preincision','et_ophnuintraoperative_operationprep');
		$this->renameTable('et_ophnuintraoperative_preincision_version','et_ophnuintraoperative_operationprep_version');

		$this->addForeignKey('et_ophnuintraoperative_operationprep_cui_fk','et_ophnuintraoperative_operationprep','created_user_id','user','id');
		$this->addForeignKey('et_ophnuintraoperative_operationprep_ev_fk','et_ophnuintraoperative_operationprep','event_id','event','id');
		$this->addForeignKey('et_ophnuintraoperative_operationprep_lmui_fk','et_ophnuintraoperative_operationprep','last_modified_user_id','user','id');
		$this->addForeignKey('ophnuintraoperative_operationprep_grounding_pad_location_fk','et_ophnuintraoperative_operationprep','grounding_pad_location_id','ophnuintraoperative_preincision_grounding_pad_location','id');
		$this->addForeignKey('ophnuintraoperative_operationprep_grounding_pad_side_fk','et_ophnuintraoperative_operationprep','grounding_pad_side_id','ophnuintraoperative_preincision_grounding_pad_side','id');
		$this->addForeignKey('ophnuintraoperative_operationprep_incision_site_fk','et_ophnuintraoperative_operationprep','incision_site_id','ophnuintraoperative_preincision_incision_site','id');
		$this->addForeignKey('ophnuintraoperative_operationprep_post_skin_assessment_fk','et_ophnuintraoperative_operationprep','post_skin_assessment_id','ophnuintraoperative_preincision_post_skin_assessment','id');
		$this->addForeignKey('ophnuintraoperative_operationprep_prep_solution_fk','et_ophnuintraoperative_operationprep','prep_solution_id','ophnuintraoperative_preincision_prep_solution','id');
		$this->addForeignKey('ophnuintraoperative_patient_position_fk','et_ophnuintraoperative_operationprep','patient_position_id','ophnuintraoperative_patient_position','id');

		foreach (array(
				'ophnuintraoperative_operationprep_grounding_pad_location',
				'ophnuintraoperative_operationprep_grounding_pad_side',
				'ophnuintraoperative_operationprep_incision_site',
				'ophnuintraoperative_operationprep_post_skin_assessment',
				'ophnuintraoperative_operationprep_prep_solution',
			) as $table) {

			$target = str_replace('_operationprep_','_preincision_',$table);

			$this->dropForeignKey($target.'_lmui_fk',$target);
			$this->dropForeignKey($target.'_cui_fk',$target);

			$this->renameTable($target,$table);
			$this->renameTable($target.'_version',$table.'_version');

			$this->addForeignKey($table.'_lmui_fk',$table,'last_modified_user_id','user','id');
			$this->addForeignKey($table.'_cui_fk',$table,'created_user_id','user','id');
		}

		$this->update('element_type',array('display_order' => 10),"class_name = 'Element_OphNuIntraoperative_PatientId'");
		$this->update('element_type',array('display_order' => 60, 'name' => 'Operation prep', 'class_name' => 'Element_OphNuIntraoperative_OperationPrep'),"class_name = 'Element_OphNuIntraoperative_PreIncision'");
		$this->update('element_type',array('display_order' => 50),"class_name = 'Element_OphNuIntraoperative_SurgicalCounts'");
		$this->update('element_type',array('display_order' => 80, 'name' => 'Post op', 'class_name' => 'Element_OphNuIntraoperative_PostOp'),"class_name = 'Element_OphNuIntraoperative_Specimens'");
		$this->update('element_type',array('display_order' => 90),"class_name = 'Element_OphNuIntraoperative_WHOSignOut'");
	}
}
