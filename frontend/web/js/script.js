let wave1 = $('#feel-the-wave').wavify({
    height: 80,
    bones: 4,
    amplitude: 60,
    color: 'rgba(0, 123, 255, .6)',
    speed: .15
});

let wave2 = $('#feel-the-wave-two').wavify({
    height: 60,
    bones: 4,
    amplitude: 60,
    color: 'rgba(0, 123, 255, .4)',
    speed: .25
});

let wave3 = $('#feel-the-wave-three').wavify({
    height: 120,
    bones: 6,
    amplitude: 60,
    color: 'rgba(0, 123, 255, .2)',
    speed: .25
});

AOS.init();