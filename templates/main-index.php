<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($data['categories'] as $key => $val): ?>
                <li class="<?='promo__item promo__item--'. $val['class']; ?>">
                    <a class="promo__link" href="all-lots.html"><?=$val['name'];?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
            <select class="lots__select">
                <?php foreach ($data['categories'] as $key => $val): ?>
                    <option><?=$val['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <ul class="lots__list">
            <?php foreach ($data['lots'] as $key => $val): ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?=$val['img'];?>" width="350" height="260" alt="Сноуборд">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=$val['category'];?></span>
                        <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?=$key;?>"><?=$val['name'];?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?=$val['price'];?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=$lot_time_remaining;?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>