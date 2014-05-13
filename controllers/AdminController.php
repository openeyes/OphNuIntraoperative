<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

class AdminController extends ModuleAdminController
{
	public function actionEditAnesthesiaType()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Anesthesia type',
			'model' => 'OphNuIntraoperative_Handoff_Anaesthesia_Type',
		));
	}

	public function actionEditIncisionSite()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Incision site',
			'model' => 'OphNuIntraoperative_OperationPrep_IncisionSite',
		));
	}

	public function actionEditPrepDone()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Operation prep done',
			'model' => 'OphNuIntraoperative_OperationPrep_PrepSolution',
		));
	}

	public function actionEditPrepAdditional()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Operation prep additional',
			'model' => 'OphNuIntraoperative_OperationPrep_Additional',
		));
	}

	public function actionEditIOLType()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'IOL type',
			'model' => 'OphNuIntraoperative_ImplantProsthesisScleral_IolType',
		));
	}

	public function actionEditIOLSize()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'IOL size',
			'model' => 'OphNuIntraoperative_ImplantProsthesisScleral_IolSize',
		));
	}

	public function actionEditPostOpDressing()
	{
		$this->render('//admin/generic_admin',array(
			'title' => 'Post-op dressing',
			'model' => 'OphNuIntraoperative_PostOp_DressingItems',
		));
	}
}
