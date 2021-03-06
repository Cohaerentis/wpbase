var notifications={
    title:"Notifications Shortcode",
    id :'oscitas-form-notifications',
    pluginName: 'notifications'
};
(function() {
    _create_tinyMCE_options(notifications);
})();

function create_oscitas_notifications(pluginObj){
    if(jQuery(pluginObj.hashId).length){
        jQuery(pluginObj.hashId).remove();
    }
    // creates a form to be displayed everytime the button is clicked
    // you should achieve this using AJAX instead of direct html code like this
    var form = jQuery('<div id="'+pluginObj.id+'" class="oscitas-container" title="'+pluginObj.title+'"><table id="oscitas-table" class="form-table">\
			<tr>\
				<th><label for="oscitas-type">Style :</label></th>\
				<td><select name="type" id="oscitas-type">\
					<option value="alert-warning">Warning</option>\
					<option value="alert-success">Success</option>\
					<option value="alert-info">Information</option>\
					<option value="alert-danger">Danger</option>\
				</select><br />\
				</td>\
			</tr>\
			<tr>\
				<th><label for="oscitas-line">Close link</label></th>\
				<td><input type="checkbox" id="oscitas-close"/><br />\
				</td>\
			</tr>\
                        <tr>\
				<th><label for="oscitas-note-class">Custom Class:</label></th>\
				<td><input type="text" name="line" id="oscitas-note-class" value=""/><br />\
				</td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="oscitas-submit" class="button-primary" value="Insert Notification" name="submit" />\
		</p>\
		</div>');

    var table = form.find('table');
    form.appendTo('body').hide();

    // handles the click event of the submit button
    form.find('#oscitas-submit').click(function(){
        // defines the options and their default values
        // again, this is not the most elegant way to do this
        // but well, this gets the job done nonetheless
        var options = {
            'type'       : 'error'
        };
        var cusclass='';
        if(table.find('#oscitas-note-class').val()!=''){
            // AEA - Rename 'class' parameter by 'css_class'
            cusclass= ' css_class="'+table.find('#oscitas-note-class').val()+'"';
        }
        var shortcode = '[notification';

        for( var index in options) {
            var value = table.find('#oscitas-' + index).val();

            // attaches the attribute to the shortcode only if it's different from the default value
            //if ( value !== options[index] )
            shortcode += ' ' + index + '="' + value + '"';
        }

        var selected_content = tinyMCE.activeEditor.selection.getContent();
        if(!selected_content)
            var selected_content = 'Your notification';
        shortcode += ' close="'+(table.find('#oscitas-close').prop('checked')? 'true': 'false')+ '" ';

        shortcode += cusclass+']'+selected_content+'[/notification]';

        // inserts the shortcode into the active editor
        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

        close_dialogue(pluginObj.hashId);
    });
}

