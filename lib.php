<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * @package   local_agent
 * @copyright 2019 Nicolas Roeser, Ulm University <nicolas.roeser@uni-ulm.de>
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * @return Whether the plugin is enabled.
 */
function local_agent_isenabled() {
    if (get_config('local_agent', 'foolsonly') === 0) {
        return true;
    }

    $datetime = usergetdate(time());

    return $datetime['mon'] === 4 && $datetime['mday'] === 1;
}

/**
 * Hook which inserts the style sheets.
 */
function local_agent_before_standard_html_head() {
    global $PAGE;

    if (local_agent_isenabled()) {
        $PAGE->requires->css('/local/agent/lib/clippy.js/build/clippy.css');
    }

    return '';
}

/**
 * Hook which launches the JavaScript code.
 */
function local_agent_before_footer() {
    global $PAGE;

    if (local_agent_isenabled()) {
        $PAGE->requires->js_call_amd('local_agent/agent', 'init');
    }
}
