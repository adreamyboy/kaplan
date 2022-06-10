<?php
/* * *******************************************************************************
 * This file is part of KReporter. KReporter is an enhancement developed
 * by Christian Knoll. All rights are (c) 2012 by Christian Knoll
 *
 * This Version of the KReporter is licensed software and may only be used in
 * alignment with the License Agreement received with this Software.
 * This Software is copyrighted and may not be further distributed without
 * witten consent of Christian Knoll
 *
 * You can contact us at info@kreporter.org
 * ****************************************************************************** */
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$kreportPDFconfig = array(
    'default' => array(
        'pdfFormat' => array(
            'pdfHeader' => array(
                'fontName' => 'helvetica', 
                'fontStyle' => 'BI',
                'fontSize' => 10
            )
        ), 
        'presentationDataset' => array(
            'colors' => array(
                'fill' => array(153, 194, 28),
                'text' => array(40, 40, 40),
                'border' => array(255, 255, 255)
            ),
            'border' => 0,
            'fill' => 0,
            'font' => array(
                'familiy' => 'helvetica',
                'size' => 10,
                'style' => 'BI'
            ),
            'linespacing' => 10
        ),
        'presentationHeader' => array(
            'colors' => array(
                'fill' => array(100, 132, 179),
                'text' => array(255, 255, 255),
                'border' => array(255, 255, 255)
            ),
            'border' => 1,
            'fill' => 1,
            'font' => array(
                'familiy' => 'helvetica',
                'size' => 8,
                'style' => 'I'
            ),
            'linespacing' => 8
        ),
        'presentationDataEven' => array(
            'colors' => array(
                'fill' => array(220, 220, 220),
                'text' => array(40, 40, 40),
                'border' => array(220, 220, 220)
            ),
            'border' => 0,
            'fill' => 1,
            'font' => array(
                'familiy' => 'helvetica',
                'size' => 8,
                'style' => ''
            ),
            'linespacing' => 6
        ),
        'presentationDataOdd' => array(
            'colors' => array(
                'fill' => array(255, 255, 255),
                'text' => array(40, 40, 40),
                'border' => array(255, 255, 255)
            ),
            'border' => 0,
            'fill' => 1,
            'font' => array(
                'familiy' => 'helvetica',
                'size' => 8,
                'style' => ''
            ),
            'linespacing' => 6
        ), 
        'presentationSummary' => array(
            'colors' => array(
                'fill' => array(255, 255, 255),
                'text' => array(40, 40, 40),
                'border' => array(255, 255, 255)
            ),
            'border' => 0,
            'fill' => 1,
            'font' => array(
                'familiy' => 'helvetica',
                'size' => 8,
                'style' => 'B'
            ),
            'linespacing' => 6
        )
    )    
);

if(file_exists('custom/modules/KReports/config/KReportPDF.php'))
    include('custom/modules/KReports/config/KReportPDF.php');
?>
