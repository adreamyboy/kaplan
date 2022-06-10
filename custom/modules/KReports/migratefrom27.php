<?php

global $db;

// just for migration .. 
//$db->query("DELETE FROM kreports");

$oldDb = new MysqliManager();

// switch the db
$oldDb->connect(array(
    'db_host_name' => '127.0.0.1',
    'db_user_name' => 'root',
    'db_password' => 'root',
    'db_name' => 'ce65krep274',
    'db_type' => 'mysql',
));

$oldDbObj = $oldDb->query("SELECT * FROM kreports");
while ($oldDbRecord = $oldDb->fetchByAssoc($oldDbObj)) {
    // print_r($oldDbRecord);
    $newReport = BeanFactory::getBean('KReports');
    $newReport->retrieve($oldDbRecord['id']);

    if ($newReport->id == '')
        $newReport->new_with_id = true;

    // get the fieldnames by ID first ... will need it later on
    $listFieldsById = array();
    $listFieldsArray = json_decode(html_entity_decode($oldDbRecord['listfields']), true);
    foreach($listFieldsArray as $thisListField){
        $listFieldsById[$thisListField['fieldid']] = $thisListField['name'];
    }
    
    foreach ($oldDbRecord as $fieldId => $fieldValue) {
        switch ($fieldId) {
            case 'publishoptions': 
                if($fieldValue != ''){
                    if($newReport->integration_params != '')
                        $integrationParams = json_decode(html_entity_decode($newReport->integration_params));
                    else 
                    {
                        $integrationParams = new stdClass();
                        $integrationParams->activePlugins = new stdClass();
                    }
                    
                    $integrationParams->activePlugins->kpublishing = '1';
                    
                    $integrationParams->kpublishing = new stdClass();
                    $publishOptions = json_decode(html_entity_decode($fieldValue), true); 
                    $integrationParams->kpublishing->dashletPresentation = ($publishOptions['publishDashletGrid'] ? 'on' : 'off');
                    $integrationParams->kpublishing->dashletVisualization = ($publishOptions['publishDashletChart'] ? 'on' : 'off');
                    $integrationParams->kpublishing->subpanelPresentation = ($publishOptions['publishSubpanelGrid'] ? 'on' : 'off');
                    $integrationParams->kpublishing->subpanelVisualization = ($publishOptions['publishSubpanelChart'] ? 'on' : 'off');
                    $integrationParams->kpublishing->subpanelSequence = ($publishOptions['publishSubpanelOrder'] != '' ? $publishOptions['publishSubpanelOrder'] : '');
                    $integrationParams->kpublishing->subpanelModule = ($publishOptions['publishSubpanelModule'] != '' ? $publishOptions['publishSubpanelModule'] : '');
                    $integrationParams->kpublishing->subpanelTab = ($publishOptions['publishSubpanelTab'] != '' ? $publishOptions['publishSubpanelTab'] : '');
                    
                    $newReport->integration_params = json_encode($integrationParams);
                }
                break; 
            case 'pdforientation': 
                break;
            case 'pdfoptions':
                if($fieldValue != ''){
                    if($newReport->integration_params != '')
                        $integrationParams = json_decode(html_entity_decode($newReport->integration_params));
                    else 
                    {
                        $integrationParams = new stdClass();
                        $integrationParams->activePlugins = new stdClass();
                    }
                    
                    $integrationParams->activePlugins->kpdfexport = '1';
                    $integrationParams->kpdfexport = new stdClass();
                    $pdfOptions = json_decode(html_entity_decode($fieldValue), true); 
                    
                    $integrationParams->kpdfexport->pdf_layout = 'default';
                    $integrationParams->kpdfexport->pdf_format = ($pdfOptions['format'] != '' ? $pdfOptions['format'] : 'A4');
                    $integrationParams->kpdfexport->pdf_orientation = (!empty($pdfOptions['orientation']) ? $pdfOptions['orientation'] : 'P');
                    $integrationParams->kpdfexport->pdf_palignment = ($pdfOptions['tablepos'] != '' ? $pdfOptions['tablepos'] : 'L');
                    
                    $newReport->integration_params = json_encode($integrationParams);
                }
                break;            
            case 'listfields':
                // see if we have field sum function 
                $fieldSumFunctionArray = array();
                $propertiesArray = json_decode(html_entity_decode($oldDbRecord['listtypeproperties']), true);
                foreach ($propertiesArray as $propertiesData) {
                    if (!empty($propertiesData['fieldfunction']))
                        $fieldSumFunctionArray[$propertiesData['fieldid']] = $propertiesData['fieldfunction'];
                }


                $listFields = json_decode(html_entity_decode($fieldValue), true);
                foreach ($listFields as $fieldCounter => $fieldData) {
                    // encode the customfunction
                    if (!empty($fieldData['customsqlfunction'])) {
                        $listFields[$fieldCounter]['customsqlfunction'] = base64_encode(urlencode(str_replace('$', '{t}.{f}', $fieldData['customsqlfunction'])));
                    }
                    // encode the fomula
                    if (!empty($fieldData['formulavalue'])) {
                        if (base64_decode($fieldData['formulavalue'], true))
                            $listFields[$fieldCounter]['formulavalue'] = $fieldData['formulavalue'];
                        else
                            $listFields[$fieldCounter]['formulavalue'] = base64_encode(urlencode($fieldData['formulavalue']));
                    }

                    if (!empty($fieldSumFunctionArray[$fieldData['fieldid']]))
                        $listFields[$fieldCounter]['summaryfunction'] = strtolower($fieldSumFunctionArray[$fieldData['fieldid']]);
                }
                $newReport->listfields = json_encode($listFields);
                break;
            case 'selectionlimit':
                $newReport->selectionlimit = '';
                break;
            case 'listtypeproperties':
                $newReport->listtypeproperties = '';
                break;
            case 'listtype':
                // build the presentation params
                $presentationParams = array();
                switch ($fieldValue) {

                    case 'pivot':
                        $newReport->listtype = 'pivot';
                        $presentationParams['plugin'] = 'pivot';
                        $presentationParams['pluginData'] = new stdClass();
                        // $presentationParams['pluginData']->groupedViewProperties = new stdClass();
                        $propertiesArray = json_decode(html_entity_decode($oldDbRecord['listtypeproperties']), true);

                        $xAxis = json_decode($propertiesArray[0], true);
                        $presentationParams['pluginData']->rowData = $xAxis[0]['fieldid'];

                        $yAxis = json_decode($propertiesArray[1], true);
                        $presentationParams['pluginData']->columnData = array();
                        foreach ($yAxis as $yAxisEntry) {
                            $columnObject = new stdClass();
                            $columnObject->fieldid = $yAxisEntry['fieldid'];
                            $columnObject->name = $yAxisEntry['name'];
                            $presentationParams['pluginData']->columnData[] = $columnObject;
                        }

                        $vAxis = json_decode($propertiesArray[2], true);
                        $presentationParams['pluginData']->valueData = array();
                        $valueObject = new stdClass();
                        $valueObject->fieldid = $vAxis[0]['fieldid'];
                        $valueObject->name = $vAxis[0]['name'];
                        $valueObject->pivotfunction = strtoupper($vAxis[0]['pivotfunction']);
                        $valueObject->pivotrenderer = '';
                        $presentationParams['pluginData']->valueData[] = $valueObject;

                        $presentationParams['pluginData']->advancedOptions = new stdClass();
                        $presentationParams['pluginData']->advancedOptions->showTotal = true;
                        $presentationParams['pluginData']->advancedOptions->showEmpty = false;
                        $presentationParams['pluginData']->advancedOptions->adjustwidth = true;
                        $presentationParams['pluginData']->advancedOptions->sortwidth = false;
                        $presentationParams['pluginData']->advancedOptions->nameWidth = null;
                        $presentationParams['pluginData']->advancedOptions->minWidth = null;

                        break;
                    case 'grouped':
                    case 'grpwthsum':
                        $newReport->listtype = 'grouped';
                        $presentationParams['plugin'] = 'grouped';
                        $presentationParams['pluginData'] = new stdClass();
                        $presentationParams['pluginData']->groupedViewProperties = new stdClass();
                        $propertiesArray = json_decode(html_entity_decode($oldDbRecord['listtypeproperties']), true);
                        foreach ($propertiesArray as $propertiesData) {
                            if ($propertiesData['groupby'] == 'yes')
                                $presentationParams['pluginData']->groupedViewProperties->groupById = $propertiesData['fieldid'];
                        }
                        break;
                    // default we assume standard
                    default:
                        $newReport->listtype = 'standard';
                        $presentationParams['plugin'] = 'standard';
                        $presentationParams['pluginData'] = new stdClass();
                        break;
                }
                $newReport->presentation_params = json_encode($presentationParams);
                break;
            case 'chart_params_new':
                if ($fieldValue != '') {
                    include('modules/KReports/config/KReportLayouts.php');
                    $paramsObj = new stdClass();
                    $paramsObj->plugin = 'fusioncharts';
                    //$paramsObj->height = '300';
                    $paramsObj->height = ($oldDbRecord['chart_height'] != '' ? $oldDbRecord['chart_height'] : '300');
                    $paramsObj->layout = $oldDbRecord['chart_layout'];

                    for ($i = 1; $i <= count($kreportLayouts[$oldDbRecord['chart_layout']]['items']); $i++) {
                        $paramsObj->$i = new stdClass();
                        $paramsObj->$i->plugin = 'fusioncharts';
                        $paramsObj->$i->fusioncharts->uid = 'k' . substr(str_replace('-', '', create_guid()), 0, 28);
                        $paramsObj->$i->fusioncharts->dims = '111';
                        $paramsObj->$i->fusioncharts->type = 'Area2D';
                        $paramsObj->$i->fusioncharts->dimensions = new stdClass();
                        $paramsObj->$i->fusioncharts->dimensions->dimension1 = null;
                        $paramsObj->$i->fusioncharts->dimensions->dimension2 = null;
                        $paramsObj->$i->fusioncharts->dimensions->dimension3 = null;
                        $paramsObj->$i->fusioncharts->multiplier = null;
                        $paramsObj->$i->fusioncharts->dataseries = array();
                        $paramsObj->$i->fusioncharts->options = new stdClass();
                        $paramsObj->$i->fusioncharts->title = '';
                        $paramsObj->$i->fusioncharts->context = '';
                        $paramsObj->$i->fusioncharts->colors = 'mountainsunset';
                        $paramsObj->$i->fusioncharts->minmax = new stdClass();
                        $paramsObj->$i->fusioncharts->minmax->vmin = null;
                        $paramsObj->$i->fusioncharts->minmax->vmax = null;
                        $paramsObj->$i->fusioncharts->minmax->hmin = null;
                        $paramsObj->$i->fusioncharts->minmax->hmax = null;
                        $paramsObj->$i->fusioncharts->minmax->gfrom = null;
                        $paramsObj->$i->fusioncharts->minmax->gto = null;
                        $paramsObj->$i->fusioncharts->minmax->yfrom = null;
                        $paramsObj->$i->fusioncharts->minmax->yto = null;
                        $paramsObj->$i->fusioncharts->minmax->rfrom = null;
                        $paramsObj->$i->fusioncharts->minmax->rto = null;
                    }

                    $paramsArray = json_decode(html_entity_decode($fieldValue), true);
                    foreach ($paramsArray as $thisParam) {
                        $j = $thisParam['chartid'];
                        switch ($thisParam['parameter']) {
                            case 'title':
                                $paramsObj->$j->fusioncharts->title = $thisParam['value'];
                                break;
                            case 'context':
                                $paramsObj->$j->fusioncharts->context = $thisParam['value'];
                                break;
                            case 'charttype':
                                $paramsObj->$j->fusioncharts->type = $thisParam['value'];
                                break;
                            case 'chartdimension':
                                switch ($thisParam['value']) {
                                    case 'oneDimensional':
                                        $paramsObj->$j->fusioncharts->dims = '111';
                                        break;
                                    case 'twoDimensional':
                                        $paramsObj->$j->fusioncharts->dims = '221';
                                        break;
                                    case 'multiseries':
                                        $paramsObj->$j->fusioncharts->dims = '21N';
                                        break;
                                    case 'multiValues':
                                        $paramsObj->$j->fusioncharts->dims = '10N';
                                        break;
                                }
                                break;
                            case 'dimensionx':
                            case 'dimensionms':
                                if ($thisParam['value'] != '')
                                    $paramsObj->$j->fusioncharts->dimensions->dimension1 = $thisParam['value'];
                                break;
                            case 'dimensiony':
                                if ($thisParam['value'] != '')
                                    $paramsObj->$j->fusioncharts->dimensions->dimension2 = $thisParam['value'];
                                break;
                            case 'dataseries':
                                if ($thisParam['value'] != '') {
                                    $thisDataseries = new stdClass();
                                    $thisDataseries->fieldid = $thisParam['value'];
                                    $thisDataseries->name = $listFieldsById[$thisParam['value']];
                                    $thisDataseries->chartfunction = 'SUM';
                                    $thisDataseries->meaning = 'value';
                                    $thisDataseries->axis = 'p';
                                    $thisDataseries->renderer = 'bars';
                                    $paramsObj->$j->fusioncharts->dataseries[] = $thisDataseries;
                                }
                                break;
                            case 'dataseriesms':
                                if ($thisParam['value'] != '') {
                                    $dataseriesArray = explode('^', $thisParam['value']);
                                    foreach($dataseriesArray as $dataseriesId){
                                        $thisDataseries = new stdClass();
                                        $thisDataseries->fieldid = $dataseriesId;
                                        $thisDataseries->name = $listFieldsById[$dataseriesId];
                                        $thisDataseries->chartfunction = 'SUM';
                                        $thisDataseries->meaning = 'value';
                                        $thisDataseries->axis = 'p';
                                        $thisDataseries->renderer = '';
                                        $paramsObj->$j->fusioncharts->dataseries[] = $thisDataseries;
                                    }
                                }
                                break;
                            case 'shownames':
                                if ($thisParam['value'] != '')
                                    $paramsObj->$j->fusioncharts->options->hideLabels = 'on';
                                break;
                            case 'showvalues':
                                if ($thisParam['value'] != '')
                                    $paramsObj->$j->fusioncharts->options->hideValues = 'on';
                                break;
                            case 'showpercentvalues':

                                break;
                            case 'scalenumbers': // <-add
                                if ($thisParam['value'] == 'true')
                                    $paramsObj->$j->fusioncharts->options->scalenumbers = 'on';
                                break;
                            case 'showdecimals': // <-add
                                if ($thisParam['value'] == 'true')
                                    $paramsObj->$j->fusioncharts->options->showdecimals = 'on';
                                break;
                            case 'showempty':
                                if ($thisParam['value'] == 'true')
                                    $paramsObj->$j->fusioncharts->options->emptyvalues = 'on';
                                break;
                            case 'rotatenames':
                                if ($thisParam['value'] == 'true')
                                    $paramsObj->$j->fusioncharts->options->rotateValues = 'on';
                                break;
                            case 'showlegend':
                                if ($thisParam['value'] == 'true')
                                    $paramsObj->$j->fusioncharts->options->legend = 'on';
                                break;
                            case 'useRoundEdges':
                                if ($thisParam['value'] == 'true')
                                    $paramsObj->$j->fusioncharts->options->useRoundEdges = 'on';
                                break;
                            case 'showShadow':
                                if ($thisParam['value'] == 'true')
                                    $paramsObj->$j->fusioncharts->options->showShadow = 'on';
                                break;
                            case 'stack100Percent': // <-add
                                if ($thisParam['value'] == 'true')
                                    $paramsObj->$j->fusioncharts->options->stack100Percent = 'on';
                                break;
                            case 'yaxisminvalue':
                                if ($thisParam['value'] != '')
                                    $paramsObj->$i->fusioncharts->minmax->vmin = $thisParam['value'];
                                break;
                            case 'yaxismaxvalue':
                                if ($thisParam['value'] != '')
                                    $paramsObj->$i->fusioncharts->minmax->vmax = $thisParam['value'];
                                break;
                        }
                    }
                    $newReport->visualization_params = json_encode($paramsObj);
                }
                break;
            case 'chart_layout':
            case 'chart_height':
                break;
            default:
                if (!empty($newReport->field_name_map[$fieldId]))
                    $newReport->$fieldId = $fieldValue;
                break;
        }
    }

    $newReport->save();
}
?>
