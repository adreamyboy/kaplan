Ext.namespace('K.kreports.pdrilldown');Ext.define('K.kreports.pdrilldown.aj',{extend:'Ext.data.Model',fields:[{name:'id'}]});K.kreports.pdrilldown.popupStore=new Ext.data.Store({model:K.kreports.pdrilldown.aj,pageSize:20,remoteSort:true,proxy:new Ext.data.HttpProxy({actionMethods:{create:"POST",read:"POST",update:"POST",destroy:"POST"},url:'index.php?module=KReports&action=pluginaction&plugin=kpdrilldown&pluginaction=load_report&to_pdf=true',method:'POST'}),reader:new Ext.data.reader.Json({root:'records',totalProperty:'count'})});K.kreports.pdrilldown.popupGrid=new Ext.grid.Panel({store:K.kreports.pdrilldown.popupStore,columns:[],height:400,dockedItems:[{xtype:'pagingtoolbar',store:K.kreports.pdrilldown.popupStore,dock:'bottom',displayInfo:true}]});K.kreports.pdrilldown.gridpopup=new Ext.Window({title:bi('LBL_ADDLINKEDREPORT_TITLE'),layout:{type:'anchor',align:'middle'},width:600,modal:true,autoHeight:true,closeAction:'hide',plain:true,border:false,resizable:false,items:[K.kreports.pdrilldown.popupGrid]});K.kreports.pdrilldown.chartpopup=new Ext.Window({title:bi('LBL_ADDLINKEDREPORT_TITLE'),layout:{type:'anchor',align:'middle'},width:600,modal:true,autoHeight:true,closeAction:'hide',plain:true,border:false,resizable:false,items:[]});if(K.kreports.pdrilldownitems&&K.kreports.pdrilldownitems.length>0){K.kreports.pdrilldown.contextMenu=new Ext.menu.Menu({record:null,title:bi('LBL_DRILLDOWNMENUTITLE'),closable:true,closeAction:'hide',items:K.kreports.pdrilldownitems,listeners:{click:function(menu,item){if(item){switch(item.linktype){case 'POPUP':K.kreports.pdrilldown.popupStore.removeAll();K.kreports.pdrilldown.popupStore.getProxy().extraParams.popupreportid=item.reportid;K.kreports.pdrilldown.popupStore.getProxy().extraParams.drilldownid=item.id;K.kreports.pdrilldown.popupStore.getProxy().extraParams.parentreportid=document.getElementById('recordid').value;K.kreports.pdrilldown.popupStore.getProxy().extraParams.recorddata=Ext.JSON.encode(K.kreports.pdrilldown.contextMenu.record.data);K.kreports.pdrilldown.gridpopup.setTitle(bi('LBL_DRILLDOWNMENUTITLE')+' : '+item.text);Ext.Ajax.request({url:'index.php?module=KReports&action=pluginaction&plugin=kpdrilldown&pluginaction=getdisplaycolumns&to_pdf=true',params:{popupreportid:item.reportid},success:function(response){var newCols=Ext.JSON.decode(response.responseText);K.kreports.pdrilldown.popupGrid.reconfigure(K.kreports.pdrilldown.popupStore,newCols);K.kreports.pdrilldown.gridpopup.show();K.kreports.pdrilldown.popupStore.load({params:{start:0,limit:K.kreports.pdrilldown.popupStore.pageSize}});}});break;case 'CHART':K.kreports.pdrilldown.chartpopup.setTitle(bi('LBL_DRILLDOWNMENUTITLE')+' : '+item.text);Ext.Ajax.request({url:'index.php?module=KReports&action=pluginaction&plugin=kpdrilldown&pluginaction=load_visualization&to_pdf=true',params:{popupreportid:item.reportid,drilldownid:item.id,parentreportid:document.getElementById('recordid').value,recorddata:Ext.JSON.encode(K.kreports.pdrilldown.contextMenu.record.data)},success:function(response){K.kreports.pdrilldown.chartpopup.update("");K.kreports.pdrilldown.chartpopup.show();var visualizationResponse=Ext.JSON.decode(response.responseText);K.kreports.pdrilldown.chartpopup.update(visualizationResponse.visContent);for(var i=0;i<visualizationResponse.visItems.length;i++){eval(document.getElementById(visualizationResponse.visItems[i]+'_script').innerHTML);}}});break;}}}}});}K.kreports.pdrilldown.displayContextMenu=function(record,e){if(K.kreports.pdrilldown.contextMenu){e.stopEvent();K.kreports.pdrilldown.contextMenu.record=record;K.kreports.pdrilldown.contextMenu.showAt(e.xy)}}