<?php

class m140507_160730_remove_dressing_boolean extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnuintraoperative_postop','dressing_used');
	}

	public function down()
	{
		$this->addColumn('et_ophnuintraoperative_postop','dressing_used','tinyint(1) unsigned not null');
	}
}
