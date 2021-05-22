<h1>Site configuration</h1>

<h2>Settings</h2>

<div class="cc">
    <div class="control">

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Blank Tagline</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.blank_tagline">
        </div>

        <div class="form-element fe-select">
            <label for="<?=fe_id();?>">Timezone</label>
            <select id="<?=fe_id();?>" v-model="active_config.timezone">
<?php foreach ( timezone_list() as $value => $label ): ?>
                <option value="<?=$value;?>"><?=$label;?></option>
<?php endforeach; ?>
            </select>
        </div>

        <div class="form-element fe-select">
            <label for="<?=fe_id();?>">Date Format</label>
            <select id="<?=fe_id();?>" v-model="active_config.date_format">
<?php foreach ( date_format_list() as $value => $label ): ?>
                <option value="<?=$value;?>"><?=$label;?></option>
<?php endforeach; ?>
            </select>
        </div>

        <div class="form-element fe-select">
            <label for="<?=fe_id();?>">Time Format</label>
            <select id="<?=fe_id();?>" v-model="active_config.time_format">
<?php foreach ( time_format_list() as $value => $label ): ?>
                <option value="<?=$value;?>"><?=$label;?></option>
<?php endforeach; ?>
            </select>
        </div>

        <div class="form-element fe-select">
            <label for="<?=fe_id();?>">Week Starts On</label>
            <select id="<?=fe_id();?>" v-model="active_config.start_of_week">
<?php foreach ( weekdays_list() as $key => $value ): ?>
                <option value="<?=$key;?>"><?=$value;?></option>
<?php endforeach; ?>
            </select>
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Discourage search engines</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.search_engine_visibility">
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Use pingbacks/trackbacks</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.use_pingbacks">
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Comments on Posts</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.allow_comments_new_posts">
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Show Avatars</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.show_avatars">
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Uploads in year/month folders</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.uploads_in_folders">
        </div>

        <div class="form-element fe-select">
            <label for="<?=fe_id();?>">Permalink Structure</label>
            <select id="<?=fe_id();?>" v-model="active_config.permalink_structure">
<?php foreach ( permalink_structure_list() as $label => $structure ): ?>
                <option value="<?=$structure;?>"><?=$label;?></option>
<?php endforeach; ?>
            </select>
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-show="code_t2_settings" v-text="code_t2_settings"></pre>

    </div><!-- code -->
</div><!-- cc -->

