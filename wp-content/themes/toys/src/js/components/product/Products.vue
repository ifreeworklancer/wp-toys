<template>
    <div class="row">
        <product v-if="posts.length" v-for="(post, index) in posts" :post="post" :count="index + 1" :key="post.id"/>
        <div class="col-12 text-center" v-if="paged">
            <a href="#" class="btn btn-primary" @click.prevent="getPosts">
                {{buttonText}}
            </a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Product from './Product';
    export default {
        props: {
            category: String,
            filters: String,
            buttonText: String,
        },
        components: {
            Product
        },
        data() {
            return {
                paged: 1,
                posts: [],
            }
        },
        methods: {
            async getPosts() {
                const data = new FormData();
                data.set('post_type', this.category);
                data.set('action', 'get_ajax_posts');
                data.set('paged', this.paged);
                if (this.filters) data.set('filters', this.filters);
                await axios.post('/wp-admin/admin-ajax.php', data)
                    .then(({data}) => {
                        this.posts.push(...data.posts);
                        this.paged = this.paged < data.last_page ? this.paged += 1 : null;
                    })
            },
        },
        mounted() {
            this.$store.dispatch('getFavorite');
            this.getPosts();
        }
    }
</script>