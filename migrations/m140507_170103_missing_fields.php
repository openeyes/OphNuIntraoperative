<?php

class m140507_170103_missing_fields extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnuintraoperative_personnel','second_surgical_assistant_id','int(10) unsigned null');
		$this->createIndex('et_ophnuintraoperative_personnel_ssa_id_fk','et_ophnuintraoperative_personnel','second_surgical_assistant_id');
		$this->addForeignKey('et_ophnuintraoperative_personnel_ssa_id_fk','et_ophnuintraoperative_personnel','second_surgical_assistant_id','user','id');

		$this->addColumn('et_ophnuintraoperative_personnel','circulating_nurse_id','int(10) unsigned null');
		$this->createIndex('et_ophnuintraoperative_personnel_cni_id_fk','et_ophnuintraoperative_personnel','circulating_nurse_id');
		$this->addForeignKey('et_ophnuintraoperative_personnel_cni_id_fk','et_ophnuintraoperative_personnel','circulating_nurse_id','user','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophnuintraoperative_personnel_cni_id_fk','et_ophnuintraoperative_personnel');
		$this->dropIndex('et_ophnuintraoperative_personnel_cni_id_fk','et_ophnuintraoperative_personnel');
		$this->dropColumn('et_ophnuintraoperative_personnel','circulating_nurse_id');

		$this->dropForeignKey('et_ophnuintraoperative_personnel_ssa_id_fk','et_ophnuintraoperative_personnel');
		$this->dropIndex('et_ophnuintraoperative_personnel_ssa_id_fk','et_ophnuintraoperative_personnel');
		$this->dropColumn('et_ophnuintraoperative_personnel','second_surgical_assistant_id');
	}
}
