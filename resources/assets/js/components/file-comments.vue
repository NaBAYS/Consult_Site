<template>
    <div>
        <div class="comment-wrapper" v-for="comment in comments">
            <div class="comment-block">
                <div class="comment-contents">
                    <p>
                        {{ comment.comment }}
                    </p>
                    <div class="comment-controls">
                        <div>
                            <strong>{{ comment.user.user_name }}</strong> | {{ comment.created_at }}
                        </div>
                        <button type="button" class="btn btn-link" @click="leaveComment($event)">Reply</button>
                    </div>
                    <div class="vote-block">
                        <button type="button" class="material-icons">keyboard_arrow_up</button>
                        <span class="vote-number">{{ comment.votes }}</span>
                        <button type="button" class="material-icons">keyboard_arrow_down</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="new-comment"></div>

        <button class="btn btn-primary" type="button" id="leave-comment-btn" @click="newComment()">Leave a Comment
        </button>

        <form :action="'/file/' + file.id" method="POST" id="comment-form" v-on:submit.prevent="submitComment($event)">
            <fieldset>
                <legend class="sr-only">Comment Form</legend>

                <div class="form-group">
                    <label for="comment" class="sr-only">Comment</label>
                    <textarea name="comment" id="comment" rows="10" class="form-control"
                              placeholder="Leave a Comment"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Comment</button>
                <button type="button" class="btn btn-link" @click="cancelComment($event)">Cancel</button>
            </fieldset>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                comment_id: null
            }
        },
        computed: {
            comments: {
                get: function () {
                    return this.$store.state.comments;
                },
            },
            file: {
                get: function () {
                    return this.$store.state.file;
                }
            }
        },
        methods: {
            leaveComment: function (e) {
                let wrapper = $(_.first($(e)).srcElement).closest('.comment-contents'),
                    comment = $('#comment-form');

                wrapper.append(comment);
                comment.slideDown();
            },
            cancelComment: function (e) {
                let comment = $('#comment-form'),
                    commentBtn = $('#leave-comment-btn');
                comment.slideUp();

                if (!commentBtn.is(':visible')) {
                    commentBtn.fadeIn();
                }
            },
            newComment: function () {
                openComment($('#new-comment'));
                $('#leave-comment-btn').hide();
            },
            submitComment: function (e) {
                let commentForm = $('#comment-form'),
                    url = commentForm.attr('action'),
                    formData = commentForm.serializeArray();

                axios.post(url, {
                    'request': formData,
                })
                    .then(response => {
                        console.log(response)
                    })
                    .catch((error)=>{
                    console.log(error.response.data)
                });
            }
        }
    }

    // Append and open comment form
    function openComment(wrapper) {
        let comment = $('#comment-form');

        wrapper.append(comment);
        comment.hide();
        comment.slideDown();
    }
</script>
