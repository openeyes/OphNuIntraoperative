<?php

class m140508_074745_nullable_fields extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnuintraoperative_surgicalcounts','count_discrepancies','tinyint(1) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_operationprep','viscoelastic','tinyint(1) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_operationprep','grounding_pad','tinyint(1) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_operationprep','nasal_throat_pack','tinyint(1) unsigned null');

		foreach (array('intraocular_lens','ocular_sphere_ball','glaucoma_valve','lid_weights','sutures','drains','other') as $field) {
			$this->alterColumn('et_ophnuintraoperative_implantprosthesis',$field,'tinyint(1) unsigned null');
		}
	}

	public function down()
	{
		$this->alterColumn('et_ophnuintraoperative_surgicalcounts','count_discrepancies','tinyint(1) unsigned not null');
		$this->alterColumn('et_ophnuintraoperative_operationprep','viscoelastic','tinyint(1) unsigned not null');
		$this->alterColumn('et_ophnuintraoperative_operationprep','grounding_pad','tinyint(1) unsigned not null');
		$this->alterColumn('et_ophnuintraoperative_operationprep','nasal_throat_pack','tinyint(1) unsigned not null');

		foreach (array('intraocular_lens','ocular_sphere_ball','glaucoma_valve','lid_weights','sutures','drains','other') as $field) {
			$this->alterColumn('et_ophnuintraoperative_implantprosthesis',$field,'tinyint(1) unsigned not null');
		}
	}
}
