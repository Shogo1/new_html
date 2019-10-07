<?php

require_once(WP_PLUGIN_DIR . '/MarcatEstateConnection/Model/Config/ReturnDefaultSetting.php');

class TableSet {
    protected function SetSingleApiData_marcat_estate_connection_post($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_open"] = (Int)$value["re_open"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_chkstate"] = (Int)$value["re_chkstate"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_path"] = (Int)$value["re_path"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_chkdate"] = (Int)$value["re_chkdate"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_price_last_update"] = (String)$value["re_price_last_update"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_rank"] = (String)$value["re_rank"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_r_brandnew"] = (String)$value["re_r_brandnew"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_builddt"] = (String)$value["re_builddt"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_structure"] = (Int)$value["re_structure"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_floor"] = (Int)$value["re_floor"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_ufloor"] = (Int)$value["re_ufloor"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_lfloor"] = (Int)$value["re_lfloor"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_parking"] = (Int)$value["re_parking"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_status"] = (Int)$value["re_status"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_buildup"] = (Int)$value["re_buildup"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_presentcond"] = (Int)$value["re_presentcond"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_timming"] = (Int)$value["re_timming"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_timmingdate"] = (String)$value["re_timmingdate"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_timmingperiod"] = (Int)$value["re_timmingperiod"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_timmingcont"] = (Int)$value["re_timmingcont"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_visit_OK"] = (Int)$value["re_visit_OK"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_inv_boundtext"] = (String)$value["re_inv_boundtext"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["re_x_id"] = (Float)$value["re_x_id"];
        $this->RetrunAPIData["marcat_estate_connection_post"][$val]["insert_date"] = (String)$value["insert_date"];
    }
    protected function SetSinglemarcat_estate_connection_taxlistrerationships($value,$val){
        $re_flag_value = (string)$value["re_flag_value"];
        $re_flag_value_array = explode("-", $re_flag_value);
        foreach ($re_flag_value_array as $re_flag_key =>$re_flag_values):
            $this->RetrunAPIData["marcat_estate_connection_taxlistrerationships"][$re_flag_values] = $val;
        endforeach;
    }
    protected function SetSinglemarcat_estate_connection_specialflagrationships($value,$val){
        $re_specialflag_value = (String)$value["re_specialflag_value"];
        $re_specialflag_value_array = str_split($re_specialflag_value);
        foreach ($re_specialflag_value_array as $flagkey=>$flagval):
            if(!empty($flagval)):
                $this->RetrunAPIData["marcat_estate_connection_specialflagrationships"][$val]["specialflagrationships_key"][$flagkey] = $flagkey;
                $this->RetrunAPIData["marcat_estate_connection_specialflagrationships"][$val]["specialflagrationships_post_id"][$flagkey] = $val;
            endif;
        endforeach;
    }

    protected function SetSingleApiData_marcat_estate_connection_relationships($value,$val){
        //$this->RetrunAPIData['marcat_estate_connection_relationships'] =
        $re_type = (Int)$value["re_type"];
        $re_kind = (Int)$value["re_kind"];
        $this->RetrunAPIData["marcat_estate_connection_relationships"]['re_type'][$val] = (int)$value["re_type"];
        $this->RetrunAPIData["marcat_estate_connection_relationships"]['re_kind'][$val] = ReturnDefaultSetting::$Termlist_Kind_Araay[$re_type][$re_kind]['id'];
    }


    protected function SetSingleApiData_marcat_estate_connection_access($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_access"][$val]["post_id"] = $val;
        //沿線　コード
        for($i=0; $i<=6; $i++) {
            $re_railroads = 're_railroad'.$i;
            if(!empty($value["re_railroads"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_railroad"][$i] = (string)$value["re_railroads"];
            }
        }
        //駅　コード
        for($i=0; $i<=16; $i++) {
            $re_stations = 're_station'.$i;
            if(!empty($value["re_stations"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_station"][$i] = (string)$value["re_stations"];
            }
        }
        //沿線　名称
        for($i=0; $i<=6; $i++) {
            $re_railway_namea = 're_railway_name'.$i;
            if(!empty($value["re_railway_namea"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_railway_name"][$i] = (string)$value["re_railway_namea"];
            }
        }
        //沿線　名称
        for($i=0; $i<=6; $i++) {
            $re_station_names = 're_station_name'.$i;
            if(!empty($value["re_station_names"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_station_name"][$i] = (string)$value["re_station_names"];
            }
        }
        //沿線　名称
        for($i=0; $i<=6; $i++) {
            $re_walks = 're_walk'.$i;
            if(!empty($value["re_walks"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_walk"][$i] = (int)$value["re_walks"];
            }
        }
        //バス所要時間
        for($i=0; $i<=6; $i++) {
            $re_buss = 're_bus'.$i;
            if(!empty($value["re_walks"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_bus"][$i] = (string)$value["re_buss"];
            }
        }
        //バス停名
        for($i=0; $i<=6; $i++) {
            $re_busstops = 're_busstop'.$i;
            if(!empty($value["re_walks"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_busstop"][$i] = (string)$value["re_busstops"];
            }
        }
        //バス停徒歩所要時間
        for($i=0; $i<=6; $i++) {
            $re_buswalks = 're_buswalk'.$i;
            if(!empty($value["re_walks"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_buswalk"][$i] = (int)$value["re_buswalks"];
            }
        }
        //バス停徒歩所要時間
        for($i=0; $i<=6; $i++) {
            $re_cars = 're_car'.$i;
            if(!empty($value["re_walks"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_car"][$i] = (string)$value["re_cars"];
            }
        }
        //車所要時間
        for($i=0; $i<=6; $i++) {
            $re_cars = 're_car'.$i;
            if(!empty($value["re_walks"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_car"][$i] = (int)$value["re_cars"];
            }
        }
        //車距離
        for($i=0; $i<=6; $i++) {
            $re_car_kms = 're_car_km'.$i;
            if(!empty($value["re_walks"])){
                $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_car_km"][$i] = (string)$value["re_car_kms"];
            }
        }
        //その他交通
        $this->RetrunAPIData["marcat_estate_connection_access"][$val]["re_access_other"] = (string)$value["re_access_other"];
    }
    protected function SetSingleApiData_marcat_estate_connection_company($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_company"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_company"][$val]["re_company_name"] = (string)$value["re_company_name"];
        $this->RetrunAPIData["marcat_estate_connection_company"][$val]["re_company_id"] = (string)$value["re_company_id"];
        $this->RetrunAPIData["marcat_estate_connection_company"][$val]["re_office_id"] = (string)$value["re_office_id"];
        $this->RetrunAPIData["marcat_estate_connection_company"][$val]["re_office_name"] = (string)$value["re_office_name"];
        $this->RetrunAPIData["marcat_estate_connection_company"][$val]["re_office_tel"] = (string)$value["re_office_tel"];
        $this->RetrunAPIData["marcat_estate_connection_company"][$val]["re_office_code"] = (string)$value["re_office_code"];
        $this->RetrunAPIData["marcat_estate_connection_company"][$val]["re_user_name"] = (string)$value["re_user_name"];
    }
    protected function SetSingleApiData_marcat_estate_connection_madori($value,$val) {
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_floorsize"] = (float)$value["re_floorsize"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_floorsize2"] = (float)$value["re_floorsize2"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_land"] = (float)$value["re_land"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_land2"] = (float)$value["re_land2"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_roomnum"] = (int)$value["re_roomnum"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_roomtype"] = (string)$value["re_roomtype"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_roomnum_2"] = (int)$value["re_roomnum_2"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_roomtype_2"] = (string)$value["re_roomtype_2"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_room_buy_num"] = (int)$value["re_room_buy_num"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_roomtype_other"] = (string)$value["re_roomtype_other"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_houses"] = (int)$value["re_houses"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_buy_num"] = (int)$value["re_buy_num"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_measuretype"] = (int)$value["re_type"].'-'.(string)$value["re_measuretype"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_measuretype2"] = (int)$value["re_measuretype2"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_setback"] = (string)$value["re_setback"];
        $this->RetrunAPIData["marcat_estate_connection_madori"][$val]["re_setback_type"] = (int)$value["re_setback_type"];
    }
    protected function SetSingleApiData_marcat_estate_connection_map($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_map"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_map"][$val]["re_place1"] = (string)$value["re_place1"];
        $this->RetrunAPIData["marcat_estate_connection_map"][$val]["re_place2"] = (string)$value["re_place2"];
        $this->RetrunAPIData["marcat_estate_connection_map"][$val]["re_place_name1"] = (string)$value["re_place_name1"];
        $this->RetrunAPIData["marcat_estate_connection_map"][$val]["re_place_name2"] = (string)$value["re_place_name2"];
        $this->RetrunAPIData["marcat_estate_connection_map"][$val]["re_zip"] = (string)$value["re_zip"];
        $this->RetrunAPIData["marcat_estate_connection_map"][$val]["re_address"] = (string)$value["re_address"];
        $this->RetrunAPIData["marcat_estate_connection_map"][$val]["re_address3"] = (string)$value["re_address3"];
    }
    protected function SetSingleApiData_marcat_estate_connection_parking($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parking"] = (int)$value["re_parking"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parkingtype"] = (int)$value["re_parkingtype"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parkingnum"] = (int)$value["re_parkingnum"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parkingcost"] = (int)$value["re_parkingcost"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parkingcost2"] = (int)$value["re_parkingcost2"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parking_tax"] = (int)$value["re_parking_tax"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parkingcost_unit"] = (int)$value["re_parkingcost_unit"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parkingcost_include"] = (int)$value["re_parkingcost_include"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_parkingcost_free"] = (string)$value["re_parkingcost_free"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_ugp_type"] = (int)$value["re_ugp_type"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_ugp_m2"] = (float)$value["re_ugp_m2"];
        $this->RetrunAPIData["marcat_estate_connection_parking"][$val]["re_premises"] = (int)$value["re_premises"];
    }
    protected function SetSingleApiData_marcat_estate_connection_price($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_price"] = (int)$value["re_price"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_price2"] = (int)$value["re_price2"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_tax_include"] = (int)$value["re_tax_include"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_land_price"] = (int)$value["re_land_price"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_building_price"] = (int)$value["re_building_price"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_landrenton"] = (int)$value["re_landrenton"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_landrentunit"] = (int)$value["re_landrentunit"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_managefee"] = (int)$value["re_managefee"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_managefee2"] = (int)$value["re_managefee2"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_mngoffice"] = (String)$value["re_mngoffice"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_repaircost"] = (String)$value["re_repaircost"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_repaircost2"] = (int)$value["re_repaircost2"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_rcosttype"] = (String)$value["re_rcosttype"];
        $this->RetrunAPIData["marcat_estate_connection_price"][$val]["re_repairfund"] = (int)$value["re_repairfund"];
    }

    protected function SetSingleApiData_marcat_estate_connection_rehome($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["re_irestoreym"] = (String)$value["re_irestoreym"];
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["re_orestore"] = (Int)$value["re_orestore"];
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["re_orestoreym"] = (Int)$value["re_orestoreym"];
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["re_renovation"] = (Int)$value["re_renovation"];
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["re_renovationym"] = (String)$value["re_renovationym"];
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["re_irestore_memo_date"] = (String)$value["re_irestore_memo_date"];
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["re_extensionym"] = (String)$value["re_extensionym"];
        $this->RetrunAPIData["marcat_estate_connection_rehome"][$val]["re_extension"] = (Float)$value["re_extension"];
    }
    protected function SetSingleApiData_marcat_estate_connection_sale_date_flag($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_sale_date_flag"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_sale_date_flag"][$val]["re_openschedule_from"] = (String)$value["re_openschedule_from"];
        $this->RetrunAPIData["marcat_estate_connection_sale_date_flag"][$val]["re_openschedule_to"] = (String)$value["re_openschedule_to"];
        $this->RetrunAPIData["marcat_estate_connection_sale_date_flag"][$val]["re_opentime_from"] = (String)$value["re_opentime_from"];
        $this->RetrunAPIData["marcat_estate_connection_sale_date_flag"][$val]["re_opentime_to"] = (String)$value["re_opentime_to"];
        $this->RetrunAPIData["marcat_estate_connection_sale_date_flag"][$val]["re_openfrom"] = (String)$value["re_openfrom"];
        $this->RetrunAPIData["marcat_estate_connection_sale_date_flag"][$val]["re_opento"] = (String)$value["re_opento"];
        $this->RetrunAPIData["marcat_estate_connection_sale_date_flag"][$val]["re_open_house"] = (Int)$value["re_open_house"];
    }



    protected function SetSingleApiData_marcat_estate_connection_post_meta($value,$val){
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["post_id"] = $val;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_company_name"] = (string)$value["re_company_name"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_company_id"] = (string)$value["re_company_id"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_type"] = (string)$value["re_type"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_kind"] = (string)$value["re_kind"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_company_name"] = (string)$value["re_company_name"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_company_id"] = (string)$value["re_company_id"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_office_id"] = (string)$value["re_office_id"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_office_name"] = (string)$value["re_office_name"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_office_tel"] = (string)$value["re_office_tel"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_office_code"] = (string)$value["re_office_code"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_user_name"] = (string)$value["re_user_name"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_open"] = (string)$value["re_open"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_chkstate"] = (string)$value["re_chkstate"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_place1"] = (string)$value["re_place1"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_place2"] = (string)$value["re_place2"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_place_name1"] = (string)$value["re_place_name1"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_place_name2"] = (string)$value["re_place_name2"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_zip"] = (string)$value["re_zip"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_address"] = (string)$value["re_address"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_address3"] = (string)$value["re_address3"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_lat"] = (string)$value["re_lat"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_long"] = (string)$value["re_long"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_price"] = (string)$value["re_price"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_price2"] = (string)$value["re_price2"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_tax_include"] = (string)$value["re_tax_include"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_land_price"] = (string)$value["re_land_price"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_building_price"] = (string)$value["re_building_price"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landrenton"] = (string)$value["re_landrenton"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landrentunit"] = (string)$value["re_landrentunit"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landexpirey"] = (string)$value["re_landexpirey"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landexpirem"] = (string)$value["re_landexpirem"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landrentrest"] = (string)$value["re_landrentrest"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landexpiredt"] = (string)$value["re_landexpiredt"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rent_ho"] = (string)$value["re_rent_ho"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rent_ho_type"] = (string)$value["re_rent_ho_type"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rent_ho_tax"] = (string)$value["re_rent_ho_tax"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rent_ken"] = (string)$value["re_rent_ken"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rent_ken_type"] = (string)$value["re_rent_ken_type"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rent_ken_tax"] = (string)$value["re_rent_ken_tax"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_floorsize"] = (string)$value["re_floorsize"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_floorsize2"] = (string)$value["re_floorsize2"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_land"] = (string)$value["re_land"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_land2"] = (string)$value["re_land2"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roomnum"] = (string)$value["re_roomnum"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roomtype"] = (string)$value["re_roomtype"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roomnum_2"] = (string)$value["re_roomnum_2"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roomtype_2"] = (string)$value["re_roomtype_2"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room_buy_num"] = (string)$value["re_room_buy_num"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roomtype_other"] = (string)$value["re_roomtype_other"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_houses"] = (string)$value["re_houses"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_buy_num"] = (string)$value["re_buy_num"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_path"] = (string)$value["re_path"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_chkdate"] = (string)$value["re_chkdate"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_transtype"] = (string)$value["re_transtype"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_holdoffice"] = (string)$value["re_holdoffice"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hold_tel"] = (string)$value["re_hold_tel"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hold_fax"] = (string)$value["re_hold_fax"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hold_holdaddress"] = (string)$value["re_hold_holdaddress"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hold_holdlicense"] = (string)$value["re_hold_holdlicense"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_holdOrganization"] = (string)$value["re_holdOrganization"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_buildname"] = (string)$value["re_buildname"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_rate"] = (string)$value["re_inv_rate"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_income"] = (string)$value["re_inv_income"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_houses"] = (string)$value["re_inv_houses"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_housed"] = (string)$value["re_inv_housed"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_regdate"] = (string)$value["re_regdate"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_upddate"] = (string)$value["re_upddate"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_next_update"] = (string)$value["re_next_update"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_openhouse"] = (string)$value["re_openhouse"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_catch_top"] = (string)$value["re_catch_top"];
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_catch_box"] = (string)$value->re_catch_box;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_staff_comment"] = (string)$value->re_staff_comment;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_building_etc"] = (string)$value->re_building_etc;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_recommend"] = (string)$value->re_recommend;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_price_last_update"] = (string)$value->re_price_last_update;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rank"] = (string)$value->re_rank;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_map_NG"] = (string)$value->re_map_NG;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_specialflag"] = (string)$value->re_specialflag;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_r_brandnew"] = (string)$value->re_r_brandnew;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_measuretype"] = (string)$value->re_measuretype;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_measuretype2"] = (string)$value->re_measuretype2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_setback"] = (string)$value->re_setback;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_setback_type"] = (string)$value->re_setback_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_setback_type"] = (string)$value->re_setback_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_privateroad"] = (string)$value->re_privateroad;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_private_m2"] = (string)$value->re_private_m2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_road_denom"] = (string)$value->re_road_denom;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_road_numer"] = (string)$value->re_road_numer;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rojijyo"] = (string)$value->re_rojijyo;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_kouatu"] = (string)$value->re_kouatu;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landrentper"] = (string)$value->re_landrentper;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_condition"] = (string)$value->re_condition;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_blockname"] = (string)$value->re_blockname;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_buildplan"] = (string)$value->re_buildplan;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_buildplan_m2"] = (string)$value->re_buildplan_m2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landingend"] = (string)$value->re_landingend;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_buildconfirm"] = (string)$value->re_buildconfirm;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_bconfreason"] = (string)$value->re_bconfreason;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landuse"] = (string)$value->re_landuse;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landuse_status"] = (string)$value->re_landuse_status;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_lie"] = (string)$value->re_lie;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_land_slope"] = (string)$value->re_land_slope;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_use"] = (string)$value->re_use;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_floorrate"] = (string)$value->re_floorrate;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_capacity"] = (string)$value->re_capacity;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_use1"] = (string)$value->re_use1;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_floorrate1"] = (string)$value->re_floorrate1;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_capacity1"] = (string)$value->re_capacity1;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_cityplan"] = (string)$value->re_cityplan;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_report"] = (string)$value->re_report;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rights"] = (string)$value->re_rights;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_develop_license"] = (string)$value->re_develop_license;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_teisyaku_touki"] = (string)$value->re_teisyaku_touki;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_teisyaku_rentdate"] = (string)$value->re_teisyaku_rentdate;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_teisyaku_rentcost"] = (string)$value->re_teisyaku_rentcost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_teisyaku_jyoto_agree"] = (string)$value->re_teisyaku_jyoto_agree;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_teisyaku_jyoto_cost"] = (string)$value->re_teisyaku_jyoto_cost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_teisyaku_jyoto_acceptor"] = (string)$value->re_teisyaku_jyoto_acceptor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_easement_type"] = (string)$value->re_easement_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_easement"] = (string)$value->re_easement;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_balcony"] = (string)$value->re_balcony;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_balcony_m2"] = (string)$value->re_balcony_m2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rbalcony_m2"] = (string)$value->re_rbalcony_m2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rbalcony_y"] = (string)$value->re_rbalcony_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rbalcony_unit"] = (string)$value->re_rbalcony_unit;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_terrace_m2"] = (string)$value->re_terrace_m2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_terrace_y"] = (string)$value->re_terrace_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_terrace_unit"] = (string)$value->re_terrace_unit;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_garden_m2"] = (string)$value->re_garden_m2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_garden_y"] = (string)$value->re_garden_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_garden_unit"] = (string)$value->re_garden_unit;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_builddt"] = (string)$value->re_builddt;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_structure"] = (string)$value->re_structure;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_structure_other"] = (string)$value->re_structure_other;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_buildingmonth"] = (string)$value->re_buildingmonth;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_company"] = (string)$value->re_company;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_floor"] = (string)$value->re_floor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roomname"] = (string)$value->re_roomname;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_ufloor"] = (string)$value->re_ufloor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_lfloor"] = (string)$value->re_lfloor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parking"] = (string)$value->re_parking;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parkingtype"] = (string)$value->re_parkingtype;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parkingnum"] = (string)$value->re_parkingnum;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parkingcost"] = (string)$value->re_parkingcost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parkingcost2"] = (string)$value->re_parkingcost2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parking_tax"] = (string)$value->re_parking_tax;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parkingcost_unit"] = (string)$value->re_parkingcost_unit;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parkingcost_include"] = (string)$value->re_parkingcost_include;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_parkingcost_free"] = (string)$value->re_parkingcost_free;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_ugp_type"] = (string)$value->re_ugp_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_ugp_m2"] = (string)$value->re_ugp_m2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_premises"] = (string)$value->re_premises;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_status"] = (string)$value->re_status;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_buildup"] = (string)$value->re_buildup;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_presentcond"] = (string)$value->re_presentcond;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_timming"] = (string)$value->re_timming;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_timmingdate"] = (string)$value->re_timmingdate;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_timmingperiod"] = (string)$value->re_timmingperiod;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_timmingcont"] = (string)$value->re_timmingcont;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_kindergarten"] = (string)$value->re_kindergarten;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_jschool"] = (string)$value->re_jschool;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_jhschool"] = (string)$value->re_jhschool;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_convenience"] = (string)$value->re_convenience;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_supermarket"] = (string)$value->re_supermarket;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_shoppingmall"] = (string)$value->re_shoppingmall;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hospital"] = (string)$value->re_hospital;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_internal"] = (string)$value->re_internal;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_pediatrics"] = (string)$value->re_pediatrics;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_dental"] = (string)$value->re_dental;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_animal"] = (string)$value->re_animal;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_government"] = (string)$value->re_government;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_park1"] = (string)$value->re_park1;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_park2"] = (string)$value->re_park2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore"] = (string)$value->re_irestore;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestoreym"] = (string)$value->re_irestoreym;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore1"] = (string)$value->re_irestore1;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore2"] = (string)$value->re_irestore2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore3"] = (string)$value->re_irestore3;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore4"] = (string)$value->re_irestore4;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore5"] = (string)$value->re_irestore5;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore6"] = (string)$value->re_irestore6;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore_other"] = (string)$value->re_irestore_other;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_orestore"] = (string)$value->re_orestore;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_orestoreym"] = (string)$value->re_orestoreym;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_orestore_other"] = (string)$value->re_orestore_other;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_renovation"] = (string)$value->re_renovation;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_renovationym"] = (string)$value->re_renovationym;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_renovation_other"] = (string)$value->re_renovation_other;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore_memo_date"] = (string)$value->re_irestore_memo_date;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_irestore_memo"] = (string)$value->re_irestore_memo;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_orestore_memo_date"] = (string)$value->re_orestore_memo_date;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_orestore_memo"] = (string)$value->re_orestore_memo;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_renovation_memo_date"] = (string)$value->re_renovation_memo_date;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_renovation_memo"] = (string)$value->re_renovation_memo;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_extensiontype"] = (string)$value->re_extensiontype;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_extensionym"] = (string)$value->re_extensionym;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_extension"] = (string)$value->re_extension;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_narrowroad"] = (string)$value->re_narrowroad;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room1floor"] = (string)$value->re_room1floor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room1type"] = (string)$value->re_room1type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room1size"] = (string)$value->re_room1size;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room1num"] = (string)$value->re_room1num;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room2floor"] = (string)$value->re_room2floor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room2type"] = (string)$value->re_room2type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room2size"] = (string)$value->re_room2size;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room2num"] = (string)$value->re_room2num;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room3floor"] = (string)$value->re_room3floor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room3type"] = (string)$value->re_room3type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room3size"] = (string)$value->re_room3size;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room3num"] = (string)$value->re_room3num;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room4floor"] = (string)$value->re_room4floor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room4type"] = (string)$value->re_room4type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room4size"] = (string)$value->re_room4size;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room4num"] = (string)$value->re_room4num;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room5floor"] = (string)$value->re_room5floor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room5type"] = (string)$value->re_room5type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room5size"] = (string)$value->re_room5size;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room5num"] = (string)$value->re_room5num;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room6floor"] = (string)$value->re_room6floor;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room6type"] = (string)$value->re_room6type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room6size"] = (string)$value->re_room6size;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_room6num"] = (string)$value->re_room6num;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_managefee"] = (string)$value->re_managefee;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_managefee2"] = (string)$value->re_managefee2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_mngtype"] = (string)$value->re_mngtype;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_mngtype2"] = (string)$value->re_mngtype2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_managefeetype"] = (string)$value->re_managefeetype;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_managefee_tax"] = (string)$value->re_managefee_tax;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_mngunion"] = (string)$value->re_mngunion;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_mngoffice"] = (string)$value->re_mngoffice;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_repaircost"] = (string)$value->re_repaircost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_repaircost2"] = (string)$value->re_repaircost2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rcosttype"] = (string)$value->re_rcosttype;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_repairfund"] = (string)$value->re_repairfund;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_neighborhood_cost"] = (string)$value->re_neighborhood_cost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_neighborhood_type"] = (string)$value->re_neighborhood_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_neighborhood_cost_y"] = (string)$value->re_neighborhood_cost_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_neighborhood_cost_type"] = (string)$value->re_neighborhood_cost_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_spa_cost"] = (string)$value->re_spa_cost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_spa_type"] = (string)$value->re_spa_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_spa_cost_y"] = (string)$value->re_spa_cost_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_spa_cost_type"] = (string)$value->re_spa_cost_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_net_initialcost"] = (string)$value->re_net_initialcost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_net_initialcost_y"] = (string)$value->re_net_initialcost_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_net_fixedcost"] = (string)$value->re_net_fixedcost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_net_fixedcost_y"] = (string)$value->re_net_fixedcost_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_net_fixedcost_type"] = (string)$value->re_net_fixedcost_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_catv_initialcost"] = (string)$value->re_catv_initialcost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_catv_initialcost_y"] = (string)$value->re_catv_initialcost_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_catv_fixedcost"] = (string)$value->re_catv_fixedcost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_catv_fixedcost_y"] = (string)$value->re_catv_fixedcost_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_catv_fixedcost_type"] = (string)$value->re_catv_fixedcost_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_usen_initialcost"] = (string)$value->re_usen_initialcost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_usen_initialcost_y"] = (string)$value->re_usen_initialcost_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_usen_fixedcost"] = (string)$value->re_usen_fixedcost;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_usen_fixedcost_y"] = (string)$value->re_usen_fixedcost_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_usen_fixedcost_type"] = (string)$value->re_usen_fixedcost_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_aftcost1"] = (string)$value->re_aftcost1;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_aftcost1_y"] = (string)$value->re_aftcost1_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_aftcost1type"] = (string)$value->re_aftcost1type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_aftcost2"] = (string)$value->re_aftcost2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_aftcost2_y"] = (string)$value->re_aftcost2_y;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_aftcost2type"] = (string)$value->re_aftcost2type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_gas"] = (string)$value->re_gas;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_suido"] = (string)$value->re_suido;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_osui"] = (string)$value->re_osui;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_zatuhaisui"] = (string)$value->re_zatuhaisui;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_bath"] = (string)$value->re_bath;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_toilet"] = (string)$value->re_toilet;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_konro_type"] = (string)$value->re_konro_type;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_konro_kuti"] = (string)$value->re_konro_kuti;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_reidanbo"] = (string)$value->re_reidanbo;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_internet"] = (string)$value->re_internet;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rem_base"] = (string)$value->re_rem_base;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rem_ceiling"] = (string)$value->re_rem_ceiling;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rem_insration"] = (string)$value->re_rem_insration;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_rem_seismic"] = (string)$value->re_rem_seismic;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_bconf_permit"] = (string)$value->re_bconf_permit;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_bconf_permitreason"] = (string)$value->re_bconf_permitreason;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_catch_open"] = (string)$value->re_catch_open;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_opencomment"] = (string)$value->re_opencomment;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_openschedule_from"] = (string)$value->re_openschedule_from;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_openschedule_to"] = (string)$value->re_openschedule_to;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_opentime_from"] = (string)$value->re_opentime_from;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_opentime_to"] = (string)$value->re_opentime_to;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_openfrom"] = (string)$value->re_openfrom;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_opento"] = (string)$value->re_opento;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_open_house"] = (string)$value->re_open_house;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_open_action"] = (string)$value->re_open_action;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_visit_OK"] = (string)$value->re_visit_OK;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_flag"] = (string)$value->re_inv_flag;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_rate"] = (string)$value->re_inv_rate;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_ratetype"] = (string)$value->re_inv_ratetype;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_full"] = (string)$value->re_inv_full;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_income"] = (string)$value->re_inv_income;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_houses"] = (string)$value->re_inv_houses;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_housed"] = (string)$value->re_inv_housed;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["r_inv_reformed"] = (string)$value->r_inv_reformed;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_reform"] = (string)$value->re_inv_reform;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_inv_boundtext"] = (string)$value->re_inv_boundtext;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_flag_value"] = (string)$value->re_flag_value;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_panourl"] = (string)$value->re_panourl;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_movieurl"] = (string)$value->re_movieurl;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_bukkenurl"] = (string)$value->re_bukkenurl;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["id"] = (string)$value->id;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_x_id"] = (string)$value->re_x_id;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_companyurl"] = (string)$value->re_companyurl;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_HP1_open"] = (string)$value->re_HP1_open;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_HP2_open"] = (string)$value->re_HP2_open;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_330navi_id"] = (string)$value->re_330navi_id;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_330navi_open"] = (string)$value->re_330navi_open;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_genba_flag"] = (string)$value->re_genba_flag;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_genba_flag"] = (string)$value->re_genba_flag;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_kakakuKbn"] = (string)$value->re_kakakuKbn;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_kakakuComment"] = (string)$value->re_kakakuComment;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_kakakuTaniKbn"] = (string)$value->re_kakakuTaniKbn;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_landrent_comment"] = (string)$value->re_landrent_comment;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_bukkenNm2"] = (string)$value->re_bukkenNm2;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hanbaiJotaiKbn"] = (string)$value->re_hanbaiJotaiKbn;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_yokokuKokokuComment"] = (string)$value->re_yokokuKokokuComment;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_saitaKakakutai_NG"] = (string)$value->re_saitaKakakutai_NG;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_saitaKakakutaiComment"] = (string)$value->re_saitaKakakutaiComment;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hanbaiHoshikiKbn"] = (string)$value->re_hanbaiHoshikiKbn;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hanbaiKaishiDateKbn"] = (string)$value->re_hanbaiKaishiDateKbn;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hanbaiKaishiNen"] = (string)$value->re_hanbaiKaishiNen;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hanbaiKaishiTsuki"] = (string)$value->re_hanbaiKaishiTsuki;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hanbaiKaishiJunKbn"] = (string)$value->re_hanbaiKaishiJunKbn;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hanbaiKaishiNenGetuhi"] = (string)$value->re_hanbaiKaishiNenGetuhi;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_hanbaiSchComment"] = (string)$value->re_hanbaiSchComment;
        $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_kenchikuJokenComment"] = (string)$value->re_kenchikuJokenComment;

        for($i=0; $i<=6; $i++) {
            $re_railroads = 're_railroad'.$i;
            if(!empty($value->$re_railroads)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_railroad"][$i] = (string)$value->$re_railroads;
            }
        }

        for($i=0; $i<=16; $i++) {
            $re_stations = 're_station'.$i;
            if(!empty($value->$re_stations)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_station"][$i] = (string)$value->$re_stations;
            }
        }

        for($i=0; $i<=6; $i++) {
            $re_railway_names = 're_railway_name'.$i;
            if(!empty($value->$re_railway_names)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_railway_name"][$i] = (string)$value->$re_railway_names;
            }
        }
        for($i=0; $i<=6; $i++) {
            $re_station_names = 're_station_name'.$i;
            if(!empty($value->$re_station_names)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_station_name"][$i] = (string)$value->$re_station_names;
            }
        }
        for($i=0; $i<=6; $i++) {
            $re_walks = 're_walk'.$i;
            if(!empty($value->$re_walks)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_walk"][$i] = (string)$value->$re_walks;
            }
        }
        for($i=0; $i<=6; $i++) {
            $re_buss = 're_bus'.$i;
            if(!empty($value->$re_buss)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_bus"][$i] = (string)$value->$re_buss;
            }
        }
        for($i=0; $i<=6; $i++) {
            $re_busstops = 're_busstop'.$i;
            if(!empty($value->$re_busstops)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_busstop"][$i] = (string)$value->$re_busstops;
            }
        }
        for($i=0; $i<=6; $i++) {
            $re_buswalks = 're_buswalk'.$i;
            if(!empty($value->$re_buswalks)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_buswalk"][$i] = (string)$value->$re_buswalks;
            }
        }
        for($i=0; $i<=6; $i++) {
            $re_cars = 're_car'.$i;
            if(!empty($value->$re_cars)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_car"][$i] = (string)$value->$re_cars;
            }
        }
        for($i=0; $i<=6; $i++) {
            $re_car_kms = 're_car_km'.$i;
            if(!empty($value->$re_car_kms)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_car_km"][$i] = (string)$value->$re_car_kms;
            }
        }
        for($i=0; $i<=4; $i++) {
            $re_roadstates = 're_road'.$i.'state';
            if(!empty($value->$re_roadstates)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roadstate"][$i] = (string)$value->$re_roadstates;
            }
        }
        for($i=0; $i<=4; $i++) {
            $re_roads = 're_road'.$i;
            if(!empty($value->$re_roads)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_road"][$i] = (string)$value->$re_roads;
            }
        }
        for($i=0; $i<=4; $i++) {
            $re_roadfaces = 're_road'.$i.'face';
            if(!empty($value->$re_roadfaces)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roadface"][$i] = (string)$value->$re_roadfaces;
            }
        }
        for($i=0; $i<=4; $i++) {
            $re_roadtypes = 're_road'.$i.'type';
            if(!empty($value->$re_roadtypes)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roadtype"][$i] = (string)$value->$re_roadtypes;
            }
        }
        for($i=0; $i<=4; $i++) {
            $re_roadwidths = 're_road'.$i.'width';
            if(!empty($value->$re_roadwidths)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roadwidth"][$i] = (string)$value->$re_roadwidths;
            }
        }
        for($i=0; $i<=4; $i++) {
            $re_roadposs = 're_road'.$i.'pos';
            if(!empty($value->$re_roadposs)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_roadwidth"][$i] = (string)$value->$re_roadpos;
            }
        }
        for($i=0; $i<=3; $i++) {
            $re_infoNames = 're_infoName'.$i;
            if(!empty($value->$re_roadposs)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_infoName"][$i] = (string)$value->$re_infoNames;
            }
        }
        for($i=0; $i<=3; $i++) {
            $re_infoTels = 're_infoTel'.$i;
            if(!empty($value->$re_roadposs)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_infoTel"][$i] = (string)$value->$re_infoTels;
            }
        }
        for($i=0; $i<=3; $i++) {
            $re_infoCharges = 're_infoCharge'.$i;
            if(!empty($value->$re_roadposs)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_infoCharge"][$i] = (string)$value->$re_infoCharges;
            }
        }

        for($i=0; $i<=39; $i++) {
            $re_pic_data_originals = 're_pic_data'.$i.'_original';
            if(!empty($value->$re_pic_data_originals)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_pic_data_original"][$i] = ReturnDefaultSetting::get_width_height_chenge((string)$value->$re_pic_data_originals);
            }
        }
        for($i=0; $i<=39; $i++) {
            $re_pic_data_thumbImgs = 're_pic_data'.$i.'_thumbImg';
            if(!empty($value->$re_pic_data_thumbImgs)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_pic_data_thumbImg"][$i] = ReturnDefaultSetting::get_width_height_chenge((string)$value->$re_pic_data_thumbImgs);
            }
        }

        for($i=0; $i<=39; $i++) {
            $re_pic_data_thumbs = 're_pic_data'.$i.'_thumb';
            if(!empty($value->$re_pic_data_thumbs)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_pic_data_thumb"][$i] = ReturnDefaultSetting::get_width_height_chenge((string)$value->$re_pic_data_thumbs);
            }
        }
        for($i=0; $i<=39; $i++) {
            $re_pic_data_remarkss = 're_pic_data'.$i.'_remarks';
            if(!empty($value->$re_pic_data_remarkss)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_pic_data_remarks"][$i] = ReturnDefaultSetting::get_width_height_chenge((string)$value->$re_pic_data_remarkss);
            }
        }

        for($i=0; $i<=39; $i++) {
            $re_pic_data_shoots = 're_pic_data'.$i.'_shoot';
            if(!empty($value->$re_pic_data_shoots)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_pic_data_shoot"][$i] = (string)$value->$re_pic_data_shoots;
            }
        }

        for($i=0; $i<=39; $i++) {
            $re_pic_data_categorys = 're_pic_data'.$i.'_category';
            if(!empty($value->$re_pic_data_categorys)){
                $this->RetrunAPIData["marcat_estate_connection_post_meta"][$val]["re_pic_data_category"][$i] = (string)$value->$re_pic_data_categorys;
            }
        }

    }
}
