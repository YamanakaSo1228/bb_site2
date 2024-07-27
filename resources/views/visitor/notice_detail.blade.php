@extends('layout')
@section('title','お知らせ内容')
@section('content')
<style>
        .notice-detail {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin-top: 30px;
        }

        .notice-detail:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .notice-detail h2 {
            position: relative;
            padding: 1rem 2rem calc(1rem + 10px);
            background: #00d7ff;
        }
        .notice-detail h2:before {
            position: absolute;
            top: -7px;
            left: -7px;
            width: 100%;
            height: 100%;
            content: '';
            border: 4px solid #000;
        }   

        .notice-detail p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="notice-detail">
                    <h2>{{ $notice[0]->notice_title }}</h2>
                    <p>{{ $notice[0]->notice_text }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection