<h1>Content</h1>

<div class="cc">
    <div class="control">

        <div class="form-element">
            <label>
                <input type="checkbox" v-model="remove_example_comment">
                Remove example comment
            </label>
        </div>

        <div class="form-element">
            <p>Remove default posts</p>
<?php foreach ( default_posts_list() as $post_id => $post_name ): ?>
            <label>
                <input type="checkbox" v-model="remove_default_posts" value="<?=$post_id;?>">
                <?=$post_name;?>
            </label>
<?php endforeach; ?>
        </div>

        <div class="form-element">
            <p>Create pages</p>
            <ul>
                <li v-for="( page, index ) in create_pages">{{ page }}<span class="remove" @click="create_pages_remove( index )">x</span></li>
            </ul>
            <input v-model="create_pages_new" @keyup.enter="create_pages_add">
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-show="code_t3_content" v-text="code_t3_content"></pre>

    </div><!-- code -->
</div><!-- cc -->

