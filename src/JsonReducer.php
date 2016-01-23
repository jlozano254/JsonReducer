<?php
/*
 * This file is part of JsonReducer
 *
 * (c) Jesus Lozano <jesusemanuel.254@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JLozanoMaltos\JsonReducer;
use Illuminate\Database\Eloquent\Model;

class JsonReducer
{
  /**
  * Performs a merge operation over Model instances
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