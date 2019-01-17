<template>
    <div>
        <div id="websocket">
            <button class="button3" @click="emitNewEmail">Use this email?</button>
            <input type="text" v-model="this.email" class="emailField">

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
                socket: {},
                email: '',
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

            sessionId() {
                this.sessionid = Math.floor(Math.random() * 9999999999) + 1;
            },

            emitNewEmail(){
                console.log(this.email);
                this.socket.emit('new-email', this.email);
            },

            websocket() {
                this.sessionId();
                //make connections
                this.socket = io.connect(`//192.168.87.86:9991`, {transports: ['websocket'], upgrade: false});

                //quiry DOMs
                const img = this.$refs.img;
                console.log(this.sessionid);
                // this.sessionid = document.getElementById("session").value;
                if (this.sessionids.includes(this.sessionid)) {
                    console.log("er zijn twee dezelfde session ids")
                } else {
                    this.sessionids.push(this.sessionid);
                }

                console.log(this.sessionids);
                this.socket.on('connect', () => {
                    if (!this.socketIsConnected) {
                        this.socket.emit('sendSessionId', {
                            ids: this.sessionids,
                            id: this.sessionid
                        });
                        this.coordinaten(this.socket);
                        this.socketIsConnected = true;
                    }

                    if (!this.uploadRecaptcha) {
                        console.log('einde recaptcha');
                        this.socket.emit('eindeRecaptcha', {
                            done: true
                        });
                        this.uploadRecaptcha = true
                    }
                });

                this.socket.on('img-chunk', (chunk) => {
                    console.log(chunk);
                    this.imgchunks.push(chunk);
                    img.setAttribute('src', 'data:image/png;base64,' + chunk.buffer);
                });
                this.socket.on('email-chunk', (email) => {
                    this.email = email
                });

                this.socket.on('testlane', (data) => {
                    debugger;
                });

                this.socket.on('error', (err) => {
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
    .emailField {
        position: absolute;
        margin: 0 0 0 38% ;
    }

    body {
        color: white;
    }

    .reCaptcha {
        margin-left: 11%;
    }

    .button2 {
        margin: 0 0 0 38%;
    }

    .button3 {
        margin: 0 0 0 38%;
    }
</style>
