<?php

class m140507_175121_implant_other_fields extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnuintraoperative_implantprosthesis','other','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperative_implantprosthesis','other_comments','text not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnuintraoperative_implantprosthesis','other');
		$this->dropColumn('et_ophnuintraoperative_implantprosthesis','other_comments');
	}
}
