(function() {
    tinymce.create('tinymce.plugins.tna', {
        init : function(ed, url) {
            ed.addButton('left_list_view_thumbnail', {
                title : 'Add left list view',
                image : url+'../../img/tiny_mce/left-thumb.png',
                onclick : function() {
                    ed.selection.setContent('<ul class="list_left_thumbnail"><li>' + ed.selection.getContent() + '</li></ul>');

                }
            });

            ed.addButton('right_list_view_thumbnail', {
                title : 'Add right list view',
                image : url+'../../img/tiny_mce/right-thumb.png',
                onclick : function() {
                    ed.selection.setContent('<ul class="list_right_thumbnail"><li>' + ed.selection.getContent() + '</li></ul>');

                }
            });

        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('tna', tinymce.plugins.tna);
})();
