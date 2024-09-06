<?php
require_once('../../config.php');
require_login();

$courseid = required_param('id', PARAM_INT);
$course = get_course($courseid);

$PAGE->set_url('/mod/schedulemeeting/index.php', array('id' => $courseid));
$PAGE->set_title(get_string('meetingschedule', 'mod_schedulemeeting'));
$PAGE->set_heading($course->fullname);

$meetings = $DB->get_records('schedulemeeting', array('course' => $courseid));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('meetings', 'mod_schedulemeeting'));

if ($meetings) {
    foreach ($meetings as $meeting) {
        echo html_writer::tag('div', format_string($meeting->name) . ' (' . userdate($meeting->startdate) . ' - ' . userdate($meeting->enddate) . ')');
    }
} else {
    echo get_string('nomeetings', 'mod_schedulemeeting');
}

echo $OUTPUT->footer();
