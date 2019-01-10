<template>
    <div>
        <div id="websocket">
            <img id="img" ref="img" src="" class="reCaptcha">
            <button class="button2" @click="submitReview">READY</button>
        </div>
    </div>
</template>

<script>
    import axios from "axios"
    import {goTrue} from '../events/events';
    import io from 'socket.io-client';

    export default {
        data() {
            return {
                imgchunks: [],
                show: false,
                socketIsConnected: false,
                sessionids: [],
                sessionid: '',
                uploadRecaptcha: true,
            }
        },

        methods: {
            submitReview() {
                axios.post('http://review-tool.test/api/submitReview');
            },

            /*trueToFalse(){
                this.uploadRecaptcha = false
            },*/

            sessionId(){
                this.sessionid = Math.floor(Math.random() * 9999999999) + 1;
            },

            websocket() {
                this.sessionId();
                //make connections
                var socket = io.connect(`//192.168.87.86:9991`, {transports: ['websocket'], upgrade: false});

                //quiry DOMs
                const img = this.$refs.img;
                console.log(this.sessionid);
                // this.sessionid = document.getElementById("session").value;
                if(this.sessionids.includes(this.sessionid)){
                    console.log("er zijn twee dezelfde session ids")
                }else{
                    this.sessionids.push(this.sessionid);
                }

                console.log(this.sessionids);
                socket.on('connect', () => {
                    if (!this.socketIsConnected) {
                        socket.emit('sendSessionId', {
                            ids: this.sessionids,
                            id: this.sessionid
                        });
                        this.coordinaten(socket);
                        this.socketIsConnected = true;
                    }

                    if(!this.uploadRecaptcha){
                        console.log('einde recaptcha');
                        socket.emit('eindeRecaptcha',{
                            done : true
                        });
                        this.uploadRecaptcha = true
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
                    console.log(x, y);
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

    .reCaptcha {
        margin-left: 11%;
    }

    .button2 {
        margin: 0 0 0 38%;
    }
</style>
