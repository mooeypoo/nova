<?php
/**
 * Tour Model
 *
 * @package		Nova
 * @category	Models
 * @author		Anodyne Productions
 * @copyright	2011 Anodyne Productions
 * @version		3.0
 */
 
class Model_Tour extends Model {
	
	public static $_table_name = 'tour';
	
	public static $_properties = array(
		'id' => array(
			'type' => 'int',
			'constraint' => 5,
			'auto_increment' => true),
		'name' => array(
			'type' => 'string',
			'constraint' => 255,
			'default' => ''),
		'order' => array(
			'type' => 'int',
			'constraint' => 5),
		'display' => array(
			'type' => 'tinyint',
			'constraint' => 1,
			'default' => 1),
		'images' => array(
			'type' => 'text'),
		'summary' => array(
			'type' => 'text'),
		'spec_id' => array(
			'type' => 'int',
			'constraint' => 5),
	);
	
	public static $_belongs_to = array(
		'spec' => array(
			'model_to' => 'Model_Spec',
			'key_to' => 'id',
			'key_from' => 'spec_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);
	
	/**
	 * Create a tour item.
	 *
	 *     Model_Tour::create_item($data);
	 *
	 * @access	public
	 * @param	mixed	an array or object of data
	 * @return	object	the newly created item
	 */
	public static function create_item($data)
	{
		$item = static::create_item($data);
		
		/**
		 * Fill the rows for the dynamic form with blank data for editing later.
		 */
		$fields = Model_FormField::get_fields('tour');
		
		if (count($fields) > 0)
		{
			foreach ($fields as $f)
			{
				$field_data = array(
					'form_key' => 'tour',
					'field_id' => $f->id,
					'user_id' => 0,
					'character_id' => 0,
					'item_id' => $item->id,
					'value' => '',
					'updated_at' => Date::now(),
				);
				
				Model_FormData::create_data($field_data);
			}
		}
		
		return $item;
	}
}
