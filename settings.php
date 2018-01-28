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
 * Global settings for recent badges plugin.
 *
 * @package    block_bs_recent_badges
 * @copyright  2015 onwards Matthias Schwabe {@link http://matthiasschwa.be}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {

    $ADMIN->add('blocksettings', new admin_category('block_bs_recent_badges_folder',
                get_string('pluginname', 'block_bs_recent_badges')));

    $settings = new admin_settingpage('block_bs_recent_badges', get_string('configuration', 'block_bs_recent_badges'));

    $options = array('onlycourse' => get_string('onlycourse', 'block_bs_recent_badges'),
                     'onlysystem' => get_string('onlysystem', 'block_bs_recent_badges'),
                     'courseandsystem' => get_string('courseandsystem', 'block_bs_recent_badges'));

    $settings->add(new admin_setting_configselect('block_bs_recent_badges/allowedmodus',
        get_string('modus', 'block_bs_recent_badges'),
        get_string('modusinfo', 'block_bs_recent_badges'), 'courseandsystem', $options));

    $settings->add(new admin_setting_configcheckbox('block_bs_recent_badges/allownames',
        get_string('allownamesglobal', 'block_bs_recent_badges'),
        get_string('allownamesinfoglobal', 'block_bs_recent_badges'), 0));

    $ADMIN->add('block_bs_recent_badges_folder', $settings);

    $ADMIN->add('block_bs_recent_badges_folder', new admin_externalpage('block_bs_recent_badges_about',
                get_string('about', 'block_bs_recent_badges'),
                new moodle_url('/blocks/bs_recent_badges/about.php')));

    $settings = null;
}
