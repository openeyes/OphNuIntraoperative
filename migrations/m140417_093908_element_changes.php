<?php

class m140417_093908_element_changes extends CDbMigration
{
	public function up()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from('event_type')->where('class_name = :class_name',array(':class_name' => 'OphNuIntraoperative'))->queryRow();

		$display_order = 10;

		foreach ($this->dbConnection->createCommand()->select("*")->from("element_type")->where("event_type_id = :event_type_id",array(':event_type_id' => $event_type['id']))->queryAll() as $element_type) {
			$this->update('element_type',array('display_order' => $display_order),"id = {$element_type['id']}");
			$display_order += 10;
		}
	}

	public function down()
	{
		$event_type = $this->dbConnection->createCommand()->select("*")->from('event_type')->where('class_name = :class_name',array(':class_name' => 'OphNuIntraoperative'))->queryRow();

		$this->update('element_type',array('display_order' => 1),"event_type_id = {$event_type['id']}");
	}
}
