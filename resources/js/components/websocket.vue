<template>
    <div>
        <div id="websocket">
            <img id="img" ref="img" src="" class="reCaptcha"> 
            <button class="button2">READY</button>
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
                show: false,
                socketIsConnected: false,
            }
        },

        methods: {
            websocket() {
                //make connections
                var socket = io.connect(`//192.168.87.86:9991`, {transports: ['websocket'], upgrade: false});
                //quiry DOMs
                const img = this.$refs.img;
                var sessionid = document.getElementById("session").value;
                
                socket.on('connect', () =>{
                    if(!this.socketIsConnected){
                        socket.emit('ehlo', {
                            id: sessionid
                        });
                    this.coordinaten(socket);
                    this.socketIsConnected = true;
                    }else{
                    }
                });

                socket.on('img-chunk', (chunk) => {
                    console.log(chunk);
                    this.imgchunks.push(chunk);
                    img.setAttribute('src', 'data:image/png;base64,' + chunk.buffer);
                });

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

            coordinaten(socket) {
                const img = this.$refs.img;
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
