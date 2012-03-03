<?php

/*
 * This file is part of the CCDN CommonBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNComponent\CommonBundle\Component;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class BinSIUnits
{
	// constants defining SIUnits indexes
	const B 	= 0;
	const KiB 	= 1;
	const MiB 	= 2;
	const GiB 	= 3;
	const TiB 	= 4;
	const PiB 	= 5;
	const EiB 	= 6;
	const ZiB 	= 7;
	const YiB 	= 8;



	protected $SIUnits = array('b', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB');
	//protected $SIPowers = array(3, 6, 9, 12, 15, 18, 21, 24); // from KiB to YiB



	/**
	 *
	 * @access public
	 * @param string $size
	 * @return int $bpow
	 */
	public function matchSIUnitFromValue($size)
	{
		$bpow = null;
		
		// attempt to extract the unit size.
		$sUnit = substr($size, (strlen($size) - 3), 3);
		
		// compare unit size for a reference of SIUnits
		foreach($this->SIUnits as $index => $unit)
		{
			// compare to size-unit
			if ($unit == $sUnit)
			{
				$bpow = $index;
				break;
			}
		}
		
		// if not SIUnits were matched, assume the $size is in bytes (b:0)
		if ( ! $bpow)
		{
			$bpow = 0;
		}
		
		return $bpow;		
	}



	/**
	 *
	 * @access public
	 * @param string $fUnit
	 * @return int $bpow
	 */
	public function matchSIUnit($fUnit)
	{
		$bpow = null;
		
		// compare unit size for a reference of SIUnits
		foreach($this->SIUnits as $index => $unit)
		{
			// compare to format-unit
			if ($unit === $fUnit)
			{
				$bpow = $index;
				break;
			}
		}	
		
		// if not SIUnits were matched, assume the $size is in bytes (b:0)
		if ( ! $bpow)
		{
			$bpow = 0;
		}
		
		return $bpow;
		
/*		if (array_key_exists($fUnit, $this->SIUnits))
		{
			return $fUnit;
		} else {
			return 0;
		}*/
	}



	/**
	 *
	 * @access public
	 * @param int $bytes
	 * @return string $result
	 */
	public function bytesToSIUnit($bytes)
	{
		// get kb value
		$bpow = floor(log($bytes, 1024));
		
		// use kb value to work out size
		$result = round($bytes / pow(1024, $bpow), ($bpow >= 1) ? 2 : 0) . $this->SIUnits[$bpow];
		
		return $result;
	}
	
	
	
	/**
	 *
	 * @access public
	 * @param string $size, int $bpow
	 * @return int $result
	 */
	public function getBytesFromSIUnit($size, $bpow)
	{
		$result = $size;
		
		for ($iter = 0; $iter < $bpow; $iter++)
		{
			$result = $result * 1024;
		}
		
		return $result;
	}	

	
	
	/**
	 *
	 * @access public
	 * @param string $size, string $format
	 * @return string $result
	 */
	public function formatToSIUnit($size, $format, $incUnit)
	{
		// precautionarily strip any white space.
		$tSize = trim($size);
		
		// get the SIUnit of this figure.
		$sUnit = $this->matchSIUnitFromValue($tSize);

		// get the number of bytes for a universal format to work on.
		$bytes = $this->getBytesFromSIUnit(preg_replace('/[^0-9.]/', '', $tSize), $sUnit);
		
		if ( ! $format)
		{
			// work out what the proper unit of measures power is for this many $bytes
			$fUnit = floor(log($bytes, 1024));
		} else {
			// match the unit of measures power belonging to the requested $format.	
			if (is_numeric($format))
			{
				if (array_key_exists($format, $this->SIUnits))
				{
					$fUnit = $format;
				} else {
					$fUnit = 0;
				}		
			} else {
				$fUnit = $this->matchSIUnit($format);
			}
		}
		
		// use kb value to work out size
		$result = round($bytes / pow(1024, $fUnit), ($fUnit >= 1) ? 2 : 0) . (($incUnit) ? $this->SIUnits[$fUnit] : '');
		
		return $result;
	}
	
}