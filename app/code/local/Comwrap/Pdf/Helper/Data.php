<?php
/**
 * Class Comwrap_Pdf_Helper_Data
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
 * @package Comwrap/Pdf/Helper
 * @author Thomas Spigel <tspigel@comwrap.com>
 * @version 1.0
 */
class Comwrap_Pdf_Helper_Data extends Mage_Core_Helper_Abstract {
    public function getQtyString($i) {
        if ($i > 1) {
            return (int)$i . " x ";
        } else {
            return "";
        }
    }
}