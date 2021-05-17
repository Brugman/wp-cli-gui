var app = new Vue({
    el: '#app',

    data: {
        // tabs
        active_tab: 'install',
        // presets
        presets_meta: {
            1: null,
            2: null,
            3: null,
            4: null,
            5: null,
            6: null,
            7: null,
            8: null,
            9: null,
            10: null,
            11: null,
            12: null,
        },
        // config
        active_config: {
            // preset
            preset_id: 1,
            preset_name: '',

            // # site creation
            // ## download wordpress
            download_language: '',

            // ## configure wp-config
            database_host: 'localhost',
            database_name: '',
            database_prefix: 'wp21_',
            database_user: '',
            database_pass: '',

            // ## database creation
            create_database: true,

            // ## install wordpress
            site_name: '',
            site_url: '',
            account_username: '',
            account_password: '',
            account_email: '',

            // # site configuration
            // ## settings
            blank_tagline: true,
            timezone: 'default',
            date_format: 'default',
            time_format: 'default',
            start_of_week: 1,
            search_engine_visibility: true,
            use_pingbacks: false,
            allow_comments_new_posts: false,
            show_avatars: false,
            uploads_in_folders: true,
            permalink_structure: 'default',

            // ## content
            remove_example_comment: true,
            remove_default_posts: [ 1, 2, 3 ],
            create_pages: [],
            create_pages_new: '',

            // ## plugins
            remove_default_plugins: [
                'akismet',
                'hello',
            ],
            install_plugins: [
                'classic-editor',
                'custom-post-type-ui',
                'advanced-custom-fields',
                'codepress-admin-columns',
                'autodescription',
                'bulk-page-creator',
                'regenerate-thumbnails',
                'enable-media-replace',
                'imsanity',
            ],
            install_plugins_new: '',
        },
    },

    created: function () {
        this.password_generate();
    },

    mounted() {
        // # presets
        this.load_preset( 1 );
        // foreach ls preset
        for ( var id = 0; id < localStorage.length; id++ ) {
            // get preset
            var preset = JSON.parse( localStorage.getItem( localStorage.key( id ) ) );
            // set meta
            this.$set( this.presets_meta, preset.preset_id, preset.preset_name );
        }
    },

    methods: {
        // tabs
        set_active_tab() {
            this.active_tab = event.target.getAttribute('data-tab');
        },
        is_tab_active( tab_id ) {
            return this.active_tab == tab_id;
        },
        // # site creation
        // ## install wordpress
        password_generate() {
            let password = '';
            let password_length = 16;
            let chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
            for ( let i = 0; i < password_length; i++ ) {
                let random_index = Math.floor( Math.random() * chars.length );
                password += chars.substring( random_index, random_index+1 );
            }
            this.account_password = password;
        },
        // # site configuration
        // ## content
        create_pages_add() {
            this.create_pages.push( this.create_pages_new );
            this.create_pages_new = '';
        },
        create_pages_remove( index ) {
            Vue.delete( this.create_pages, index );
        },
        // ## plugins
        install_plugins_add() {
            this.install_plugins.push( this.install_plugins_new );
            this.install_plugins_new = '';
        },
        install_plugins_remove( index ) {
            Vue.delete( this.install_plugins, index );
        },
        link_to_plugin( plugin ) {
            return 'https://wordpress.org/plugins/'+plugin+'/';
        },
        // # presets
        load_preset( id ) {
            console.log( 'loading preset '+id );
            if ( typeof localStorage[ 'preset_'+id ] != "undefined" ) {
                console.log( 'preset '+id+' exists' );
                // get preset from ls
                var preset = JSON.parse( localStorage.getItem( 'preset_'+id ) );
                // set preset as active config
                Object.assign( this.$data.active_config, preset );
                console.log( 'preset '+id+' loaded' );
            } else {
                console.log( 'preset '+id+' not available' );
            }
        },
        save_preset( id ) {
            console.log( 'saving data as preset '+id );
            // set active config id to preset id
            this.active_config.preset_id = id;
            // set ls preset to active config
            localStorage.setItem( 'preset_'+id, JSON.stringify( this.$data.active_config ) );
            // set meta name to active config name
            this.presets_meta[ id ] = this.active_config.preset_name;
        },
        clear_preset( id ) {
            console.log( 'clearing preset '+id );
            // remove ls preset
            localStorage.removeItem( 'preset_'+id );
            // remove meta name
            this.presets_meta[ id ] = null;
        },
        is_preset_active( id ) {
            return this.active_config.preset_id == id;
        },
        is_preset_available( id ) {
            return ( this.presets_meta[ id ] != null );
        },
    },

    computed: {
        code_t1_download() {
            // # site creation
            // ## download wordpress
            let cmd = '';

            cmd += 'wp core download';

            if ( this.active_config.download_language )
                cmd += ' --locale='+this.active_config.download_language;

            return cmd;
        },
        code_t1_config() {
            // ## configure wp-config
            let cmd = '';

            cmd += 'wp core config';

            if ( this.active_config.database_host )
                cmd += ' --dbhost='+this.active_config.database_host;
            if ( this.active_config.database_name )
                cmd += ' --dbname='+this.active_config.database_name;
            if ( this.active_config.database_prefix )
                cmd += ' --dbprefix='+this.active_config.database_prefix;
            if ( this.active_config.database_user )
                cmd += ' --dbuser='+this.active_config.database_user;
            if ( this.active_config.database_pass )
                cmd += ' --dbpass='+this.active_config.database_pass;

            return cmd;
        },
        code_t1_database() {
            // ## database creation
            let cmd = '';

            if ( this.active_config.create_database )
                cmd += 'wp db create';

            return cmd;
        },
        code_t1_install() {
            // ## install wordpress
            let cmd = '';

            cmd += 'wp core install';

            if ( this.active_config.site_name )
                cmd += ' --title="'+this.active_config.site_name+'"';
            if ( this.active_config.site_url )
                cmd += ' --url='+this.active_config.site_url;
            if ( this.active_config.account_username )
                cmd += ' --admin_user='+this.active_config.account_username;
            if ( this.active_config.account_password )
                cmd += ' --admin_password="'+this.active_config.account_password+'"';
            if ( this.active_config.account_email )
                cmd += ' --admin_email='+this.active_config.account_email;

            return cmd;
        },
        code_t2_settings() {
            // # site configuration
            // ## settings
            let cmds = [];

            if ( this.active_config.blank_tagline )
                cmds.push( 'wp option update blogdescription ""' );
            if ( this.active_config.timezone != 'default' )
                cmds.push( 'wp option update timezone_string "'+this.active_config.timezone+'"' );
            if ( this.active_config.date_format != 'default' )
                cmds.push( 'wp option update date_format "'+this.active_config.date_format+'"' );
            if ( this.active_config.time_format != 'default' )
                cmds.push( 'wp option update time_format "'+this.active_config.time_format+'"' );
            if ( this.active_config.start_of_week )
                cmds.push( 'wp option update start_of_week '+this.active_config.start_of_week );
            if ( this.active_config.search_engine_visibility )
                cmds.push( 'wp option update blog_public 0' );
            if ( !this.active_config.use_pingbacks )
                cmds.push( 'wp option update default_pingback_flag ""' );
            if ( !this.active_config.use_pingbacks )
                cmds.push( 'wp option update default_ping_status ""' );
            if ( !this.active_config.allow_comments_new_posts )
                cmds.push( 'wp option update default_comment_status 0' );
            if ( !this.active_config.show_avatars )
                cmds.push( 'wp option update show_avatars 0' );
            if ( !this.active_config.uploads_in_folders )
                cmds.push( 'wp option update uploads_use_yearmonth_folders 0' );
            if ( this.active_config.permalink_structure != 'default' )
                cmds.push( 'wp option update permalink_structure "'+this.active_config.permalink_structure+'"' );

            return cmds.join('\r\n');
        },
        code_t3_content() {
            // ## content
            let cmds = [];

            if ( this.active_config.remove_example_comment )
                cmds.push( 'wp comment delete 1 --force' );
            if ( this.active_config.remove_default_posts.length > 0 )
                cmds.push( 'wp post delete '+this.active_config.remove_default_posts.join(' ')+' --force' );
            if ( this.active_config.create_pages.length > 0 ) {
                this.active_config.create_pages.forEach( page_name => {
                    cmds.push( 'wp post create --post_type=page --post_status=publish --post_title="'+page_name+'"' );
                });
            }

            return cmds.join('\r\n');
        },
        code_t4_plugins() {
            // ## plugins
            let cmds = [];

            if ( this.active_config.remove_default_plugins.length > 0 )
                cmds.push( 'wp plugin delete '+this.active_config.remove_default_plugins.join(' ') );
            if ( this.active_config.install_plugins.length > 0 )
                cmds.push( 'wp plugin install '+this.active_config.install_plugins.join(' ') );

            return cmds.join('\r\n');
        },
        all_code() {
            let cmds = [];

            cmds.push( this.code_t1_download );
            cmds.push( this.code_t1_config );
            cmds.push( this.code_t1_database );
            cmds.push( this.code_t1_install );
            cmds.push( this.code_t2_settings );
            cmds.push( this.code_t3_content );
            cmds.push( this.code_t4_plugins );

            return cmds.join('\r\n\r\n');
        },
    },
});

