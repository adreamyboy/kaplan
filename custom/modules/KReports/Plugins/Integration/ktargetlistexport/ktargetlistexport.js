Ext.namespace('K.kreports.ktargetlistexport');K.kreports.ktargetlistexport.d=new Ext.form.RadioGroup({fieldLabel:bi('LBL_TARGETLISTPOUP_ACTIONS'),items:[{boxLabel:bi('LBL_TGLEXP_NEW'),name:'exportOption',inputValue:'new',checked:true},{boxLabel:bi('LBL_TGLEXP_UPD'),name:'exportOption',inputValue:'upd'}]});Ext.define('K.kreports.ktargetlistexport.I',{extend:'Ext.data.Model',fields:['fieldvalueid','fieldname']});K.kreports.ktargetlistexport.k=new Ext.data.ArrayStore({model:K.kreports.ktargetlistexport.I,data:[['rep',bi('LBL_TGLACT_REP')],['add',bi('LBL_TGLACT_ADD')],['sub',bi('LBL_TGLACT_SUB')]]});Ext.define('K.kreports.ktargetlistexport.B',{extend:'Ext.data.Model',fields:[{name:'id'},{name:'name',mapping:'name'}]});K.kreports.ktargetlistexport.D=new Ext.data.Store({model:K.kreports.ktargetlistexport.B,proxy:{type:'ajax',url:'index.php?module=KReports&action=pluginaction&plugin=ktargetlistexport&pluginaction=get_targetlists&to_pdf=true',reader:{type:'json'}}});Ext.define('K.kreports.ktargetlistexport.O',{extend:'Ext.data.Model',fields:[{name:'id'},{name:'name',mapping:'name'}]});K.kreports.ktargetlistexport.F=new Ext.data.Store({model:K.kreports.ktargetlistexport.O,proxy:{type:'ajax',url:'index.php?module=KReports&action=pluginaction&plugin=ktargetlistexport&pluginaction=get_campaigns&to_pdf=true',reader:{type:'json'}}});K.kreports.ktargetlistexport.L=new Ext.form.field.Text({fieldLabel:bi('LBL_TARGETLISTPOUP_NEWNAME')});K.kreports.ktargetlistexport.G=new Ext.form.field.ComboBox({typeAhead:false,fieldLabel:bi('LBL_TARGETLISTPOUP_CAMPAIGNS'),triggerAction:'all',lazyRender:true,queryMode:'local',store:K.kreports.ktargetlistexport.F,valueField:'id',displayField:'name'});K.kreports.ktargetlistexport.g=new Ext.form.FieldSet({title:bi('LBL_TARGETLISTPOUPNEWFIELDSET_LABEL'),collapsible:false,autoHeight:true,defaults:{anchor:'-10'},defaultType:'textfield',items:[K.kreports.ktargetlistexport.L,K.kreports.ktargetlistexport.G]});K.kreports.ktargetlistexport.V=new Ext.form.field.ComboBox({typeAhead:false,fieldLabel:bi('LBL_TARGETLISTPOUP_LISTS'),triggerAction:'all',lazyRender:true,queryMode:'local',store:K.kreports.ktargetlistexport.D,valueField:'id',displayField:'name'});K.kreports.ktargetlistexport.bq=new Ext.form.field.ComboBox({typeAhead:false,forceSelection:true,fieldLabel:bi('LBL_TARGETLISTPOUP_ACTIONS'),value:'add',triggerAction:'all',lazyRender:true,queryMode:'local',store:K.kreports.ktargetlistexport.k,valueField:'fieldvalueid',displayField:'fieldname'});K.kreports.ktargetlistexport.Q=new Ext.form.FieldSet({title:bi('LBL_TARGETLISTPOUPCHANGEFIELDSET_LABEL'),collapsible:false,defaults:{anchor:'-10'},defaultType:'textfield',items:[K.kreports.ktargetlistexport.V,K.kreports.ktargetlistexport.bq]});K.kreports.ktargetlistexport.C=new Ext.LoadMask(Ext.getBody(),{msg:"creating TargetList ... "});K.kreports.ktargetlistexport.exportPopup=new Ext.Window({title:bi('LBL_TARGETLISTEXPORTPOPUP_TITLE'),layout:{type:'anchor',align:'middle'},width:400,modal:true,autoHeight:true,closeAction:'hide',plain:true,border:false,items:[{xtype:'fieldset',title:bi('LBL_TARGETLISTPOUPFIELDSET_LABEL'),collapsible:false,autoHeight:true,defaultType:'textfield',items:[K.kreports.ktargetlistexport.d]},K.kreports.ktargetlistexport.g,K.kreports.ktargetlistexport.Q],buttons:[{text:bi('LBL_TGLLISTPOPUP_CLOSE'),handler:function(){K.kreports.ktargetlistexport.exportPopup.hide();}},{text:bi('LBL_TGLLISTPOPUP_EXEC'),handler:function(){K.kreports.ktargetlistexport.C.show();Ext.Ajax.request({url:'index.php?module=KReports&to_pdf=true&action=pluginaction&plugin=ktargetlistexport&pluginaction=export_to_targetlist',success:function(){K.kreports.ktargetlistexport.C.hide();},failure:function(){K.kreports.ktargetlistexport.C.hide();},timeout:1200000,params:{targetlist_action:K.kreports.ktargetlistexport.d.getValue().exportOption,targetlist_name:K.kreports.ktargetlistexport.L.getValue(),campaign_id:K.kreports.ktargetlistexport.G.getValue(),targetlist_id:K.kreports.ktargetlistexport.V.getValue(),taregtlist_update_action:K.kreports.ktargetlistexport.bq.getValue(),record:document.getElementById('recordid').value,whereConditions:document.getElementById('dynamicoptions').value}});K.kreports.ktargetlistexport.exportPopup.hide();}}],listeners:{show:function(){K.kreports.ktargetlistexport.D.load();K.kreports.ktargetlistexport.F.load();}}});K.kreports.ktargetlistexport.exportPanel=new Ext.panel.Panel({bodyPadding:5,pluginid:'ktargetlistexport',title:bi('LBL_TARGETLIST_EXPORT'),items:[{xtype:'fieldset',title:bi('LBL_TARGETLISTPOUPCHANGEFIELDSET_LABEL'),collapsible:false,defaults:{anchor:'-10'},items:[{xtype:'combobox',id:'targetlistexportlistcombo',typeAhead:false,fieldLabel:bi('LBL_TARGETLISTPOUP_LISTS'),triggerAction:'all',lazyRender:true,queryMode:'local',store:K.kreports.ktargetlistexport.D,valueField:'id',displayField:'name'},{xtype:'combobox',id:'targetlistexportactioncombo',typeAhead:false,forceSelection:true,fieldLabel:bi('LBL_TARGETLISTPOUP_ACTIONS'),value:'add',triggerAction:'all',lazyRender:true,queryMode:'local',store:K.kreports.ktargetlistexport.k,valueField:'fieldvalueid',displayField:'fieldname'}]},{xtype:'fieldset',title:bi('LBL_TARGETLISTPERFSETTINGS_LABEL'),collapsible:false,defaults:{anchor:'-10'},items:[{xtype:'checkbox',id:'targetlistexportperformancecheckbox',typeAhead:false,fieldLabel:bi('LBL_TARGETLISTPERFCHECKBOX_LABEL')}]}],setPanelData:function(pluginParams){Ext.getCmp('targetlistexportlistcombo').setValue(pluginParams.targetlist_id);Ext.getCmp('targetlistexportactioncombo').setValue(pluginParams.targetlist_update_action);Ext.getCmp('targetlistexportperformancecheckbox').setValue(pluginParams.targetlist_create_direct);},getPanelData:function(){var panelData=new Object({targetlist_id:Ext.getCmp('targetlistexportlistcombo').getValue(),targetlist_update_action:Ext.getCmp('targetlistexportactioncombo').getValue(),targetlist_create_direct:Ext.getCmp('targetlistexportperformancecheckbox').getValue()});return panelData;},listeners:{add:function(){K.kreports.ktargetlistexport.D.load();}}}); 
