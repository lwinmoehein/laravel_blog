<div id="reply-list">
    <a href="#">Answers <span class="badge">{{count($question->answers)}}</span></a><br>
    <x-nested-answer-list-component :answers="$question->answers"/>
</div>

