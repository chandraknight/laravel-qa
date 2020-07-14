<template>
    <a title="Click to mark as favorite question (Click again to undo)"
       :class="classes" @click.prevent="toggle">
        <!--       onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $model->id }}').submit();"-->

        <i class="fas fa-star fa-2x"></i>
        <span class="favorites-count">{{ count }}</span>
    </a>
</template>

<script>
    export default {
        name: "Favorite",
        props: ['question'],
        data() {
            return {
                isFavorite: this.question.is_favorited,
                count: this.question.favorites_count,
                id: this.question.id,
            }
        },
        computed: {
            classes() {
                return [
                    'favorite', 'mt-2',
                    !this.signedIn ? 'off' : (this.isFavorite ? 'favorited' : '')
                ];
            },
            endpoint() {
                return `/questions/${this.id}/favorites`;
            },
            signedIn(){
                return Window.Auth.signedIn;
            }
        },
        methods: {
            toggle() {
                if (! this.signedIn) {
                    this.$toast.warning('Please login to favorite question', 'Warning', {
                        timeout:3000,
                        position:'bottomLeft'
                    });
                    return;
                }
                this.isFavorite ? this.destory() : this.create();
            },
            destory() {
                axios.delete(this.endpoint)
                    .then(res => {
                        this.count--;
                        this.isFavorite = false;
                    })
                    .catch(err => {

                    });
            },
            create() {
                axios.post(this.endpoint)
                    .then(res => {
                        this.count++;
                        this.isFavorite = true;
                    })
                    .catch(err => {

                    });
            }
        }
    }
</script>

<style scoped>

</style>
