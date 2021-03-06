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

define(['local_agent/clippy', 'core/str'], function(clippy, str) {

    return {
        init: function() {
            clippy.BASE_PATH = '/local/agent/lib/clippy.js/agents/'; //XXX
            clippy.load('Clippy', function(agent) {
                agent.show();

                setTimeout(function() {
                    agent.animate();
                    setTimeout(function() {
                        str.get_string('agenthello', 'local_agent').then(function(txt) {
                            agent.speak(txt);
                        });
                    }, 2000);
                }, 6000);
            });
        },
    };

});
