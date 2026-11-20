<h1>Добавлена новая статья</h1>

<p>
    На сайте была создана новая статья.
</p>

<p>
    <strong>Название:</strong> {{ $article->name }}
</p>

<p>
    <strong>Дата:</strong> {{ $article->date->format('d.m.Y') }}
</p>

@if ($article->shortDesc)
    <p>
        <strong>Краткое описание:</strong> {{ $article->shortDesc }}
    </p>
@endif

<p>
    <strong>Описание:</strong> {{ $article->desc }}
</p>
