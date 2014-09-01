<?php

class m140901_131759_version_table_consistency extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnuintraoperative_personnel_version','who_timeout_completed');
		$this->dropColumn('et_ophnuintraoperative_personnel_version','time_out_lead_by_id');
	}

	public function down()
	{
		$this->addColumn('et_ophnuintraoperative_personnel_version','time_out_lead_by_id','int(10) unsigned DEFAULT NULL');
		$this->addColumn('et_ophnuintraoperative_personnel_version','who_timeout_completed','tinyint(1) unsigned NOT NULL');
	}
}
