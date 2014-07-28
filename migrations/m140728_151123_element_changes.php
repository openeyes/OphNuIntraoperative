<?php

class m140728_151123_element_changes extends CDbMigration
{
	public function up()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :cn",array(":cn" => "OphNuIntraoperative"))->queryRow();

		$this->update('element_type',array('name' => 'Hand off from pre-op to OR'),"event_type_id = {$et['id']} and class_name = 'Element_OphNuIntraoperative_Handoff'");
	}

	public function down()
	{
		$et = $this->dbConnection->createCommand()->select("*")->from("event_type")->where("class_name = :cn",array(":cn" => "OphNuIntraoperative"))->queryRow();

		$this->update('element_type',array('name' => 'Handoff'),"event_type_id = {$et['id']} and class_name = 'Element_OphNuIntraoperative_Handoff'");
	}
}
