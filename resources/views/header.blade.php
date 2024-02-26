<header class="header">

  <!-- スマホ対応 -->
  <div id="nav-wrapper" class="nav-wrapper wrap">
      <a href="{{ route('home') }}">
      <h1 class="sp-header">BLUE HEARTS</h1>
    </a>
    <div class="hamburger" id="js-hamburger">
      <span class="hamburger__line hamburger__line--1"></span>
      <span class="hamburger__line hamburger__line--2"></span>
      <span class="hamburger__line hamburger__line--3"></span>
    </div>
    <nav class="sp-nav">
      <ul>
        <li class="hamburger-list"><a href="{{ route('game') }}">試合結果</a></li>
        <li class="hamburger-list"><a href="{{ route('member') }}">メンバー紹介</a></li>
        <li class="hamburger-list"><a href="{{ route('inquiry.index') }}">問い合わせ</a></li>
        <li class="hamburger-list"><a href="{{ route('team') }}">チーム紹介</a></li>
        <li class="hamburger-list"><a href="{{ route('home') }}">HOME</a></li>
      </ul>
    </nav>
    <div class="black-bg" id="js-black-bg"></div>
  </div>


  <div class="pc-wrap">
    <a href="{{ route('home') }}">
      <h1>BLUE HEARTS</h1>
    </a>
    <nav class="menu">
      <div class="menu-list">
        <a href="{{ route('game') }}">試合結果</a>
        <a href="{{ route('member') }}">メンバー紹介</a>
        <a href="{{ route('inquiry.index') }}">問い合わせ</a>
        <a href="{{ route('team') }}">チーム紹介</a>
        <a href="{{ route('home') }}">HOME</a>
      </div>
    </nav>
  </div>
</header>

<style>
  .sp-nav ul {
    margin-top: 20%;
  }

  /* 
hamburger(ハンバーガーアイコン)
=================================== */
  .hamburger {
    position: absolute;
    right: 20px;
    top: 20px;
    width: 50px;
    height: 40px;
    cursor: pointer;
    z-index: 300;
  }

  .hamburger__line {
    position: absolute;
    width: 50px;
    height: 3px;
    right: 0;
    background-color: #000;
    transition: all 0.5s;
  }

  .hamburger__line--1 {
    top: 1px;
  }

  .hamburger__line--2 {
    top: 18px;
  }

  .hamburger__line--3 {
    top: 36px;
  }

  /*ハンバーガーがクリックされたら*/
  .open .hamburger__line--1 {
    transform: rotate(-45deg);
    top: 11px;
  }

  .open .hamburger__line--2 {
    opacity: 0;
  }

  .open .hamburger__line--3 {
    transform: rotate(45deg);
    top: 11px;
  }

  /* 
sp-nav(ナビ)
=================================== */
  .sp-nav {
    position: fixed;
    right: -100%;
    /*ハンバーガーがクリックされる前はWindow右側に隠す*/
    top: 0;
    width: 70%;
    /* 出てくるスライドメニューの幅 */
    height: 100vh;
    background-color: #fff;
    transition: all 0.5s;
    z-index: 200;
    overflow-y: auto;
    /* メニューが多くなったらスクロールできるように */
  }

  /*ハンバーガーがクリックされたら右からスライド*/
  .open .sp-nav {
    right: 0;
  }


  /* 
black-bg(ハンバーガーメニュー解除用bg)
=================================== */
  .black-bg {
    position: fixed;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100vh;
    z-index: 5;
    background-color: #000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.5s;
    cursor: pointer;
    z-index: 100;
  }

  /*ハンバーガーメニューが開いたら表示*/
  .open .black-bg {
    opacity: 0.3;
    visibility: visible;
  }

  .open .sp-nav {
    background-color: #0d8cf0cf;
  }

  .hamburger-list a {
    color: white;
    font-size: 30px;
  }
</style>
<script>
  window.onload = function() {
    var nav = document.getElementById('nav-wrapper');
    var hamburger = document.getElementById('js-hamburger');
    var blackBg = document.getElementById('js-black-bg');

    hamburger.addEventListener('click', function() {
      nav.classList.toggle('open');
    });
    blackBg.addEventListener('click', function() {
      nav.classList.remove('open');
    });
  };

  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('header').addClass('shrink');
    } else {
      $('header').removeClass('shrink');
    }
  });
</script>