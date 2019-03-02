<!DOCTYPE html>
<html lang="[[++cultureKey]]">
    <head>
        <base href="[[!++site_url]]">
        <meta http-equiv="Content-Type" content="text/html; charset=[[++modx_charset]]" />
        [[-<meta property="og:site_name" content="[[++site_name]]" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="[[*longtitle:default=`[[*pagetitle]]`]]" />
        <meta property="og:description" content="[[*description:default=`[[++site_description]]`]]" />
        <meta property="og:url" content="[[~[[*id]]? &scheme=`full`]]" />
        <meta property="og:image" content="[[*image:default=`[[++site_image]]`]]" />
        <meta property="fb:app_id" content="[[++fb_app_id]]" />
        <meta property="article:publisher" content="[[++fb_url]]" />
        <!-- Twitter Tags -->
        <meta name="twitter:site" content="@[[++tw_username]]" />
        <meta name="twitter:title" content="[[*longtitle:default=`[[*pagetitle]]`]]" />
        <meta name="twitter:description" content="[[*description:default=`[[++site_description]]`]]" />
        <meta name="twitter:url" content="[[~[[*id]]? &scheme=`full`]]" />
        <meta name="twitter:image:src" content="[[*image:default=`[[++site_image]]`]]" />
        <meta name="twitter:card" content="summary_large_image" />]]
        <!-- Icons -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" sizes="16x16 24x24 32x32 48x48" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" sizes="16x16 24x24 32x32 48x48" />
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <title>[[*pagetitle]] - [[++site_name]]</title>
        <meta name="keywords" content="[[*meta-keywords]]" />
        <meta name="description" content="[[*descripton]]">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/components/moddevextra/inc/css/main.css" />

        [[-MinifyX?
        &minifyJs=`0`
        &minifyCss=`1`
        &registerJs=`default`
        &registerCss=`default`
        &cssSources=`
        /assets/modmysettings/inc/css/bootstrap.min.css,
        /assets/modmysettings/inc/css/main.css?v=0.0.2,
        `
        &jsSources=`
        /assets/modmysettings/inc/js/jquery.min.js,
        /assets/modmysettings/inc/js/bootstrap.min.js,
        /assets/modmysettings/inc/js/main.js,
        `
        &jsPlaceholder=`jsPlaceholder`
        &cssPlaceholder=`cssPlaceholder`
        ]]
    </head>
    <body>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">[[++site_name]]</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    [[pdoMenu?
                        &startId=`0`
                        &level=`2`
                        &tplParentRow=`@INLINE
                        <li class="[[+classnames]] dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" [[+attributes]]>[[+menutitle]]<b class="caret"></b></a>
                            <ul class="dropdown-menu">[[+wrapper]]</ul>
                        </li>`
                        &tplOuter=`@INLINE [[+wrapper]]`
                    ]]
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

