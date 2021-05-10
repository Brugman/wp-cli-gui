<h1>Site configuration</h1>

<h2>Settings</h2>

<div class="cc">
    <div class="control">

        <div class="form-element">
            <label>
                <input type="checkbox" v-model="blank_tagline">
                Blank Tagline
            </label>
        </div>

        <p>(( Timezone ))</p>
        <p>(( Date Format ))</p>
        <p>(( Time Format ))</p>

        <div class="form-element">
            <label>Week Starts On</label>
            <select v-model="start_of_week">
<?php foreach ( weekdays_list() as $key => $value ): ?>
                <option value="<?=$key;?>"><?=$value;?></option>
<?php endforeach; ?>
            </select>
        </div>

        <div class="form-element">
            <label>
                <input type="checkbox" v-model="search_engine_visibility">
                Discourage search engines
            </label>
        </div>

        <div class="form-element">
            <label>
                <input type="checkbox" v-model="allow_comments_new_posts">
                Allow comments on new posts
            </label>
        </div>

        <div class="form-element">
            <label>
                <input type="checkbox" v-model="show_avatars">
                Show Avatars
            </label>
        </div>

        <div class="form-element">
            <label>
                <input type="checkbox" v-model="uploads_in_folders">
                Uploads in year/month folders
            </label>
        </div>

        <div class="form-element">
            <label>Permalink Structure</label>
            <select v-model="permalink_structure">
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

