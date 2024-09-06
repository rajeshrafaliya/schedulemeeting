<?php
defined('MOODLE_INTERNAL') || die();

require_once("$CFG->dirroot/course/moodleform_mod.php");

class mod_schedulemeeting_mod_form extends moodleform_mod {
    public function definition() {
        $mform = $this->_form;

        // Dropdown for selecting course section
        $sections = $this->get_course_sections();
        $mform->addElement('select', 'section', get_string('section', 'mod_schedulemeeting'), $sections);

        // Name field
        $mform->addElement('text', 'name', get_string('name', 'mod_schedulemeeting'), array('size' => '64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        // Start Date
        $mform->addElement('date_time_selector', 'startdate', get_string('startdate', 'mod_schedulemeeting'));
        $mform->addRule('startdate', null, 'required', null, 'client');

        // End Date
        $mform->addElement('date_time_selector', 'enddate', get_string('enddate', 'mod_schedulemeeting'));
        $mform->addRule('enddate', null, 'required', null, 'client');

        // Set enddate default to the last day of the current month
        $lastDayOfMonth = mktime(23, 59, 59, date("m") + 1, 0, date("Y"));
        $mform->setDefault('enddate', $lastDayOfMonth);

        $this->standard_coursemodule_elements();

        // Add action buttons
        $this->add_action_buttons();
    }

    // Fetch course sections to populate the dropdown
    private function get_course_sections() {
        global $COURSE, $DB;
        $sections = $DB->get_records_menu('course_sections', array('course' => $COURSE->id), 'section', 'id,name');
        return $sections;
    }
}
