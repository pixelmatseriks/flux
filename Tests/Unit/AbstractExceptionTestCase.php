<?php
namespace FluidTYPO3\Flux\Tests\Unit;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Claus Due <claus@namelesscoder.net>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

use FluidTYPO3\Flux\Tests\Unit\AbstractTestCase;

/**
 * @package Flux
 */
abstract class AbstractExceptionTestCase extends AbstractTestCase {

	/**
	 * @test
	 */
	public function canBeCreatedUsingConstructor() {
		$message = 'message';
		$code = 123;
		$class = $this->createInstanceClassName();
		$instance = new $class($message, $code);
		$this->assertEquals($message, $instance->getMessage());
		$this->assertEquals($code, $instance->getCode());
	}

	/**
	 * @test
	 */
	public function supportsPreviousException() {
		$message = 'message';
		$code = 123;
		$previous = new \Exception('previous');
		$class = $this->createInstanceClassName();
		$instance = new $class($message, $code, $previous);
		$this->assertEquals($message, $instance->getMessage());
		$this->assertEquals($code, $instance->getCode());
		$this->assertSame($previous, $instance->getPrevious());
	}

}
