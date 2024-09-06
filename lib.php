<?php
defined('MOODLE_INTERNAL') || die();

function schedulemeeting_add_instance($data) {
    global $DB;

    $meeting = new stdClass();
    $meeting->course = $data->course;
    $meeting->section = $data->section;
    $meeting->name = $data->name;
    $meeting->startdate = $data->startdate;
    $meeting->enddate = $data->enddate;

    return $DB->insert_record('schedulemeeting', $meeting);
}

function schedulemeeting_update_instance($data) {
    global $DB;

    $meeting = new stdClass();
    $meeting->id = $data->instance;
    $meeting->course = $data->course;
    $meeting->section = $data->section;
    $meeting->name = $data->name;
    $meeting->startdate = $data->startdate;
    $meeting->enddate = $data->enddate;

    return $DB->update_record('schedulemeeting', $meeting);
}