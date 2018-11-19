<template>
    <div>
        <header>
            <h1 class="title">Review tool</h1>
            <nav>
                <ul>
                    <li>
                        <router-link to="/" class="nav-item">Account aanmaken</router-link>
                        <div class="hover_stripe"></div>
                    </li>
                    <li>
                        <button @click="getLoginGegevens()" class="nav-item-button">Review plaatsen</button>
                        <div class="hover_stripe"></div>
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

    header{
        top: 0;
        position: fixed;
        z-index: 2;
    }

</style>
