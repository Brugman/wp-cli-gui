<h1>Plugins</h1>

<div class="cc">
    <div class="control">

        <div class="form-element fe-checkboxlist">
            <p class="label">Remove default plugins</p>
<?php foreach ( default_plugins_list() as $plugin_slug => $plugin_name ): ?>
            <label for="<?=fe_id();?>"><?=$plugin_name;?></label>
            <input id="<?=fe_id();?>" type="checkbox" v-model="active_config.remove_default_plugins" value="<?=$plugin_slug;?>">
<?php endforeach; ?>
        </div>

        <div class="form-element fe-selectlist">
            <label for="<?=fe_id();?>">Install plugins</label>
            <input id="<?=fe_id();?>" v-model="active_config.install_plugins_new" @keyup.enter="install_plugins_add">
            <ul>
                <li v-for="( plugin, index ) in active_config.install_plugins">{{ plugin }}<a :href="link_to_plugin( plugin )" target="_blank">(i)</a><span class="remove" @click="install_plugins_remove( index )">x</span></li>
            </ul>
        </div>

    </div><!-- control -->
    <div class="code">

        <pre v-show="code_t4_plugins" v-text="code_t4_plugins"></pre>

    </div><!-- code -->
</div><!-- cc -->

