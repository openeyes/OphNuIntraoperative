<?php

class m140520_062757_version_tables extends OEMigration
{
	public $tables = array(
		'et_ophnuintraoperative_handoff',
		'et_ophnuintraoperative_handoff_twoident_assignment',
		'et_ophnuintraoperative_implantprosthesis',
		'et_ophnuintraoperative_items',
		'et_ophnuintraoperative_operationprep',
		'et_ophnuintraoperative_opprepadd_assignment',
		'et_ophnuintraoperative_personnel',
		'et_ophnuintraoperative_postop',
		'et_ophnuintraoperative_postop_dressing_items_assignment',
		'et_ophnuintraoperative_surgicalcounts',
		'et_ophnuintraoperative_timetracking',
		'ophnuintraoperative_handoff_anaesthesia_type',
		'ophnuintraoperative_handoff_nonoperative_eye_protected',
		'ophnuintraoperative_handoff_tape_or_shield',
		'ophnuintraoperative_handoff_two_identifiers',
		'ophnuintraoperative_implantprosthesis_iol_size',
		'ophnuintraoperative_implantprosthesis_iol_type',
		'ophnuintraoperative_operationprep_additional',
		'ophnuintraoperative_operationprep_grounding_pad_location',
		'ophnuintraoperative_operationprep_grounding_pad_side',
		'ophnuintraoperative_operationprep_incision_site',
		'ophnuintraoperative_operationprep_post_skin_assessment',
		'ophnuintraoperative_operationprep_prep_solution',
		'ophnuintraoperative_operationprep_viscoelastic_quantity',
		'ophnuintraoperative_operationprep_viscoelastic_type',
		'ophnuintraoperative_postop_dressing_items',
		'ophnuintraoperative_postop_proc_defaults',
		'ophnuintraoperative_ppppp_assignment',
		'ophnuintraoperative_postop_specimin_collected',
	);

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->versionExistingTable($table);
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropTable($table.'_version');
		}
	}
}
