<main>
  <nav class="nav">
    <ul class="nav__list container">
      <li class="nav__item">
        <a href="all-lots.html">Доски и лыжи</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Крепления</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Ботинки</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Одежда</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Инструменты</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Разное</a>
      </li>
    </ul>
  </nav>
  <section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
       <?php foreach ($data['lots'] as $key => $val): ?>
            <tr class="rates__item">
                <td class="rates__info">
                  <div class="rates__img">
                    <img src="<?=$val['img'];?>" width="54" height="40" alt="Сноуборд">
                  </div>
                  <h3 class="rates__title"><a href="lot.html"><?=$val['name'];?></a></h3>
                </td>
                <td class="rates__category">
                  <?=$val['categorie'];?>
                </td>
                <td class="rates__price">
                  <?=$val['price'];?>
                </td>
                <td class="rates__time">
                  <?=formatDate($val['date']);?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </section>
</main>
