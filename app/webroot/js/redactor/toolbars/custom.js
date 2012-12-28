if (typeof RTOOLBAR == 'undefined') var RTOOLBAR = {};

RTOOLBAR['custom'] = {
	styles:
	{ 
		title: RLANG.styles,
		func: 'show', 				
		dropdown: 
	    {
	    p:
			 {
			 	title: RLANG.paragraph,			 
			 	exec: 'formatblock',
			 	param: '<p>'
			 },
			 h3:
			 {
			 	title: RLANG.header3,			 
			 	exec: 'formatblock', 
			 	param: '<h3>',			 	  
			 	style: 'font-size: 20px; line-height: 30px;  font-weight: bold;'
			 }																	
		},
		separator: true
	},
	bold:
	{
		title: RLANG.bold,
		exec: 'bold'
	}, 
	italic: 
	{
		title: RLANG.italic,
		exec: 'italic',
		separator: true		
	},
	insertunorderedlist:
	{
		title: '&bull; ' + RLANG.unorderedlist,
		exec: 'insertunorderedlist'
	},
	insertorderedlist: 
	{
		title: '1. ' + RLANG.orderedlist,
		exec: 'insertorderedlist'
	},
	table: 					
	{ 
		title: RLANG.table,
		func: 'show', 				
		dropdown: 
		{
			insert_table: { name: 'insert_table', title: RLANG.insert_table, func: 'showTable' },
			separator_drop1: { name: 'separator' },	
			insert_row_above: { name: 'insert_row_above', title: RLANG.insert_row_above, func: 'insertRowAbove' },
			insert_row_below: { name: 'insert_row_below', title: RLANG.insert_row_below, func: 'insertRowBelow' },
			insert_column_left: { name: 'insert_column_left', title: RLANG.insert_column_left, func: 'insertColumnLeft' },
			insert_column_right: { name: 'insert_column_right', title: RLANG.insert_column_right, func: 'insertColumnRight' },												
			separator_drop2: { name: 'separator' },	
			add_head: { name: 'add_head', title: RLANG.add_head, func: 'addHead' },									
			delete_head: { name: 'delete_head', title: RLANG.delete_head, func: 'deleteHead' },							
			separator_drop3: { name: 'separator' },				
			delete_column: { name: 'insert_table', title: RLANG.delete_column, func: 'deleteColumn' },									
			delete_row: { name: 'delete_row', title: RLANG.delete_row, func: 'deleteRow' },									
			delete_table: { name: 'delete_table', title: RLANG.delete_table, func: 'deleteTable' }																		
		}								
	}
};