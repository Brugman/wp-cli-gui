<h1>Presets</h1>

<br>

<p><a href="/">reload</a></p>

<br>

<div class="form-element fe-input" style="max-width: 545px;">
    <label for="<?=fe_id();?>">Preset name</label>
    <input id="<?=fe_id();?>" v-model="active_config.preset_name">
</div>

<br>

<div class="presets">
    <div v-for="( preset_name, preset_id ) in presets_meta" class="preset" :class="{ 'active': is_preset_active( preset_id ) }">
        <div class="id">{{ preset_id }}</div>
        <div class="name">{{ preset_name ?? '' }}</div>
        <div class="save"><button @click="save_preset( preset_id )">Save</button></div>
        <div class="load"><button @click="load_preset( preset_id )" v-show="is_preset_available( preset_id )">Load</button></div>
        <div class="clear"><button @click="clear_preset( preset_id )" v-show="is_preset_available( preset_id )">Clear</button></div>
    </div>
</div>

