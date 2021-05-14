var app = new Vue({
    el: '#app',

    data: {
        // tabs
        active_tab: 'install',

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
        date_format: 'default',
        time_format: 'default',
        start_of_week: 1,
        search_engine_visibility: true,
        allow_comments_new_posts: true,
        show_avatars: true,
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
            'advanced-custom-fields',
            'wordpress-seo',
        ],
        install_plugins_new: '',
        // # presets
        preset_id: 1,
        preset_name: '',
    },

    created: function () {
        this.password_generate();
    },

    mounted() {
        // # presets
        this.load_preset( 1 );
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
        // # presets
        load_preset( id ) {
            if ( typeof localStorage[ 'data_preset_'+id ] != "undefined" ) {
                console.log( 'loading preset '+id );
                var preset = JSON.parse( localStorage.getItem( 'data_preset_'+id ) );
                Object.assign( this.$data, preset );
            } else {
                console.log( 'preset '+id+' not available' );
            }
        },
        save_preset( id ) {
            console.log( 'saving data as preset '+id );

            localStorage.setItem( 'data_preset_'+id, JSON.stringify( this.$data ) );
            localStorage.setItem( 'data_preset_'+id+'_name', this.preset_name );
        },
        clear_preset( id ) {
            console.log( 'clearing preset '+id );

            localStorage.removeItem( 'data_preset_'+id );
            localStorage.removeItem( 'data_preset_'+id+'_name' );
        },
    },

    computed: {
        code_t1_download() {
            // # site creation
            // ## download wordpress
            let cmd = '';

            cmd += 'wp core download';

            if ( this.download_language )
                cmd += ' --locale='+this.download_language;

            return cmd;
        },
        code_t1_config() {
            // ## configure wp-config
            let cmd = '';

            cmd += 'wp core config';

            if ( this.database_host )
                cmd += ' --dbhost='+this.database_host;
            if ( this.database_name )
                cmd += ' --dbname='+this.database_name;
            if ( this.database_prefix )
                cmd += ' --dbprefix='+this.database_prefix;
            if ( this.database_user )
                cmd += ' --dbuser='+this.database_user;
            if ( this.database_pass )
                cmd += ' --dbpass='+this.database_pass;

            return cmd;
        },
        code_t1_database() {
            // ## database creation
            let cmd = '';

            if ( this.create_database )
                cmd += 'wp db create';

            return cmd;
        },
        code_t1_install() {
            // ## install wordpress
            let cmd = '';

            cmd += 'wp core install';

            if ( this.site_name )
                cmd += ' --title="'+this.site_name+'"';
            if ( this.site_url )
                cmd += ' --url='+this.site_url;
            if ( this.account_username )
                cmd += ' --admin_user='+this.account_username;
            if ( this.account_password )
                cmd += ' --admin_password="'+this.account_password+'"';
            if ( this.account_email )
                cmd += ' --admin_email='+this.account_email;

            return cmd;
        },
        code_t2_settings() {
            // # site configuration
            // ## settings
            let cmds = [];

            if ( this.blank_tagline )
                cmds.push( 'wp option update blogdescription ""' );
            if ( this.date_format != 'default' )
                cmds.push( 'wp option update date_format "'+this.date_format+'"' );
            if ( this.time_format != 'default' )
                cmds.push( 'wp option update time_format "'+this.time_format+'"' );
            if ( this.start_of_week )
                cmds.push( 'wp option update start_of_week '+this.start_of_week );
            if ( this.search_engine_visibility )
                cmds.push( 'wp option update blog_public 0' );
            if ( !this.allow_comments_new_posts )
                cmds.push( 'wp option update default_comment_status 0' );
            if ( !this.show_avatars )
                cmds.push( 'wp option update show_avatars 0' );
            if ( !this.uploads_in_folders )
                cmds.push( 'wp option update uploads_use_yearmonth_folders 0' );
            if ( this.permalink_structure != 'default' )
                cmds.push( 'wp option update permalink_structure "'+this.permalink_structure+'"' );

            return cmds.join('\r\n');
        },
        code_t3_content() {
            // ## content
            let cmds = [];

            if ( this.remove_example_comment )
                cmds.push( 'wp comment delete 1 --force' );
            if ( this.remove_default_posts.length > 0 )
                cmds.push( 'wp post delete '+this.remove_default_posts.join(' ')+' --force' );
            if ( this.create_pages.length > 0 ) {
                this.create_pages.forEach( page_name => {
                    cmds.push( 'wp post create --post_type=page --post_status=publish --post_title="'+page_name+'"' );
                });
            }

            return cmds.join('\r\n');
        },
        code_t4_plugins() {
            // ## plugins
            let cmds = [];

            if ( this.remove_default_plugins.length > 0 )
                cmds.push( 'wp plugin delete '+this.remove_default_plugins.join(' ') );
            if ( this.install_plugins.length > 0 )
                cmds.push( 'wp plugin install '+this.install_plugins.join(' ') );

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

