Ext.define('Powerpos.view.Surface', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.Surface',

    initComponent: function() {
        Ext.apply(this, {
            id: 'surface',
            layout: 'fit',
            border: false,
            bodyPadding: 5,
            dockedItems:
                [
                    {
                        xtype: 'toolbar',
                        dock: 'top',
                        enableOverflow: true,
                        items:
                            [
                                {
                                    xtype: 'button',
                                    text: 'Hilfe',
                                    iconCls: 'icon_help',
                                    menu:
                                        [
                                            {
                                                xtype: 'menuitem',
                                                text: 'Manual',
                                                iconCls: 'icon_book_open',
                                                handler: function() {
                                                    window.open('/help/manual');
                                                }
                                            }
                                        ]
                                }
                            ]
                    },
                    {
                        xtype: 'toolbar',
                        dock: 'bottom',
                        enableOverflow: true,
                        items:
                            [
                                '->',
                                {
                                    xtype: 'button',
                                    text: 'Logout',
                                    iconCls: 'icon_door',
                                    action: 'logout'
                                }
                            ]
                    }
                ],

            items:
                [
                    {
                        xtype: 'panel',
                        html: '<h1>powerpos</h1>'
                    }
                ]
        });

        this.callParent(arguments);
    }
});