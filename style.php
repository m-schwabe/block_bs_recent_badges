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
 * @package    block_bs_recent_badges
 * @copyright  2015 onwards Matthias Schwabe {@link http://matthiasschwa.be}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$style =
'<style type="text/css">
    html,
    body {
        margin: 0;
        padding: 0;
        width: 100%;
    }

    #page-mod-quiz-review #page,
    #page-mod-quiz-review #region-main,
    #page-mod-quiz-review #page-content,
    #page-mod-quiz-review #region-post-box {
        margin-left: 0;
        margin-right: 0;
        width: 100%;
    }

    #page-mod-quiz-review #page-navbar,
    #page-mod-quiz-review #region-pre,
    #page-mod-quiz-review #region-post,
    #page-mod-quiz-review #page-header,
    #page-mod-quiz-review #page-footer,
    #page-mod-quiz-review #page-navigation,
    #page-mod-quiz-review .navbar,
    #page-mod-quiz-review .othernav,
    #page-mod-quiz-review .submitbtns,
    #page-mod-quiz-review .qn_buttons,
    input.questionflagsavebutton,
    .que .info .questionflag.editable,
    div.questionflag,
    div.submitbtns,
    div.questionflag,
    div.editquestion,
    div.comment,
    div.history,
    #page-mod-quiz-review #mod_quiz_navblock .header,
    .que .info .grade,
    .que .multichoice .answer .specificfeedback,
    .que .multichoice .answer div.r0 input,
    .que .multichoice .answer div.r1 input,
    .que .questioncorrectnessicon,
    div.specificfeedback,
    input,
    input[type="radio"][disabled],
    input[type="checkbox"][disabled],
    input[type="radio"][readonly],
    input[type="checkbox"][readonly] {
        display: none;
    }

    table.quizreviewsummary th.cell {
        font-weight: bold;
        border-top: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
    }
    table.quizreviewsummary td.cell {
        border-top: 1px solid #dddddd;
        border-bottom: 1px solid #dddddd;
    }
    .que h3.no {
        border-top: 1px solid #000000;
        background-color: #f0f0f0;
    }
    .que .info .state {
        background-color: #f0f0f0;
    }
    .que .info,
    .que .qtext,
    .que .specificfeedback,
    .que .generalfeedback,
    .que .rightanswer,
    .que .im-feedback,
    .que .feedback,
    .que p,
    .que .formulation,
    .que .outcome,
    .que .comment,
    .accesshide {
        margin-bottom: 3px;
        margin-top: 3px
    }
    .formulation .correct {
        background-color: #dff0d8;
    }
    .formulation .incorrect {
        background-color: #f2dede;
    }

    .head_logo {
        width: 6cm;
    }
    </style>';
