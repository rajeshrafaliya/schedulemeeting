<?php

defined('MOODLE_INTERNAL') || die;

$functions = array(

    'mod_schedulemeeting_view_schedulemeeting' => array(
        'classname'     => 'mod_schedulemeeting_external',
        'methodname'    => 'view_schedulemeeting',
        'description'   => 'Simulate the view.php web interface Schedule Meeting: trigger events, completion, etc...',
        'type'          => 'write',
        'capabilities'  => 'mod/schedulemeeting:view',
        'services'      => array(MOODLE_OFFICIAL_MOBILE_SERVICE)
    ),
    'mod_schedulemeeting_get_schedulemeetings_by_courses' => array(
        'classname'     => 'mod_schedulemeeting_external',
        'methodname'    => 'get_schedulemeetings_by_courses',
        'description'   => 'Returns a list of schedule meeting in a provided list of courses, if no list is provided all schedule meetings that
                            the user can view will be returned. Please note that this WS is not returning the folder contents.',
        'type'          => 'read',
        'capabilities'  => 'mod/schedulemeeting:view',
        'services'      => array(MOODLE_OFFICIAL_MOBILE_SERVICE),
    ),
);
