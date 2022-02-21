@component('mail::message')

Great news! Your article: **{{ $article->title() }}** has been approved and is now live on Laravel.io.

@component('mail::button', ['url' => Panel::make()->get($article)->url()])
View Article
@endcomponent

@endcomponent
