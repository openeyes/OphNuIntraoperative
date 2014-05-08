<?php

class m140508_093203_element_name extends CDbMigration
{
	public function up()
	{
		$this->update('element_type',array('name'=>'Implant/prosthesis/scleral buckle'),"class_name = 'Element_OphNuIntraoperative_ImplantProsthesisScleral'");
	}

	public function down()
	{
		$this->update('element_type',array('name'=>'Implant prosthesis scleral'),"class_name = 'Element_OphNuIntraoperative_ImplantProsthesisScleral'");
	}
}
