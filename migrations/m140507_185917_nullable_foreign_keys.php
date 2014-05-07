<?php

class m140507_185917_nullable_foreign_keys extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnuintraoperative_handoff','hand_off_from_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_handoff','hand_off_to_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_handoff','anesthesia_type_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_handoff','nonoperative_eye_protected_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_operationprep','incision_site_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_operationprep','prep_solution_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_personnel','surgeon_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_personnel','scrub_nurse_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_personnel','surgical_assistant_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_personnel','anesthesiologist_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_personnel','anesthetic_assistant_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_personnel','time_out_lead_by_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_postop','specimin_collected_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_postop','circulating_nurse_id','int(10) unsigned null');
		$this->alterColumn('et_ophnuintraoperative_postop','scrub_nurse_id','int(10) unsigned null');
	}

	public function down()
	{
    $this->alterColumn('et_ophnuintraoperative_handoff','hand_off_from_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_handoff','hand_off_to_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_handoff','anesthesia_type_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_handoff','nonoperative_eye_protected_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_operationprep','incision_site_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_operationprep','prep_solution_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_personnel','surgeon_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_personnel','scrub_nurse_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_personnel','surgical_assistant_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_personnel','anesthesiologist_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_personnel','anesthetic_assistant_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_personnel','time_out_lead_by_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_postop','specimin_collected_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_postop','circulating_nurse_id','int(10) unsigned not null');
    $this->alterColumn('et_ophnuintraoperative_postop','scrub_nurse_id','int(10) unsigned not null');
	}
}
