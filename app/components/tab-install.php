<h1>Site creation</h1>

<h2>Download WordPress</h2>

<div class="cc">
    <div class="control">

        <div class="form-element fe-select">
            <label for="<?=fe_id();?>">Locale</label>
            <select id="<?=fe_id();?>" v-model="download_language">
<?php foreach ( download_languages_list() as $code => $label ): ?>
                <option value="<?=$code;?>"><?=$label;?></option>
<?php endforeach; ?>
            </select>
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-text="code_t1_download"></pre>

    </div><!-- code -->
</div><!-- cc -->

<h2>Configure wp-config</h2>

<div class="cc">
    <div class="control">

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Database host</label>
            <input id="<?=fe_id();?>" v-model="database_host">
        </div>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Database name</label>
            <input id="<?=fe_id();?>" v-model="database_name">
        </div>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Database prefix</label>
            <input id="<?=fe_id();?>" v-model="database_prefix">
        </div>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Database user</label>
            <input id="<?=fe_id();?>" v-model="database_user">
        </div>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Database pass</label>
            <input id="<?=fe_id();?>" v-model="database_pass">
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-text="code_t1_config"></pre>

    </div><!-- code -->
</div><!-- cc -->

<h2>Database creation</h2>

<div class="cc">
    <div class="control">

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Create database</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="create_database">
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-show="code_t1_database" v-text="code_t1_database"></pre>

    </div><!-- code -->
</div><!-- cc -->

<h2>Install WordPress</h2>

<div class="cc">
    <div class="control">

        <h3>Site</h3>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Name</label>
            <input id="<?=fe_id();?>" v-model="site_name">
        </div>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">URL</label>
            <input id="<?=fe_id();?>" v-model="site_url">
        </div>

        <h3>Account</h3>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Username</label>
            <input id="<?=fe_id();?>" v-model="account_username">
        </div>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Password</label>
            <input id="<?=fe_id();?>" v-model="account_password">
            <p @click="password_generate">regenerate</p>
        </div>

        <div class="form-element fe-input">
            <label for="<?=fe_id();?>">Email address</label>
            <input id="<?=fe_id();?>" v-model="account_email">
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-text="code_t1_install"></pre>

    </div><!-- code -->
</div><!-- cc -->

