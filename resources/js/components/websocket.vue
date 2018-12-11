<template>
    <div>
        <div v-if="show" id="websocket">
            <div id="field"></div>
            <img id="img" src="" alt=" Websocket/reCaptcha">
        </div>
    </div>
</template>

<script>
    import {goTrue} from '../events/events';
    import io from 'socket.io-client';

    export default {
        methods: {
            websocket() {
                //make connections
                var socket = io('//127.0.0.1:9991', {transports: ['websocket'], upgrade: false});
                //quiry DOM
                var img = document.getElementById('img');
                var field = document.getElementById('field');

                socket.on('img-chunk', function (chunk) {
                    this.imgchunks.push(chunk);
                    img.setAttribute('src', 'data:image/png;base64,' + chunk.buffer);
                });
                this.coordinaten();
                //listen
                socket.on('chat', function (data) {
                    field.innerHTML = '<h1>' + data.x + ',' + data.y + '</h1>';
                });
            },

            coordinaten(){
                //emit events
                img.addEventListener('click', function () {
                    this.x = event.clientX;
                    console.log(x);
                    this.y = event.clientY;
                    console.log(y);

                    this.socket.emit('chat', {
                        x: this.x,
                        y: this.y
                    });
                });

                img.addEventListener('click', function () {
                    socket.emit('click', {
                        x: this.x,
                        y: this.y
                    });
                });
            }
        },

        data() {
            return {
                imgchunks: [],
                x: 0,
                y: 0,
                show: false
            }
        },
        mounted() {
            this.websocket();
            goTrue.$on('recaptcha', (bool) => {
                this.show = true;
            })
        }
    }
</script>

<style>
    body {
        color: white;
    }
</style>
