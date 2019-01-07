<template>
    <div>
        <div id="websocket">
            <div id="field"></div>
            <img id="img" src="" class="reCaptcha">
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
                show: false
            }
        },

        methods: {
            websocket() {
                //make connections
                var socket = io.connect(`//192.168.102:9991`, {transports: ['websocket'], upgrade: false});
                //quiry DOMs
                var img = document.getElementById('img');
                var field = document.getElementById('field');

                socket.on('img-chunk', (chunk) => {
                    console.log(chunk);
                    this.imgchunks.push(chunk);
                    img.setAttribute('src', 'data:image/png;base64,' + chunk.buffer);
                });

                this.coordinaten(img, socket);
                //listen
                socket.on('chat', (data) => {
                    field.innerHTML = '<h1>' + data.x + ',' + data.y + '</h1>';
                });

                socket.on('testlane', (data) => {
                    debugger;
                });

                socket.on('error', (err) => {
                    console.warn(err);
                });
            },

            coordinaten(img, socket) {
                //emit events
                img.addEventListener('click', function () {
                    var x = event.clientX;
                    var y = event.clientY;

                    socket.emit('click', {
                        x: x,
                        y: y
                    });
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

    .reCaptcha {
        position: fixed;
        left: 51px;
        top: 115px;
    }
</style>
