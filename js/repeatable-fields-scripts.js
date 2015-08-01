function add_image(obj) {
    var parent=jQuery(obj).parent().parent('div.field_row');
    var inputField = jQuery(parent).find("input.meta_image_url");
    tb_show('', 'media-upload.php?TB_iframe=true');
    window.send_to_editor = function(html) {
        var url = jQuery(html).find('img').attr('src');
        inputField.val(url);
        jQuery(parent)
        .find("div.image_wrap")
        .html('<img src="'+url+'" height="48" width="48" />');
        tb_remove();
    };
    return false;
}

function remove_field(obj) {
    var parent=jQuery(obj).parent().parent();
    parent.remove();
}

function add_field_row() {
    var row = jQuery('#master-row').html();
    jQuery(row).appendTo('#field_wrap');
}