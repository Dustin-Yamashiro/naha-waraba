<div id="siteSearchForm" class="p-searchForm">
    <form action="<?= esc_url( home_url('/') ); ?>" method="get" class="p-searchForm__form">
        <input type="text" name="s" placeholder="キーワードを入力" class="p-searchForm__input">
        <button type="submit" class="p-searchForm__submit c-icon c-icon--search"></button>
    </form>
    <span id="siteSearchFormClose" class="p-searchForm__close c-icon c-icon--cancel">閉じる</span>
</div>