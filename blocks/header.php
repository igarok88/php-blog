  <div class=" flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm header-container">
    <h5 class="my-0 mr-md-auto font-weight-normal">PHP blog</h5>
    <nav class="my-2 my-md-0 mr-md-3">

    <a class="p-2 text-dark" href="/">Главная</a>
    <a class="p-2 text-dark" href="/contacts.php">Контакты</a>
    <?php
      if ($_COOKIE['login'] != '') {
          echo '<a class="p-2 text-dark" href="/article.php">Добавить статью</a>';
      }
    ?>  
    </nav>    
    <?php
      if (!isset($_COOKIE['login'])):
          ?>
    <div class="reg-container">
      <a class="btn btn-outline-primary mr-2" href="auth.php">Войти</a>
      <a class="btn btn-outline-primary" href="reg.php">Регистрация</a>
    </div>
    <?php else:
        ?>
    <a class="btn btn-outline-primary" href="auth.php">Кабинет пользователя</a>
    <?php
    endif;
    ?>

  </div>