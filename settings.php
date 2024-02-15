<?php
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    //~ $settings = new admin_settingpage('mod_demoactivity', get_string('pluginname', 'mod_demoactivity'));

    $settings->add(new admin_setting_heading('mod_demoactivity/general', get_string('generalsettings', 'mod_demoactivity'), ''));

    $settings->add(new admin_setting_configtext('mod_demoactivity/setting4', get_string('setting4', 'mod_demoactivity'), '', ''));
    $settings->add(new admin_setting_configtext('mod_demoactivity/setting5', get_string('setting5', 'mod_demoactivity'), '', ''));

    $settings->add(new admin_setting_heading('mod_demoactivity/advanced', get_string('advancedsettings', 'mod_demoactivity'), ''));

    $settings->add(new admin_setting_configtext('mod_demoactivity/setting6', get_string('setting6', 'mod_demoactivity'), '', ''));
    $settings->add(new admin_setting_configtext('mod_demoactivity/setting7', get_string('setting7', 'mod_demoactivity'), '', ''));

    //~ $ADMIN->add('modsettings', $settings);
}

