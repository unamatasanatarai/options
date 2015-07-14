<?php namespace Unamatasanatarai\Options;
/**
 * Creates unique hash values for URL's
 * Based on the ID column
 */
use Illuminate\Database\Eloquent\Model;

class Option extends Model {

	protected $table    = 'options';
	protected $fillable = ['name', 'value'];

    public static function all($columns = ['*'])
    {
        $data = parent::all($columns);
        dd($data);
    }
}
