<?php

class m140724_101823_remove_second_surgery_times extends OEMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnuintraoperative_timetracking', 'second_surgery_stop');
		$this->dropColumn('et_ophnuintraoperative_timetracking', 'second_surgery_start');

		$this->dropColumn('et_ophnuintraoperative_timetracking_version', 'second_surgery_stop');
		$this->dropColumn('et_ophnuintraoperative_timetracking_version', 'second_surgery_start');

		$this->refreshTableSchema('et_ophnuintraoperative_timetracking');
		$this->refreshTableSchema('et_ophnuintraoperative_timetracking_version');
	}

	public function down()
	{
		$this->addColumn('et_ophnuintraoperative_timetracking', 'second_surgery_stop', 'varchar(255) COLLATE utf8_bin DEFAULT \'\'');
		$this->addColumn('et_ophnuintraoperative_timetracking', 'second_surgery_start', 'varchar(255) COLLATE utf8_bin DEFAULT \'\'');

		$this->addColumn('et_ophnuintraoperative_timetracking_version', 'second_surgery_stop', 'varchar(255) COLLATE utf8_bin DEFAULT \'\'');
		$this->addColumn('et_ophnuintraoperative_timetracking_version', 'second_surgery_start', 'varchar(255) COLLATE utf8_bin DEFAULT \'\'');

		$this->refreshTableSchema('et_ophnuintraoperative_timetracking');
		$this->refreshTableSchema('et_ophnuintraoperative_timetracking_version');
	}
}