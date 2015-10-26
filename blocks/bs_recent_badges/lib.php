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
 * The library file for recent badges plugin.
 *
 * @package block_bs_recent_badges
 * @author Matthias Schwabe <mail@matthiasschwabe.de>
 * @copyright 2015 Matthias Schwabe
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 */

require_once($CFG->libdir.'/badgeslib.php');

function bs_recent_badges_get_issued_badges($courseid, $number) {
    global $DB;

    $params = array();

    $sql = "SELECT bi.uniquehash,
                   bi.dateissued,
                   bi.dateexpire,
                   bi.id as issuedid,
                   bi.visible,
                   bi.userid,
                   b.*
              FROM {badge} b,
                   {badge_issued} bi
             WHERE b.id = bi.badgeid";

    if ($courseid == SITEID) {
        $sql .= ' AND b.type = 1';
    } else {
        $sql .= ' AND b.courseid = :courseid';
        $params['courseid'] = $courseid;
    }

    $sql .= ' ORDER BY bi.dateissued DESC';

    $badges = $DB->get_records_sql($sql, $params, 0, $number);

    return $badges;
}
