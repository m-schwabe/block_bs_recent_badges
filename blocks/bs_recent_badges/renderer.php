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
 * Output renderer for recent badges plugin.
 *
 * @package    block_bs_recent_badges
 * @copyright  2015 onwards Matthias Schwabe {@link http://matthiasschwa.be}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/badgeslib.php');
require_once($CFG->libdir.'/tablelib.php');

class block_bs_recent_badges_renderer extends plugin_renderer_base {

    // Outputs badges lists.
    public function bs_recent_badges_print_badges_list($badges, $userid, $courseid, $size, $allownames) {
        global $DB, $CFG;

        foreach ($badges as $badge) {

            $context = ($badge->type == BADGE_TYPE_SITE) ? context_system::instance() : context_course::instance($badge->courseid);
            $name = $badge->name;
            $imageurl = moodle_url::make_pluginfile_url($context->id, 'badges', 'badgeimage', $badge->id, '/', 'f1', false);
            $image = html_writer::empty_tag('img', array('src' => $imageurl, 'class' => 'badge-image'));

            $useritem = '';
            if ($allownames
                and get_config('block_bs_recent_badges')->allownames
                and $courseid != SITEID
                and has_capability('moodle/course:viewparticipants', $context)) {

                    $badgeuser = $DB->get_record('user', array('id' => $badge->userid));
                    $username = html_writer::tag('span', fullname($badgeuser), array('class' => 'user-name'));
                    $useritem = $username;

                if (has_capability('moodle/user:viewdetails', $context)
                    and has_capability('moodle/course:viewparticipants', $context)) {

                        $userurl = new moodle_url('/user/view.php', array('id' => $badge->userid, 'course' => $courseid));
                        $useritem = get_string('user', 'block_bs_recent_badges').
                            html_writer::link($userurl, $username, array('title' => $username));
                }
            }

            if (!empty($badge->dateexpire) && $badge->dateexpire < time()) {
                $image .= $this->output->pix_icon('i/expired',
                    get_string('expireddate', 'badges', userdate($badge->dateexpire)), 'moodle',
                        array('class' => 'expireimage'));
                $name .= ' (' . get_string('expired', 'badges') . ')';
            }

            $badgeparams = ($courseid == SITEID) ? array('type' => 1) : array('type' => 2, 'id' => $courseid);
            $badgeurl = new moodle_url('/badges/view.php', $badgeparams);

            $title = html_writer::tag('span', $name, array('class' => 'badge-title'));
            if ($size == 'small') {
                $item = html_writer::tag('div', $image.' '.$title, array('class' => 'badge-item'));
            } else {
                $item = html_writer::tag('div', $image, array('class' => 'badge-item')).
                    html_writer::tag('div', $title, array('class' => 'badge-item'));
            }
            $badgeitem = html_writer::link($badgeurl, $item, array('title' => $name));
            $items[] = $badgeitem.$useritem;
        }

        return html_writer::alist($items, array('class' => 'recent-badges-'.$size));
    }
}
