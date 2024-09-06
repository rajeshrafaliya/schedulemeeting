<?php
require_once('../../config.php');
require_once('lib.php');

$id = required_param('id', PARAM_INT); // Course module ID

$cm = get_coursemodule_from_id('schedulemeeting', $id, 0, false, MUST_EXIST);
$course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
$meeting = $DB->get_record('schedulemeeting', array('id' => $cm->instance), '*', MUST_EXIST);

require_login($course, true, $cm);

// Check access based on start and end dates
$now = time();
if ($now >= $meeting->startdate && $now <= $meeting->enddate) {
    echo $OUTPUT->header();
    echo $OUTPUT->heading($meeting->name);
    echo get_string('scheduledbetween', 'mod_schedulemeeting', array(
        'start' => userdate($meeting->startdate),
        'end' => userdate($meeting->enddate)
    ));
    echo $OUTPUT->footer();
} else {
    notice(get_string('activityclosed', 'mod_schedulemeeting'), new moodle_url('/course/view.php', array('id' => $course->id)));
}
