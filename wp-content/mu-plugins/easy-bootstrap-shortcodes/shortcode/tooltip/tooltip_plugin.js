var tooltip={
    title:"Tooltip Image Shortcode",
    id :'oscitas-form-tooltip',
    pluginName: 'tooltip'
};
(function() {
    _create_tinyMCE_options(tooltip);
})();

function create_oscitas_tooltip(pluginObj){
    if(jQuery(pluginObj.hashId).length){
        jQuery(pluginObj.hashId).remove();
    }
    // creates a form to be displayed everytime the button is clicked
    // you should achieve this using AJAX instead of direct html code like this
    var form = jQuery('<div id="'+pluginObj.id+'" class="oscitas-container" title="'+pluginObj.title+'"><table id="oscitas-table" class="form-table">\
			<tr>\
				<th><label for="oscitas-tooltip-style">Tooltip Style:</label></th>\
				<td><select name="type" id="oscitas-tooltip-style">\
					<option value="top">Top</option>\
					<option value="bottom">Bottom</option>\
					<option value="left">Left</option>\
					<option value="right">Right</option>\
                                        <option value="auto">Auto</option>\
                                    </select><br />\
				</td>\
			</tr>\
<tr>\
				<th><label for="oscitas-tooltip-text">Tooltip Text:</label></th>\
				<td><input type="text" name="tooltip-text" id="oscitas-tooltip-text" value="Tooltip"/><br />\
				</td>\
			</tr>\
<tr>\
				<th><label for="oscitas-tooltip-type">Type:</label></th>\
				<td><select name="type" id="oscitas-tooltip-type">\
                                         <option value="link">Link</option>\
                                        <option value="button">Button</option>\
					</select><br />\
				</td>\
			</tr >\
  <tr id="oscitas-tooltip-link-tr">\
				<th><label for="oscitas-tooltip-link">Link:</label></th>\
				<td><input type="text" name="tooltip-link" id="oscitas-tooltip-link" value="#"/><br />\
				</td>\
			</tr>\
<tr>\
				<th><label for="oscitas-tooltip-link-text">Value:</label></th>\
				<td><input type="text" name="link-text" id="oscitas-tooltip-link-text" value="Hover Me"/><br />\
				</td>\
			</tr>\
                        <tr>\
				<th><label for="oscitas-tooltip-class">Custom Class:</label></th>\
				<td><input type="text" name="line" id="oscitas-tooltip-class" value=""/><br />\
				</td>\
			</tr>\
</table>\
		<p class="submit">\
			<input type="button" id="oscitas-tooltip-submit" class="button-primary" value="Insert Tooltip" name="submit" />\
		</p>\
		</div>');

    var table = form.find('table');
    form.appendTo('body').hide();
    var colors = ['color', 'bgcolor'];

    form.find('#oscitas-tooltip-type').change(function(){
        if(jQuery(this).val()=='link'){
            table.find('#oscitas-tooltip-link-tr').show();
            table.find('#oscitas-tooltip-link').val('#');
        } else{
            table.find('#oscitas-tooltip-link-tr').hide();
            table.find('#oscitas-tooltip-link').val('');
        }
        jQuery(this).parents('#oscitas-table').find('tr:visible:even').css('background', '#F0F0F0');
        jQuery(this).parents('#oscitas-table').find('tr:visible:odd').css('background', '#DADADD');
    })

    // handles the click event of the submit button
    form.find('#oscitas-tooltip-submit').click(function() {
        // defines the options and their default values
        // again, this is not the most elegant way to do this
        // but well, this gets the job done nonetheless
        var cusclass='';
        if(table.find('#oscitas-tooltip-class').val()!=''){
            // AEA - Rename 'class' parameter by 'css_class'
            cusclass= ' css_class="'+table.find('#oscitas-tooltip-class').val()+'"';
        }
        var shortcode = '[tooltip';
        shortcode += ' type="' + table.find('#oscitas-tooltip-type').val();

        shortcode += '" ';

        shortcode += ' link="' + table.find('#oscitas-tooltip-link').val();

        shortcode += '" ';
        shortcode += ' tooltip="' + table.find('#oscitas-tooltip-text').val();

        shortcode += '" ';
        shortcode += ' style="' + table.find('#oscitas-tooltip-style').val();

        shortcode += '" ';

        shortcode += cusclass;

        shortcode += ']';
        shortcode+= table.find('#oscitas-tooltip-link-text').val();
        shortcode+='[/tooltip]';

        // inserts the shortcode into the active editor
        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

        // closes fancybox
        close_dialogue(pluginObj.hashId);
    });
}

