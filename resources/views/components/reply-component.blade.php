<div class="container">
    <a href="#">Comments <span class="badge">{{count($article->replies)}}</span></a><br>

    <x-nested-reply-list-component :replies="$article->replies"/>


</div>
