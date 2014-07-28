<?php

class m140728_134602_booking_event_link extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnuintraoperative_patientid','booking_event_id','int(10) unsigned null');
		$this->addColumn('et_ophnuintraoperative_patientid_version','booking_event_id','int(10) unsigned null');
		$this->addForeignKey('et_ophnuintraoperative_patientid_bei_fk','et_ophnuintraoperative_patientid','booking_event_id','event','id');
	}

	public function down()
	{
		$this->dropForeignKey('et_ophnuintraoperative_patientid_bei_fk','et_ophnuintraoperative_patientid');
		$this->dropColumn('et_ophnuintraoperative_patientid_version','booking_event_id');
		$this->dropColumn('et_ophnuintraoperative_patientid','booking_event_id');
	}
}
