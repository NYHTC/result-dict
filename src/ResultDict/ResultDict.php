<?php namespace App\Utilities;

use FMHash\FMHash;

class ResultDict {

	protected $hasher;

	public function __construct(FMHash $hasher) {
		$this->hasher = $hasher;
	}

	public function make($result, $desc = null)
	{
		return $this->hasher->make([
			'Result'              => $result,
			'ResultDescription'   => $desc
		]);
	}

	public function makeSuccess($desc = null)
	{
		return $this->make('Success', $desc);
	}

	public function makeError($desc = null)
	{
		if($desc === false) return $this->make('Error', 'unknown error');

		return $this->make('Error', $desc);
	}

}
