<h1>Content</h1>

<div class="cc">
    <div class="control">

        <div class="form-element fe-checkbox">
            <label for="<?=fe_id();?>">Remove example comment</label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.remove_example_comment">
        </div>

        <div class="form-element fe-checkboxlist">
            <p class="label">Remove default posts</p>
<?php foreach ( default_posts_list() as $post_id => $post_name ): ?>
            <label for="<?=fe_id();?>"><?=$post_name;?></label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.remove_default_posts" value="<?=$post_id;?>">
<?php endforeach; ?>
        </div>

        <div class="form-element fe-selectlist">
            <label for="<?=fe_id();?>">Create pages</label>
            <input id="<?=fe_id();?>" v-model="active_config.create_pages_new" @keyup.enter="create_pages_add">
            <ul>
                <li v-for="( page, index ) in active_config.create_pages">{{ page }}<span class="remove" @click="create_pages_remove( index )">x</span></li>
            </ul>
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-show="code_t3_content" v-text="code_t3_content"></pre>

    </div><!-- code -->
</div><!-- cc -->

