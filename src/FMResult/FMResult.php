<?php

namespace FMResult;

use FMHash\FMHash;

class FMResult {

	/**
	 * key/value hasher
	 * @var FMHash
	 */
	protected $hasher;

	/**
	 * Instantiate the object
	 * @param FMHash $hasher
	 */
	public function __construct(FMHash $hasher) {
		$this->hasher = $hasher;
	}

	/**
	 * Make a result hash
	 * @param  string $result result type
	 * @param  string $desc   result description
	 * @param  array  $other  optional other parameters to include
	 * @return FMHash         hashed result
	 */
	public function make($result, $desc = null, $other = [])
	{
		return $this->hasher->hash(array_merge([
			'Result'              => $result,
			'ResultDescription'   => $desc
		], $other));
	}

	/**
	 * Make a success result hash
	 * @param  string $desc  result description
	 * @param  array  $other optional other parameters to include
	 * @return [type]        hashed result
	 */
	public function success($desc = null, $other = [])
	{
		return $this->make('Success', $desc, $other);
	}

	/**
	 * Make an error result hash
	 * @param  string $desc  result description
	 * @param  array  $other optional other parameters to include
	 * @return [type]        hashed result
	 */
	public function error($desc = null, $other = [])
	{
		if(!$desc) return $this->make('Error', 'unknown error');

		return $this->make('Error', $desc, $other);
	}

}
