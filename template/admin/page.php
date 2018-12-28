<div class="currentPage">
    <div class="page_left">
    </div>
    <div class="page_right">
        <!--currentPage-->
        <?php
        $space = '3'; //左右各留下$space个页面链接
        $first = '2';
        $last = $Totalpage - 1;
        $sl = '';
        /** 向前翻页 */
        if ($currentPage > 1) {
            $sl .= '<a href="' . $url . '&currentPage=' . ($currentPage - 1) . '&pagesize=' . $pagesize . '"><</a>';
        }
        if ($Totalpage < 10) {
            /** 小于10页的排列方式 */
            for ($i = 1; $i <= $Totalpage; $i++) {
                $sl .= '<a href="' . $url . '&currentPage=' . $i . '&pagesize=' . $pagesize . '"';
                if ($currentPage == $i) {
                    $sl .= 'class="active"';
                }
                $sl .= '>' . $i . '</a>';
            }
        } else {
            /** 大于10页的排列方式 */
            if ($currentPage > $space) {
                $sl .= '<a href="' . $url . '&currentPage=1&pagesize=' . $pagesize . '">1</a><a >...</a>';
            } else {
                $sl .= '<a href="' . $url . '&currentPage=1&pagesize=' . $pagesize . '"';
                if ($currentPage == 1) {
                    $sl .= 'class="active"';
                }
                $sl .= '>1</a>';
            }
            if (($currentPage - $space) > 1) {
                $first = $currentPage - $space;
            }
            if (($currentPage + $space) < $Totalpage) {
                $last = $currentPage + $space;
            }
            for ($i = $first; $i <= $last; $i++) {
                $sl .= '<a href="' . $url . '&currentPage=' . $i . '&pagesize=' . $pagesize . '"';
                if ($currentPage == $i) {
                    $sl .= 'class="active"';
                }
                $sl .= '>' . $i . '</a>';
            }
            if ($currentPage < ($Totalpage - $space)) {
                $sl .= '<a >...</a><a href="' . $url . '&currentPage=' . $Totalpage . '&pagesize=' . $pagesize . '">' . $Totalpage . '</a>';
            } else {
                $sl .= '<a href="' . $url . '&currentPage=' . $Totalpage . '&pagesize=' . $pagesize . '"';
                if ($currentPage == $Totalpage) {
                    $sl .= 'class="active"';
                }
                $sl .= '>' . $Totalpage . '</a>';
            }
        }
        /** 向后翻页 */
        if ($currentPage < $Totalpage) {
            $sl .= '<a href="' . $url . '&currentPage=' . ($currentPage + 1) . '&pagesize=' . $pagesize . '">></a>';
        }
        /** 显示分页 */
        echo $sl;
        ?>
        <!--currentPage end-->
    </div>
    <div class="clear"></div>
</div>