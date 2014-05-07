<?php

class m140507_175701_module_name extends CDbMigration
{
	public function up()
	{
		$this->update('event_type',array('name' => 'Nursing intra-operative record'),"class_name = 'OphNuIntraoperative'");
	}

	public function down()
	{
		$this->update('event_type',array('name' => 'Intraoperative'),"class_name = 'OphNuIntraoperative'");
	}
}
