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
 * The main mod_demoactivity configuration form.
 *
 * @package     mod_demoactivity
 * @copyright   2024 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

/**
 * Module instance settings form.
 *
 * @package     mod_demoactivity
 * @copyright   2024 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_demoactivity_mod_form extends moodleform_mod {

    /**
     * Defines forms elements
     */
    public function definition() {
        global $CFG;

        $mform = $this->_form;

        // Adding the "general" fieldset, where all the common settings are shown.
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Adding the standard "name" field.
        $mform->addElement('text', 'name', get_string('demoactivityname', 'mod_demoactivity'), array('size' => '64'));

        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }

        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', 'demoactivityname', 'mod_demoactivity');

        // Adding the standard "intro" and "introformat" fields.
        if ($CFG->branch >= 29) {
            $this->standard_intro_elements();
        } else {
            $this->add_intro_editor();
        }

        // Adding the rest of mod_demoactivity settings, spreading all them into this fieldset
        // ... or adding more fieldsets ('header' elements) if needed for better logic.
        $mform->addElement('static', 'label1', 'demoactivitysettings', get_string('demoactivitysettings', 'mod_demoactivity'));
        $mform->addElement('header', 'demoactivityfieldset', get_string('demoactivityfieldset', 'mod_demoactivity'));
        $mform->addElement('text', 'setting1', get_string('setting1', 'mod_demoactivity'));
        $mform->setType('setting1', PARAM_TEXT);
        $mform->addRule('setting1', null, 'required', null, 'client');

        $mform->addElement('text', 'setting2', get_string('setting2', 'mod_demoactivity'));
        $mform->setType('setting2', PARAM_TEXT);
        $mform->addRule('setting2', null, 'required', null, 'client');

        $mform->addElement('select', 'setting3', get_string('setting3', 'mod_demoactivity'), array(
            'option1' => get_string('option1', 'mod_demoactivity'),
            'option2' => get_string('option2', 'mod_demoactivity'),
            'option3' => get_string('option3', 'mod_demoactivity'),
        ));
        $mform->setType('setting3', PARAM_ALPHA);
        $mform->addRule('setting3', null, 'required', null, 'client');

        // Add standard elements.
        $this->standard_coursemodule_elements();

        // Add standard buttons.
        $this->add_action_buttons();
    }
}
