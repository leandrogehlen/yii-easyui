var locale = {
	crud: {
		noRecordsSelectedMsg: "No records selected",
        onlyOneRecordSelectedMsg: "Only one record should be selected",
        removeConfirmationMsg : "Are you sure you want to remove the selected(s) record(s)",
        alertTitle: "Alert",
        confirmTitle: "Confirm"
	}
};

var Crud = function(options) {
	this.init(options);
};

Crud.prototype = {	
	
	init: function(options) {
		var that = this,		
			defaults = { 
				window: null,                
				route: "",
				grid: null,
				onBeforeEdit: function(isNewRecord, data){},            
				onAfterEdit: function(isNewRecord){},
				onBeforeRemove: function(rows){},            
				onAfterRemove: function(){},
				onBeforeRefresh: function(){},            
				onAfterRefresh: function(){},
				onBeforeSave: function(param){},            
				onAfterSave: function(){}
        	};
        
        that.options = $.extend({}, defaults, options);        
        that.route = options.route.replace(/\/index$/,'');        
        that.form = options.window.find('form:first');
        
        that.noRecordsSelectedMsg = locale.crud.noRecordsSelectedMsg;
        that.onlyOneRecordSelectedMsg = locale.crud.onlyOneRecordSelectedMsg;
        that.removeConfirmationMsg = locale.crud.removeConfirmationMsg;
        that.alertTitle = locale.crud.alertTitle;
        that.confirmTitle = locale.crud.confirmTitle;
        
        that.form.form({
            onLoadSuccess: function(data){
            	$.messager.progress('close');            	
            	if (data.success === false)
                	$.messager.alert(that.alertTitle, data.error, 'error');
                else {                	        
                	that.options.onBeforeEdit(false, data);        	                	
                	that.options.window.dialog('open');
                	that.options.onAfterEdit(false);
                }
            }
        });        
	},		           
	
	validate: function() {   				
		var that = this,
        	selected = that.options.grid.datagrid('getSelected'),
        	rows = that.options.grid.datagrid('getSelected'),
        	valid = false;
					
        if (!selected)
        	$.messager.alert(that.alertTitle, that.noRecordsSelectedMsg, 'warning');
        else if (rows.length > 1)
        	$.messager.alert(that.alertTitle, that.onlyOneRecordSelectedMsg, 'warning');
        else
        	valid = true;
                
        return valid;
	},
	
	clearErrors: function() {
		var div = $('.errorMessage');
        if (div.length) div.remove();
	},

	showErrors: function(errors) {
		var that = this;		
		for (var i in errors) {
			var div = that.form.find('#' + i).closest('div');
			div.append('<div class="errorMessage">'+errors[i]+'</div>');									
		}
	 },
	
	 add: function() { 
		var that = this;
		that.form.form('clear');
		that.form.attr('action', that.route+'/create');
		that.options.onBeforeEdit(true, {});
		that.options.window.dialog('open');    
		that.options.onAfterEdit(true);
	 },
	
	 edit: function() {                        		
		var that = this;			
		
		if (that.validate(true)) {
			$.messager.progress();
			
			var selected = that.options.grid.datagrid('getSelected'),
				url = that.route+"/view&id="+selected.id,
				action = that.route+"/update&id="+selected.id;
			
			that.form.attr('action', action);			
			that.form.form('reset');                
			that.form.form('load', url);				
        }
	 },
	
	 remove: function(){                                	
		var that = this;
		
		if (!that.validate()) 
        	return
		
        $.messager.confirm(that.confirmTitle, that.removeConfirmationMsg, function(r){                        
        	if (r) {
        		var row = that.options.grid.datagrid('getSelected');        		               
                that.options.onBeforeRemove(row);
                
                $.ajax({type: "POST", url: that.route +'/delete/&id='+row.id,                	  
                	  success: function(data) {                      	
                		  data = $.parseJSON(data);                	
                		  if (!data.success) {
                			  $.messager.alert(that.alertTitle, data.error, 'error');
                		  }
                		  else {
                			  that.options.grid.datagrid('clearSelections');
                			  that.options.grid.datagrid('reload');                    	
                		  }
                	  },
                	  
                	  error: function (xhr, status, error){
                		  $.messager.alert(that.alertTitle, error, 'error');
                	  }
                });
                                                                                                                       
                that.options.onAfterRemove();
        	}
        });                                 

	 },       
	
	 refresh: function() {
		 var that = this;
		 that.options.grid.datagrid('clearSelections');
		 that.options.grid.datagrid('reload');		
	 },
	
	 save: function() {      
		 var that = this,
		 	 param = {ajax: that.form.attr('id')};

		 if (!that.form.form('validate')) 
			 return;		 

		 that.clearErrors();
		 that.options.onBeforeSave(param);                        
		 param = (!$.isEmptyObject(param)) ? '&' + $.param(param, true) : '';
		 		 
		 $.post(that.form.attr('action'), that.form.serialize() + param, function(data) {			 
			 data = $.parseJSON(data);
			 if (data.success) {                        
				 that.options.onAfterSave();
				 that.options.window.window('close');
				 that.options.grid.datagrid('reload');
			 }
			 else {
				 if (data.error)
					 $.messager.alert(that.alertTitle, data.error, 'error');
				 else
					 that.showErrors(data);
			 }                                
		 });                      
	 }	
};