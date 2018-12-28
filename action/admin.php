<?php

namespace action;

use mod\common as Common;

class admin {

    function __construct() {
        
    }

    function index() {
        Common::isset_cookie();
        \mod\init::getTemplate('admin', 'main', false);
    }

    function main_top() {
        Common::isset_cookie();
        \mod\init::getTemplate('admin', 'top', false);
    }

    function main_right() {
        Common::isset_cookie();
        \mod\init::getTemplate('admin', 'right', false);
    }

    function main_left() {
        Common::isset_cookie();
        \mod\init::getTemplate('admin', 'left', false);
    }

    function error() {
        \mod\init::getTemplate('admin', 'error', false);
        exit;
    }

}
