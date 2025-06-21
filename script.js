
AOS.init();

document.querySelectorAll('#preloader .loader p span').forEach((span, index) => {
    span.style.setProperty('--i', index); 
});

setTimeout(() => {
    document.getElementById('preloader').classList.add('hidden');

    setTimeout(() => {
        document.getElementById('preloader').style.display = 'none';
        document.getElementById('preloader').classList.remove('hidden');
        document.getElementById('main-content').style.display = 'block'; 
    }, 1000); 
}, 1000); 
