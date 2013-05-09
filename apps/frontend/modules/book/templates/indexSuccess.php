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
    <a href="<?php echo url_for('book/getAjaxBooks') ?>">Показать еще</a>
    <div class="preloader" style="display: none;"></div>
    <div class="info-muted-block" style="display: none;">Книг больше нет.</div>
</div>
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

        buttonGetBooks.children('a').on('click', function() {
            var self = $(this);
            var offset = table.find('.line').length;
            var link = $(this).attr('href') + '?offset=' + offset;
            self.hide();
            self.parent().children('.preloader').show();
            $.getJSON(link, function(response) {
                table.children('tbody').append(response.books_list);
                if (response.is_last) {
                    self.hide();
                    self.parent().children('.preloader').hide();
                    self.parent().children('.info-muted-block').show();
                } else {
                    self.show();
                    self.parent().children('.preloader').hide();
                }
            });
            return false;
        });
    });
</script>