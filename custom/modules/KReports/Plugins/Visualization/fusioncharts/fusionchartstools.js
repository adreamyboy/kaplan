Ext.namespace('K.kreports.fusionchartstools');K.kreports.fusionchartstools.exportObjectHelper=function(domObject){if(typeof(domObject.children)!=undefined&&domObject.children.length>0){if(domObject.children[0].tagName=='svg')return K.kreports.encode64(domObject.innerHTML);else return K.kreports.fusionchartstools.exportObjectHelper(domObject.children[0]);}else return false;}