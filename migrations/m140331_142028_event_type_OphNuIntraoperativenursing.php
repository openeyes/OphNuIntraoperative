<?php 
class m140331_142028_event_type_OphNuIntraoperativenursing extends CDbMigration
{
	public function up()
	{
		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuIntraoperativenursing', 'name' => 'Intraoperativenursing','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'WHO Time Out',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'WHO Time Out','class_name' => 'Element_OphNuIntraoperativenursing_WhoTimeOut', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'WHO Time Out'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'WHO Sign Out',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'WHO Sign Out','class_name' => 'Element_OphNuIntraoperativenursing_WhoSignOut', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'WHO Sign Out'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Time Tracking',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Time Tracking','class_name' => 'Element_OphNuIntraoperativenursing_TimeTracking', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Time Tracking'))->queryRow();



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraoperativenursin_whotimeout', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperativenursin_whotimeout_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperativenursin_whotimeout_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperativenursin_whotimeout_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_whotimeout_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_whotimeout_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_whotimeout_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraoperativenursin_whosignout', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperativenursin_whosignout_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperativenursin_whosignout_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperativenursin_whosignout_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_whosignout_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_whosignout_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_whosignout_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraoperativenursin_timetrackin', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'patient_enters_or' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Patient Enters OR
				'time_out' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Time Out
				'surgery_start' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Surgery Start
				'second_surgery_start' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Second Surgery Start
				'surgery_stop' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Surgery Stop
				'second_surgery_stop' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Second Surgery Stop
				'sign_out' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Sign Out
				'patient_leaves_or' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Patient Leaves OR
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperativenursin_timetrackin_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperativenursin_timetrackin_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperativenursin_timetrackin_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_timetrackin_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_timetrackin_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_timetrackin_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophnuintraoperativenursin_whotimeout');



		$this->dropTable('et_ophnuintraoperativenursin_whosignout');



		$this->dropTable('et_ophnuintraoperativenursin_timetrackin');




		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphNuIntraoperativenursing does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}

