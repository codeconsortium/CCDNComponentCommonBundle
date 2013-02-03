CCDNComponent CommonBundle README.
==================================

  
## Notes:  
  
This bundle is for the symfony framework and requires Symfony 2.1.x and PHP 5.4
  
This project uses Doctrine 2.1.x and so does not require any specific database.
  

This file is part of the CCDNComponent CommonBundle

(c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 

Available on github <http://www.github.com/codeconsortium/>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

Icons courtesy of http://pc.de/icons/ licensed under http://creativecommons.org/licenses/by/3.0/
Theme and Sprite graphics courtesy of [twitter bootstrap](http://twitter.github.com/bootstrap/index.html) and [GLYPHICONS](http://glyphicons.com/).

Emoticons courtesy of freesmileys.org licensed here http://www.freesmileys.org/copyright.php

Other graphics are works of CodeConsortium.

## Description.

This is a complimentary CommonBundle for containing various assets for CCDN bundles for Symfony (2.0.11).

## Features.

CommonBundle Provides the following features:

1. Various Twig Extensions:
	1. BinSIUnits function, binary units converter.
	2. Cycler function, improved row cycler, featuring labels for creating cyclers within cyclers.
	3. Divide/Ceiling function, divides 2 numbers and runs results through php's Ceil() function.
	4. Param function returns parameters from app/config/config.yml.
	5. Relevant date format function formats dates into various 'time ago' fuzzy timestamp string formats.
	6. TruncDot function takes a string, if its longer than specified length, will truncate it & append '...' at the end, otherwise returns the original string.
	7. UserRole function gives you a users role as 'User' or 'Admin' extracted from the array in the users role column.
2. Various templates. (Features a fluid-left/fixed-right layout template).
3. Various generic CSS files for use across CCDN bundles.
4. Graphics used in CCDN bundles.
5. Smilies for use in BBCodeBundle.
6. Javascripts:
 	1. jQuery (1.7.1)
	2. jquery.checkboxes.js is for creating a check-all box.
	3. jquery.tipsy.js is for creating hover tool-tips in the style of github/youtube etc.
7. Utilises Twitter-Bootstrap interface by default.

Before installation of this bundle, you can download the [Sandbox](https://github.com/codeconsortium/CCDNSandBox) for testing/development and feature review, or alternatively see the product in use at [CodeConsortium](http://www.codeconsortium.com).

## Documentation.

Documentation can be found in the `Resources/doc/index.md` file in this bundle:

[Read the Documentation](http://github.com/codeconsortium/CommonBundle/blob/master/Resources/doc/index.md).

## Installation.

All the installation instructions are located in [documentation](http://github.com/codeconsortium/CommonBundle/blob/master/Resources/doc/install.md).

## License.

This software is licensed under the MIT license. See the complete license file in the bundle:

	Resources/meta/LICENSE

[Read the License](http://github.com/codeconsortium/CommonBundle/blob/master/Resources/meta/LICENSE).

## About.

[CCDNComponent CommonBundle](http://github.com/codeconsortium/CommonBundle) is free software from [Code Consortium](http://www.codeconsortium.com). 
See also the list of [contributors](http://github.com/codeconsortium/CommonBundle/contributors).

## Reporting an issue or feature request.

Issues and feature requests are tracked in the [Github issue tracker](http://github.com/codeconsortium/CommonBundle/issues).

Discussions and debates on the project can be further discussed at [Code Consortium](http://www.codeconsortium.com).
