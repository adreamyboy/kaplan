Ext.namespace('K.kreports.googlechartspanel');K.kreports.googlechartspanel.colorpickerWindow=new Ext.window.Window({height:200,width:200,items:[new Ext.picker.Color({width:195})]});K.kreports.googlechartspanel.bQ=new Ext.data.Store({fields:['dimension','label'],data:[{'dimension':'111','label':bi('LBL_DIMENSION_111')},{'dimension':'10N','label':bi('LBL_DIMENSION_10N')},{'dimension':'221','label':bi('LBL_DIMENSION_221')},{'dimension':'21N','label':bi('LBL_DIMENSION_21N')},{'dimension':'220','label':bi('LBL_DIMENSION_220')}]});K.kreports.googlechartspanel.aX=new Ext.data.Store({fields:['dimension','charttype','label'],data:[{'dimension':'111, 10N, 221, 21N','charttype':'Area','label':bi('LBL_CHARTTYPE_AREA')},{'dimension':'111, 10N, 221, 21N','charttype':'SteppedArea','label':bi('LBL_CHARTTYPE_STEPPEDAREA')},{'dimension':'221','charttype':'Bubble','label':bi('LBL_CHARTTYPE_BUBBLE')},{'dimension':'111, 10N, 221, 21N','charttype':'Bar','label':bi('LBL_CHARTTYPE_BAR')},{'dimension':'111, 10N, 221, 21N','charttype':'Column','label':bi('LBL_CHARTTYPE_COLUMN')},{'dimension':'111, 10N, 221, 21N','charttype':'Line','label':bi('LBL_CHARTTYPE_LINE')},{'dimension':'220','charttype':'Scatter','label':bi('LBL_CHARTTYPE_SCATTER')},{'dimension':'111, 10N','charttype':'Pie','label':bi('LBL_CHARTTYPE_PIE')},{'dimension':'10N, 21N','charttype':'Combo','label':bi('LBL_CHARTTYPE_COMBO')}]});K.kreports.googlechartspanel.ah=new Ext.form.field.ComboBox({fieldLabel:bi('LBL_DIMENSIONS'),store:K.kreports.googlechartspanel.bQ,queryMode:'local',editable:false,displayField:'label',valueField:'dimension',listeners:{select:function(thisCombo){K.kreports.googlechartspanel.aX.clearFilter();K.kreports.googlechartspanel.aX.filter('dimension',new RegExp(thisCombo.getValue()));if(K.kreports.googlechartspanel.bO.getValue()!=''&&K.kreports.googlechartspanel.aX.count()>0){if(K.kreports.googlechartspanel.aX.findRecord('charttype',K.kreports.googlechartspanel.bO.getValue())==null){K.kreports.googlechartspanel.bO.enable();K.kreports.googlechartspanel.bO.setValue(K.kreports.googlechartspanel.aX.getAt(0).get('charttype'));}}else if(K.kreports.googlechartspanel.aX.count()>0){K.kreports.googlechartspanel.bO.enable();K.kreports.googlechartspanel.bO.setValue(K.kreports.googlechartspanel.aX.getAt(0).get('charttype'));}else{K.kreports.googlechartspanel.bO.disable();K.kreports.googlechartspanel.bO.setValue();}this.showDimensionsCombos(parseInt(thisCombo.getValue().substr(1,1)));this.switchDataSeriesPanel(thisCombo.getValue().substr(2,1));}},setInitialValue:function(value){this.setValue(value);this.fireEvent('select',this);},showDimensionsCombos:function(count){for(var i=1;i<=3;i++){if(i<=count)eval('K.kreports.googlechartspanel.dimension'+i+'Combo.show();');else eval('K.kreports.googlechartspanel.dimension'+i+'Combo.hide();');}},switchDataSeriesPanel:function(value){switch(value){case '1':K.kreports.googlechartspanel.ar.show();K.kreports.googlechartspanel.dataserfunCombo.show();K.kreports.googlechartspanel.aO.hide();break;case 'N':K.kreports.googlechartspanel.ar.hide();K.kreports.googlechartspanel.dataserfunCombo.hide();K.kreports.googlechartspanel.aO.show();if(K.kreports.googlechartspanel.bO.getValue()!=''){K.kreports.googlechartspanel.bL.clearFilter();K.kreports.googlechartspanel.bL.filter('charttype',new RegExp('all|'+K.kreports.googlechartspanel.bO.getValue()));}break;}}});K.kreports.googlechartspanel.bO=new Ext.form.field.ComboBox({fieldLabel:bi('LBL_CHARTTYPES'),store:K.kreports.googlechartspanel.aX,value:'',queryMode:'local',editable:false,displayField:'label',valueField:'charttype',listeners:{select:function(thisCombo){K.kreports.googlechartspanel.bL.clearFilter();K.kreports.googlechartspanel.bL.filter('charttype',new RegExp('all|'+thisCombo.getValue()));}}});K.kreports.googlechartspanel.dimension1Combo=new Ext.form.field.ComboBox({typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_CHARTTYPE_DIMENSION1'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name',listeners:{select:function(thisCombo){}}});K.kreports.googlechartspanel.dimension2Combo=new Ext.form.field.ComboBox({typeAhead:true,editable:false,hidden:true,border:true,fieldLabel:bi('LBL_CHARTTYPE_DIMENSION2'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name',listeners:{select:function(thisCombo){}}});K.kreports.googlechartspanel.dimension3Combo=new Ext.form.field.ComboBox({typeAhead:true,editable:false,hidden:true,border:true,fieldLabel:bi('LBL_CHARTTYPE_DIMENSION3'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name',listeners:{select:function(thisCombo){}}});K.kreports.googlechartspanel.bp=new Ext.form.field.ComboBox({typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_CHARTTYPE_MULTIPLIER'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name',disabled:true});K.kreports.googlechartspanel.ar=new Ext.form.field.ComboBox({typeAhead:true,editable:false,border:1,fieldLabel:bi('LBL_CHARTTYPE_DATASERIES'),triggerAction:'all',lazyRender:true,queryMode:'local',store:listGridStore,valueField:'fieldid',displayField:'name',listeners:{select:function(thisCombo){}}});K.kreports.googlechartspanel.dataserfunCombo=new Ext.form.ComboBox({fieldLanel:bi('LBL_CHARTFUNCTION'),typeAhead:true,triggerAction:'all',lazyRender:true,mode:'local',store:new Ext.data.ArrayStore({id:0,fields:['value','text'],data:[['-','-'],['SUM',bi('LBL_FUNCTION_SUM')],['AVG',bi('LBL_FUNCTION_AVG')],['CUMSUM',bi('LBL_FUNCTION_CUMSUM')],['COUNT',bi('LBL_FUNCTION_COUNT')],['MAX',bi('LBL_FUNCTION_MAX')],['MIN',bi('LBL_FUNCTION_MIN')]]}),valueField:'value',displayField:'text'});K.kreports.googlechartspanel.bB=new Ext.grid.Panel({store:listGridStore,scroll:'vertical',width:155,columns:[{id:'columname',text:bi('LBL_NAME'),dataIndex:'name',sortable:false,width:150}],viewConfig:{stripeRows:true,forcefit:true,plugins:{dragGroup:'dataSeriesListFields',ptype:'gridviewdragdrop',enableDrop:false}}});Ext.define('K.kreports.googlechartspanel.bT',{extend:'Ext.data.Model',fields:[{name:'fieldid',type:'string'},{name:'name',type:'string'},{name:'chartfunction',type:'string'},{name:'meaning',type:'string'},{name:'axis',type:'string'},{name:'renderer',type:'string'},{name:'color',type:'string'}]});K.kreports.googlechartspanel.bL=new Ext.data.Store({fields:['meaning','charttype'],data:[{'meaning':'value','charttype':'all'},{'meaning':'redFrom','charttype':'Gauge'},{'meaning':'yellowFrom','charttype':'Gauge'},{'meaning':'redTo','charttype':'Gauge'},{'meaning':'yellowTo','charttype':'Gauge'},{'meaning':'low','charttype':'Candlestick'},{'meaning':'opening','charttype':'Candlestick'},{'meaning':'closing','charttype':'Candlestick'},{'meaning':'high','charttype':'Candlestick'}]});K.kreports.googlechartspanel.bF=new Ext.form.ComboBox({typeAhead:true,triggerAction:'all',lazyRender:true,mode:'local',store:K.kreports.googlechartspanel.bL,valueField:'meaning',displayField:'meaning'}),K.kreports.googlechartspanel.bv=new Ext.data.Store({model:K.kreports.googlechartspanel.bT});K.kreports.googlechartspanel.bb=new Ext.grid.Panel({store:K.kreports.googlechartspanel.bv,flex:2,columns:[{text:bi('LBL_NAME'),dataIndex:'name',sortable:false,width:150},{text:bi('LBL_CHARTFUNCTION'),dataIndex:'chartfunction',sortable:false,width:70,editor:new Ext.form.ComboBox({typeAhead:true,triggerAction:'all',lazyRender:true,mode:'local',store:new Ext.data.ArrayStore({id:0,fields:['value','text'],data:[['-','-'],['SUM',bi('LBL_FUNCTION_SUM')],['AVG',bi('LBL_FUNCTION_AVG')],['CUMSUM',bi('LBL_FUNCTION_CUMSUM')],['COUNT',bi('LBL_FUNCTION_COUNT')],['MAX',bi('LBL_FUNCTION_MAX')],['MIN',bi('LBL_FUNCTION_MIN')]]}),valueField:'value',displayField:'text'}),renderer:function(value){if(value!=undefined&&value!='-')return bi('LBL_FUNCTION_'+value.toUpperCase());else return value;}},{text:bi('LBL_MEANING'),dataIndex:'meaning',sortable:false,width:70,editor:K.kreports.googlechartspanel.bF},{text:bi('LBL_AXIS'),dataIndex:'axis',sortable:false,width:70,editor:new Ext.form.ComboBox({typeAhead:true,triggerAction:'all',lazyRender:true,mode:'local',store:new Ext.data.ArrayStore({id:0,fields:['value','text'],data:[['P',bi('LBL_CHARTAXIS_P')],['S',bi('LBL_CHARTAXIS_S')]]}),valueField:'value',displayField:'text'}),renderer:function(value){if(value!=undefined&&value!='')return bi('LBL_CHARTAXIS_'+value.toUpperCase());else return value;}},{text:bi('LBL_RENDERER'),dataIndex:'renderer',sortable:false,width:70,editor:new Ext.form.ComboBox({typeAhead:true,triggerAction:'all',lazyRender:true,mode:'local',store:new Ext.data.ArrayStore({id:0,fields:['value','text'],data:[['bars',bi('LBL_CHARTRENDER_BARS')],['line',bi('LBL_CHARTRENDER_LINE')],['area',bi('LBL_CHARTRENDER_AREA')]]}),valueField:'value',displayField:'text'}),renderer:function(value){if(value!=undefined&&value!='')return bi('LBL_CHARTRENDER_'+value.toUpperCase());else return value;}},{text:bi('LBL_COLOR'),dataIndex:'color',width:70,editor:new Ext.form.field.Text({regex:new RegExp('^#?(([a-fA-F0-9]){3}){1,2}$')})}],plugins:[Ext.create('Ext.grid.plugin.CellEditing',{clicksToEdit:1,listeners:{beforeEdit:function(){}}})],tbar:[{xtype:'button',id:'googleseriesgriddeletebutton',text:bi('LBL_DELETE_BUTTON_LABEL'),icon:'modules/KReports/images/delete.png',handler:function(){var selectedRecords=K.kreports.googlechartspanel.bb.getSelectionModel().getSelection();if(selectedRecords.length>0)K.kreports.googlechartspanel.bb.getStore().remove(selectedRecords);}}],viewConfig:{markDirty:false,plugins:{dropGroup:'dataSeriesListFields',dragGroup:'dataSeriesListFields',ptype:'gridviewdragdrop',enableDrop:true},listeners:{beforedrop:function(node,data,overModel,dropPosition,dropFunctions,eOpts){if(data.records[0].$className!='K.kreports.googlechartspanel.bT'){for(var recordCounter=0;recordCounter<data.records.length;recordCounter++){var storeIndex=this.getStore().indexOf(overModel);if(dropPosition=='after')storeIndex++;if(storeIndex==this.getStore().count())this.getStore().add({fieldid:data.records[recordCounter].get('fieldid'),name:data.records[recordCounter].data.name,chartfunction:'SUM',meaning:'value'});else this.getStore().insert(storeIndex,{fieldid:data.records[recordCounter].get('fieldid'),name:data.records[recordCounter].data.name,chartfunction:'SUM',meaning:'value'});}dropFunctions.cancelDrop();return true;}}}}});K.kreports.googlechartspanel.aO=new Ext.panel.Panel({layout:{type:'hbox',align:'stretch'},height:200,items:[K.kreports.googlechartspanel.bB,K.kreports.googlechartspanel.bb]});Ext.define('K.kreports.googlechartspanel.colorModel',{extend:'Ext.data.Model',fields:[{name:'id',type:'string'},{name:'name',type:'string'},{name:'colors',type:'string'}]}),K.kreports.googlechartspanel.ag=new Ext.data.Store({model:K.kreports.googlechartspanel.colorModel,data:kreportavailablecolors});K.kreports.googlechartspanel.ab=new Ext.form.field.ComboBox({store:K.kreports.googlechartspanel.ag,valueField:'id',displayField:'name',typeAhead:false,width:170,labelWidth:70,editable:false,queryMode:'local',triggerAction:'all',selectOnFocus:true,value:'default',listeners:{select:function(thisCombo){K.kreports.googlechartspanel.bn.updateColors();}}});K.kreports.googlechartspanel.bn=new Ext.form.field.Display({updateColors:function(colorId){var colorId=K.kreports.googlechartspanel.ab.getValue();if(colorId!=null){var colorArray=K.kreports.googlechartspanel.ag.findRecord('id',colorId).get('colors').split('*');var colorString='';for(var i=0;i<colorArray.length;i++)colorString=colorString+'<div style="border:1px solid #ddd;float:left;margin-left:5px;width:16px;height:16px;background:'+colorArray[i]+'"></div>';K.kreports.googlechartspanel.bn.setRawValue(colorString);}else K.kreports.googlechartspanel.bn.setRawValue('');}});K.kreports.googlechartspanel.aY=new Ext.panel.Panel({frame:false,bodyPadding:5,border:false,items:[{xtype:'fieldset',collapsible:true,layout:'fit',title:bi('LBL_CHARTFS_DATA'),bodyPadding:5,items:[{xtype:'panel',border:false,layout:'column',items:[{columnWidth:0.499,flex:1,border:false,layout:'anchor',defaults:{anchor:'90%'},items:[K.kreports.googlechartspanel.ah,{xtype:'fieldset',collapsible:false,style:{'border-bottom':'0px','border-left':'0px','border-right':'0px'},layout:'anchor',bodyPadding:0,defaults:{anchor:'100%'},title:bi('LBL_CHARTFS_SERIES'),items:[K.kreports.googlechartspanel.dimension1Combo,K.kreports.googlechartspanel.dimension2Combo,K.kreports.googlechartspanel.dimension3Combo]}]},{columnWidth:0.499,border:false,layout:'anchor',defaults:{anchor:'90%'},items:[K.kreports.googlechartspanel.bO,{xtype:'fieldset',collapsible:false,layout:'anchor',bodyPadding:0,defaults:{anchor:'100%'},style:{'border-bottom':'0px','border-left':'0px','border-right':'0px'},title:bi('LBL_CHARTFS_VALUES'),items:[K.kreports.googlechartspanel.ar,K.kreports.googlechartspanel.dataserfunCombo,K.kreports.googlechartspanel.aO]}]}]},{xtype:'form',border:false,layout:'column',flex:1,items:[{columnWidth:0.499,border:false,layout:'anchor',defaults:{anchor:'90%'},items:[K.kreports.googlechartspanel.bp]},{columnWidth:0.499,border:false,layout:'anchor',defaults:{anchor:'90%'},items:[{xtype:'fieldcontainer',fieldLabel:bi('LBL_CHARTTYPE_COLORS'),layout:{type:'vbox',align:'stretch'},items:[K.kreports.googlechartspanel.ab,K.kreports.googlechartspanel.bn]}]}]}]},{xtype:'fieldset',collapsible:true,defaultType:'textfield',title:bi('LBL_CHARTOPTIONS_FS'),layout:'anchor',items:[{xtype:'form',border:false,layout:'column',items:[{xtype:'form',border:false,columnWidth:0.499,layout:'anchor',defaults:{anchor:'90%'},items:[{xtype:'textfield',id:'GCchartOptionsTitle',fieldLabel:bi('LBL_CHARTOPTIONS_TITLE')},{xtype:'combobox',id:'GCchartOptionsLPos',fieldLabel:bi('LBL_CHARTOPTIONS_LPOS'),value:'none',typeAhead:true,triggerAction:'all',lazyRender:true,mode:'local',store:new Ext.data.ArrayStore({id:0,fields:['value','text'],data:[['none',bi('LBL_LPOS_NONE')],['right',bi('LBL_LPOS_RIGHT')],['left',bi('LBL_LPOS_LEFT')],['top',bi('LBL_LPOS_TOP')],['bottom',bi('LBL_LPOS_BOTTOM')]]}),valueField:'value',displayField:'text'},{xtype:'textfield',id:'GCchartOptionsContext',fieldLabel:bi('LBL_CHARTOPTIONS_CONTEXT')},{xtype:'fieldcontainer',fieldLabel:bi('LBL_CHARTOPTIONS_VMINMAX'),layout:{type:'hbox',align:'stretch'},items:[{xtype:'numberfield',id:'GCchartOptionsVMin',flex:1,padding:'0 5 0 0'},{xtype:'numberfield',id:'GCchartOptionsVMax',flex:1,padding:'0 0 0 5'}]},{xtype:'fieldcontainer',fieldLabel:bi('LBL_CHARTOPTIONS_HMINMAX'),layout:{type:'hbox',align:'stretch'},items:[{xtype:'numberfield',id:'GCchartOptionsHMin',flex:1,padding:'0 5 0 0'},{xtype:'numberfield',id:'GCchartOptionsHMax',flex:1,padding:'0 0 0 5'}]},{xtype:'fieldcontainer',fieldLabel:bi('LBL_CHARTOPTIONS_GREEN'),layout:{type:'hbox',align:'stretch'},items:[{xtype:'numberfield',id:'GCchartOptionsGreenFrom',flex:1,padding:'0 5 0 0'},{xtype:'numberfield',id:'GCchartOptionsGreenTo',flex:1,padding:'0 0 0 5'}]},{xtype:'fieldcontainer',fieldLabel:bi('LBL_CHARTOPTIONS_YELLOW'),layout:{type:'hbox',align:'stretch'},items:[{xtype:'numberfield',id:'GCchartOptionsYellowFrom',flex:1,padding:'0 5 0 0'},{xtype:'numberfield',id:'GCchartOptionsYellowTo',flex:1,padding:'0 0 0 5'}]},{xtype:'fieldcontainer',fieldLabel:bi('LBL_CHARTOPTIONS_RED'),layout:{type:'hbox',align:'stretch'},items:[{xtype:'numberfield',id:'GCchartOptionsRedFrom',flex:1,padding:'0 5 0 0'},{xtype:'numberfield',id:'GCchartOptionsRedTo',flex:1,padding:'0 0 0 5'}]}]},{xtype:'form',border:false,columnWidth:0.499,layout:'anchor',defaults:{anchor:'90%'},items:[{columns:2,xtype:'checkboxgroup',id:'GCchartOptionsCheckBoxGroup',items:[,{boxLabel:bi('LBL_CHARTOPTIONS_EMTPY'),name:'emptyvalues',inputValue:true},{boxLabel:bi('LBL_CHARTOPTIONS_NOVLABLES'),name:'novlabels'},{boxLabel:bi('LBL_CHARTOPTIONS_NOHLABLES'),name:'nohlabels'},{boxLabel:bi('LBL_CHARTOPTIONS_LOGV'),name:'logv'},{boxLabel:bi('LBL_CHARTOPTIONS_LOGH'),name:'logh'},{boxLabel:bi('LBL_CHARTOPTIONS_STACKED'),name:'stacked'},{boxLabel:bi('LBL_CHARTOPTIONS_3D'),name:'is3D'},{boxLabel:bi('LBL_CHARTOPTIONS_REVERSED'),name:'reverse'},{boxLabel:bi('LBL_CHARTOPTIONS_CTFUNCTION'),name:'curvetypefunction'},{boxLabel:bi('LBL_CHARTOPTIONS_POINTS'),name:'points'}]}]}]}]}]});K.kreports.googlechartspanel.panel=new Ext.panel.Panel({layout:'fit',height:400,border:false,aZ:new Object(),al:0,items:[K.kreports.googlechartspanel.aY],setPanelData:function(aZ){this.aZ=aZ;if(this.aZ.dims!=undefined){K.kreports.googlechartspanel.ah.setValue(this.aZ.dims);K.kreports.googlechartspanel.bO.setValue(this.aZ.type);K.kreports.googlechartspanel.dimension1Combo.setValue(this.aZ.dimensions.dimension1);K.kreports.googlechartspanel.dimension2Combo.setValue(this.aZ.dimensions.dimension2);K.kreports.googlechartspanel.dimension3Combo.setValue(this.aZ.dimensions.dimension3);K.kreports.googlechartspanel.bp.setValue(this.aZ.multiplier);switch(this.aZ.dims.substr(2,1)){case '1':K.kreports.googlechartspanel.ar.setValue(this.aZ.dataseries[0].fieldid);K.kreports.googlechartspanel.dataserfunCombo.setValue(this.aZ.dataseries[0].chartfunction);break;case 'N':K.kreports.googlechartspanel.bv.removeAll();for(var i=0;i<this.aZ.dataseries.length;i++)K.kreports.googlechartspanel.bv.add(this.aZ.dataseries[i]);break;}Ext.getCmp('GCchartOptionsTitle').setValue(this.aZ.title);Ext.getCmp('GCchartOptionsContext').setValue(this.aZ.context);Ext.getCmp('GCchartOptionsLPos').setValue(this.aZ.legend);}else{K.kreports.googlechartspanel.bO.clearValue();K.kreports.googlechartspanel.dimension1Combo.clearValue();K.kreports.googlechartspanel.dimension2Combo.clearValue();K.kreports.googlechartspanel.dimension3Combo.clearValue();K.kreports.googlechartspanel.bp.clearValue();K.kreports.googlechartspanel.ar.clearValue();K.kreports.googlechartspanel.dataserfunCombo.clearValue();Ext.getCmp('GCchartOptionsTitle').setValue();Ext.getCmp('GCchartOptionsContext').setValue();Ext.getCmp('GCchartOptionsLPos').setValue('none');K.kreports.googlechartspanel.bv.removeAll();K.kreports.googlechartspanel.ah.setValue('111');}if(this.aZ.options!=undefined)Ext.getCmp('GCchartOptionsCheckBoxGroup').setValue(this.aZ.options);else Ext.getCmp('GCchartOptionsCheckBoxGroup').setValue();if(this.aZ.minmax!=undefined){Ext.getCmp('GCchartOptionsVMin').setValue(this.aZ.minmax.vmin);Ext.getCmp('GCchartOptionsVMax').setValue(this.aZ.minmax.vmax);Ext.getCmp('GCchartOptionsHMin').setValue(this.aZ.minmax.hmin);Ext.getCmp('GCchartOptionsHMax').setValue(this.aZ.minmax.hmax);Ext.getCmp('GCchartOptionsGreenFrom').setValue(this.aZ.minmax.gfrom);Ext.getCmp('GCchartOptionsGreenTo').setValue(this.aZ.minmax.gto);Ext.getCmp('GCchartOptionsYellowFrom').setValue(this.aZ.minmax.yfrom);Ext.getCmp('GCchartOptionsYellowTo').setValue(this.aZ.minmax.yto);Ext.getCmp('GCchartOptionsRedFrom').setValue(this.aZ.minmax.rfrom);Ext.getCmp('GCchartOptionsRedTo').setValue(this.aZ.minmax.rto);}else{Ext.getCmp('GCchartOptionsVMin').setValue();Ext.getCmp('GCchartOptionsVMax').setValue();Ext.getCmp('GCchartOptionsHMin').setValue();Ext.getCmp('GCchartOptionsHMax').setValue();Ext.getCmp('GCchartOptionsGreenFrom').setValue();Ext.getCmp('GCchartOptionsGreenTo').setValue();Ext.getCmp('GCchartOptionsYellowFrom').setValue();Ext.getCmp('GCchartOptionsYellowTo').setValue();Ext.getCmp('GCchartOptionsRedFrom').setValue();Ext.getCmp('GCchartOptionsRedTo').setValue();}if(this.aZ.colors!=undefined)K.kreports.googlechartspanel.ab.setValue(this.aZ.colors);else K.kreports.googlechartspanel.ab.setValue('default');K.kreports.googlechartspanel.ah.fireEvent('select',K.kreports.googlechartspanel.ah);K.kreports.googlechartspanel.bn.updateColors();},getPanelData:function(){if(this.aZ.uid==undefined)this.aZ.uid=kGuid();this.aZ.dims=K.kreports.googlechartspanel.ah.getValue();this.aZ.type=K.kreports.googlechartspanel.bO.getValue();this.aZ.dimensions={dimension1:K.kreports.googlechartspanel.dimension1Combo.getValue(),dimension2:K.kreports.googlechartspanel.dimension2Combo.getValue(),dimension3:K.kreports.googlechartspanel.dimension3Combo.getValue()};this.aZ.multiplier=K.kreports.googlechartspanel.bp.getValue();this.aZ.dataseries=new Array();switch(K.kreports.googlechartspanel.ah.getValue().substr(2,1)){case '1':if(K.kreports.googlechartspanel.ar.getValue()!=null)this.aZ.dataseries.push({fieldid:K.kreports.googlechartspanel.ar.getValue(),name:listGridStore.findRecord('fieldid',K.kreports.googlechartspanel.ar.getValue()).get('name'),chartfunction:K.kreports.googlechartspanel.dataserfunCombo.getValue(),meaning:'value',axis:'P',renderer:'bars'});break;case 'N':for(var i=0;i<K.kreports.googlechartspanel.bv.count();i++)this.aZ.dataseries.push(K.kreports.googlechartspanel.bv.data.items[i].data);break;}this.aZ.options=Ext.getCmp('GCchartOptionsCheckBoxGroup').getValue();this.aZ.title=Ext.getCmp('GCchartOptionsTitle').getValue();this.aZ.context=Ext.getCmp('GCchartOptionsContext').getValue();this.aZ.legend=Ext.getCmp('GCchartOptionsLPos').getValue();this.aZ.minmax=new Object({vmin:Ext.getCmp('GCchartOptionsVMin').getValue(),vmax:Ext.getCmp('GCchartOptionsVMax').getValue(),hmin:Ext.getCmp('GCchartOptionsHMin').getValue(),hmax:Ext.getCmp('GCchartOptionsHMax').getValue(),gfrom:Ext.getCmp('GCchartOptionsGreenFrom').getValue(),gto:Ext.getCmp('GCchartOptionsGreenTo').getValue(),yfrom:Ext.getCmp('GCchartOptionsYellowFrom').getValue(),yto:Ext.getCmp('GCchartOptionsYellowTo').getValue(),rfrom:Ext.getCmp('GCchartOptionsRedFrom').getValue(),rto:Ext.getCmp('GCchartOptionsRedTo').getValue()});this.aZ.colors=K.kreports.googlechartspanel.ab.getValue();return this.aZ;}}); 