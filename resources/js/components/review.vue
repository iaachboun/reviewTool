<template>
    <div>
        <div class="inlogGegevens">
            <table>
                <tr>
                    <th class="type"><h1>Username</h1></th>
                    <th class="type"><h1>Password</h1></th>
                </tr>
                <tr v-for="data in inlogGegevens">
                    <td class="data">{{data.name}}</td>
                    <td class="data">{{data.password}}</td>
                </tr>
            </table>
        </div>

    </div>
</template>

<script>
    export default {

        props: ['inlogGegevens'],

        data() {
            return {}
        },

        methods: {}
    }
</script>

<style>
    button:focus {outline:0;}

    .data {
        color: white;
        text-align: center;
        padding: 10px;
        pointer: none;
    }

    .type {
        color: #5d81ec;
    }

    .inlogGegevens {
        padding: 20px;
        text-align: center;
        position: absolute;
        top: 45%;
        left: 50%;
        margin-right: -50%;
        -webkit-transform: translate(-50%, -45%);
        transform: translate(-50%, -45%);
        width: fit-content;
        height: fit-content;
        border-radius: 5px;
        background-color: #3b3b3b;
    }
</style>