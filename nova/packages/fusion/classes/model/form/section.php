<?php
/**
 * Form Sections Model
 *
 * @package		Nova
 * @subpackage	Fusion
 * @category	Model
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */
 
namespace Fusion;

class Model_Form_Section extends \Model {
	
	public static $_table_name = 'form_sections';
	
	public static $_properties = array(
		'id' => array(
			'type' => 'int',
			'constraint' => 11,
			'auto_increment' => true),
		'form_key' => array(
			'type' => 'string',
			'constraint' => 20),
		'tab_id' => array(
			'type' => 'int',
			'constraint' => 11,
			'null' => true),
		'name' => array(
			'type' => 'string',
			'constraint' => 255,
			'null' => true),
		'order' => array(
			'type' => 'int',
			'constraint' => 5,
			'null' => true),
		'display' => array(
			'type' => 'tinyint',
			'constraint' => 1,
			'default' => 1),
		'updated_at' => array(
			'type' => 'bigint',
			'constraint' => 20,
			'null' => true),
	);

	/**
	 * Relationships
	 */
	public static $_belongs_to = array(
		'tab' => array(
			'model_to' => '\\Model_Form_Tab',
			'key_to' => 'id',
			'key_from' => 'tab_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	public static $_has_many = array(
		'fields' => array(
			'model_to' => '\\Model_Form_Field',
			'key_to' => 'section_id',
			'key_from' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	/**
	 * Observers
	 */
	protected static $_observers = array(
		'\\Form_Section' => array(
			'events' => array('before_delete', 'after_insert', 'after_update')
		),
		'\\Orm\\Observer_UpdatedAt' => array(
			'events' => array('before_save')
		),
	);

	public static function get_sections($key)
	{
		$items = static::find()->where('form_key', $key)->order_by('name', 'asc')->get();

		$sections = array();

		if (count($items) > 0)
		{
			foreach ($items as $sec)
			{
				$sections[$sec->id] = $sec->name;
			}
		}

		return $sections;
	}
}
