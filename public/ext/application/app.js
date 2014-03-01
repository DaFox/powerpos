Ext.application({
    name: 'Powerpos',

    appFolder: 'ext/application/app',
    appProperty: 'Current',

    controllers:
        [
            'Surface'
        ],

    autoCreateViewport: true,

    launch: function() {
        Powerpos[this.appProperty] = this;
    }
});