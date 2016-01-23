<?php
/**
 * Author: Jesus Lozano
 * Date:   14/01/16
 * Time:   12:39 AM
 *
 * Reduce Eloquent Models by recursive merge into an array 
 * that only stores once its tag (column) next to all data (values) separated by commas.
 *
 * @example input:
 * {
 *	"data": {
 *		{
 *			"id": 1,
 *			"name": "Jesús Emanuel",
 *			"lastname": "Lozano Maltos"
 * 		},
 *		{
 *			"id": 2,
 *			"name": "Gilberto",
 *			"lastname": "Reyes Barrera"
 * 		}
 *  }
 * }
 *
 * @example output:
 * {
 *	"data": {
 *		{
 *			"id":[1, 2],
 *			"name": ["Jesús Emanuel", "Gilberto"],
 *			"lastname": ["Lozano Maltos", "Reyes Barrera"]
 * 		}
 *  }
 * }
 */

namespace JLozanoMaltos\JsonReducer;
use Illuminate\Database\Eloquent\Model;

class JsonReducer
{
  /**
  * Perform json reduce of model instance
  * 
  * @var Illuminate\Database\Eloquent\Model array
  * 
  * @return array
  */
  public static function reduce($data)
  {
	$merged_array = array();
	
	foreach ($data as $item)
	{
		if ($item instanceof Model) {
			$merged_array = array_merge_recursive($merged_array, $item->toArray());
		}
	}

	return $merged_array;
  }
}