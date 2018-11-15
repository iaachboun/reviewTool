<template>
    <div>
        <header>
            <h1 class="title">Review tool</h1>
            <nav>
                <ul>
                    <li>
                        <router-link to="/" class="nav-item">Account aanmaken</router-link>
                        <div class="hover-stripe"></div>
                    </li>
                    <li>
                        <button @click="getLoginGegevens()" class="nav-item-button">Review plaatsen</button>
                        <div class="active"></div>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <router-view v-bind:inlogGegevens="inlogGegevens"></router-view>
        </main>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        data() {
            return {
                inlogGegevens: [],
                arrayLength: []
            }
        },
        methods: {
            getLoginGegevens() {
                axios.get('http://review-backend.test/api/post')
                    .then(response => {
                        this.inlogGegevens = response.data.data;
                        this.$router.push({path: 'review'});

                    });
            },
        }
    }
</script>

<style>
    .nav-item-button{
        color: white;
        border: none;
        background: none;
        cursor: pointer;
        font-size: inherit;
    }
</style>
