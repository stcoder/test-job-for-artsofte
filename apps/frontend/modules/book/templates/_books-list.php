<?php foreach ($Bookss as $Books): ?>
    <tr class="line" data-description="<?php echo $Books->getDescription() ?>">
        <td><?php echo $Books->getId() ?></td>
        <td><?php echo $Books->getTitle() ?></td>
    </tr>
<?php endforeach; ?>