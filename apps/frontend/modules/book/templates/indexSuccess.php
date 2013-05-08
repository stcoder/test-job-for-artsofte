<h1>Bookss List</h1>
<a href="<?php echo url_for('book/new') ?>">New</a>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Bookss as $Books): ?>
    <tr>
      <td><a href="<?php echo url_for('book/edit?id='.$Books->getId()) ?>"><?php echo $Books->getId() ?></a></td>
      <td><?php echo $Books->getTitle() ?></td>
      <td><?php echo $Books->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('book/new') ?>">New</a>
