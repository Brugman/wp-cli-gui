<?php

$tabs = [
    'install' => 'Installation',
    'config'  => 'Configuration',
    'content' => 'Content',
    'plugins' => 'Plugins',
    'presets' => 'Presets',
    'allcode' => 'All Code',
];

?>

<div id="app">

    <nav class="tabs-nav">
        <div class="container">
            <ul>
<?php foreach ( $tabs as $key => $name ): ?>
                <li data-tab="<?=$key;?>" @click="set_active_tab" :class="{ 'active': is_tab_active('<?=$key;?>') }"><?=$name;?></li>
<?php endforeach; // $tabs ?>
            </ul>
        </div><!-- container -->
    </nav><!-- tabs-nav -->

    <div class="tabs">
        <div class="container">
<?php foreach ( $tabs as $key => $name ): ?>
            <div class="tab" data-tab="<?=$key;?>" :class="{ 'active': is_tab_active('<?=$key;?>') }">
<?php include 'tab-'.$key.'.php'; ?>
            </div><!-- tab -->
<?php endforeach; // $tabs ?>
        </div><!-- container -->
    </div><!-- tabs -->

</div><!-- #app -->

