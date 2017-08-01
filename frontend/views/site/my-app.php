<!--
@license
Copyright (c) 2016 The Polymer Project Authors. All rights reserved.
This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
The complete set of authors may be found at http://pol-ymer.github.io/AUTHORS.txt
The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
Code distributed by Google as part of the polymer project is also
subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
-->
<link rel="import" href="../../../bower_components/polymer/polymer-element.html">
<link rel="import" href="../../../bower_components/app-layout/app-drawer/app-drawer.html">
<link rel="import" href="../../../bower_components/app-layout/app-drawer-layout/app-drawer-layout.html">
<link rel="import" href="../../../bower_components/app-layout/app-header/app-header.html">
<link rel="import" href="../../../bower_components/app-layout/app-header-layout/app-header-layout.html">
<link rel="import" href="../../../bower_components/app-layout/app-toolbar/app-toolbar.html">

<link rel="import" href="../../../bower_components/app-layout/app-scroll-effects/app-scroll-effects.html">
<link rel="import" href="../../../bower_components/app-route/app-location.html">
<link rel="import" href="../../../bower_components/app-route/app-route.html">

<link rel="import" href="../../../bower_components/iron-flex-layout/iron-flex-layout.html">
<link rel="import" href="../../../bower_components/iron-icons/iron-icons.html">
<link rel="import" href="../../../bower_components/iron-image/iron-image.html">
<link rel="import" href="../../../bower_components/iron-media-query/iron-media-query.html">
<link rel="import" href="../../../bower_components/iron-pages/iron-pages.html">
<link rel="import" href="../../../bower_components/iron-selector/iron-selector.html">
<link rel="import" href="../../../bower_components/paper-icon-button/paper-icon-button.html">
<link rel="import" href="../../../bower_components/paper-item/paper-item.html">
<link rel="import" href="../../../bower_components/paper-listbox/paper-listbox.html">
<link rel="import" href="../../../bower_components/paper-tabs/paper-tabs.html">
<link rel="import" href="../../../bower_components/l2t-paper-slider/l2t-paper-slider.html">
<link rel="import" href="my-icons.html">

<link rel="lazy-import" href="my-home.php">
<link rel="lazy-import" href="my-tournament.php">
<link rel="lazy-import" href="my-history.php">
<link rel="lazy-import" href="my-gallery.php">
<link rel="lazy-import" href="my-about.php">
<link rel="lazy-import" href="my-view404.php">

<dom-module id="my-app">
  <template>
    <style>
      :host {
        /*--app-primary-color: #4285f4;*/
        /*--app-secondary-color: black;*/

        --dark-primary-color:       #388E3C  ;
        /*--default-primary-color:    #4CAF50;*/
        --light-primary-color:      #C8E6C9;
        --text-primary-color:       #FFFFFF;
        --accent-color:             #4CAF50;
        /*--primary-background-color: #C8E6C9;*/
        --primary-text-color:       #212121;
        --secondary-text-color:     #757575;
        --disabled-text-color:      #BDBDBD;
        --divider-color:            #BDBDBD;*/

        display: block;
      }

      :focus {
        outline: none;
      }

      app-drawer-layout:not([narrow]) [drawer-toggle] {
        display: none;
      }

      app-header {
        color: var(--text-primary-color);
        background-color: var(--dark-primary-color);
        margin-top: 150px;
      }

      app-header paper-icon-button {
        --paper-icon-button-ink-color: var(--text-primary-color);
      }

      .drawer-list {
        margin: 0 20px;
      }

      .drawer-list a {
        display: block;
        /*padding: 0 16px;*/
        text-decoration: none;
        color: var(--app-secondary-color);
        line-height: 40px;
        text-indent: 16px;
      }

      .drawer-list a > paper-item {
        text-transform: uppercase;
      }

      .drawer-list a.iron-selected {
        color: var(--primary-text-color);
        background-color: var(--light-primary-color);
      }

      .drawer-list a.iron-selected paper-item {
        font-weight: bolder;
      }

      /**/
      /*app-toolbar {
        background-color: #dcdcdc;
      }*/
      /*.main-header {
        box-shadow: 0px 5px 6px -3px rgba(0, 0, 0, 0.4);
      }*/

      paper-tabs {
        --paper-tabs-selection-bar-color: yellow;
        height: 100%;
        /*max-width: 640px;*/
      }
      paper-tab {
        --paper-tab-ink: #aaa;
        /*color: var(--text-primary-color);*/
        text-transform: uppercase;
        /*padding-left: 0;
        padding-right: 0;*/
        font-weight: bold;
      }
      paper-tab a {
        text-decoration: none;
        color: var(--text-primary-color);
        padding-right: 15px;
        padding-left: 15px;
      }
      paper-tab.iron-selected {
        font-weight: bold
      }
      paper-tab a:visited {
        color: var(--text-primary-color);
      }

      [hidden] {
        display: none !important;
      }
    </style>
    <!-- <app-location route="{{route}}"></app-location> -->
    <!-- <app-route
        route="{{route}}"
        pattern="/yii2/frontend/web/:page"
        data="{{routeData}}"
        tail="{{subroute}}"></app-route> -->

    <app-drawer-layout fullbleed force-narrow>
      <!-- Drawer content -->
      <app-drawer id="drawer" slot="drawer">
        <app-toolbar>Menu</app-toolbar>
        <paper-listbox>
          <iron-selector selected="[[page]]" attr-for-selected="name" class="drawer-list" role="navigation">
            <a href="frontend/web/home" name="home" tabindex="-1"><paper-item>home</paper-item></a>
            <a href="frontend/web/tournament" name="tournament" tabindex="-1"><paper-item>tournament</paper-item></a>
            <a href="frontend/web/history" name="history" tabindex="-1"><paper-item>history</paper-item></a>
            <a href="frontend/web/gallery" name="gallery" tabindex="-1"><paper-item>gallery</paper-item></a>
            <a href="frontend/web/about" name="about" tabindex="-1"><paper-item>about</paper-item></a>
          </iron-selector>
        </paper-listbox>
      </app-drawer>

      <!-- Main content -->
      <app-header-layout has-scrolling-region>

        <app-header slot="header" condenses reveals effects="waterfall">
          <app-toolbar class="tabs-bar">

            <paper-icon-button icon="my-icons:menu" drawer-toggle hidden$="{{wideLayout}}"></paper-icon-button>
              <a href=""><paper-icon-button src="frontend/web/images/manifest/icon-48x48.png"></paper-icon-button></a>
              <div main-title>My App</div>
              <style is="custom-style">
                .link {
                  @apply --layout-vertical;
                  @apply --layout-center-center;
                }
              </style>
              <paper-tabs selected="[[page]]" attr-for-selected="name" hidden$="{{!wideLayout}}">
                <!-- <paper-tab link name="home"><a href="frontend/web/home" class="link">home</a></paper-tab>
                <paper-tab link name="tournament"><a href="frontend/web/tournament" class="link">tournament</a></paper-tab>
                <paper-tab link name="history"><a href="frontend/web/history" class="link">history</a></paper-tab>
                <paper-tab link name="gallery"><a href="frontend/web/gallery" class="link">gallery</a></paper-tab>
                <paper-tab link name="about"><a href="frontend/web/about" class="link">about</a></paper-tab> -->
                <paper-tab link name="about"><a href="/yii2/frontend/web/about" class="link">About</a></paper-tab>
                <paper-tab link name="contact"><a href="/yii2/frontend/web/contact" class="link">Contact</a></paper-tab>
                <?php if ("{{details}}" == true): ?>
                  <paper-tab link name="signup"><a href="/yii2/frontend/web/signup" class="link">Signup</a></paper-tab>
                  <paper-tab link name="login"><a href="/yii2/frontend/web/login" class="link">Login</a></paper-tab>
                <?php else: ?>
                  <paper-tab link name="logout"><a href="/yii2/frontend/web/logout" class="link">Logout</a></paper-tab>
                <?php endif; ?>
              </paper-tabs>
          </app-toolbar>
        </app-header>
        <!-- TODO: use iron-media-query for resizing lt2-paper-slider height -->
        <style is="custom-style">
          l2t-paper-slider {
            --paper-slide-height: 500px;
          }
          paper-slide {
            line-height: 500px;
            font-size: 64px;
            text-align: center;
            vertical-align: middle;
            color: white;
            background-repeat: no-repeat;
            background-position: top center;
            background-size: cover;
          }
          /*<paper-icon-button icon="favorite" title="heart">*/
        </style>
          <!-- <l2t-paper-slider total-slides="4">
            <paper-slide style="background-image: url('frontend/web/images/cheerup.jpg');"></paper-slide>
            <paper-slide style="background-image: url('frontend/web/images/cheerup.jpg');"></paper-slide>
            <paper-slide style="background-image: url('frontend/web/images/pro1.jpg')"></paper-slide>
            <paper-slide style="background-image: url('frontend/web/images/cheerup1.jpg')"></paper-slide>
          </l2t-paper-slider>
        -->
        <!-- <iron-pages
            selected="[[page]]"
            attr-for-selected="name"
            fallback-selection="view404"
            role="main">
          <my-home name="home"></my-home>
          <my-tournament name="tournament"></my-tournament>
          <my-history name="history"></my-history>
          <my-gallery name="gallery"></my-gallery>
          <my-about name="about"></my-about>
          <my-view404 name="view404"></my-view404>
        </iron-pages> -->
      </app-header-layout>
    </app-drawer-layout>
    <?php echo '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />';
    echo gettype('{{details}}');
    echo '<br />';
    echo ('{{details}}'); ?>
    <iron-media-query query="min-width: 600px" query-matches="{{wideLayout}}"></iron-media-query>
    </template>
    <script>
      class MyApp extends Polymer.Element {

        static get is() { return 'my-app'; }

        static get properties() {
          return {
            page: {
              type: String,
              reflectToAttribute: true,
              observer: '_pageChanged',
            },
            rootPattern: String,
            routeData: Object,
            subroute: String,
            wideLayout: {
              type: Boolean,
              value: false,
              observer: 'onLayoutChange',
            },
            details: {
              type: Boolean,
              observer
            },
          };
        }

        static get observers() {
          return [
            '_routePageChanged(routeData.page)',
          ];
        }

        constructor() {
          super();

          // Get root pattern for app-route, for more info about `rootPath` see:
          // https://www.polymer-project.org/2.0/docs/upgrade#urls-in-templates
          this.rootPattern = (new URL(this.rootPath)).pathname;
        }
        onLayoutChange(wide) {
          var drawer = this.$.drawer;
          if (wide && drawer.opened) {
            drawer.close();
          }
        }
        // _routePageChanged(page) {
        //   // Polymer 2.0 will call with `undefined` on initialization.
        //   // Ignore until we are properly called with a string.
        //   if (page === undefined) {
        //     return;
        //   }
        //
        //   // If no page was found in the route data, page will be an empty string.
        //   // Deault to 'home' in that case.
        //   this.page = page || 'home';
        //
        //   // Close a non-persistent drawer when the page & route are changed.
        //   if (!this.$.drawer.persistent) {
        //     this.$.drawer.close();
        //   }
        // }

        _pageChanged(page) {
          // Load page import on demand. Show 404 page if fails
          console.log(page);
          var resolvedPageUrl = this.resolveUrl('my-' + page + '.php');
          Polymer.importHref(
              resolvedPageUrl,
              null,
              this._showPage404.bind(this),
              true);
        }

        _showPage404() {
          this.page = 'view404';
        }

      }

      window.customElements.define(MyApp.is, MyApp);
    </script>
  </dom-module>
