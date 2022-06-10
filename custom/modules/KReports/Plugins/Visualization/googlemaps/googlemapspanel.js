Ext.namespace('K.kreports.googlemapspanel');K.kreports.googlemapspanel.panel=new Ext.panel.Panel({border:false,aZ:new Object(),bodyPadding:5,items:[{xtype:'fieldset',collapsible:false,layout:'anchor',defaults:{anchor:'100%'},title:bi('LBL_GOOGLEMAPSFS_LATLONG'),bodyPadding:5,items:[{xtype:'radiogroup',fieldLabel:bi('LBL_GOOGLEMAPSFS_GEOCODEBY'),id:'kreportgooglemapsgeocodeby',columns:2,anchor:'50%',vertical:true,items:[{boxLabel:bi('LBL_GOOGLEMAPSFS_GEOCODELATLONG'),name:'gctype',inputValue:'LATLONG',checked:true},{boxLabel:bi('LBL_GOOGLEMAPSFS_GEOCODEADDRESS'),name:'gctype',inputValue:'ADDRESS',disabled:true},],listeners:{change:function(thisGroup){switch(thisGroup.getValue().gctype){case 'LATLONG':Ext.getCmp('kreportgooglemapslatlongform').show();Ext.getCmp('kreportgooglemapsaddressform').hide();break;case 'ADDRESS':Ext.getCmp('kreportgooglemapsaddressform').show();Ext.getCmp('kreportgooglemapslatlongform').hide();break;}}}},{xtype:'form',id:'kreportgooglemapslatlongform',border:false,layout:'column',items:[{columnWidth:0.499,border:false,layout:'anchor',defaults:{anchor:'90%'},items:[{xtype:'combobox',id:'kreportgooglemapslongitude',name:'kreportgooglemapslongitude',typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_GOOGLEMAPS_LONGITUDE'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name'}]},{columnWidth:0.499,border:false,layout:'anchor',defaults:{anchor:'90%'},items:[{xtype:'combobox',id:'kreportgooglemapstatitude',name:'kreportgooglemapstatitude',typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_GOOGLEMAPS_LATITUDE'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name'}]}]},{xtype:'form',id:'kreportgooglemapsaddressform',hidden:true,border:false,layout:'column',items:[{columnWidth:0.499,border:false,layout:'anchor',defaults:{anchor:'90%'},items:[{xtype:'combobox',id:'kreportgooglemapsstreet',name:'kreportgooglemapsstreet',typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_GOOGLEMAPS_STREET'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name'},{xtype:'combobox',id:'kreportgooglemapscity',name:'kreportgooglemapscity',typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_GOOGLEMAPS_CITY'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name'},{xtype:'combobox',id:'kreportgooglemapspc',name:'kreportgooglemapspc',typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_GOOGLEMAPS_PC'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name'},{xtype:'combobox',id:'kreportgooglemapscountry',name:'kreportgooglemapscountry',typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_GOOGLEMAPS_COUNTRY'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name'}]},{columnWidth:0.499,border:false,layout:'anchor',defaults:{anchor:'90%'},items:[{xtype:'combobox',id:'kreportgooglemapsaddress',typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_GOOGLEMAPS_ADDRESS'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name'}]}]}]},{xtype:'fieldset',collapsible:false,layout:'anchor',defaults:{anchor:'90%'},title:bi('LBL_GOOGLEMAPSFS_TITLE'),bodyPadding:5,items:[{xtype:'combobox',id:'kreportgooglemapstitle',typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_GOOGLEMAPS_TITLE'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name'},{xtype:'checkbox',id:'kreportgooglemapscluster',typeAhead:false,fieldLabel:bi('LBL_GOOGLEMAPS_CLUSTER')}]}],setPanelData:function(aZ){this.aZ=aZ;Ext.getCmp('kreportgooglemapsgeocodeby').setValue(this.aZ.geocodeBy);for(var thisFieldId in this.aZ.kreportgooglemapsaddressform){if(this.aZ.kreportgooglemapsaddressform.hasOwnProperty(thisFieldId)){Ext.getCmp(thisFieldId).setValue(this.aZ.kreportgooglemapsaddressform[thisFieldId]);}}for(var thisFieldId in this.aZ.kreportgooglemapslatlongform){if(this.aZ.kreportgooglemapslatlongform.hasOwnProperty(thisFieldId)){Ext.getCmp(thisFieldId).setValue(this.aZ.kreportgooglemapslatlongform[thisFieldId]);}}Ext.getCmp('kreportgooglemapstitle').setValue(this.aZ.kreportgooglemapstitle);Ext.getCmp('kreportgooglemapscluster').setValue(this.aZ.kreportgooglemapscluster);},getPanelData:function(){if(this.aZ.uid==undefined)this.aZ.uid=kGuid();this.aZ.geocodeBy=Ext.getCmp('kreportgooglemapsgeocodeby').getValue();Ext.getCmp('kreportgooglemapsgeocodeby').fireEvent('change',Ext.getCmp('kreportgooglemapsgeocodeby'));this.aZ.kreportgooglemapslatlongform=Ext.getCmp('kreportgooglemapslatlongform').getValues();this.aZ.kreportgooglemapsaddressform=Ext.getCmp('kreportgooglemapsaddressform').getValues();this.aZ.kreportgooglemapstitle=Ext.getCmp('kreportgooglemapstitle').getValue();this.aZ.kreportgooglemapscluster=Ext.getCmp('kreportgooglemapscluster').getValue();return this.aZ;}}); 