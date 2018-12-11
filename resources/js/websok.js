//make connections
var socket = io.connect('http://localhost:8080');

//quiry DOM
var field = document.getElementById('field');
var btn = document.getElementById('btn');
var img = document.getElementById('img');


var x;
var y;

//img
var imgchunks = [];

socket.on('img-chunk', function (chunk) {
    imgchunks.push(chunk);
    img.setAttribute('src', 'data:image/png;base64,' + chunk.buffer);
});

//emit events
img.addEventListener('click', function(){
    x = event.clientX;
    console.log(x);
    y = event.clientY;
    console.log(y);

    socket.emit('chat', {
        x: x,
        y: y
    });
});

img.addEventListener('click', function (){
    socket.emit('click', {
        x: x,
        y: y
    });
});


//listen
 socket.on('chat', function(data){
    field.innerHTML = '<h1>' + data.x + "," + data.y + '</h1>';
 });