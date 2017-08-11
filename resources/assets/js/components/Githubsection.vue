<template>
    <div class="container">
        <h1 class="text-center">Top PHP Repositories</h1>

        <ul class="list-group">
            <li class="list-group-item" v-for="repository in repositories">
                {{ repository.name }} ( {{ repository.full_name }} )

                <div class="pull-right">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="star-count">{{ repository.stargazers_count }}</span>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        created(){
            axios.get('/api/repositories/all')
                .then(response => {
                    // JSON responses are automatically parsed.
                    this.repositories = response.data.items;
//                    this.cardsLoaded = true;
                })
                .catch(e => {
//                    this.errors.push(e);
                    console.log(e);
                });

        },

        mounted() {
            console.log('Component mounted.');

        },
        data(){
            return {
                totalCount: 0,
                repositories: []
            }
        },

        methods: {}
    }
</script>
