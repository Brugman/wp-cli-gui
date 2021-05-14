<h1>Presets</h1>

<label for="<?=fe_id();?>">Preset name</label>
<input id="<?=fe_id();?>" v-model="preset_name">

<table class="presets">
    <tr>
        <th>ID</th>
        <th>Status</th>
        <th>Name</th>
        <th>Load</th>
        <th>Save</th>
        <th>Clear</th>
    </tr>
<?php for ( $i = 1; $i <= 5; $i++ ): ?>
    <tr>
        <td><?=$i;?></td>
        <td></td>
        <td></td>
        <td><a href="#" @click="load_preset( <?=$i;?> )">Load</a></td>
        <td><a href="#" @click="save_preset( <?=$i;?> )">Save</a></td>
        <td><a href="#" @click="clear_preset( <?=$i;?> )">Clear</a></td>
    </tr>
<?php endfor; ?>
</table>

<p class="preset_feedback"></p>

<br><br>
<p><a href="/">reload</a></p>