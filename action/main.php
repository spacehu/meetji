<?php

namespace action;

use mod\common as Common;

class main {

    function __construct() {
        Common::js_redir(Common::url_rewrite('index.php?a=home&m=index'));
        //echo 1;
    }
}
