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
	public function actionEditClosingDressing()
	{
		$this->genericAdmin('Dressing','OphNuIntraoperative_Closing_Dressing');
	}

	public function actionEditClosingEyedrops()
	{
		$this->genericAdmin('Eyedrops','OphNuIntraoperative_Closing_Eyedrops');
	}

	public function actionEditPreIncisionAnaesthesiaType()
	{
		$this->genericAdmin('Anesthesia types','OphNuIntraoperative_PreIncision_Anaesthesia_Type');
	}

	public function actionEditPreIncisionGroundingPadLocation()
	{
		$this->genericAdmin('Grounding pad locations','OphNuIntraoperative_PreIncision_GroundingPadLocation');
	}

	public function actionEditPreIncisionGroundingPadSide()
	{
		$this->genericAdmin('Grounding pad sides','OphNuIntraoperative_PreIncision_GroundingPadSide');
	}

	public function actionEditPreIncisionIncisionSites()
	{
		$this->genericAdmin('Incision sites','OphNuIntraoperative_PreIncision_IncisionSite');
	}

	public function actionEditPreIncisionPatientPosition()
	{
		$this->genericAdmin('Patient positions','OphNuIntraoperative_PreIncision_PatientPosition');
	}

	public function actionEditPreIncisionPostSkinAssessment()
	{
		$this->genericAdmin('Skin assessments','OphNuIntraoperative_PreIncision_PostSkinAssessment');
	}

	public function actionEditPreIncisionPrepSolution()
	{
		$this->genericAdmin('Prep solutions','OphNuIntraoperative_PreIncision_PrepSolution');
	}

	public function actionEditSurgicalCountsCountItemType()
	{
		$this->genericAdmin('Count item types','OphNuIntraoperative_SurgicalCounts_CountItemType');
	}

	public function actionEditWHOEquipmentProblems()
	{
		$this->genericAdmin('WHO equipment problems','OphNuIntraoperative_WHOSignOut_EquipmentProblems');
	}

	public function actionEditWHOInstructions()
	{
		$this->genericAdmin('WHO instructions','OphNuIntraoperative_WHOSignOut_InstructionsProvided');
	}

	public function actionEditWHOLabelling()
	{
		$this->genericAdmin('WHO labelling','OphNuIntraoperative_WHOSignOut_Labelling');
	}
}
