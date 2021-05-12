<h1>Site configuration</h1>

<h2>Settings</h2>

<div class="cc">
    <div class="control">

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Blank Tagline</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="blank_tagline">
        </div>

        <p>(( Timezone ))</p>
        <p>(( Date Format ))</p>
        <p>(( Time Format ))</p>

        <div class="form-element fe-select">
            <label for="<?=fe_id();?>">Week Starts On</label>
            <select id="<?=fe_id();?>" v-model="start_of_week">
<?php foreach ( weekdays_list() as $key => $value ): ?>
                <option value="<?=$key;?>"><?=$value;?></option>
<?php endforeach; ?>
            </select>
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Discourage search engines</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="search_engine_visibility">
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Allow comments on new posts</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="allow_comments_new_posts">
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Show Avatars</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="show_avatars">
        </div>

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Uploads in year/month folders</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="uploads_in_folders">
        </div>

        <div class="form-element fe-select">
            <label for="<?=fe_id();?>">Permalink Structure</label>
            <select id="<?=fe_id();?>" v-model="permalink_structure">
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

