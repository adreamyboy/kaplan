Ext.namespace('K.kreports.pivotview');Ext.define('K.kreports.pivotview.aD',{extend:'Ext.data.Model',fields:[{name:'id'}]});K.kreports.pivotview.store=new Ext.data.Store({model:K.kreports.pivotview.aD,reCount:false,whereConditions:null,proxy:new Ext.data.HttpProxy({actionMethods:{create:"POST",read:"POST",update:"POST",destroy:"POST"},url:'index.php?module=KReports&action=pluginaction&plugin=pivot&pluginaction=load_report&to_pdf=true',method:'POST',extraParams:{record:document.getElementById('recordid').value}}),reader:new Ext.data.reader.Json({root:'records',totalProperty:'count'}),remoteSort:true,listeners:{load:function(){if(this.proxy.reader.jsonData.metaData.showSum){K.kreports.pivotview.theGrid=new Ext.grid.Panel({store:K.kreports.pivotview.store,scroll:'both',columns:this.proxy.reader.jsonData.metaData.gridcolumns,viewConfig:{listeners:{itemcontextmenu:function(view,record,item,index,e,eOpts){if(K.kreports.pdrilldown){K.kreports.pdrilldown.displayContextMenu(record,e);}}}},drilldowndata:this.proxy.reader.jsonData.metaData.drilldowndata,features:[{id:'ksummary',ftype:'ksummary',remoteSummary:'recordtotal'}]})}else{K.kreports.pivotview.theGrid=new Ext.grid.Panel({store:K.kreports.pivotview.store,scroll:'both',viewConfig:{listeners:{itemcontextmenu:function(view,record,item,index,e,eOpts){if(K.kreports.pdrilldown){K.kreports.pdrilldown.displayContextMenu(record,e);}}}},drilldowndata:this.proxy.reader.jsonData.metaData.drilldowndata,columns:this.proxy.reader.jsonData.metaData.gridcolumns})}K.kreports.pivotview.grid.removeAll(false);K.kreports.pivotview.grid.add(K.kreports.pivotview.theGrid);K.kreports.pivotview.loadmask.hide();}}});K.kreports.pivotview.grid=new Ext.panel.Panel({id:'kReporterPresentation',title:bi('LBL_STANDARDGRIDPANELTITLE'),layout:'fit',width:'100%',minHeight:400,height:500,items:[],bS:function(){bk=new Array();for(i=0;i<K.kreports.pivotview.theGrid.columns.length;i++){bk[i]=new Object();bk[i].sequence=i+1;bk[i].dataIndex=K.kreports.pivotview.theGrid.columns[i].dataIndex;if(K.kreports.pivotview.theGrid.columns[i].getWidth!=undefined)bk[i].width=K.kreports.pivotview.theGrid.columns[i].getWidth();else if(K.kreports.pivotview.theGrid.columns[i].width!=undefined)bk[i].width=K.kreports.pivotview.theGrid.columns[i].width;else bk[i].width=0;if(K.kreports.pivotview.theGrid.columns[i].isHidden!=undefined)bk[i].isHidden=K.kreports.pivotview.theGrid.columns[i].isHidden();else bk[i].isHidden=false;}return bk;},renderPresentation:function(){this.render('reportGrid');var position=this.getPosition();this.setHeight(Math.max(Math.max(document.body.scrollHeight,document.documentElement.scrollHeight),Math.max(document.body.offsetHeight,document.documentElement.offsetHeight),Math.max(document.body.clientHeight,document.documentElement.clientHeight))-100-position[1]);K.kreports.pivotview.loadmask.show();K.kreports.pivotview.store.getProxy().extraParams.panelwidth=K.kreports.pivotview.grid.getWidth();K.kreports.pivotview.store.load();},reloadPresentation:function(whereConditions){K.kreports.pivotview.store.getProxy().extraParams.whereConditions=whereConditions;K.kreports.pivotview.store.getProxy().extraParams.panelwidth=K.kreports.pivotview.grid.getWidth();K.kreports.pivotview.store.load();}});K.kreports.pivotview.loadmask=new Ext.LoadMask(K.kreports.pivotview.grid,{msg:bi('LBL_LOADMASK')});