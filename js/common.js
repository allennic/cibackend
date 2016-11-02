require.config({
    baseUrl: SITE_URL+'js/',
    paths: {
        "jquery": "./lib/jquery",
        "bootstrap": "./lib/bootstrap",
        "bootstrapValidator": "./lib/bootstrapValidator",
        "aci":"./lib/aci"

    },
    shim: {
        "jquery-ui": {
            exports: "$",
            deps: ['jquery']
        },
        "datetimepicker": {
            exports: "$",
            deps: ['jquery']
        },
        "cookie": {
            exports: "$",
            deps: ['jquery']
        },
        "underscore": {
            exports: "_"
        },
        "bootstrapValidator": {
            exports: "$",
            deps: [ "jquery"]
        },
        "bootstrap": ['jquery'],
        "validationEngine": ['validationEngineLang'],
        "jquery-ui-dialog-extend": ['jquery-ui'],
        "aci": ['jquery'],
        "message": {
            exports: "$",
            deps: ['jquery']
        },
        "confirm": {
            exports: "$",
            deps: ['jquery']
        },
        "modal": {
            exports: "$",
            deps: ['jquery']
        },
        "headroom": {
            exports: "$",
            deps: ['jquery']
        },
    },
    waitSeconds: 0

});

