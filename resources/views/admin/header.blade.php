    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
              <use xlink:href="#bootstrap" />
            </svg>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="{{ route('admin.player') }}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#speedometer2" />
                </svg>
                選手一覧
              </a>
            </li>
            <li>
              <a href="{{ route('admin.game') }}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#speedometer2" />
                </svg>
                試合結果一覧
              </a>
            </li>
            <li>
              <a href="{{ route('admin.notice') }}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#table" />
                </svg>
                お知らせ一覧
              </a>
            </li>
            <li>
              <a href="{{ route('admin.team') }}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#grid" />
                </svg>
                チーム紹介
              </a>
            </li>
            <li>
              <a href="{{ route('admin.inquiry') }}" class="nav-link text-white">
                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                  <use xlink:href="#people-circle" />
                </svg>
                お問い合わせ一覧
              </a>
            </li>
          </ul>

          @if(Auth::check())
          <div class="ms-auto admin-info">
            <span class="text-white me-2">ユーザー名：{{ Auth::user()->name }}</span>
            <span class="text-white">メールアドレス：{{ Auth::user()->email }}</span>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="container d-flex flex-wrap justify-content-center">
        <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">ログアウト</button>
          </form>
        </div>
      </div>
    </div>