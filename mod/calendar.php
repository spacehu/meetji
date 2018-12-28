<?php

/*
 * php 输出日历程序
 */

function calendar($_year, $_month, $_curUrl) {
    $year = (!isset($_year) || $_year == "") ? date("Y") : $_year;
    $month = (!isset($_month) || $_month == "") ? date("n") : $_month;
    $curUrl = (!isset($_curUrl) || $_curUrl == "") ? $_SERVER['PHP_SELF'] : $_curUrl;
    $html = '';

    if ($year < 1971) {
        echo "出错!";
        echo "<BR>";
        echo "<a href=" . $curUrl . ">Back</a>";
        exit();
    }
    $html .= '<table width="200" border="1" cellspacing="0" cellpadding="0" bordercolor="#E7E7E7" style="font-size:12px;" align="center"> 
					<tr align="center">
						<td colspan="2">';
    //<-------当月份超出1至12时的处理;开始-------> 
    if ($month < 1) {
        $month = 12;
        $year -= 1;
    }
    if ($month > 12) {
        $month = 1;
        $year += 1;
    }
    //<-------当月份超出1至12时的处理;结束-------> 
    //<---------上一年,下一年,上月,下月的连接处理及输出;开始---------> 
    $html .= '<a href="'.$curUrl.'"?year="'.($year-1).'"&month="'.$month.'"><<</a>年<a href="'.$curUrl.'"?year="'.($year+1).'"&month="'.$month.'">>></a>"
						</td>
						<td colspan="3">
							' . $year . '年' . $month . '月
						</td>
						<td colspan="2">
							<a href="'.$curUrl.'"?month="'.($month-1).'"&year="'.$year.'"><<</a>月<a href="'.$curUrl.'"?month="'.($month+1).'"&year="'.$year.'">>></a>"
		<!--------上一年,下一年,上月,下月的连接处理及输出;结束---------> 
						</td>
					</tr> 
					<tr align=center>
						<td><font color="red">日</font></td>
						<td>一</td>
						<td>二</td>
						<td>三</td>
						<td>四</td>
						<td>五</td>
						<td>六</td>
					</tr>
					<tr>';

    $d = date("d");
    $FirstDay = date("w", mktime(0, 0, 0, $month, 1, $year)); //取得任何一个月的一号是星期几,用于计算一号是由表格的第几格开始
    $bgtoday = date("d");
    for ($i = 0; $i <= $FirstDay; $i++) {//此for用于输出某个月的一号位置
        for ($i; $i < $FirstDay; $i++) {
            $html .= '<td align=center> </td>';
        }
        if ($i == $FirstDay) {
            $html .= '<td align=center ' . bgcolor($month, $bgtoday, 1, $year) . '><font color=' . font_color($month, 1, $year) . '>' . font_style($month, 1, $year) . '1</font></td>';
            if ($FirstDay == 6) {//判断1号是否星期六
                $html .= '</tr>';
            }
        }
    }
    $countMonth = date("t", mktime(0, 0, 0, $month, 1, $year)); //某月的总天数 
    for ($i = 2; $i <= $countMonth; $i++) {//输出由1号定位,随后2号直至月尾的所有号数
        $html .= '<td align=center ' . bgcolor($month, $bgtoday, $i, $year) . '><font color=' . font_color($month, $i, $year) . '>' . font_style($month, $i, $year) . $i . '</font></td>';
        if (date("w", mktime(0, 0, 0, $month, $i, $year)) == 6) {//判断该日是否星期六
            $html .= '</tr>';
        }
    }
    $html .= '</table>';

    return $html;
}

function font_color($month, $today, $year) {//用于计算星期天的字体颜色
    $sunday = date("w", mktime(0, 0, 0, $month, $today, $year));
    if ($sunday == "0") {
        $FontColor = "red";
    } else {
        $FontColor = "black";
    }
    return $FontColor;
}

function bgcolor($month, $bgtoday, $today_i, $year) {//用于计算当日的背景颜色
    $show_today = date("d", mktime(0, 0, 0, $month, $today_i, $year));
    $sys_today = date("d", mktime(0, 0, 0, $month, $bgtoday, $year));
    if ($show_today == $sys_today) {
        $bgcolor = "bgcolor=#6699FF";
    } else {
        $bgcolor = "";
    }
    return $bgcolor;
}

function font_style($month, $today, $year) {//用于计算星期天的字体风格
    $sunday = date("w", mktime(0, 0, 0, $month, $today, $year));
    if ($sunday == "0") {
        $FontStyle = "<strong>";
    } else {
        $FontStyle = "";
    }
    return $FontStyle;
}
