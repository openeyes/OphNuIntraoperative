<?php
/**
 * openeyes
 *
 * (c) moorfields eye hospital nhs foundation trust, 2008-2013
 * (c) openeyes foundation, 2011-2013
 * this file is part of openeyes.
 * openeyes is free software: you can redistribute it and/or modify it under the terms of the gnu general public license as published by the free software foundation, either version 3 of the license, or (at your option) any later version.
 * openeyes is distributed in the hope that it will be useful, but without any warranty; without even the implied warranty of merchantability or fitness for a particular purpose. see the gnu general public license for more details.
 * you should have received a copy of the gnu general public license along with openeyes in a file titled copying. if not, see <http://www.gnu.org/licenses/>.
 *
 * @package openeyes
 * @link http://www.openeyes.org.uk
 * @author openeyes <info@openeyes.org.uk>
 * @copyright copyright (c) 2008-2011, moorfields eye hospital nhs foundation trust
 * @copyright copyright (c) 2011-2013, openeyes foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html the gnu general public license v3.0
 */
?>
<div class="row field-row">
	<div class="large-12 column">
		<div class="element-fields">
			<div class="row field-row">
				<div class="large-3 column">
					<label>
						Operation details:
					</labe>
				</div>
				<div class="large-9 column end">
					<table>
						<tr>
							<th>Booking date</th>
							<th>Procedure(s)</th>
							<th>Eye</th>
						</tr>
						<tr>
							<td><?php echo $operation->booking->session->NHSDate('date')?></td>
							<td>
								<?php foreach ($operation->procedures as $i => $procedure) {
									if ($i >0) { echo "<br/>"; }
									echo $procedure->term;
								}?>
							</td>
							<td>
								<?php echo $operation->eye->name?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
