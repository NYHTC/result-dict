<?php

namespace spec\FMResult;

use FMHash\FMHash;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class FMResultSpec extends ObjectBehavior
{
	function let(FMHash $hasher)
	{
		$this->beConstructedWith($hasher);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('FMResult\FMResult');
    }

    function it_returns_a_result_hash(FMHash $hasher)
    {
    	$hasher->hash(['Result' => 'foo', 'ResultDescription' => 'bar'])->shouldBeCalled();

    	$this->make('foo', 'bar');
    }

    function it_returns_a_success_hash(FMHash $hasher)
    {
		$hasher->hash(['Result' => 'Success', 'ResultDescription' => 'foo'])->shouldBeCalled();

    	$this->success('foo');
    }

    function it_returns_an_error_hash(FMHash $hasher)
    {
		$hasher->hash(['Result' => 'Error', 'ResultDescription' => 'foo'])->shouldBeCalled();

    	$this->error('foo');
    }

    function it_accepts_an_array_of_other_parameters(FMHash $hasher)
    {
		$hasher->hash(['Result' => 'foo', 'ResultDescription' => 'bar', 'baz' => 'buz'])->shouldBeCalled();

    	$this->make('foo', 'bar', ['baz' => 'buz']);
    }

    function it_accepts_an_array_of_other_parameters_for_success(FMHash $hasher)
    {
		$hasher->hash(['Result' => 'Success', 'ResultDescription' => 'foo', 'baz' => 'buz'])->shouldBeCalled();

    	$this->success('foo', ['baz' => 'buz']);
    }

    function it_accepts_an_array_of_other_parameters_for_error(FMHash $hasher)
    {
		$hasher->hash(['Result' => 'Error', 'ResultDescription' => 'foo', 'baz' => 'buz'])->shouldBeCalled();

    	$this->error('foo', ['baz' => 'buz']);
    }

    function it_returns_an_unknown_error_on_falsey_values(FMHash $hasher)
    {
    	$hasher->hash(['Result' => 'Error', 'ResultDescription' => 'unknown error'])->shouldBeCalled();

    	$this->error(false);
    }
}
