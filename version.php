<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version information for Decision
 *
 * @package    local_ivdecision
 * @copyright  2024 Sokunthearith Makara <sokunthearithmakara@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component    = 'local_ivdecision';
$plugin->release      = '1.2.1';
$plugin->version      = 2025071201;
$plugin->requires     = 2021112800;
$plugin->supported    = [400, 500];
$plugin->maturity     = MATURITY_STABLE;
$plugin->dependencies = [
    'interactivevideo' => 2025011305,
    'ivplugin_richtext' => 2024071500,
];
