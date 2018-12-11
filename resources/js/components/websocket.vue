<template>
    <div>
        <div id="websocket">
            <div id="field"></div>
            <img id="img" src="" alt=" Websocket/reCaptcha">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                imgchunks: [],
                x: 0,
                y: 0,
            }
        },

        methods: {
            websocket() {
                //make connections
                var socket = io.connect('http://localhost:4000');
                //quiry DOM
                var field = document.getElementById('field');
                var btn = document.getElementById('btn');
                var img = document.getElementById('img');

                socket.on('img-chunk', function (chunk) {
                    this.imgchunks.push(chunk);
                    img.setAttribute('src', 'data:image/png;base64,' + chunk.buffer);
                });

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

                //listen
                socket.on('chat', function (data) {
                    field.innerHTML = '<h1>' + data.x + ',' + data.y + '</h1>';
                });
            }
        }
    }
</script>

<style>
    body {
        color: white;
    }
</style>
