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
  <form class="<?=$data['formClass'];?>" action="login.php" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
     <div class="<?='form__item ' . $data['errorArr']['email-class'];?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" required>
      <span class="form__error">Введите e-mail</span>
    </div>
    <div class="<?='form__item form__item--last ' . $data['errorArr']['password-class'];?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль" required>
      <span class="form__error">Введите пароль</span>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>