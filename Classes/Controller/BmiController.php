<?php
namespace PEEZZER\PeezzerBmiRechner\Controller;

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
class BmiController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * bmiRepository
	 *
	 * @var \PEEZZER\PeezzerBmiRechner\Domain\Repository\BmiRepository
	 * @inject
	 */
	protected $bmiRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		//$bmis = $this->bmiRepository->findAll();
		$bmis = $this->bmiRepository->getData();
		print "<pre>";print_r($all);print "</pre>";
		$this->view->assign('bmis', $bmis);
	}

	/**
	 * action new
	 *
	 * @param \PEEZZER\PeezzerBmiRechner\Domain\Model\Bmi $newBmi
	 * @dontvalidate $newBmi
	 * @return void
	 */
	public function newAction(\PEEZZER\PeezzerBmiRechner\Domain\Model\Bmi $newBmi = NULL) {
		$this->view->assign('newBmi', $newBmi);
	}

	/**
	 * action create
	 *
	 * @param \PEEZZER\PeezzerBmiRechner\Domain\Model\Bmi $newBmi
	 * @return void
	 */
	public function createAction(\PEEZZER\PeezzerBmiRechner\Domain\Model\Bmi $newBmi) {
		$this->bmiRepository->add($newBmi);
		//$this->flashMessageContainer->add('Your new Bmi was created.');
		//$this->redirect('list');
		$this->view->assign('bmi', $newBmi);
	}

}
?>