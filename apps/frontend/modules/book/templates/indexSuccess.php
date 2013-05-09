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
<div class="button-getBooks-wrap"><a href="<?php echo url_for('book/getAjaxBooks') ?>">Показать еще</a></div>
<div id="dialog-modal" title="undefined" style="display: none;"></div>
<script>
    $(function() {
        var buttonGetBooks = $('.button-getBooks-wrap');
        var table = $('.books-list');
        var dialogModal = $('#dialog-modal');
        table.on('click', '.line', function() {
            var description = $(this).data('description');
            var title = $(this).find('td:last-child').text();
            dialogModal.html(description);
            dialogModal.dialog({
                width: 512,
                modal: true,
                title: title
            });
        });

        buttonGetBooks.children().on('click', function() {
            var offset = table.find('.line').length;
            var link = $(this).attr('href') + '?offset=' + offset;
            $.get(link, function(response) {
                table.children('tbody').append(response);
            });
            return false;
        });
    });
</script>