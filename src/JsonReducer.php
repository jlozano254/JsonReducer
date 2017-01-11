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
use Illuminate\Support\Collection;

class JsonReducer
{
	/**
	 * Performs a merge operation over Model instances or Collections
	 *
	 * @var mixed $data
	 *
	 * @return array
	 */
  	public static function reduce($data)
	{
		$merged_array = array();

		if ($data instanceof Collection)
		{
			foreach ($data as $item) {
				$merged_array = array_merge_recursive($merged_array, $item->toArray());
			}
		}
		else
		{
			foreach ($data as $item)
			{
				$merged_array = (object) array_merge_recursive((array) $merged_array, (array) $item);
			}
		}

		return $merged_array;
	}
}
