<?php
require_once(Mage::getModuleDir('', 'Comwrap_Pdf') . '/lib/MPDF56/mpdf.php');

/**
 * Class Comwrap_Pdf_Model_Resource_Pdf
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * @license GPL 2.0
 * @package Comwrap/Pdf/Model
 * @author Thomas Spigel <tspigel@comwrap.com>
 * @version 1.0
 *
 * @method mPDF getPdf()
 * @method Comwrap_Pdf_Model_Resource_Pdf setPdf(mPDF $pdf)
 */
abstract class Comwrap_Pdf_Model_Resource_Abstract extends Mage_Core_Model_Abstract
{

	/**
	 * @return $this
	 */
	public function _construct()
	{
		//$this->_pdf = new mPDF('P', 'A4', '','', 30, 14, 14, 117);
		$_pdf = new mPDF('P', 'A4', '','', 5, 10, 5, 5);
		$_pdf->SetAutoFont();
		$this->setPdf($_pdf);
		return $this;
	}


	public function render($html)
	{
		$this->getPdf()->writeHTML($html);
		return $this->getPdf()->Output('', 'S');
	}

}
