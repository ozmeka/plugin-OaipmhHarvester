<?php
$head = array('body_class' => 'oaipmh-harvester primary', 
              'title'      => 'OAI-PMH Harvester');
head($head);
?>

<h1><?php echo $head['title']; ?></h1>

<div id="primary">

<?php echo flash(); ?>
    
    <form method="post" action="<?php echo uri('oaipmh-harvester/index/sets'); ?>">
        
        <div class="field">
            <?php echo $this->formLabel('base_url', 'Base Url'); ?>
            <div class="inputs">
            <?php echo $this->formText('base_url', null, array('size' => 60)); ?>
            <p class="explanation">The base URL of the OAI-PMH data provider.</p>
            </div>
        </div>
        
        <?php echo $this->formSubmit('submit_view_sets', 'View Sets', array('class' => 'submit submit-medium')); ?>
    </form>
    
    <h2>Harvests</h2>
    
    <?php if (empty($this->harvests)): ?>
    
    <p>There are no harvests.</p>
    
    <?php else: ?>
    
    <table>
       <thead>
            <tr>
                <th>ID</th>
                <th>Base URL</th>
                <th>Metadata Prefix</th>
                <th>Set Spec</th>
                <th>Set Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($this->harvests as $harvest): ?>
            <tr>
                <td><?php echo $harvest->id; ?></td>
                <td><?php echo $harvest->base_url; ?></td>
                <td><?php echo $harvest->metadata_prefix; ?></td>
                <td><?php echo $harvest->set_spec; ?></td>
                <td><?php echo $harvest->set_name; ?></td>
                <td><a href="<?php echo uri("oaipmh-harvester/index/status?harvest_id={$harvest->id}"); ?>"><?php echo ucwords($harvest->status); ?></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    
    <?php endif; ?>

</div>

<?php foot(); ?>
