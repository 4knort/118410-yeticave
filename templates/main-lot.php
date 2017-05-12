<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="">Разное</a>
            </li>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2><?=$data['currentLot']['name'] ;?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?=$data['currentLot']['img'] ;?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=$data['currentLot']['categorie'] ;?></span></p>
                <p class="lot-item__description"><?=$data['currentLot']['description'] ;?></p>
            </div>
            <div class="lot-item__right">
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="lot-item__state">
                        <div class="lot-item__timer timer">
                            10:54:12
                        </div>
                        <div class="lot-item__cost-state">
                            <div class="lot-item__rate">
                                <span class="lot-item__amount">Текущая цена</span>
                                <span class="lot-item__cost"><?=$data['currentLot']['price'] ;?></span>
                            </div>
                            <div class="lot-item__min-cost">
                                Мин. ставка <span><?=$data['currentLot']['price'] + $data['minBet'];?></span>
                            </div>
                        </div>
                        <form class="lot-item__form" action="lot.php?id=0" method="post">
                            <p class="lot-item__form-item">
                                <label for="cost">Ваша ставка</label>
                                <input id="cost" type="number" name="cost" placeholder="<?=$data['currentLot']['price'] +  $data['minBet'] ;?>">
                            </p>
                            <button type="submit" class="button">Сделать ставку</button>
                        </form>
                    </div>
                <?php endif; ?>
                <div class="history">
                    <h3>История ставок (<span>4</span>)</h3>
                    <!-- заполните эту таблицу данными из массива $bets-->
                    <table class="history__list">
                        <?php foreach ($data['bets'] as $key => $val): ?>
                            <tr class="history__item">
                                <td class="history__name"><?=$val['name'];?></td>
                                <td class="history__price"><?=$val['price'];?> р</td>
                                <td class="history__time"><?=formatDate($val['ts']);?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>