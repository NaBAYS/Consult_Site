<div class="comment-wrapper">
    <div class="comment-block">
        <div class="comment-contents">
            <p>
                Cur fuga persuadere? Sunt eposes vitare audax, velox guttuses. Cum consilium congregabo, omnes tuses
                perdere
                mirabilis, castus fortises.
            </p>
            <div class="comment-controls">
                <div>
                    <strong>Username</strong> | 00/00/00 00:00 AM
                </div>
                <button type="button" class="btn btn-link">Reply</button>
            </div>
            <div class="vote-block">
                <button type="button" class="material-icons">keyboard_arrow_up</button>
                <span class="vote-number">0</span>
                <button type="button" class="material-icons">keyboard_arrow_down</button>
            </div>
        </div>

        <div class="comment-block">
            <div class="comment-contents">
                <p>
                    Cur fuga persuadere? Sunt eposes vitare audax, velox guttuses. Cum consilium congregabo, omnes tuses
                    perdere
                    mirabilis, castus fortises.
                </p>
                <div class="comment-controls">
                    <div>
                        <strong>Username</strong> | 00/00/00 00:00 AM
                    </div>
                    <button type="button" class="btn btn-link">Reply</button>
                </div>
                <div class="vote-block">
                    <button type="button" class="material-icons">keyboard_arrow_up</button>
                    <span class="vote-number">0</span>
                    <button type="button" class="material-icons">keyboard_arrow_down</button>
                </div>
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary" type="button" id="leave-comment-btn">Leave a Comment</button>

{{ Form::open(['url' => '#', 'id' => 'comment-form']) }}
<fieldset>
    <legend class="sr-only">Leave Comment</legend>
    {{ Form::bsTextarea('comment', null, ['placeholder' => 'Leave a Comment', 'label' => false]) }}

    {{ Form::submit('Post Comment', ['class' => 'btn btn-primary']) }}
</fieldset>
{{ Form::close() }}