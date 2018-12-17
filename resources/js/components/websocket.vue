<template>
    <div>
        <div id="websocket">
            <div id="field"></div>
            <img id="img" src="">
        </div>
    </div>
</template>

<script>
    import {goTrue} from '../events/events';
    import io from 'socket.io-client';

    export default {
        data() {
            return {
                imgchunks: [],
                x: 0,
                y: 0,
                show: false
            }
        },

        methods: {
            websocket() {
                //make connections
                var socket = io(  `//192.168.87.86:9991`, {transports: ['websocket'], upgrade: false});
                //quiry DOMs
                var img = document.getElementById('img');
                var field = document.getElementById('field');

                socket.on('img-chunk',  (chunk) => {
                    this.imgchunks.push(chunk);
                    img.setAttribute('src', 'data:image/png;base64,' + chunk.buffer);
                });
                this.coordinaten(img);
                //listen
                socket.on('chat',  (data) => {
                    field.innerHTML = '<h1>' + data.x + ',' + data.y + '</h1>';
                });
            },

            coordinaten(img) {
                this.socket.emit('click', {
                    x: this.x,
                    y: this.y
                });
            }
        },
        mounted() {
            goTrue.$on('recaptcha', (bool) => {
                this.show = true;
                this.websocket();
            })
        }
    }
</script>

<style>
    body {
        color: white;
    }
</style>
