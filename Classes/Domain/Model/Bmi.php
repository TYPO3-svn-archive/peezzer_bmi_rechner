<?php
namespace PEEZZER\PeezzerBmiRechner\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 ***************************************************************/

/**
 *
 *
 * @package peezzer_bmi_rechner
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Bmi extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * height
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	protected $height;

	/**
	 * kg
	 *
	 * @var \integer
	 * @validate NotEmpty
	 */
	protected $kg;

	/**
	 * crdate
	 *
	 * @var \DateTime
	 */
	protected $crdate;

	/**
	 * Returns the height
	 *
	 * @return \integer $height
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Sets the height
	 *
	 * @param \integer $height
	 * @return void
	 */
	public function setHeight($height) {
		$this->height = $height;
	}

	/**
	 * Returns the kg
	 *
	 * @return \integer $kg
	 */
	public function getKg() {
		return $this->kg;
	}

	/**
	 * Sets the kg
	 *
	 * @param \integer $kg
	 * @return void
	 */
	public function setKg($kg) {
		$this->kg = $kg;
	}

	/**
	 * Returns the crdate
	 *
	 * @return \DateTime $crdate
	 */
	public function getCrdate() {
		return $this->crdate;
	}

	/**
	 * Sets the crdate
	 *
	 * @param \DateTime $crdate
	 * @return void
	 */
	public function setCrdate($crdate) {
		$this->crdate = $crdate;
	}

	/**
	 * gets the calculated BMI
	 *
	 * @return
	 */
	public function getBmi() {
		$h = intval($this->getHeight()); $h/=100;
		$w = intval($this->getKg());
		$ret = round(($w/($h*$h)), 2);
		$h*=100;
		return $ret;
	}

	/**
	 * gets the BMI Index; will use it to get the description
	 * from the language file
	 *
	 * @return
	 */
	public function getBmiIndex() {
		$bmi = $this->getBmi();
		if($bmi < 16.5) {
			return 1;
		} elseif($bmi >= 16.5 && $bmi < 18.5) {
			return 2;
		} elseif($bmi >= 18.5 && $bmi < 25) {
			return 3;
		} elseif($bmi >= 25 && $bmi < 30) {
			return 4;
		} elseif($bmi >= 30 && $bmi < 35) {
			return 5;
		} elseif($bmi >= 35 && $bmi < 40) {
			return 6;
		} elseif($bmi >= 40) {
			return 7;
		} else {
			return 0;
		}
	}

}
?>