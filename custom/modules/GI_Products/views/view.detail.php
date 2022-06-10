<?php
    require_once('include/MVC/View/views/view.detail.php');
 
    class GI_ProductsViewDetail extends ViewDetail {
    
        public $useForSubpanel = true;
        
        function GI_ProductsViewDetail(){
            parent::ViewDetail();
        }
 
	    protected function _displaySubPanels()
	    {
	        if (isset($this->bean) && !empty($this->bean->id) && (file_exists('modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/metadata/subpaneldefs.php') || file_exists('custom/modules/' . $this->module . '/Ext/Layoutdefs/layoutdefs.ext.php'))) {
	            require_once ('include/SubPanel/SubPanelTiles.php');
	            $subpanel = new SubPanelTiles($this->bean, $this->module);
	 
	            //Dependent logic
	            if ($this->bean->type != 'Service')
	            {
	                //Subpanels to hide
	                $hideSubpanels = array(
	                    'gi_products_meetings_1',
	                );
	 
	                foreach ($hideSubpanels as $subpanelKey)
	                {
	                    //Remove subpanel if set
	                    if (isset($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanelKey]))
	                    {
	                        unset($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanelKey]);
	                    }
	                }
	            }
	 
	            echo $subpanel->display();
	        }
	    }
    }
?>