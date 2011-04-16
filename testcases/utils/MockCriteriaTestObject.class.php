<?php
class MockCriteriaTestObject
{
	public function sum($a, $b) {
		return $a + $b;
	}
	
	public function sub($a, $b) {
		return $a - $b;
	}
	
	public function div($a, $b) {
		if ($b == 0) {
			throw new Exception('Can\'t dive by zero');
		}
		return $a / $b;
	}
}
?>