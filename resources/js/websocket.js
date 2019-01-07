import io from 'socket.io-client';

//make connections
var socket = io.connect('http://localhost:4000');

//quiry DOMs
var img = document.getElementById('img');
var field = document.getElementById('field');

var x;
var y;

//img
var imgChunks = [];

socket.on('img-chunk', (chunk) => {
    console.log(chunk);
    imgChunks.push(chunk);
    img.setAttribute('src', 'data:image/png;base64,' + chunk.buffer);
});

//emit events
img.addEventListener('click', function () {
    x = event.clientX;
    console.log(x);
    y = event.clientY;
    console.log(y);

    socket.emit('click', {
        x: x,
        y: y
    });
});

//listen
socket.on('chat', (data) => {
    field.innerHTML = '<h1>' + data.x + ',' + data.y + '</h1>';
});

socket.on('error', (err) => {
    console.warn(err);
});

