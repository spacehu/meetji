<?php

namespace config;

class code {

    const SYSTEM_INDEX = 90001;
    const SYSTEM_UPDATE = 90002;
    const STATISTICS_INDEX = 91001;
    const USER_INDEX = 80001;
    const USER_UPDATE = 80002;
    const USER_DELETE = 80003;
    const CATEGORY_INDEX = 70001;
    const CATEGORY_UPDATE = 70002;
    const CATEGORY_DELETE = 70003;
    const MATERIAL_INDEX = 60001;
    const MATERIAL_UPDATE = 60002;
    const MATERIAL_DELETE = 60003;
    const SHOW_INDEX = 50001;
    const SHOW_UPDATE = 50002;
    const SHOW_DELETE = 50003;
    const WORKS_INDEX = 40001;
    const WORKS_UPDATE = 40002;
    const WORKS_DELETE = 40003;
    const HOME_INDEX = 30001;
    const ALREADY_EXISTING_DATA = 10001; 
    const NULL_DATA = 10002;
    
    const API_ENUM = 100001;

    public static $code = [
        '90001' => "系统列表",
        '90002' => "系统更新",
        '91001' => "统计列表",
        '80001' => "用户列表",
        '80002' => "用户更新",
        '80003' => "用户删除",
        '70001' => "分类列表",
        '70002' => "分类更新",
        '70003' => "分类删除",
        '60001' => "素材列表",
        '60002' => "素材更新",
        '60003' => "素材删除",
        '50001' => "展示列表",
        '50002' => "展示更新",
        '50003' => "展示删除",
        '40001' => "作品列表",
        '40002' => "作品更新",
        '40003' => "作品删除",
        '30001' => "前端数据",
        '10001' => "已经存在的数据",
        '10002' => "空数据",
        
        '100001' => "字典报错",
    ];

}
