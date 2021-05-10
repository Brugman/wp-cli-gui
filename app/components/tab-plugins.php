<h1>Plugins</h1>

<div class="cc">
    <div class="control">

        <div class="form-element">
            <p>Remove default plugins</p>
<?php foreach ( default_plugins_list() as $plugin_slug => $plugin_name ): ?>
            <label>
                <input type="checkbox" v-model="remove_default_plugins" value="<?=$plugin_slug;?>">
                <?=$plugin_name;?>
            </label>
<?php endforeach; ?>
        </div>

        <div class="form-element">
            <p>Install plugins</p>
            <ul>
                <li v-for="( plugin, index ) in install_plugins">{{ plugin }}<span class="remove" @click="install_plugins_remove( index )">x</span></li>
            </ul>
            <input v-model="install_plugins_new" @keyup.enter="install_plugins_add">
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-show="code_t4_plugins" v-text="code_t4_plugins"></pre>

    </div><!-- code -->
</div><!-- cc -->
