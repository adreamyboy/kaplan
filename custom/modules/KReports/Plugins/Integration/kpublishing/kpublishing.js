Ext.namespace('K.kreports.publishingpanel');Ext.define('K.kreports.publishingpanel.modulesmodel',{extend:'Ext.data.Model',fields:[{name:'module',type:'string'},{name:'description',type:'string'}]});K.kreports.publishingpanel.modulesStore=new Ext.data.Store({model:K.kreports.publishingpanel.modulesmodel,proxy:{type:'ajax',url:'index.php?module=KReports&action=get_modules&to_pdf=true',reader:{type:'json'}},listeners:{load:function(){this.insert(0,{module:'',description:'-'});}}});K.kreports.publishingpanel.modulesStore.load();K.kreports.publishingpanel.modulesCombo=new Ext.form.ComboBox({id:'subpanelModule',name:'subpanelModule',store:K.kreports.publishingpanel.modulesStore,valueField:'module',displayField:'description',typeAhead:true,mode:'local',triggerAction:'all',fieldLabel:bi('LBL_PUBLISH_SUBPANEL_MODULE'),editable:false,emptyText:bi('LBL_SELECT_MODULE'),selectOnFocus:true});Ext.define('K.kreports.publishingpanel.subPanelmodel',{extend:'Ext.data.Model',fields:[{name:'tab',type:'string'},{name:'description',type:'string'}]});K.kreports.publishingpanel.subPanelStore=new Ext.data.Store({model:K.kreports.publishingpanel.subPanelmodel,proxy:{type:'ajax',url:'index.php?module=KReports&action=get_tabs&to_pdf=true',reader:{type:'json'}},listeners:{load:function(){this.insert(0,{tab:'',description:'-'});}}});K.kreports.publishingpanel.subPanelStore.load();K.kreports.publishingpanel.subPanelCombo=new Ext.form.ComboBox({id:'subpanelTab',name:'subpanelTab',store:K.kreports.publishingpanel.subPanelStore,valueField:'tab',displayField:'description',typeAhead:true,mode:'local',triggerAction:'all',fieldLabel:bi('LBL_PUBLISH_SUBPANEL_TAB'),editable:false,emptyText:bi('LBL_SELECT_TAB'),selectOnFocus:true});K.kreports.publishingpanel.thePanel=new Ext.form.Panel({title:bi('LBL_PUBLISH_REPORT'),layout:{type:'anchor'},pluginid:'kpublishing',bodyPadding:5,items:[{xtype:'fieldset',collapsible:false,title:bi('LBL_PUBLISH_DASHLET'),bodyPadding:5,items:[{xtype:'checkbox',id:'dashletPresentation',name:'dashletPresentation',fieldLabel:bi('LBL_PUBLISH_DASHLET_PRESENTATION')},{xtype:'checkbox',id:'dashletVisualization',name:'dashletVisualization',fieldLabel:bi('LBL_PUBLISH_DASHLET_PRESENTATION_VISUALIZATION')}]},{xtype:'fieldset',collapsible:false,title:bi('LBL_PUBLISH_DASHLET'),bodyPadding:5,items:[K.kreports.publishingpanel.modulesCombo,K.kreports.publishingpanel.subPanelCombo,{xtype:'numberfield',id:'subpanelSequence',name:'subpanelSequence',fieldLabel:bi('LBL_PUBLISH_SUBPANEL_SEQUENCE')},{xtype:'checkbox',id:'subpanelPresentation',name:'subpanelPresentation',fieldLabel:bi('LBL_PUBLISH_DASHLET_PRESENTATION')},{xtype:'checkbox',id:'subpanelVisualization',name:'subpanelVisualization',fieldLabel:bi('LBL_PUBLISH_DASHLET_PRESENTATION_VISUALIZATION')}]}],setPanelData:function(pluginParams){if(pluginParams.dashletVisualization=='on')Ext.getCmp('dashletVisualization').setValue(true);if(pluginParams.dashletPresentation=='on')Ext.getCmp('dashletPresentation').setValue(true);if(pluginParams.subpanelModule!=undefined)K.kreports.publishingpanel.modulesCombo.setValue(pluginParams.subpanelModule);if(pluginParams.subpanelTab!=undefined)K.kreports.publishingpanel.subPanelCombo.setValue(pluginParams.subpanelTab);if(pluginParams.subpanelSequence!=undefined)Ext.getCmp('subpanelSequence').setValue(pluginParams.subpanelSequence);if(pluginParams.subpanelVisualization=='on')Ext.getCmp('subpanelVisualization').setValue(true);if(pluginParams.subpanelPresentation=='on')Ext.getCmp('subpanelPresentation').setValue(true);},getPanelData:function(){return this.getValues();}})