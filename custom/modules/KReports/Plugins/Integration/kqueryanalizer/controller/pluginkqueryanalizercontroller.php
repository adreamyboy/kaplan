<?php

require_once('modules/KReports/KReport.php');

class pluginkqueryanalizercontroller {

    public function action_get_sql() {
        global $db;
        require_once('modules/KReports/KReport.php');
        $thisReport = new KReport();
        $thisReport->retrieve($_REQUEST['record']);

        // set the override Where if set in the request
        if (isset($_REQUEST['whereConditions']) && $_REQUEST['whereConditions'] != '') {
            $thisReport->whereOverride = json_decode_kinamu(html_entity_decode($_REQUEST['whereConditions']));
        }

        //echo $thisReport->get_report_main_sql_query('', true, '');

        $respArray = array(
            //2012-11-28 srip unicode characters with the pregreplace [^(\x20-\x7F)]* from the string .. 
            'main' => preg_replace('/\n|\r|[^(\x20-\x7F)]*/', '', $thisReport->get_report_main_sql_query(true, '', '')),
            'count' => $thisReport->kQueryArray->countSelectString,
            'total' => $thisReport->kQueryArray->totalSelectString, 
            
        );

        // process the describe
        $descObj = $db->query('DESCRIBE ' . $respArray['main']);
        while($descRow = $db->fetchByAssoc($descObj))
        {
            $respArray['descResult'][] = base64_encode(json_encode($descRow, JSON_FORCE_OBJECT));
        }
        
        echo json_encode($respArray);
    }

}

?>
