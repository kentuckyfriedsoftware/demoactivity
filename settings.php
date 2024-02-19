<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_heading('mod_demoactivity/general', get_string('generalsettings', 'mod_demoactivity'), ''));
    $settings->add(new admin_setting_configtext('mod_demoactivity/setting1', get_string('setting1', 'mod_demoactivity'), '', ''));
    $settings->add(new admin_setting_configtext('mod_demoactivity/setting2', get_string('setting2', 'mod_demoactivity'), '', ''));
    $settings->add(new admin_setting_heading('mod_demoactivity/advanced', get_string('advancedsettings', 'mod_demoactivity'), ''));
    $settings->add(new admin_setting_configtext('mod_demoactivity/setting3', get_string('setting3', 'mod_demoactivity'), '', ''));
    $settings->add(new admin_setting_configtext('mod_demoactivity/setting4', get_string('setting4', 'mod_demoactivity'), '', ''));
}

