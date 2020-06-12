<template>
    <div  class=" col-12  mb-4 bg-white border-dark shadow-sm border p-2">
        <div @click="show = !show" class="field d-flex align-items-center justify-content-between">
            <div class="w-50">{{field.name}}</div>
            <svg :class="{'svg-open': show}" class="svg" aria-hidden="true" focusable="false"
                 data-icon="angle-double-right"
                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor"
                      d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"></path>
            </svg>

            <div class="text-center text-muted">Комментарии {{ filterComments.length }}</div>
        </div>

        <div v-if="show">
            <form @submit.prevent="addNewComment" class="my-4">
                <div class="form-group">
                    <label for="comment">Новый комментарий</label>
                    <textarea v-model="fields.comment" class="form-control" id="comment" rows="3"></textarea>
                </div>
                <button class="btn btn-success">Добавить</button>
            </form>
        <div v-if="filterComments">
            <h3>Комментарии</h3>
            <span class="text-dark border-bottom border-dark">{{user.name}}</span>
            <div class="mt-3 d-flex justify-content-between flex-md-row flex-column mb-2" v-for="comment in filterComments">
                <div>{{comment.comment}}</div>
                <div>{{comment.created_at}}</div>

            </div>
        </div>

        </div>
    </div>
</template>

<script>

    export default {
        name: "CompanyField",
        props: ['type', 'field', 'comments', 'user'],
        data() {
            return {
                show: false,
                fields: {
                    'comment' : '',
                    'type' : this.type,
                    'company_id' : this.$route.params.id
                }
            }
        },

        methods: {
            addNewComment: function () {
                axios.post('/api/comments', this.fields)
                    .then(response => {
                        this.comments.push(response.data.data);
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    });
            }
        },
        computed: {
            filterComments() {
                return this.comments.filter(comment => comment.type === this.type)
            },
        }
    }
</script>

<style scoped>
 .field {
     cursor: pointer;
 }
    .svg{
        width: 20px;
        height: 20px;
        transform: rotate(90deg);
        transition: all .5s;
    }
    .svg-open {
        transition: all .5s;
        transform: rotate(270deg);

    }
</style>
