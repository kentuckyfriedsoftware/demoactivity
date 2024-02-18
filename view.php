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
 * Prints an instance of mod_demoactivity.
 *
 * @package     mod_demoactivity
 * @copyright   2024 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__.'/../../config.php');
require_once(__DIR__.'/lib.php');

// Course module id.
$id = optional_param('id', 0, PARAM_INT);

// Activity instance id.
$d = optional_param('d', 0, PARAM_INT);

if ($id) {
    $cm = get_coursemodule_from_id('demoactivity', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $moduleinstance = $DB->get_record('demoactivity', array('id' => $cm->instance), '*', MUST_EXIST);
} else {
    $moduleinstance = $DB->get_record('demoactivity', array('id' => $d), '*', MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $moduleinstance->course), '*', MUST_EXIST);
    $cm = get_coursemodule_from_instance('demoactivity', $moduleinstance->id, $course->id, false, MUST_EXIST);
}

require_login($course, true, $cm);

$modulecontext = context_module::instance($cm->id);

$PAGE->set_url('/mod/demoactivity/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($moduleinstance->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($modulecontext);

// Export the plugin configuration to JavaScript.
$PAGE->requires->js_export_plugin_config('mod_demoactivity');
//~ $PAGE->requires->js_export_plugin_config('mod_demoactivity', ['setting1', 'setting5']);

echo $OUTPUT->header();

// Include the AMD module.
echo $PAGE->requires->js_call_amd('mod_demoactivity/module', 'init');

// Get settings from the database.
$setting1 = get_config('mod_demoactivity', 'setting1');
$setting2 = get_config('mod_demoactivity', 'setting2');
$setting3 = get_config('mod_demoactivity', 'setting3');
$setting4 = get_config('mod_demoactivity', 'setting4');

// Display settings in a table.
echo '<table class="mod_demoactivity_settings">';
echo '<tr id="demoactivity_setting1"><th>' . get_string('setting1', 'mod_demoactivity') . '</th>
        <td>' . $setting1 . '</td>
        <th>M.mod_demoactivity.setting1</th>
        <td id="M_mod_demoactivity_setting1"></td>
    </tr>';
echo '<tr id="demoactivity_setting2"><th>' . get_string('setting2', 'mod_demoactivity') . '</th>
        <td>' . $setting2 . '</td>
        <th>M.mod_demoactivity.setting2</th>
        <td id="M_mod_demoactivity_setting2"></td>
    </tr>';
echo '<tr id="demoactivity_setting3"><th>' . get_string('setting3', 'mod_demoactivity') . '</th>
        <td>' . $setting3 . '</td>
        <th>M.mod_demoactivity.setting3</th>
        <td id="M_mod_demoactivity_setting3"></td>
    </tr>';
echo '<tr><th>' . get_string('setting4', 'mod_demoactivity') . '</th>
        <td>' . $setting4 . '</td>
        <th>M.mod_demoactivity.setting4</th>
        <td id="M_mod_demoactivity_setting4"></td>
    </tr>';
echo '</table>';

//~ echo '<span class="demodebug">' . var_dump(context_module::instance($cm->id)) . '</span>';
echo $OUTPUT->footer();
