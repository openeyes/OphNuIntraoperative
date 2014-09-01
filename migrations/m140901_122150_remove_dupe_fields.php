<?php

class m140901_122150_remove_dupe_fields extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnuintraoperative_personnel','who_timeout_completed');
		$this->dropForeignKey('et_ophnuintraoperative_personnel_time_out_lead_by_id_fk','et_ophnuintraoperative_personnel');
		$this->dropColumn('et_ophnuintraoperative_personnel','time_out_lead_by_id');
	}

	public function down()
	{
		$this->addColumn('et_ophnuintraoperative_personnel','time_out_lead_by_id','int(10) unsigned DEFAULT NULL');
		$this->addColumn('et_ophnuintraoperative_personnel','who_timeout_completed','tinyint(1) unsigned NOT NULL');
		$this->addForeignKey('et_ophnuintraoperative_personnel_time_out_lead_by_id_fk','et_ophnuintraoperative_personnel','time_out_lead_by_id','user','id');
	}
}
