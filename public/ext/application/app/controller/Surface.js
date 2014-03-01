Ext.define('Powerpos.controller.Surface', {
    extend: 'Ext.app.Controller',

    stores:
        [
        ],

    models:
        [
        ],

    views:
        [
            'Surface'
        ],

    refs:
        [
            {
                ref: 'surface',
                selector: 'Surface'
            }
        ],

    init: function() {
        this.control({
        });
    },

    logout: function() {
        document.location.href = '/logout';
    }
});