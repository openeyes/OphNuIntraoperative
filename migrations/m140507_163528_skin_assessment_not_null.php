<?php

class m140507_163528_skin_assessment_not_null extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnuintraoperative_operationprep','post_skin_assessment_id','int(10) unsigned null');
	}

	public function down()
	{
		$this->alterColumn('et_ophnuintraoperative_operationprep','post_skin_assessment_id','int(10) unsigned not null');
	}
}
