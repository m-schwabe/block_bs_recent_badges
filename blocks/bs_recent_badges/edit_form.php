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
 * Edits an instance of recent badges plugin.
 *
 * @package    block_bs_recent_badges
 * @copyright  2015 onwards Matthias Schwabe {@link http://matthiasschwa.be}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_bs_recent_badges_edit_form extends block_edit_form {

    protected function specific_definition($mform) {
        global $COURSE;

        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        if (get_config('block_bs_recent_badges')->allowedmodus != 'onlysystem' and $COURSE->id != SITEID) {

            $numberofcoursebadges = array();
            for ($i = 0; $i <= 25; $i++) {
                $numberofcoursebadges[$i] = $i;
            }
            $mform->addElement('select', 'config_numberofcoursebadges',
                               get_string('numberofcoursebadges', 'block_bs_recent_badges'), $numberofcoursebadges);
            $mform->setDefault('config_numberofcoursebadges', 6);

            if (get_config('block_bs_recent_badges')->allownames) {
                $mform->addElement('advcheckbox', 'config_allownames', get_string('allownames', 'block_bs_recent_badges'),
                                   get_string('allownamesinfo', 'block_bs_recent_badges'), null, array(0, 1));
                $mform->setDefault('config_allownames', 0);
            }
        }

        if (get_config('block_bs_recent_badges')->allowedmodus != 'onlycourse') {

            $numberofsystembadges = array();
            for ($i = 0; $i <= 25; $i++) {
                $numberofsystembadges[$i] = $i;
            }
            $mform->addElement('select', 'config_numberofsystembadges',
                               get_string('numberofsystembadges', 'block_bs_recent_badges'), $numberofsystembadges);
            $mform->setDefault('config_numberofsystembadges', 6);
        }

        $iconsize = array(
            'small' => get_string('small', 'block_bs_recent_badges'),
            'big' => get_string('big', 'block_bs_recent_badges')
        );
        $mform->addElement('select', 'config_iconsize',
                           get_string('iconsize', 'block_bs_recent_badges'), $iconsize);
        $mform->setDefault('config_iconsize', 'small');
    }
}
