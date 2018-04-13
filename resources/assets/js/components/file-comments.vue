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
                            <strong>{{ comment.user.user_name }}</strong> | {{ comment.created_at | date }}
                        </div>
                        <button type="button" class="btn btn-link" @click="leaveComment($event)" v-if="comment.user_id !== userId">Reply</button>
                    </div>
                    <form :action="'/file_comment/' + comment.id + '/vote/'" method="POST" class="vote-block" v-on:submit.prevent="submitVote($event)">
                        <button type="submit" :class="{'material-icons': true, 'hidden': comment.user_id === userId}" :aria-hidden="comment.user_id === userId" @click="vote_direction = true">keyboard_arrow_up</button>
                        <span class="vote-number">{{ comment.votes }}</span>
                        <button type="submit" :class="{'material-icons': true, 'hidden': comment.user_id === userId}" :aria-hidden="comment.user_id === userId" @click="vote_direction = false">keyboard_arrow_down</button>
                    </form>
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
    import { mapMutations } from 'vuex'

    export default {
        data: function () {
            return {
                comment_id: null,
                vote_direction: null,
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
            },
            userId: {
                get: function () {
                    return this.$store.state.userId;
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
                        if (response.status === 201) { // Success
                            this.update({
                                name: 'comments',
                                data: response.data
                            });

                            closeComment();
                        }
                    })
                    .catch((error)=>{
                    console.log(error.response.data)
                });
            },
            submitVote: function (e) {
                let voteForm = $('form.vote-block'),
                    url = voteForm.attr('action');

                axios.post(url, {
                    'request': this.vote_direction,
                })
                    .then(response => {
                        console.log(response);
                        // if (response.status === 201) { // Success
                        //     console.log(response)
                        // }
                    })
                    .catch((error)=>{
                        console.log(error.response.data)
                    });
            },
            ...mapMutations([
                'update',
            ])
        },
        filters: {
            date: function (date) {
                return moment(date).format('MMMM Do YYYY, h:mm a');
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
    function closeComment() {
        let comment = $('#comment-form');
        comment.slideUp().trigger('reset');
    }
</script>
