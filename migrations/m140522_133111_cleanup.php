<?php

class m140522_133111_cleanup extends CDbMigration
{
	public $stuff = array(
		'ophnuintraoperative_handoff_two_identifiers' => array(
			'name' => 'ophnuintraoperative_handoff_identifier',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
			),
		),
		'et_ophnuintraoperative_handoff_twoident_assignment' => array(
			'name' => 'ophnuintraoperative_handoff_identifiers',
			'keys' => array(
				'ohtia_lmui_fk' => array('last_modified_user_id','user','ophnuintraoperative_handoff_identifiers_lmui_fk'),
				'ophnuintraoperative_handoff_two_identifiers_assignment_cui_fk' => array('created_user_id','user','ophnuintraoperative_handoff_identifiers_cui_fk'),
				'ophnuintraoperative_handoff_two_identifiers_assignment_ele_fk' => array('element_id','et_ophnuintraoperative_handoff','ophnuintraoperative_handoff_identifiers_ele_fk'),
				'ophnuintraoperative_handoff_two_identifiers_assignment_lku_fk' => array('identifier_id','ophnuintraoperative_handoff_identifier','ophnuintraoperative_handoff_identifiers_lku_fk'),
			),
			'fields' => array(
				'ophnuintraoperative_handoff_two_identifiers_id' => 'identifier_id',
			),
		),
		'et_ophnuintraoperative_opprepadd_assignment' => array(
			'name' => 'ophnuintraoperative_operationprep_additionals',
			'keys' => array(
				'ooaa_lmui_fk' => array('last_modified_user_id','user','ophnuintraoperative_operationprep_additionals_lmui_fk'),
				'ooaa_cui_fk' => array('created_user_id','user','ophnuintraoperative_operationprep_additionals_cui_fk'),
				'ooaa_ele_fk' => array('element_id','et_ophnuintraoperative_operationprep','ophnuintraoperative_operationprep_additionals_ele_fk'),
				'ooaa_lku_fk' => array('additional_id','ophnuintraoperative_operationprep_additional','ophnuintraoperative_operationprep_additionals_lku_fk'),
			),
			'fields' => array(
				'ophnuintraoperative_operationprep_additional_id' => 'additional_id',
			),
		),
		'ophnuintraoperative_postop_dressing_items' => array(
			'name' => 'ophnuintraoperative_postop_dressing_item',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
			),
		),
		'et_ophnuintraoperative_postop_dressing_items_assignment' => array(
			'name' => 'ophnuintraoperative_postop_dressing_items',
			'keys' => array(
				'{table}_lmui_fk' => array('last_modified_user_id','user'),
				'{table}_cui_fk' => array('created_user_id','user'),
				'{table}_ele_fk' => array('element_id','et_ophnuintraoperative_postop'),
				'{table}_lku_fk' => array('dressing_item_id','ophnuintraoperative_postop_dressing_item'),
			),
			'fields' => array(
				'ophnuintraoperative_postop_dressing_items_id' => 'dressing_item_id',
			),
		),
	);

	public function up()
	{
		foreach ($this->stuff as $table => $params) {
			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$table,$key);
				} else {
					$key_name = 'et_'.$key;
				}

				$this->dropForeignKey($key_name,$table);
				$this->dropIndex($key_name,$table);
			}

			if (@$params['name']) {
				$target = @$params['name'];
			} else {
				$target = preg_replace('/^et_/','',$table);
			}

			$this->renameTable($table,$target);

			if (!empty($params['fields'])) {
				foreach ($params['fields'] as $from => $to) {
					$this->renameColumn($target,$from,$to);
				}
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$target,$key);
				} else {
					$key_name = $key;
				}
				if (isset($params['fields'][$key_params[0]])) {
					$field = $params['fields'][$key_params[0]];
				} else {
					$field = $key_params[0];
				}

				if (isset($key_params[2])) {
					$key_name = $key_params[2];
				}

				$this->createIndex($key_name,$target,$field);
				$this->addForeignKey($key_name,$target,$field,$key_params[1],'id');
			}
		}
	}

	public function down()
	{
		foreach (array_reverse($this->stuff) as $table => $params) {
			$target = $table;

			if (@$params['name']) {
				$table = $params['name'];
			} else {
				$table = preg_replace('/^et_/','',$table);
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$table,$key);
				} else {
					$key_name = $key;
				}

				if (isset($key_params[2])) {
					$key_name = $key_params[2];
				}

				$this->dropForeignKey($key_name,$table);
				$this->dropIndex($key_name,$table);
			}

			$this->renameTable($table,$target);

			if (!empty($params['fields'])) {
				foreach ($params['fields'] as $to => $from) {
					$this->renameColumn($target,$from,$to);
				}
			}

			foreach ($params['keys'] as $key => $key_params) {
				if (preg_match('/\{table\}/',$key)) {
					$key_name = str_replace('{table}',$target,$key);
				} else {
					$key_name = 'et_'.$key;
				}

				$field = $key_params[0];

				if (!empty($params['fields'])) {
					foreach ($params['fields'] as $k => $v) {
						if ($v == $key_params[0]) {
							$field = $k;
						}
					}
				}

				$this->createIndex($key_name,$target,$field);
				$this->addForeignKey($key_name,$target,$field,$key_params[1],'id');
			}
		}
	}
}
