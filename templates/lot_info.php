    <nav class="nav">
      <ul class="nav__list container">
      <?php foreach ($categories as $value): ?>
        <li class="nav__item">
          <a href="pages/<?=$value["id"];?>"><?=htmlspecialchars($value["name"]); ?></a>
        </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <section class="lot-item container">
    <?php foreach ($items as $key => $value): ?>
      <h2><?=htmlspecialchars($value["name"]);?></h2>
      <div class="lot-item__content">
        <div class="lot-item__left">
          <div class="lot-item__image">
            <img src="<?=htmlspecialchars($value["image_link"]);?>" width="730" height="548" alt="Изображение лота">
          </div>
          <p class="lot-item__category">Категория: <span><?=htmlspecialchars($value["category"]);?></span></p>
          <p class="lot-item__description"><?=htmlspecialchars($value["description"]);?>.</p>
        </div>
        <div class="lot-item__right">
          <div class="lot-item__state">
            <div class="lot-item__timer timer"><?php if (countdown($value["expiration_date"])[0] < 1) : ?>timer--finishing<?php endif; ?>"><?=implode(':',countdown($value["expiration_date"]));?>
            </div>
            <div class="lot-item__cost-state">
              <div class="lot-item__rate">
                <span class="lot-item__amount">Текущая цена</span>
                <span class="lot-item__cost">                  </span>
              </div>
              <div class="lot-item__min-cost">
                Мин. ставка <span><?=htmlspecialchars($value["step_sum"]);?></span>
              </div>
            </div>
            <?php endforeach; ?>
            <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post" autocomplete="off">
              <p class="lot-item__form-item form__item form__item--invalid">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="text" name="cost" placeholder="12 000">
                <span class="form__error">Введите наименование лота</span>
              </p>
              <button type="submit" class="button">Сделать ставку</button>
            </form>
          </div>
          <div class="history">
            <h3>История ставок (<span>10</span>)</h3>
            <table class="history__list">
              <tr class="history__item">
                <td class="history__name">Иван</td>
                <td class="history__price">10 999 р</td>
                <td class="history__time">5 минут назад</td>
              </tr>
              
            </table>
          </div>
        </div>
      </div>
    </section>
