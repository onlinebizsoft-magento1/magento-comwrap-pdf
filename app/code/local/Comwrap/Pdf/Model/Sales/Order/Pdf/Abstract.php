<?php
/**
 * Class Comwrap_Pdf_Model_Sales_Order_Pdf_Abstract
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
 *
 * @license GPL 2.0
 * @package Comwrap/Pdf/Model
 * @author Thomas Spigel <tspigel@comwrap.com>
 * @version 1.0
 */
abstract class Comwrap_Pdf_Model_Sales_Order_Pdf_Abstract extends Mage_Sales_Model_Order_Pdf_Abstract
{
    const HANDLE_PREFIX = 'comwrap_pdf_';
    const BLOCK_PREFIX = 'comwrap.pdf.';

    var $_pdfType;
    var $_pdf;

    public function _construct()
    {
        $this->setPdfType($this->_pdfType);
        $this->setMainBlock(self::BLOCK_PREFIX . $this->getPdfType());
        $this->setMainHandle(self::HANDLE_PREFIX . $this->getPdfType());

        Mage::getSingleton('core/design_package')->setArea('frontend');
        Mage::app()->getLayout()->getUpdate()->load($this->getMainHandle());
        Mage::app()->getLayout()->generateXml();
        Mage::app()->getLayout()->generateBlocks();
        return $this;
    }


    /**
     * Backward compatibility for original PDF
     *
     * @param array $_requiredObjects
     * @return Comwrap_Pdf
     */
    public function getPdf($_requiredObjects = array())
    {
        $pdf = new Comwrap_Pdf();
        $this->_setPdf($pdf);

        /* @var $_block Comwrap_Pdf_Block_Invoice */

        $_block = Mage::app()->getLayout()->getBlock($this->getMainBlock());
        if(!$_block) $_block = Mage::app()->getLayout()->createBlock('comwrap_pdf/' . $this->getPdfType());
        $_block->setPdfType($this->getPdfType());
        $_block->setData($this->getPdfType(), $_requiredObjects);

        $pdf->pages = array($_block);
        return $pdf;
    }

    /**
     * Create new page and assign to PDF object
     *
     * @param  array $settings
     * @return Zend_Pdf_Page
     */
    public function newPage(array $settings = array())
    {
        Mage::throwException(Mage::helper('sales')->__('Not implemented.'));
    }
}
