<?php

class m140520_061508_fix_table_names extends CDbMigration
{
	public $tables = array(
		'et_ophnuintraoperative_handoff_two_identifiers_assignment' => 'et_ophnuintraoperative_handoff_twoident_assignment',
		'et_ophnuintraoperative_operationprep_additional_assignment' => 'et_ophnuintraoperative_opprepadd_assignment',
		'ophnuintraoperative_postop_procedures_performed_assignment' => 'ophnuintraoperative_ppppp_assignment',
	);

	public function up()
	{
		foreach ($this->tables as $from => $to) {
			$this->renameTable($from,$to);
		}
	}

	public function down()
	{
		foreach ($this->tables as $to => $from) {
			$this->renameTable($from,$to);
		}
	}
}
