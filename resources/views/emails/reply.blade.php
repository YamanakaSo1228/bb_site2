@component('mail::message')
# お問い合わせへの返信

以下の内容でお問い合わせに対する返信をいたしました。

**タイトル：** {{ $inquiry->title }}
**本文：** {!! nl2br(e($replyBody)) !!}

---
このメールは自動送信です。返信をご希望の場合は、問い合わせ先のメールアドレスに直接返信してください。
@endcomponent
