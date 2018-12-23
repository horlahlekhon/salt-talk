(function() {
	tinymce.create('tinymce.plugins.buttonPlugin', {
		init : function(ed, url) {
			ed.addCommand('mcebutton', function() {
				ed.windowManager.open({
					file : url + '/sc_plugin.php',  
					width : 980 + parseInt(ed.getLang('button.delta_width', 0)),  
					height : 500 + parseInt(ed.getLang('button.delta_height', 0)),   
					inline : 1
				}, {
					plugin_url : url
				});
			});			 
			ed.addButton('shortcode_button', {title : 'Insert Shortcodes', cmd : 'mcebutton', image: url + '/../images/shortcode_icon.png' });
		}
	});	 
	tinymce.PluginManager.add('sc_button', tinymce.plugins.buttonPlugin);
})();