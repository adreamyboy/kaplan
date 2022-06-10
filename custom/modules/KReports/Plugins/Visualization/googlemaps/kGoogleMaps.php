<?php

require_once('modules/KReports/KReportChartData.php');
require_once('modules/KReports/Plugins/prototypes/kreportvisualizationplugin.php');

class kGoogleMap extends kreportvisualizationplugin{

    function __construct() {
        
    }

    public function getHeader() {
        $coreString = '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><script type="text/javascript" src="custom/modules/KReports/Plugins/Visualization/googlemaps/markerclusterer.js"></script>';
        return $coreString;
    }

    public function getItemUpdate($thisReport, $thisParams, $snaphotid = 0, $addReportParams = array()){
        return json_encode($this->getItemData($thisReport, $thisParams, $snaphotid, $addReportParams));
    }
    
    public function getItem($thisDivId, $thisReport, $thisParams, $addReportParams = array()) {
        $itemData = $this->getItemData($thisReport, $thisParams, 0 ,$addReportParams);
        $mapString = '<script type="text/javascript">';
        $mapString .= $thisParams['uid'] . " = new Object({
                uid: '" . $thisParams['uid'] . "',
                mapWrapper: new google.maps.Map(document.getElementById('" . $thisDivId . "'), {mapTypeId: google.maps.MapTypeId.ROADMAP, do_clustering: true}), 
                mapBounds: new google.maps.LatLngBounds(),
                mapGeocoder: new google.maps.Geocoder(),
                mapMarkerClusterer: null,
                mapMarkers: new Array(),
                plot: function(thisMapItems){
                    ".$thisParams['uid'].".mapBounds = new google.maps.LatLngBounds()

                    

                    ".($thisParams['kreportgooglemapscluster'] ? $thisParams['uid'].".mapMarkerClusterer = new MarkerClusterer(".$thisParams['uid'].".mapWrapper);" : '')."
                    for(var i = 0; i < (thisMapItems.length > 10 && thisMapItems[0].longitude == undefined? 10 : thisMapItems.length); i++)
                    {
                        if(thisMapItems[i].longitude != undefined)
                        {
                            var markerLatlng = new google.maps.LatLng(thisMapItems[i].latitude,thisMapItems[i].longitude);
                            if(".$thisParams['uid'].".mapMarkerClusterer == null)
                            {

                                ".$thisParams['uid'].".mapMarkers[".$thisParams['uid'].".mapMarkers.length] = new google.maps.Marker({
                                            map: ".$thisParams['uid'].".mapWrapper,
                                            position: markerLatlng, 
                                            title: (thisMapItems[i].title != undefined ? thisMapItems[i].title : '')
                                        });
                            }
                            else
                            {
                            ".$thisParams['uid'].".mapMarkers[".$thisParams['uid'].".mapMarkers.length] = new google.maps.Marker({
                                            position: markerLatlng, 
                                            title: (thisMapItems[i].title != undefined ? thisMapItems[i].title : '')
                                        });
                            }
                            ".$thisParams['uid'].".mapBounds.extend(markerLatlng);
                            ".$thisParams['uid'].".mapWrapper.fitBounds(".$thisParams['uid'].".mapBounds);
                        }
                        else
                        {
                            var thisItemAddress = thisMapItems[i].street_address + ' '  + thisMapItems[i].postal_code + ' ' + thisMapItems[i].locality + ' ' + thisMapItems[i].country;
                            ".$thisParams['uid'].".mapGeocoder.geocode( {
                                address: thisItemAddress
                                }, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {

                                    ".$thisParams['uid'].".mapMarkers[".$thisParams['uid'].".mapMarkers.length] = new google.maps.Marker({
                                        map: ".$thisParams['uid'].".mapWrapper,
                                        position: results[0].geometry.location, 
                                       title: (thisMapItems[i].title != undefined ? thisMapItems[i].title : '')
                                    });
                                    ".$thisParams['uid'].".mapBounds.extend(results[0].geometry.location);
                                    ".$thisParams['uid'].".mapWrapper.fitBounds(".$thisParams['uid'].".mapBounds);
                                } 
                                else
                                    console.log(status);
                            });
                        }
                    }
                   
                    if(".$thisParams['uid'].".mapMarkerClusterer != null && ".$thisParams['uid'].".mapMarkers.length > 0)
                        ".$thisParams['uid'].".mapMarkerClusterer.addMarkers(".$thisParams['uid'].".mapMarkers);
                },
                clearMarkers: function(){
                    if(".$thisParams['uid'].".mapMarkerClusterer != null){
                        ".$thisParams['uid'].".mapMarkerClusterer.clearMarkers(); 
                        ".$thisParams['uid'].".mapMarkerClusterer = null;
                    }                

                    for(var i=0; i<".$thisParams['uid'].".mapMarkers.length; i++)
                    {
                        ".$thisParams['uid'].".mapMarkers[i].setMap(null);
                    }
                    ".$thisParams['uid'].".mapMarkers = new Array();
                },
                update: function(mapData){
                    if( typeof mapData === 'string' ) {
                       eval('newMapData='+mapData);
                    }else
                        newMapData = mapData;

                    ".$thisParams['uid'].".clearMarkers();
                    ".$thisParams['uid'].".plot(newMapData);
                }
                });
                 document.addEventListener('load',". $thisParams['uid'] . ".plot(" . json_encode($itemData) . "));";
        
        $mapString .= '</script>';

        return $mapString;
    }
    
    public function getItemData($thisReport, $thisParams, $snaphotid = 0, $addReportParams = array()){
        
        $addReportParams['noFormat'] = true; 
        $addReportParams['noEnumTranslation'] = true;
        
        $reportResults = $thisReport->getSelectionResults($addReportParams, $snaphotid, false, '', array());
        
        $pinpointArray = array();
        foreach($reportResults as $thisRecord)
        {
            switch($thisParams['geocodeBy']['gctype'])
            {
                case 'ADDRESS': 
                    $thisPinPoint = array();
                    
                    if($thisParams['kreportgooglemapsaddressform']['kreportgooglemapsstreet'] != '' && $thisRecord[$thisParams['kreportgooglemapsaddressform']['kreportgooglemapsstreet']] != '')
                        $thisPinPoint['street_address'] = $thisRecord[$thisParams['kreportgooglemapsaddressform']['kreportgooglemapsstreet']];
                    
                    if($thisParams['kreportgooglemapsaddressform']['kreportgooglemapscity'] != '' && $thisRecord[$thisParams['kreportgooglemapsaddressform']['kreportgooglemapscity']] != '')
                        $thisPinPoint['locality'] = $thisRecord[$thisParams['kreportgooglemapsaddressform']['kreportgooglemapscity']];

                    if($thisParams['kreportgooglemapsaddressform']['kreportgooglemapspc'] != '' && $thisRecord[$thisParams['kreportgooglemapsaddressform']['kreportgooglemapspc']] != '')
                        $thisPinPoint['postal_code'] = $thisRecord[$thisParams['kreportgooglemapsaddressform']['kreportgooglemapspc']];
                    
                    if($thisParams['kreportgooglemapsaddressform']['kreportgooglemapscountry'] != '' && $thisRecord[$thisParams['kreportgooglemapsaddressform']['kreportgooglemapscountry']] != '')
                        $thisPinPoint['country'] = $thisRecord[$thisParams['kreportgooglemapsaddressform']['kreportgooglemapscountry']];
                    
                    break;
                case 'LATLONG': 
                     $thisPinPoint = array();
                     $thisPinPoint['longitude'] = $thisRecord[$thisParams['kreportgooglemapslatlongform']['kreportgooglemapslongitude']];
                     $thisPinPoint['latitude'] = $thisRecord[$thisParams['kreportgooglemapslatlongform']['kreportgooglemapstatitude']];
                    break;
            }
            
            if($thisParams['kreportgooglemapstitle'] != '')
                $thisPinPoint['title'] = $thisRecord[$thisParams['kreportgooglemapstitle']];
            
            if(count($thisPinPoint) > 0)
                $pinpointArray[] = $thisPinPoint;
        }
        
        return $pinpointArray;
    }

}

?>
