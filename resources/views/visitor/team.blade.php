@extends('layout')
@section('title','チーム紹介')
@section('content')
@if(Session::has('error'))
<div class="alert alert-danger">
  {{ Session::get('error') }}
</div>
@endif
<!--左から吹き出し-->
<div class="talk">
  <figure class="talk-Limg">
    <img src="{{ asset('images/hearts_blue.jpg') }}" alt="画像名" />
    <figcaption class="talk-imgname">球児くん</figcaption>
  </figure>
  <div class="talk-Ltxt">
    <p class="talk-text">
      草野球ってなんかつまらなそう。。。<br>
    </p>
  </div>
</div>


<!--右から吹き出し-->
<div class="talk">
  <figure class="talk-Rimg">
    <img src="{{ asset('images/hearts_blue.jpg') }}" alt="画像名" />
    <figcaption class="talk-imgname">NAME</figcaption>
  </figure>
  <div class="talk-Rtxt">
    <p class="talk-text">
      そんなことはありません！！<br>
      確かにレベルはそこまで高くはないですが、楽しくワイワイやりながらなので超楽しいですよ！！<br>
      ち・な・み・に・・・うちはそこそこ強いです（ドヤ顔）
    </p>
  </div>
</div>

<div class="talk">
  <figure class="talk-Limg">
    <img src="{{ asset('images/hearts_blue.jpg') }}" alt="画像名" />
    <figcaption class="talk-imgname">NAME</figcaption>
  </figure>
  <div class="talk-Ltxt">
    <p class="talk-text">
      でもでも、途中から入ればしばらくはスタメン出場とかできなそうだし、<br>
      歳上の人から何か言われるのも嫌なんだよね。。。
    </p>
  </div>
</div>

<!--右から吹き出し-->
<div class="talk">
  <figure class="talk-Rimg">
    <img src="{{ asset('images/hearts_blue.jpg') }}" alt="画像名" />
    <figcaption class="talk-imgname">NAME</figcaption>
  </figure>
  <div class="talk-Rtxt">
    <p class="talk-text">
      うんうん。わかります。その気持ち。。。<br>
      安心してください！！うちはフレンドリーなおじさんがたくさんいます！<br>
      基本的に参加してくれていれば、おじさん勢はスタメンをもうプッシュしてくれるので、すぐ出れます！！<br>
      いろんなチームを見ていますが、こんなチーム見たことないです（笑）<br>
      あ、若い子もちゃんといますからね！（笑）
    </p>
  </div>
</div>

<div class="container">
  <h1 class="heading-013"> BLUE HERTS</h1>

  <h2 class="team-title">{{ $team[0]->team_title }}</h2>
  <div class="box21">
    <p>{{ $team[0]->team_text }}</p>
  </div>

  <div class="text-center">
    <img src="{{ asset('images/08295B93-2BE7-417C-AA71-308DE19DA172.jpeg') }}" alt="画像">
  </div>


  @endsection
</div>


<style>
  .team-title {
    background: linear-gradient(to right, #27a4ff, #00116b);
    color: #FFF;
  }

  .heading-013 {
    padding: 0.4em 0.5em;
    /*文字の上下 左右の余白*/
    color: #494949;
    /*文字色*/
    background: #f4f4f4;
    /*背景色*/
    border-left: solid 5px #7db4e6;
    /*左線*/
    border-bottom: solid 3px #d7d7d7;
    /*下線*/
    background: linear-gradient(to right, #27a4ff, #00116b);
    font-size: 45px;
    -webkit-text-stroke: 2px #ff5d00;
    color: #002efe;
  }

  .box21 {
    padding: 0.5em 1em;
    background: -moz-linear-gradient(#ffb03c, #ff708d);
    background: -webkit-linear-gradient(#27a4ff, #00116b);
    background: linear-gradient(to right, #27a4ff, #00116b);
    color: #FFF;
  }

  .box21 p {
    margin: 0;
    padding: 0;
    font-size: 20px;
  }

  /* ----- 共通 ----- */

  .talk {
    margin-bottom: 40px;
  }

  .talk figure img {
    width: 100%;
    height: 100%;
    border: 2px solid #9ce191;
    border-radius: 50%;
    margin: 0;
  }

  /* 画像の下のテキスト */
  .talk-imgname {
    padding: 5px 0 0;
    font-size: 10px;
    text-align: center;
    color: #ffffff;
    background: #f600ff;
  }

  p.talk-text {
    margin: 0 0 8px;
  }

  p.talk-text:last-child {
    margin-bottom: 0px;
  }

  /* 回り込み解除 */
  .talk:after,
  .talk:before {
    clear: both;
    content: "";
    display: block;
  }

  /* ----- 右の場合 ----- */

  /* 右画像 */
  .talk-Rimg {
    margin-right: 4px;
    margin-top: -1px;
    float: right;
    width: 60px;
    height: 60px;
  }

  /* 右からの吹き出しテキスト */
  .talk-Rtxt {
    position: relative;
    margin-right: 100px;
    padding: 1.2em;
    border: 3px solid #9ce191;
    background-color: #ebffe7;
    border-radius: 5px;
    width: 50%;
    margin-left: 42%;
  }

  /* 右の三角形を作る */
  .talk-Rtxt:before {
    position: absolute;
    content: '';
    border: 10px solid transparent;
    border-left: 10px solid #9ce191;
    top: 15px;
    right: -23px;
  }

  .talk-Rtxt:after {
    position: absolute;
    content: '';
    border: 10px solid transparent;
    border-left: 10px solid #ebffe7;
    top: 15px;
    right: -19px;
  }

  /* 左画像 */
  .talk-Limg {
    margin-left: 4px;
    margin-top: -1px;
    float: left;
    width: 60px;
    height: 60px;
  }

  /* 左からの吹き出しテキスト */
  .talk-Ltxt {
    color: #444;
    position: relative;
    margin-left: 100px;
    padding: 1.2em;
    border: 3px solid #9ce191;
    background-color: #fff;
    border-radius: 5px;
    width: 50%;
  }

  /* 左の三角形を作る */
  .talk-Ltxt:before {
    position: absolute;
    content: '';
    border: 10px solid transparent;
    border-right: 10px solid #9ce191;
    top: 15px;
    left: -20px;
  }

  .talk-Ltxt:after {
    position: absolute;
    content: '';
    border: 10px solid transparent;
    border-right: 10px solid #fff;
    top: 15px;
    left: -16px;
  }
</style>