<div id="header_wrapper">
  <header>
    <span id="title" onclick="location.href='/index.php'">7반 알림장</span>
    <span class="icon"></span>
    <nav>
      <ul>
        <li class="menu">
          <a class="link" href="#">숙제</a>
        </li>
        <li class="menu">
          <a class="link" href="#">수행평가</a>
        </li>
      </ul>
      <a class="link" href="/admin/<?= $sign ?>.php">
        <?php
        if ($sign == "login") echo "반장 로그인";
        else echo "로그아웃";
        ?>
      </a>
    </nav>
  </header>
</div>
