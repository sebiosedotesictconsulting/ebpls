<?php
include("includes/variables.php");
include("lib/multidbconnection.php");                                                                                         
$dbLink =Open($dbtype,$connecttype,$dbhost,$dbuser,$dbpass,$dbname);

$x = 0;
while ($x<5000) {

/*
$r = mysql_query("INSERT INTO ebpls_owner (owner_id, owner_first_name, owner_middle_name, owner_last_name, owner_house_no, owner_street, owner_barangay_code, owner_zone_code, owner_district_code, owner_city_code, owner_province_code, owner_zip_code, owner_citizenship, owner_civil_status, owner_gender, owner_tin_no, owner_icr_no, owner_phone_no, owner_gsm_no, owner_email_address, owner_others, owner_birth_date, owner_reg_date, owner_lastupdated, owner_lastupdated_by, edit_by, edit_locked) VALUES ( '','$x ALBERT', '$x R.', '$x DYSUN', '', '1461 F AGONCILLIO COR. O. ESCODA', 'MA-ERMITA-ERMITA', '', 'MA-ERMITA', 'MA', 'METRO MANILA', '2200', 'FILIPINO', 'Married', 'M', '', '', '', '', '', '', '0000-00-00 00:00:00', '2005-10-19 10:00:30', '2005-10-19 10:00:30', 'NOV2', '', 0)") or die (mysql_error());

$ownid = mysql_insert_id();

$r = mysql_query("INSERT INTO ebpls_business_enterprise (business_id, owner_id, business_name, business_branch, business_permit_trans_type, business_lot_no, business_street, business_barangay_code, business_zone_code, business_barangay_name, business_district_code, business_city_code, business_province_code, business_zip_code, business_contact_no, business_fax_no, business_email_address, business_url, business_location_desc, business_building_name, business_phone_no, business_category_code, business_dot_acr_no, business_sec_reg_no, business_tin_reg_no, business_dti_reg_no, business_dti_reg_date, business_date_established, business_start_date, business_occupancy_code, business_offc_code, business_capital_investment, employee_male, business_no_del_vehicles, business_payment_mode, business_exemption_code, business_type_code, business_nso_assigned_no, business_nso_estab_id, business_industry_sector_code, business_remarks, business_status_code, business_status_remarks, business_application_status, business_application_status_rem, business_last_yrs_cap_invest, business_last_yrs_no_employees, business_last_yrs_no_employees_male, business_last_yrs_no_employees_female, business_last_yrs_dec_gross_sales, business_retirement_date, business_retirement_reason, business_application_date, business_validity_period, business_req_code, business_nature_code, business_create_ts, business_update_by, business_update_ts, comment, business_scale, retire, employee_female, blacklist, biztype, subsi, pcname, pcaddress, regname, paidemp, ecoorg, ecoarea, business_plate, branch_id, edit_by, edit_locked) VALUES ('', '$ownid', '$x YAKULT MARKETING CORP.', 'NOVELETA', '', '1', 'SAN RAFAEL I', 'QC-1-SAN ANTONIO II', 'QC-1-SAN ANTONIO II-', '', '4105-NONE', '4105', 'CAVITE', '4105-4105', '', '', '', NULL, '', 'FABIAN ANGKIKO JR.', '', '123', '', '', '', '', '0000-00-00 00:00:00', '2005-01-20 00:00:00', '2005-01-20 00:00:00', '1', '', '0.00', 0, 0, 'ANNUAL', NULL, '', '', '', '', '', '', NULL, '', NULL, '0.00', 1, 0, 0, '0.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '2005-10-19 10:15:48', 'ADMIN', '2005-10-20 00:14:36', '', 'MICRO', 0, 0, 0, 'Franchise', 0, '', '', '', 0, 2, 1, 0, 0, '', 0)");

$busid = mysql_insert_id();


$r = mysql_query("INSERT INTO ebpls_business_enterprise_permit (business_permit_id, business_permit_code, business_id, owner_id, retirement_code, retirement_date, retirement_date_processed, for_year, application_date, paid, released, input_by, transaction, steps, pin, active, pmode) VALUES ('', NULL, '$busid', '$ownid', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2005', '2005-10-19 10:12:57', 0, NULL, 'NOV2', 'New', 'For Assessment', '', 1, 'QUARTERLY')") or die(mysql_error());
*/
$x++;
$r=mysql_query("INSERT INTO ebpls_fishery_permit (ebpls_fishery_id, ebpls_fishery_permit_code, owner_id, ebpls_fishery_businessname, ebpls_fishery_permit_application_date, ebpls_fishery_local_name_fishing_gear, ebpls_fishery_in_english, ebpls_fishery_no_of_units, ebpls_fishery_assess_value_fishing_gear, ebpls_fishery_fishing_gear_size, ebpls_fishery_area_size, ebpls_fishery_no_of_crew, ebpls_fishery_motorized, ebpls_fishery_registered, ebpls_fishery_boat_name, ebpls_fishery_registration_no, ebpls_fishery_ave_fish_catch_present, ebpls_fishery_ave_fish_catch_2yrs_ago, ebpls_fishery_location, ebpls_fishery_rc_no, ebpls_fishery_rc_issued_at, ebpls_fishery_rc_issued_on, transaction, for_year, paid, released, steps, pin, active) VALUES ('', '',$x, '\'\'', '2005-11-24 13:51:39', '', '', 1, '0.00', '0.00', '0.00', 0, 'YES', 'YES', '', '', '0.00', '0.00', NULL, NULL, NULL, '0000-00-00 00:00:00', 'New', '2005', 0, NULL, 'For Payment', '', 1)");

$r = mysql_query("INSERT INTO ebpls_franchise_permit (franchise_permit_id, franchise_permit_code, owner_id, retirement_code, retirement_date, retirement_date_processed, requirement_code, for_year, application_date, paid, released, transaction, steps, pin, active) VALUES ('', '', $x, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2005', '2005-11-24', 1, 1, 'New', 'Payment', '', 1)");

$r = mysql_query("INSERT INTO ebpls_occupational_permit (occ_permit_id, occ_permit_code, owner_id, occ_permit_application_date, occ_position_applied, occ_employer, occ_employer_trade_name, occ_employer_lot_no, occ_employer_street, occ_employer_barangay_code, occ_employer_zone_code, occ_employer_barangay_name, occ_employer_district_code, occ_employer_city_code, occ_employer_province_code, occ_employer_zip_code, for_year, paid, released, transaction, steps, pin, active, business_id) VALUES ('', '', $x, '2005-11-24 13:53:28', '', '', '', '', '', '', '', '', '', '', '', '', '2005', 0, 0, 'New', 'For Payment', '', 1, $x)");

$r=mysql_query("INSERT INTO ebpls_peddlers_permit (peddlers_permit_id, owner_id, merchandise_sold, peddlers_business_name, retirement_code, retirement_date, retirement_date_processed, for_year, peddlers_permit_code, application_date, paid, transaction, released, steps, pin, active) VALUES ('', $x, 'fud $x', 'ped nam $x', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2005', '', '2005-11-24', 0, 'New', NULL, 'For Payment', '', 1)");




}
echo "ayos";
?>
