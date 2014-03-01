Ext.define('Powerpos.view.Viewport', {
    extend: 'Ext.container.Viewport',

    initComponent: function() {
        Ext.apply(this, {
            layout: 'border',

            items:
                [
                    {
                        xtype: 'Surface',
                        region: 'center'
                    }
                ],

            listeners: {
                afterrender: function() {
                    setTimeout(function() {
                        Ext.get('splash-overlay').remove();
                    }, 2000);
                }
            }
        });

        this.callParent(arguments);
    }
});