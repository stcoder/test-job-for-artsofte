<a href="<?php echo url_for('book/new') ?>">New</a>
<table class="books-list">
    <thead>
    <tr>
        <th>№ п/п</th>
        <th>Название</th>
    </tr>
    </thead>
    <tbody>
        <?php echo get_partial('books-list', array('Bookss' => $Bookss)) ?>
    </tbody>
</table>
<div class="button-getBooks-wrap">
    <div class="info-error-block" style="display: none;">Во время обработки ajax запроса возникли ошибки.</div>
    <a href="<?php echo url_for('book/getAjaxBooks') ?>">Показать еще</a>
    <div class="preloader" style="display: none;"></div>
    <div class="info-muted-block" style="display: none;">Книг больше нет.</div>
</div>
<div id="dialog-modal" title="undefined" style="display: none;"></div>