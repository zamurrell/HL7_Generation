<?php

include('fpcaredb.php');
include_once('ahi_pdo.php');
if (class_exists('lisDB') and !isset($GLOBALS['ahi_pdo'])) {
    $GLOBALS['ahi_pdo'] = new lisDB();
} // PDO imports from files not included in this repository


function readhtmlfilehl7($filepart)
{
    $filename = "/targetDirectory/" . $filepart;
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}

date_default_timezone_set('America/Chicago');

$fromdate = date('Y-m-d', strtotime("-1 days")) . ' 00:00:00';
$todate = date('Y-m-d', strtotime("-1 days")) . ' 23:59:59';

$fromdate_comment = date('Y-m-d', strtotime("-1 days"));
$todate_comment = date('Y-m-d', strtotime("-1 days"));


$sql = "SELECT REPLACE(REPLACE(REPLACE(result.reportable_result, 'Positive','A'), 'Negative', 'N'), 'Insufficient sample collection. Recollect the sample.', '') as abnormal_flag, r.patient_id as patient_id, s.id as sample_id, s.name as sample_name, REPLACE(REPLACE(REPLACE(REPLACE
(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.name, 'African American', 'B') , 'Hispanic', 'H') , 'Caucasian', 'W') , 'Japanese', 'A') , 'Chinese', 'A') 
, 'Asian', 'A') , 'Native American', 'I'), 'Middle Eastern', 'O') , 'Ashkenazi-Jewish', 'O') , 'Georgia', 'U'), 'European', 'U'), 'Not Specified', 'U') as requisition_race, r.first_name AS requisition_first_name, r.last_name AS requisition_last_name, DATE_FORMAT(r.date_of_birth,'%Y%m%d') AS requisition_date_of_birth_formatted, r.date_of_birth AS requisition_date_of_birth, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(g.name, 'Male', 'M') , 'Female', 'F') ,'Not specified', 'U') , 'Not Specified', 'U') , 'Other', 'O') AS requisition_gender, e.name AS requisition_ethnicity, IF((r.address = '1 No Address'), '', r.address) AS requisition_address, IF((r.address = '1 No Address'), '', r.city) AS requisition_city, IF((r.address = '1 No Address'), '', REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE
                        (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE
                        (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(r.state, 'Alabama', 'AL') , 'Alaska', 'AK') , 'Arizona', 'AZ') , 'Arkansas', 'AR') , 'California', 'CA') 
                        , 'Colorado', 'CO') , 'Connecticut', 'CT'), 'Delaware', 'DE') , 'Florida', 'FL') , 'Georgia', 'GA') , 'Hawaii', 'HI') , 'Idaho', 'ID') , 'Illinois', 'IL'), 'Indiana', 'IN') 
                        , 'Iowa', 'IA') , 'Kansas', 'KS') , 'Kentucky', 'KY') , 'Louisiana', 'LA') , 'Maine', 'ME'), 'Maryland', 'MD') , 'Massachusetts', 'MA') , 'Michigan', 'MI') , 'Minnesota', 'MN') 
                        , 'Mississippi', 'MS') , 'Missouri', 'MO'), 'Montana', 'MT') , 'Nebraska', 'NE') , 'Nevada', 'NV') , 'New Hampshire', 'NH') , 'New Jersey', 'NJ') , 'New Mexico', 'NM'), 'New York', 'NY') 
                        , 'North Carolina', 'NC') , 'North Dakota', 'ND') , 'Ohio', 'OH') , 'Oklahoma', 'OK') , 'Oregon', 'OR'), 'Pennsylvania', 'PA') , 'Rhode Island', 'RI') , 'South Carolina', 'SC') , 'South Dakota', 'SD') 
                        , 'Tennessee', 'TN') , 'Texas', 'TX'), 'Utah', 'UT') , 'Vermont', 'VT') , 'Virginia', 'VA') , 'Washington', 'WA') , 'West Virginia', 'WV') , 'Wisconsin', 'WI'), 'Wyoming', 'WY'), 'District of Columbia', 'DC')) AS requisition_state, IF((r.address = '1 No Address'), '', r.zip_code) AS requisition_zip_code, IF(CHAR_LENGTH(TRIM(r.phone)) = 10, TRIM(r.phone),'') AS requisition_phone, s.accession_number AS accession_number, DATE_FORMAT(s.date_collected,'%Y%m%d') AS date_collected_formatted, s.date_collected AS date_collected, REPLACE(REPLACE(REPLACE(result.reportable_result, 'Positive','260373001^Detected^SN'), 'Negative', '260415000^Not Detected^SN'), 'Insufficient sample collection. Recollect the sample.', '125154007^^SN') AS reportable_result, DATE_FORMAT(s.test_date,'%Y%m%d') AS test_date_formatted, s.test_date AS test_date, c.name AS client_name, cd.name AS client_doctor_name, c.address AS client_address, c.city AS client_city, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE
                        (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE
                        (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.state, 'Alabama', 'AL') , 'Alaska', 'AK') , 'Arizona', 'AZ') , 'Arkansas', 'AR') , 'California', 'CA') 
                        , 'Colorado', 'CO') , 'Connecticut', 'CT'), 'Delaware', 'DE') , 'Florida', 'FL') , 'Georgia', 'GA') , 'Hawaii', 'HI') , 'Idaho', 'ID') , 'Illinois', 'IL'), 'Indiana', 'IN') 
                        , 'Iowa', 'IA') , 'Kansas', 'KS') , 'Kentucky', 'KY') , 'Louisiana', 'LA') , 'Maine', 'ME'), 'Maryland', 'MD') , 'Massachusetts', 'MA') , 'Michigan', 'MI') , 'Minnesota', 'MN') 
                        , 'Mississippi', 'MS') , 'Missouri', 'MO'), 'Montana', 'MT') , 'Nebraska', 'NE') , 'Nevada', 'NV') , 'New Hampshire', 'NH') , 'New Jersey', 'NJ') , 'New Mexico', 'NM'), 'New York', 'NY') 
                        , 'North Carolina', 'NC') , 'North Dakota', 'ND') , 'Ohio', 'OH') , 'Oklahoma', 'OK') , 'Oregon', 'OR'), 'Pennsylvania', 'PA') , 'Rhode Island', 'RI') , 'South Carolina', 'SC') , 'South Dakota', 'SD') 
                        , 'Tennessee', 'TN') , 'Texas', 'TX'), 'Utah', 'UT') , 'Vermont', 'VT') , 'Virginia', 'VA') , 'Washington', 'WA') , 'West Virginia', 'WV') , 'Wisconsin', 'WI'), 'Wyoming', 'WY'), 'District of Columbia', 'DC') AS client_state, c.zip_code AS client_zip_code, IF(CHAR_LENGTH(TRIM(cd.phone)) = 10, TRIM(cd.phone),'') AS client_doctor_phone, r.name AS req_number
FROM sample s
JOIN requisition_sample rs
    ON rs.sample_id = s.id
JOIN requisition r
    ON r.id = rs.requisition_id
LEFT JOIN client c
    ON c.id = r.client_id
LEFT JOIN client_doctor cd
    ON cd.id = r.doctor_id
LEFT JOIN status
    ON r.status_id = status.id
LEFT JOIN requisition_report rr
    ON rr.requisition_id = r.id
LEFT JOIN requisition_report_history rrh
    ON rrh.requisition_id = r.id
LEFT JOIN requisition_form rf
    ON rf.requisition_id = r.id
LEFT JOIN requisition_resultsform rrf
    ON rrf.requisition_id = r.id
LEFT JOIN requisitionformoriginal rfo
    ON rfo.requisition_id = r.id
LEFT JOIN requisition_prescreenreport rpr
    ON rpr.requisition_id = r.id
LEFT JOIN bill_to bt
    ON bt.id = r.primary_bill_to_id
LEFT JOIN requisition_special_notification rsn
    ON rsn.requisition_id = r.id
LEFT JOIN critical_value_contact_log cvcl
    ON s.accession_number = cvcl.accession_number
LEFT JOIN gender g
    ON g.id = r.gender_id
LEFT JOIN ethnicity e
    ON e.id = r.ethnicity_id 
JOIN result
    ON s.id = result.sample_id
    AND result.analyte_id = 989
    AND result.reportable_result IS NOT NULL
    AND result.reportable_result <> ''  
WHERE DATE_FORMAT(rr.date_generated,'%Y-%m-%d %H:%i:%s') >= '" . $fromdate . "' 
AND DATE_FORMAT(rr.date_generated,'%Y-%m-%d %H:%i:%s') <= '" . $todate . "' 
AND r.state='State' GROUP BY s.id
UNION 
SELECT REPLACE(REPLACE(REPLACE(result.reportable_result, 'Positive','A'), 'Negative', 'N'), 'Insufficient sample collection. Recollect the sample.', '') as abnormal_flag, r.patient_id as patient_id, s.id as sample_id, s.name as sample_name, REPLACE(REPLACE(REPLACE(REPLACE
      (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(e.name, 'African American', 'B') , 'Hispanic', 'H') , 'Caucasian', 'W') , 'Japanese', 'A') , 'Chinese', 'A') 
      , 'Asian', 'A') , 'Native American', 'I'), 'Middle Eastern', 'O') , 'Ashkenazi-Jewish', 'O') , 'Georgia', 'U'), 'European', 'U'), 'Not Specified', 'U') as requisition_race, r.first_name AS requisition_first_name, r.last_name AS requisition_last_name, DATE_FORMAT(r.date_of_birth,'%Y%m%d') AS requisition_date_of_birth_formatted, r.date_of_birth AS requisition_date_of_birth, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(g.name, 'Male', 'M') , 'Female', 'F') ,'Not specified', 'U') , 'Not Specified', 'U') , 'Other', 'O') AS requisition_gender, e.name AS requisition_ethnicity, IF((r.address = '1 No Address'), '', r.address) AS requisition_address, IF((r.address = '1 No Address'), '', r.city) AS requisition_city, IF((r.address = '1 No Address'), '', REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE
                        (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE
                        (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(r.state, 'Alabama', 'AL') , 'Alaska', 'AK') , 'Arizona', 'AZ') , 'Arkansas', 'AR') , 'California', 'CA') 
                        , 'Colorado', 'CO') , 'Connecticut', 'CT'), 'Delaware', 'DE') , 'Florida', 'FL') , 'Georgia', 'GA') , 'Hawaii', 'HI') , 'Idaho', 'ID') , 'Illinois', 'IL'), 'Indiana', 'IN') 
                        , 'Iowa', 'IA') , 'Kansas', 'KS') , 'Kentucky', 'KY') , 'Louisiana', 'LA') , 'Maine', 'ME'), 'Maryland', 'MD') , 'Massachusetts', 'MA') , 'Michigan', 'MI') , 'Minnesota', 'MN') 
                        , 'Mississippi', 'MS') , 'Missouri', 'MO'), 'Montana', 'MT') , 'Nebraska', 'NE') , 'Nevada', 'NV') , 'New Hampshire', 'NH') , 'New Jersey', 'NJ') , 'New Mexico', 'NM'), 'New York', 'NY') 
                        , 'North Carolina', 'NC') , 'North Dakota', 'ND') , 'Ohio', 'OH') , 'Oklahoma', 'OK') , 'Oregon', 'OR'), 'Pennsylvania', 'PA') , 'Rhode Island', 'RI') , 'South Carolina', 'SC') , 'South Dakota', 'SD') 
                        , 'Tennessee', 'TN') , 'Texas', 'TX'), 'Utah', 'UT') , 'Vermont', 'VT') , 'Virginia', 'VA') , 'Washington', 'WA') , 'West Virginia', 'WV') , 'Wisconsin', 'WI'), 'Wyoming', 'WY'), 'District of Columbia', 'DC')) AS requisition_state, IF((r.address = '1 No Address'), '', r.zip_code) AS requisition_zip_code, IF(CHAR_LENGTH(TRIM(r.phone)) = 10, TRIM(r.phone),'') AS requisition_phone, s.accession_number AS accession_number, DATE_FORMAT(s.date_collected,'%Y%m%d') AS date_collected_formatted, s.date_collected AS date_collected, REPLACE(REPLACE(REPLACE(result.reportable_result, 'Positive','260373001^Detected^SN'), 'Negative', '260415000^Not Detected^SN'), 'Insufficient sample collection. Recollect the sample.', '125154007^^SN') AS reportable_result, DATE_FORMAT(s.test_date,'%Y%m%d') AS test_date_formatted, s.test_date AS test_date, c.name AS client_name, cd.name AS client_doctor_name, c.address AS client_address, c.city AS client_city, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE
                        (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE
                        (REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.state, 'Alabama', 'AL') , 'Alaska', 'AK') , 'Arizona', 'AZ') , 'Arkansas', 'AR') , 'California', 'CA') 
                        , 'Colorado', 'CO') , 'Connecticut', 'CT'), 'Delaware', 'DE') , 'Florida', 'FL') , 'Georgia', 'GA') , 'Hawaii', 'HI') , 'Idaho', 'ID') , 'Illinois', 'IL'), 'Indiana', 'IN') 
                        , 'Iowa', 'IA') , 'Kansas', 'KS') , 'Kentucky', 'KY') , 'Louisiana', 'LA') , 'Maine', 'ME'), 'Maryland', 'MD') , 'Massachusetts', 'MA') , 'Michigan', 'MI') , 'Minnesota', 'MN') 
                        , 'Mississippi', 'MS') , 'Missouri', 'MO'), 'Montana', 'MT') , 'Nebraska', 'NE') , 'Nevada', 'NV') , 'New Hampshire', 'NH') , 'New Jersey', 'NJ') , 'New Mexico', 'NM'), 'New York', 'NY') 
                        , 'North Carolina', 'NC') , 'North Dakota', 'ND') , 'Ohio', 'OH') , 'Oklahoma', 'OK') , 'Oregon', 'OR'), 'Pennsylvania', 'PA') , 'Rhode Island', 'RI') , 'South Carolina', 'SC') , 'South Dakota', 'SD') 
                        , 'Tennessee', 'TN') , 'Texas', 'TX'), 'Utah', 'UT') , 'Vermont', 'VT') , 'Virginia', 'VA') , 'Washington', 'WA') , 'West Virginia', 'WV') , 'Wisconsin', 'WI'), 'Wyoming', 'WY'), 'District of Columbia', 'DC') AS client_state, c.zip_code AS client_zip_code, IF(CHAR_LENGTH(TRIM(cd.phone)) = 10, TRIM(cd.phone),'') AS client_doctor_phone, r.name AS req_number
FROM sample s
JOIN requisition_sample rs
    ON rs.sample_id = s.id
JOIN requisition r
    ON r.id = rs.requisition_id
LEFT JOIN client c
    ON c.id = r.client_id
LEFT JOIN client_doctor cd
    ON cd.id = r.doctor_id
LEFT JOIN status
    ON r.status_id = status.id
LEFT JOIN requisition_report rr
    ON rr.requisition_id = r.id
LEFT JOIN requisition_report_history rrh
    ON rrh.requisition_id = r.id
LEFT JOIN requisition_form rf
    ON rf.requisition_id = r.id
LEFT JOIN requisition_resultsform rrf
    ON rrf.requisition_id = r.id
LEFT JOIN requisitionformoriginal rfo
    ON rfo.requisition_id = r.id
LEFT JOIN requisition_prescreenreport rpr
    ON rpr.requisition_id = r.id
LEFT JOIN bill_to bt
    ON bt.id = r.primary_bill_to_id
LEFT JOIN requisition_special_notification rsn
    ON rsn.requisition_id = r.id
LEFT JOIN critical_value_contact_log cvcl
    ON s.accession_number = cvcl.accession_number
LEFT JOIN gender g
    ON g.id = r.gender_id
LEFT JOIN ethnicity e
    ON e.id = r.ethnicity_id
JOIN result
    ON s.id = result.sample_id
    AND result.analyte_id = 989
    AND result.reportable_result IS NOT NULL
    AND result.reportable_result <> ''  
WHERE DATE_FORMAT(rr.date_generated,'%Y-%m-%d %H:%i:%s') >= '" . $fromdate . "' 
AND DATE_FORMAT(rr.date_generated,'%Y-%m-%d %H:%i:%s') <= '" . $todate . "' 
AND c.state='State' GROUP BY s.id
";

$creation_time = date('YmdHis');
$creation_date = date('Ymd');
$data_date = date('d-m-Y', strtotime("-1 days"));



$reqs_debug = $GLOBALS['ahi_pdo']->debug_query($sql);
echo "\n\nQuery: " . $reqs_debug . "\n\n";
$reqs = $GLOBALS['ahi_pdo']->query($sql)->get_all();

$number = count($reqs);

if ($number > 0) {
    echo "Number of results: " . $number . "\n\n";
    // echo json_encode($reqs);
} else {
    echo "No results\n\n";
}

if ($number > 0) {
}

if ($number > 0) {
    $hl7_string = "";
    $hl7_string .= "FHS|^~\&||Lab Name^1234LabClia^CLIA|||" . $creation_time . "||||Covid_Results_" . $data_date . "_to_" . $data_date . "\n";
    $hl7_string .= "BHS|^~\&||Lab Name^1234LabClia^CLIA|||" . $creation_time . "||||" . $creation_time . "0001\n";
    $i = 1;
    for ($x = 0; $x < $number; $x++) {
        $hl7_string .= "MSH|^~\&||Lab Name^1234LabClia^CLIA|||" . $creation_time . "||ORU^R01|" . $creation_time . "_" . $i . "|T|2.3.1\n";
        $hl7_string .= "PID|1||" . $reqs[$x]['patient_id'] . "||" . $reqs[$x]['requisition_last_name'] . "^" . $reqs[$x]['requisition_first_name'] . "||" . $reqs[$x]['requisition_date_of_birth_formatted'] . "|" . $reqs[$x]['requisition_gender'] . "||" . $reqs[$x]['requisition_race'];
        $hl7_string .= "|" . $reqs[$x]['requisition_address'] . "^^" . $reqs[$x]['requisition_city'] . "^" . $reqs[$x]['requisition_state'] . "^" . $reqs[$x]['requisition_zip_code'] . "|";
        if ($reqs[$x]['requisition_phone'] != "") {
            $first_three_req_phone = substr($reqs[$x]['requisition_phone'], 0, 3);
            $last_six_req_phone = substr($reqs[$x]['requisition_phone'], 3);
            $hl7_string .= "|^PRN^PH^^1^" . $first_three_req_phone . "^" . $last_six_req_phone . "|";
        } else {
            $hl7_string .= "||";
        }
        $hl7_string .= "||||||||";
        if ($reqs[$x]['requisition_race'] == "H") {
            $hl7_string .= "H";
        } else if ($reqs[$x]['requisition_race'] == "W" || $reqs[$x]['requisition_race'] == "B" || $reqs[$x]['requisition_race'] == "O" || $reqs[$x]['requisition_race'] == "A" || $reqs[$x]['requisition_race'] == "I") {
            $hl7_string .= "NH";
        } else {
            $hl7_string .= "U\n";
        }
        $hl7_string .= "ORC|||||||||||||||||||||" . $reqs[$x]['client_name'] . "|" . $reqs[$x]['client_address'] . "^^" . $reqs[$x]['client_city'] . "^" . $reqs[$x]['client_state'] . "^" . $reqs[$x]['client_zip_code'];
        if ($reqs[$x]['client_doctor_phone'] != "") {
            $first_three_cd_phone = substr($reqs[$x]['client_doctor_phone'], 0, 3);
            $last_six_cd_phone = substr($reqs[$x]['client_doctor_phone'], 3);
            $hl7_string .= "|^^^^^" . $first_three_cd_phone . "^" . $last_six_cd_phone . "\n";
        } else {
            $hl7_string .= "|^^^^^999^9999999\n";
        }
        $hl7_string .= "OBR|1||" . $reqs[$x]['accession_number'] . "|94500-6^SARS-CoV-2 (COVID-19) RNA [Presence] in Respiratory specimen by NAA with probe detection^LN|||" . $reqs[$x]['date_collected_formatted'] . "||||||||Nasopharyngeal Swab|" . $reqs[$x]['client_doctor_name'] . "|||||||||F\n";
        $hl7_string .= "OBX|1|CE|94500-6^SARS-CoV-2 (COVID-19) RNA [Presence] in Respiratory specimen by NAA with probe detection^LN||" . $reqs[$x]['reportable_result'] . "|||" . $reqs[$x]['abnormal_flag'] . "|||F|||" . $reqs[$x]['date_collected_formatted'] . "\n";
        $i++;
    }
    $num_entries = $i - 1;
    $hl7_string .= "BTS|" . $num_entries . "\n";
    $hl7_string .= "FTS|1\n";

    $pendingdir = '/sftp/Covid/Reports/HL7';
    // if (!mkdir("$pendingdir", 0755)) {
    //     echo "Error creating directory";
    // } else {
    // }

    $file = $pendingdir . '/Lab_Name_State_Name' . '_' . $creation_time . '.HL7';
    file_put_contents($file, $hl7_string);
}
